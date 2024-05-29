<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\QuestionAnswer;

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
    public function startQuiz(){
        // $questions=Question::where('status',1)->get();
        return view('trivia-questions');
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
