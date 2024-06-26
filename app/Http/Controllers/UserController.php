<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\Score;
use App\Models\QuestionAnswer;
use App\Models\QuizAnswer;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function pendingRequests()
    {
        $users=User::where("status",0)->orWhere("status",2)->orderBy("id","desc")->get();
        return view('backend.users.pending',['users'=>$users]);
    }
    public function allUsers()
    {
        $users=User::orderBy("id","desc")->get();
        return view('backend.users.pending',['users'=>$users]);
    }
    public function add()
    {
        return view('backend.quiz/add');
    }
    public function viewScore(Request $request)
    {
        $requestData = $request->all();
        $phone = $requestData['dataToSend']['user_phone'];
        $questionAnswers = json_decode($requestData['dataToSend']['questionAnswers'], true);

        $questionIds = array();

        foreach ($questionAnswers as $answer) {
            $questionIds[] = $answer['questionId'];
        }
        $mobile =$phone;
        $numberStr = $mobile;
        if ($numberStr[0] == '0') {
            $mobile2 = "254" . ltrim($mobile, '0');
        } else {
            $mobile2 = $mobile;
        }
        $user=QuizAnswer::where('user_phone',$mobile2)->first();
        if($user!="") {
            $existingQuestionIds = json_decode($user->question_id, true);
            $updatedQuestionIds = array_values(array_unique(array_merge($existingQuestionIds, $questionIds)));
            $user->question_id = json_encode($updatedQuestionIds);
            $user->save();
        } else {
            $questionIdsJson = json_encode($questionIds);
            // log::debug($questionIdsJson);
            $quizAnswer = new QuizAnswer();
            $quizAnswer->selected_answer = 1;
            $quizAnswer->question_id =$questionIdsJson;
            $quizAnswer->category = 1;
            $quizAnswer->correct_answer = 1;
            $quizAnswer->user_phone = $mobile2;
            $quizAnswer->save();
            return redirect('user/leaders-board')->with('success', 'Question created successfully.');
    }
    }
    public function saveScore(Request $request)
    {

        $mobile = (string) $request->phone;
        $mobile2 = $mobile[0] == '0' ? "254" . ltrim($mobile, '0') : $mobile;
        $user = Score::where('phone', $mobile2)->first();
        if (!$user) {
            $question = new Score();
            $question->name = $request->username;
            $question->score = $request->score;
            $question->quiz_type = 'personality';
            $question->phone = $mobile2;
            $question->questions_attempted = $request->total_questions;
            $question->status = 1;
            $question->save();
        } else {
            $user->score += $request->score;
            $user->save();
        }
        session()->forget('random_questions');

        return redirect('user/leaders-board')->with('success', 'Question created successfully.');
    }
    public function storeQuestion(Request $request)
    {
        $rules = [
            'question' => 'required',
            'allocated_time' => 'required',
            'correct_answer' => 'required',
            'A' => 'required|string',
            'B' => 'required|string',
            'C' => 'required|string',
            'D' => 'required|string',
        ];
        $validatedData = $request->validate($rules);
        $question = new Question();
        $question->question = $validatedData['question'];
        $question->category_id = 0;
        $question->allocated_time = $validatedData['allocated_time'];
        $question->status = 1;
        $question->correct_answer = $validatedData['correct_answer'];
        $question->save();
        if($question->save()){
            $answers = [];
            foreach (['A', 'B', 'C', 'D'] as $option) {
                if ($request->has($option)) {
                    $answers[] = "{$option}:{$request->input($option)}";
                }
            }
            $question_answer=new QuestionAnswer;
            $question_answer->question_id=$question->id;
            $question_answer->answers = json_encode($answers);
            $question_answer->status=1;
            $question_answer->save();
        }

        return redirect('admin/manage-questions')->with('success', 'Question created successfully.');
    }
    public function manageQuestions(){
        $questions=Question::where('status',1)->get();
        return view('backend.quiz/index',['questions'=>$questions]);
    }

    public function playQuiz(){
        // $questions=Question::where('status',1)->get();
        return view('start-trivia');
    }
    public function leadersBoard(){
        return view('user-results');
    }
    public function startQuiz(){
        // $questions=Question::where('status',1)->get();
        return view('trivia-questions');
    }

    public function selectQuiz() {
        $mobile =$_GET['user_code'];
        $numberStr = $mobile;
        if ($numberStr[0] == '0') {
            $mobile2 = "254" . ltrim($mobile, '0');
        } else {
            $mobile2 = $mobile;
        }
        $questions_done=QuizAnswer::where('user_phone',$mobile2)->first();
      if($questions_done){
        $question_done = json_decode($questions_done->question_id, true) ?: [];
      }else{
        $question_done =[];
      }
        // dd($question_done);
        if (!isset($_SESSION['random_questions'])) {
            $randomQuestions = Question::whereNotIn('id', $question_done)->get()->shuffle()->take(10);
            // log::debug(collect($randomQuestions));
            $_SESSION['random_questions'] = $randomQuestions->toArray();
            //  log::debug(collect($_SESSION['random_questions']));
            return response()->json($randomQuestions->first());
        } else {
            $randomQuestions = $_SESSION['random_questions'];
            if (isset($_GET['questionId'])) {
                $questionId = $_GET['questionId'];
                $currentIndex = array_search($questionId, array_column($randomQuestions, 'id'));
                $nextQuestionIndex = $currentIndex + 1;
                if ($nextQuestionIndex < count($randomQuestions)) {
                    $nextQuestion = $randomQuestions[$nextQuestionIndex];
                    return response()->json($nextQuestion);
                }
            }

            return response()->json(['message' => 'Quiz completed']);
        }
    }

    public function updateUser(){
             $id = ($_GET['id']);
             $status=$_GET['s'];
             $user = User::find($id);
             if (!$user) {
                return redirect()->back()->with('error','User not found');
             }
             try {
                $user->update(['status' =>$status ]);
                 return redirect()->back()->with('success','Record Updated');
             } catch (\Exception $e) {
                return redirect()->back()->with('error','An Error occured');
             }
    }
    public function sendOTP(Request $request)
    {

        try {
            $headers = ["Cookie: ci_session=ttdhpf95lap45hqt3h255af90npbb3ql"];
            $mobile =$request["mobile"];
            $otp = rand(100000, 999999);
            $numberStr = $mobile;
            if ($numberStr[0] == '0') {
                $mobile2 = "254" . ltrim($mobile, '0');
            } else {
                $mobile2 = $mobile;
            }
            $user = User::where('phone',$mobile2)->where('status',1)->first();
                if($user){
                    $exist='yes';
                }else{
                    $exist='no';
                }
                $senderName = rawurlencode("IMS");
                $bulkBalanceUser = "voucher";
                $encodMessage = rawurlencode("MONSTER PROMOTIONS\nYour verification code is: $otp.");
                $url = "https://3.229.54.57/expresssms/Api/send_bulk_api?action=send-sms&api_key=Snh2SGFQT0dIZmFtcRGU9ZXBlcEQ=&to=$mobile2&from=$senderName&sms=$encodMessage&response=json&unicode=0&bulkbalanceuser=$bulkBalanceUser";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                $response = curl_exec($ch);
                $res = json_decode($response);
                curl_close($ch);
                return response()->json(["status" => "success","exist"=>$exist,"code"=>$otp, "message" => "OTP requested successfully"]);
        } catch (\Exception $e) {
            Log::debug($e);
            return response()->json(["status" => "error", "message" => "Unable to request OTP."]);
        }
    }
    public function saveSelfie(Request $request)
    {
        $mobile =$request->input('phone');
        $numberStr = $mobile;
        if ($numberStr[0] == '0') {
            $mobile2 = "254" . ltrim($mobile, '0');
        } else {
            $mobile2 = $mobile;
        }
        if (!$mobile) {
            return response()->json(["status" => "failed_phone"]);
        }
        $user = User::where('phone', $mobile2)->first();
        if ($user) {
            if ($user->status == 1) {
                return response()->json(["status" => "approved"]);
            } else {
                return response()->json(["status" => "pending"]);
            }
        } else {
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $file = $request->file('file');
                $fileName = time() . '_' . $mobile2 . '.' . $file->getClientOriginalExtension();
                // Directory to store uploaded files
                $directory = 'public/user-uploads';
                // Ensure directory exists
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                $filePath = $file->storeAs($directory, $fileName);
                $user = new User;
                $user->phone = $mobile2;
                $user->status = 1;
                 $user->photo = $filePath;
                $user->save();

                return response()->json(["status" => "success"]);
            } else {
                return response()->json(["status" => "failed_upload"]);
            }
        }
    }
}
