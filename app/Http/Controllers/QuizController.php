<?php

namespace App\Http\Controllers;


use App\Models\singleScore;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\Score;
use App\Models\QuestionAnswer;
use App\Models\QuizAnswer;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class QuizController extends Controller
{

    public function index()
    {
        return view('backend.dashboard');
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
        $mobile = $phone;
        $numberStr = $mobile;
        if ($numberStr[0] == '0') {
            $mobile2 = "254" . ltrim($mobile, '0');
        } else {
            $mobile2 = $mobile;
        }
        $user = QuizAnswer::where('user_phone', $mobile2)->first();
        if ($user != "") {
            $existingQuestionIds = json_decode($user->question_id, true);
            $updatedQuestionIds = array_values(array_unique(array_merge($existingQuestionIds, $questionIds)));
            $user->question_id = json_encode($updatedQuestionIds);
            $user->save();
        } else {
            $questionIdsJson = json_encode($questionIds);
            // log::debug($questionIdsJson);
            $quizAnswer = new QuizAnswer();
            $quizAnswer->selected_answer = 1;
            $quizAnswer->question_id = $questionIdsJson;
            $quizAnswer->category = 1;
            $quizAnswer->correct_answer = 1;
            $quizAnswer->user_phone = $mobile2;
            $quizAnswer->save();
            return redirect('user/leaders-board')->with('success', 'Question created successfully.');
        }
    }
    public function saveScore(Request $request)
    {
        // dd($request->all());
if($request->score && $request->score !=''){
    $total_score=$request->score;
}else{
    $total_score=0;
}
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
        $single = new SingleScore();
        $single->total_score = $total_score;
        $single->user_phone = $mobile2;
        $single->save();
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
        if ($question->save()) {
            $answers = [];
            foreach (['A', 'B', 'C', 'D'] as $option) {
                if ($request->has($option)) {
                    $answers[] = "{$option}:{$request->input($option)}";
                }
            }
            $question_answer = new QuestionAnswer;
            $question_answer->question_id = $question->id;
            $question_answer->answers = json_encode($answers);
            $question_answer->status = 1;
            $question_answer->save();
        }

        return redirect('admin/manage-questions')->with('success', 'Question created successfully.');
    }
    public function manageQuestions()
    {
        $questions = Question::where('status', 1)->get();
        return view('backend.quiz/index', ['questions' => $questions]);
    }

    public function playQuiz()
    {
        // $questions=Question::where('status',1)->get();
        return view('start-trivia');
    }
    public function leadersBoard()
    {
        return view('user-results');
    }
    public function startQuiz()
    {
        // $questions=Question::where('status',1)->get();
        return view('trivia-questions');
    }


    public function musicQuiz()
    {
        // $questions=Question::where('status',1)->get();
        return view('music-game');
    }
    public function selectQuiz()
    {
        $mobile = $_GET['user_code'];
        $category = decrypt($_GET['category_id']);
        $numberStr = $mobile;
        if ($numberStr[0] == '0') {
            $mobile2 = "254" . ltrim($mobile, '0');
        } else {
            $mobile2 = $mobile;
        }
        $questions_done = QuizAnswer::where('user_phone', $mobile2)->first();
        if ($questions_done) {
            $question_done = json_decode($questions_done->question_id, true) ?: [];
        } else {
            $question_done = [];
        }
        if (!isset($_SESSION['random_questions'])) {
            $randomQuestions = Question::select('id', 'question', 'music_title', 'choice_A', 'choice_B', 'choice_C', 'choice_D')
                ->whereNotIn('id', $question_done)
                ->where('category_id', $category)
                ->get()
                ->shuffle()
                ->take(10);

            $_SESSION['random_questions'] = $randomQuestions->toArray();
            if (count($randomQuestions) > 0) {
                return response()->json($randomQuestions->first());
            } else {
                return response()->json('caught-up');
            }
        } else {
            $randomQuestions = $_SESSION['random_questions'];
            if (isset($_GET['questionId'])) {
                $questionId = $_GET['questionId'];
                $currentIndex = array_search($questionId, array_column($randomQuestions, 'id'));
                $nextQuestionIndex = $currentIndex + 1;
                if ($nextQuestionIndex < count($randomQuestions)) {
                    $nextQuestion = $randomQuestions[$nextQuestionIndex];
                    return response()->json($nextQuestion);
                    if (count($randomQuestions) > 0) {
                        return response()->json($randomQuestions->first());
                    } else {
                        return response()->json('caught-up');
                    }
                }
            }
            // return response()->json(['message' => 'Quiz completed']);
        }
    }

    public function disableQuestions()
    {
        $id = decrypt($_GET['id']);
        $question = Question::find($id);
        if (!$question) {
            return redirect()->back()->with('error', 'Question not found');
        }
        try {
            $question->update(['status' => 0]);
            return redirect()->back()->with('success', 'Question deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An Error occured');
        }
    }
    public function sendOTP(Request $request)
    {

        $mobile = $request["mobile"];
        $otp = rand(100000, 999999);
        $numberStr = $mobile;
        if ($numberStr[0] == '0') {
            $mobile2 = "254" . ltrim($mobile, '0');
        } else {
            $mobile2 = $mobile;
        }
        $exist = 'new';
        $user = User::where('phone', $mobile2)->first();
        if ($user) {
            if ($user->status == 1) {
                $exist = 'approved';
                $username = $user->name;
            } else if ($user->status == 2) {
                $exist = 'rejected';
                $username = $user->name;
            } else {
                $exist = 'pending';
                $username = $user->name;
            }
        } else {
            $username = 'none';
        }
        try {
            $headers = ["Cookie: ci_session=ttdhpf95lap45hqt3h255af90npbb3ql"];

            $senderName = rawurlencode("MONSTER");
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
            Log::debug('SMS SEND');
            return response()->json(["status" => "success", "exist" => $exist, "username" => $username, "code" => $otp, "message" => "OTP requested successfully"]);
        } catch (\Exception $e) {
            Log::debug($e);
            return response()->json(["status" => "error", "message" => "Unable to request OTP."]);
        }
    }

    public function saveSelfie(Request $request)
    {
        $mobile = $request->input('phone');
        $numberStr = $mobile;
        if ($numberStr[0] == '0') {
            $mobile2 = "254" . ltrim($mobile, '0');
        } else {
            $mobile2 = $mobile;
        }
        $user = User::where('phone', $mobile2)->first();

        if ($user) {
            if ($user->status == 1) {
                return response()->json(["status" => "approved"]);
            } else {
                return response()->json(["status" => "pending"]);
            }
        } else {
            $file = $request->file('file');
            $directory = 'public/user-uploads';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            $filePath = $file->store($directory);
            $user = new User;
            $user->phone = $mobile2;
            $user->name = $request->input('username');
            $user->status = 1;
            $user->photo = $filePath;
            $user->save();
            return response()->json(["status" => "approved"]);
        }

    }
    public function getCategoryName(Request $request)
    {
        $category_id = decrypt($request->categoryID);
        if ($category_id == 2) {
            return response()->json(["category_name" => "PERSONALITY QUIZ"]);
        } else if ($category_id == 1) {
            return response()->json(["category_name" => "GENERAL QUIZ"]);
        } else {
            return response()->json(["error" => "No category Found"]);
        }
    }
    public function getQuestionResult(Request $request)
    {

        $question = $request->questionID;
        $userChoice = $request->userChoice;
        $choices = Question::where("id", $question)->first();

        if ($choices->correct_answer == $userChoice) {
            return response()->json(["status" => true, "choice" => $choices->correct_answer]);
        } else {
            return response()->json(["status" => false, "choice" => $choices->correct_answer]);
        }
    }
    public function terms()
    {
        return view('terms-conditions');
    }

}
