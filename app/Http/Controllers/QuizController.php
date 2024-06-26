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
    public function saveansweredQuestion(Request $request)
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
            // Initialize $existingQuestionIds as an empty array if it's null
            $existingQuestionIds = $user->question_id ? json_decode($user->question_id, true) : [];

            // Merge and update question IDs
            $updatedQuestionIds = array_values(array_unique(array_merge($existingQuestionIds, $questionIds)));

            // Encode and save updated question IDs
            $user->question_id = json_encode($updatedQuestionIds);
            $user->save();
        }
         else {
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
        $userIp = $_SERVER['REMOTE_ADDR'];
        $location = $this->getLocationFromIp($userIp);
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
        $single->location=$location;
        $single->ip=$userIp;
        $single->save();
        session()->forget('random_questions');
        return redirect('user/leaders-board')->with('success', 'Question created successfully.');
    }
public function getLocationFromIp($ip) {
    $url = "https://ipapi.co/{$ip}/json/";

    // Initialize cURL session
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Only for testing purposes, you should set this to true in production

    // Execute cURL session
    $response = curl_exec($ch);

    // Check for cURL errors
    if(curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        curl_close($ch);
        return 'Unknown';
    }

    // Close cURL session
    curl_close($ch);

    // Decode JSON response
    $data = json_decode($response, true);

    // Extract relevant location data
    $city = $data['city'] ?? '';
    $country = $data['country_name'] ?? '';
    $region = $data['region'] ?? '';

    // Format location string
    $location = trim("{$city}, {$region}, {$country}", ', ');

    return $location;
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
        return view('start-trivia');
    }
    public function leadersBoard()
    {
        return view('user-results');
    }
    public function startQuiz()
    {
        return view('trivia-questions');
    }

    public function musicQuiz()
    {
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
        try {
            // Generate OTP
            $otp = rand(100000, 999999);

            // Format mobile number
            $mobile =$request->mobile;
            $mobile2 = $this->formatMobileNumber($mobile); // Extracted to a separate method
            // Check if user exists and determine status
            $user = User::where('phone', $mobile2)->first();
            if ($user) {
                $exist = $this->getUserExistenceStatus($user);
                $username = $user->name;
            } else {
                $exist = 'none';
                $username = 'none';
            }
            // Prepare and execute cURL request
            $response = $this->sendSmsViaCurl($mobile2, $otp);
            // Log success and return response
            Log::info('OTP sent successfully', ['mobile' => $mobile2, 'otp' => $otp]);
            return response()->json([
                "status" => "success",
                "exist" => $exist,
                "username" => $username,
                "code" => $otp,
                "message" => "OTP requested successfully"
            ]);
        } catch (\Exception $e) {
            // Log error and return error response
            Log::error('Error sending OTP', ['error' => $e->getMessage()]);
            return response()->json([
                "status" => "error",
                "message" => "Unable to request OTP."
            ]);
        }
    }
    // public function sendOTP(Request $request)
    // {
    //     $mobile = $request->mobile;
    //     $otp = rand(100000, 999999);
    //     $numberStr = $mobile;
    //     if ($numberStr[0] == '0') {
    //         $mobile2 = "254" . ltrim($mobile, '0');
    //     } else {
    //         $mobile2 = $mobile;
    //     }
    //     $exist = 'new';
    //     $user = User::where('phone', $mobile2)->first();
    //     if ($user) {
    //         if ($user->status == 1) {
    //             $exist = 'approved';
    //             $username = $user->name;
    //         } else if ($user->status == 2) {
    //             $exist = 'rejected';
    //             $username = $user->name;
    //         } else {
    //             $exist = 'pending';
    //             $username = $user->name;
    //         }
    //     } else {
    //         $username = 'none';
    //     }
    //     try {

    //         $curl = curl_init();

    //         curl_setopt_array(
    //             $curl,
    //             array(
    //                 CURLOPT_URL => 'http://167.99.63.221:8080/API_All_IMS_BULK/BULK_SMS_OTP',
    //                 CURLOPT_RETURNTRANSFER => true,
    //                 CURLOPT_ENCODING => '',
    //                 CURLOPT_MAXREDIRS => 10,
    //                 CURLOPT_TIMEOUT => 0,
    //                 CURLOPT_FOLLOWLOCATION => true,
    //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //                 CURLOPT_CUSTOMREQUEST => 'POST',
    //                 CURLOPT_POSTFIELDS => '{"key":"KXVT-8IOT6-UTTT-BFT34-FDJJG-74BG","originator":"MONSTER","msisdn":' . $mobile . ',"message":"Your MONSTER PROMOTIONS verification code is: ' . $otp . '","client_id":"IMS","country":"KE","network":"9"}',
    //                 CURLOPT_HTTPHEADER => array(
    //                     'API-KEY: TVX-MTR-7632-E74U-856M-GG833',
    //                     'MESSAGE_ID: 123988',
    //                     'ORIGINATOR: MONSTER',
    //                     'Content-Type: application/json'
    //                 ),
    //             )
    //         );

    //         $response = curl_exec($curl);

    //         curl_close($curl);
    //         echo $response;
    //         log::info('ss' . $response);
    //         log::info($mobile);
    //         Log::debug('SMS SEND');
    //         return response()->json(["status" => "success", "exist" => $exist, "username" => $username, "code" => $otp, "message" => "OTP requested successfully"]);
    //     } catch (\Exception $e) {
    //         Log::debug($e);
    //         return response()->json(["status" => "error", "message" => "Unable to request OTP."]);
    //     }
    // }
    private function formatMobileNumber($mobile)
    {
        // Format mobile number to international format
        $numberStr = $mobile;
        if ($numberStr[0] == '0') {
            return "254" . ltrim($mobile, '0');
        }
        return $mobile;
    }
    private function getUserExistenceStatus($user)
    {
        // Determine user status based on 'status' field
        switch ($user->status) {
            case 1:
                return 'approved';
            case 2:
                return 'rejected';
            default:
                return 'pending';
        }
    }

    public function sendSmsViaCurl($mobile,$otp)
    {
        // 25410475859
        // $otp='131';
        // $mobile='25410475859';
        // Prepare cURL request to send SMS
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://167.99.63.221:8080/API_All_IMS_BULK/BULK_SMS_OTP',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'key' => 'KXVT-8IOT6-UTTT-BFT34-FDJJG-74BG',
                'originator' => 'MONSTER',
                'msisdn' => $mobile,
                'message' => "Your MONSTER PROMOTIONS account verification code is: $otp",
                'client_id' => 'IMS',
                'country' => 'KE',
                'network' => '9'
            ]),
            CURLOPT_HTTPHEADER => [
                'API-KEY: TVX-MTR-7632-E74U-856M-GG833',
                'MESSAGE_ID: 123988',
                'ORIGINATOR: MONSTER',
                'Content-Type: application/json'
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    public function sendSmsViaCurl2()
    {
        // https://3.229.54.57/expresssms/Api/send_bulk_api?action=send-sms&api_key=Snh2SGFQT0dIZmFtcRGU9ZXBlcEQ=&to=254705030613&from=EABL&sms=Congratulations! You have WON a NAIVAS Shopping Voucher worth KES.5,000 from Tujengane na Spirits Promotion. Your voucher number is IMS-30587USHDGSSDGEC. This Voucher is limited to Food Items ONLY. Visit any Naivas Supermarket near you to redeem your voucher. T%26Cs apply! Strictly18+ ONLY. Normal SMS charges will apply. Helpline 0721985566. SMS STOP to 20405 to opt out of this promotion.&response=json&unicode=0&bulkbalanceuser=voucher
        // log::info('reached here');
        $mobile1='254104758595';
        $numbers='1231';
        try {
            $headers = ["Cookie: ci_session=ttdhpf95lap45hqt3h255af90npbb3ql"];
            if (substr($mobile1, 0, 3) === "254") {
                $mobile = $mobile1;
            } else {
                $mobile = "254" . ltrim($mobile1, '0');
            }
            $senderName = rawurlencode("MONSTER");
            $bulkBalanceUser = "voucher";
            $currentDate = date('d/m hA');
            $encodMessage = rawurlencode("LOTTO BOMBA\n\n" . $numbers . "\nTSN " . rand(9999, 10000) . " KES 1\nDraw 5697 " . $currentDate);
            $url =
                "https://3.229.54.57/expresssms/Api/send_bulk_api?action=send-sms&api_key=Snh2SGFQT0dIZmFtcRGU9ZXBlcEQ=&to=" .
                $mobile .
                "&from=" .
                $senderName .
                "&sms=" .
                $encodMessage .
                "&response=json&unicode=0&bulkbalanceuser=" .
                $bulkBalanceUser;
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
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            $response = curl_exec($ch);
            $res = json_decode($response);
            curl_close($ch);
            log::info('send to:' . $mobile);
        } catch (\Exception $e) {
            print_r($e);
            Log::debug($e);
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
