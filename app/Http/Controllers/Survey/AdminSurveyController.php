<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Models\Survey\AdminQuestionGroup;
use App\Models\Survey\AdminQuiz;
use App\Models\Survey\AdminQuizAnwser;
use App\Models\Survey\AdminSurvey;
use Illuminate\Http\Request;

class AdminSurveyController extends Controller
{
    public function listSurveyAdmin(){
        $listSurvey = AdminSurvey::orderBy('created_at', 'desc')->get();
        return view('Admin.Survey.admin_survey_list',['listSurvey'=>$listSurvey]);
    }
    public function postAddSurvey(Request $request){
        $survey = new AdminSurvey();
        $survey->name = $request->name_survey;
        $survey->description = $request->introduce_survey;
        if($survey->save()){
            $idSurvey = $survey->id;
        }
        foreach ($request->group as $group){
            $groups = new AdminQuestionGroup();
            $groups->name = $group['group_quiz'];
            $groups->tp_survey_id = $idSurvey;
            if($groups->save()){
                $idGroup = $groups->id;
            }
            foreach ($group['quiz'] as $quiz){
                $quizs = new AdminQuiz();
                $quizs->title = $quiz['quiz_name'];
                $quizs->type = $quiz['type'];
                $quizs->tp_survey_id = $idSurvey;
                $quizs->tp_question_group_id = $idGroup;
                if($quizs->save()){
                    $quizID =  $quizs->id;
                }
                if($quiz['type'] == 4){
                    foreach ($quiz['anser'] as $anwser){
                        $anwsers = new AdminQuizAnwser();
                        $anwsers->answer = $anwser['anwser_opt'];
                        $anwsers->tp_quiz_id = $quizID;
//                        $anwsers->type = $quiz['type'];
                        $anwsers->save();
                    }
                }
            }

        }
        return redirect()->route('Admin.listSurveyCompany');
    }
}
