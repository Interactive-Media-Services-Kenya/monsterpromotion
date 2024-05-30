<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\Score;
use App\Models\QuestionAnswer;
use App\Models\QuizAnswer;
use Illuminate\Support\Facades\Log;
class QuizController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
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
        $dataToSend = json_decode($requestData['dataToSend'], true);
        foreach ($dataToSend['questionAnswers'] as $questionAnswer) {
            $quizAnswer = new QuizAnswer();
            $quizAnswer->selected_answer = $questionAnswer['selectedAnswer'];
            $quizAnswer->question_id = $questionAnswer['questionId'];
            $quizAnswer->category = $questionAnswer['trivia_type']; 
            $quizAnswer->correct_answer = $questionAnswer['correct_score'];
            $quizAnswer->user_phone = $dataToSend['user_phone'];
            $quizAnswer->save();
        }
        
    log::info(collect($quizAnswer));
    return response()->json(['message' => 'Data saved successfully'], 200);
        return redirect('user/my-results')->with('success', 'Question created successfully.');
    }
    public function saveScore(Request $request)
    {
        $question = new Score();
        $question->name = $request->username;
        $question->score = $request->score;
        $question->quiz_type='personality';
        $question->phone=$request->phone;
        $question->questions_attempted =$request->total_questions;
        $question->status = 1;
        $question->save();
        return redirect('user/my-results')->with('success', 'Question created successfully.');
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
        // dd($request->all());
        // Validate the request data
       
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
    public function myScore(){
        return view('user-results');
    }
    public function startQuiz(){
        // $questions=Question::where('status',1)->get();
        return view('trivia-questions');
    }
    
    public function selectQuiz(){
        if(isset($_GET['questionId'])){
            $question= $_GET['questionId'];
            $currentQuestion = Question::find($question); 
            $nextQuestion = Question::where('id', '>', $currentQuestion->id)->first();
           
        }else{
            $nextQuestion = Question::orderBy('id')->first();   
        }
       
        return response()->json($nextQuestion);
    }
    public function disableQuestions(){
             $id = decrypt($_GET['id']);
             $question = Question::find($id);
             if (!$question) {
                return redirect()->back()->with('error','Question not found');
             }
             try {
                 $question->update(['status' => 0]);
                 return redirect()->back()->with('success','Question deleted successfully');
             } catch (\Exception $e) {
                return redirect()->back()->with('error','An Error occured');
             }
    }

}
