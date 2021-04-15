<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Models\Company\Department;
use App\Models\Company\UserStaff;
use App\Models\Survey\AssignSurvey;
use App\Models\Survey\EmailSurvey;
use App\Models\Survey\QuestionGroup;
use App\Models\Survey\Quiz;
use App\Models\Survey\QuizAnwser;
use App\Models\Survey\Survey;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class SurveyController extends Controller
{
    //
    public function listSurveyCompany(){
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $listSurvey = Survey::where('company_id', '=', $companyID)->orderBy('created_at', 'desc')->get();
        $staff = UserStaff::where('company_id', $companyID)->orderBy('created_at', 'desc')->get();
        $department = Department::where('company_id', $companyID)->orderBy('created_at', 'desc')->get();
         return view('Admin.Survey.company_survey_list', ['listSurvey'=>$listSurvey, 'staffs'=>$staff, 'deparments'=>$department]);
    }

    public function addSurvey(){
         return view('Admin.Survey.company_survey_add');
    }
    public function postAddSurvey(Request $request){

        if(session('user')){
            $companyID = session('user')[0]->id;
        }
         $survey = new Survey();
         $survey->name = $request->name_survey;
         $survey->description = $request->introduce_survey;
         $survey->company_id = $companyID;
         $survey->date_start = $request->start_date;
         $survey->date_stop = $request->end_date;
         $survey->survey_repeat = $request->time_repeat;
         $survey->status = $request->status;
         if($survey->save()){
             $idSurvey = $survey->id;
         }
         foreach ($request->group as $group){
             $groups = new QuestionGroup();
             $groups->name = $group['group_quiz'];
             $groups->survey_id = $idSurvey;
             if($groups->save()){
                 $idGroup = $groups->id;
             }
             foreach ($group['quiz'] as $quiz){
                 $quizs = new Quiz();
                 $quizs->title = $quiz['quiz_name'];
                 $quizs->type = $quiz['type'];
                 $quizs->survey_id = $idSurvey;
                 $quizs->group_id = $idGroup;
                 if($quizs->save()){
                     $quizID =  $quizs->id;
                 }
                 if($quiz['type'] == 4){
                     foreach ($quiz['anser'] as $anwser){
                         $anwsers = new QuizAnwser();
                         $anwsers->answer = $anwser['anwser_opt'];
                         $anwsers->quiz_id = $quizID;
                         $anwsers->type = $quiz['type'];
                         $anwsers->survey_id = $idSurvey;
                         $anwsers->save();
                     }
                 }
             }

         }
         $objSurvey = $request->obj_survey;
         // 1: Tất cả; 2: Phòng ban; 3: Nhân viên; 4: địa chỉ email
         if($objSurvey == 1){
             $staffs = UserStaff::where('company_id', '=', $companyID)->get();
             foreach ($staffs as $staff){
                    $asignSurvey = new AssignSurvey();
                    $asignSurvey->email = $staff->email;
                    $asignSurvey->survey_id = $idSurvey;
                    $asignSurvey->save();
             }
         }elseif($objSurvey == 2){
              foreach ($request->department as $depamentID){
                     $staffs = UserStaff::where('department_id', $depamentID)->get();
                     foreach ($staffs as $staff){
                         $asignSurvey = new AssignSurvey();
                         $asignSurvey->email = $staff->email;
                         $asignSurvey->survey_id = $idSurvey;
                         $asignSurvey->save();
                     }
              }

         }elseif($objSurvey == 3){
             foreach ($request->staff as $staff){
                 $asignSurvey = new AssignSurvey();
                 $asignSurvey->email = $staff;
                 $asignSurvey->survey_id = $idSurvey;
                 $asignSurvey->save();
             }

         }else{
              // get impport file excel
         }
         $emailSurvey = new EmailSurvey();
         $emailSurvey->title = $request->title_email;
         $emailSurvey->content = $request->content_email;
         $emailSurvey->survey_id = $idSurvey;
         return redirect()->route('listSurveyCompany')->with('message','Tạo khảo sát thành công');
    }
    public function updateSurvey(Request $request){
        $idSurvey = $request->input('id');
        $survey = Survey::find($idSurvey);
        $survey->name = $request->input('name_survey');
        $survey->description = $request->input('introduce_survey');
        $survey->save();
        QuestionGroup::where('survey_id', '=', $idSurvey)->delete();
        Quiz::where('survey_id', '=', $idSurvey)->delete();
        QuizAnwser::where('survey_id', '=', $idSurvey)->delete();
        foreach ($request->input('group') as $group){
            $groups = new QuestionGroup();
            $groups->name = $group['group_quiz'];
            $groups->survey_id = $idSurvey;
            if($groups->save()){
                $idGroup = $groups->id;
            }
            foreach ($group['quiz'] as $quiz){
                $quizs = new Quiz();
                $quizs->title = $quiz['quiz_name'];
                $quizs->type = $quiz['type'];
                $quizs->survey_id = $idSurvey;
                $quizs->group_id = $idGroup;
                if($quizs->save()){
                    $quizID =  $quizs->id;
                }
                if($quiz['type'] == 4){
                    foreach ($quiz['anser'] as $anwser){
                        $anwsers = new QuizAnwser();
                        $anwsers->answer = $anwser['anwser_opt'];
                        $anwsers->quiz_id = $quizID;
                        $anwsers->type = $quiz['type'];
                        $anwsers->survey_id = $idSurvey;
                        $anwsers->save();
                    }
                }
            }
        }
        return redirect()->route('listSurveyCompany')->with('message','Cập nhật thành công');

    }

    public function getDetailSurvey(Request $request){

            $idSurvey = (int)$request->id;
            $checkSurveyID = Survey::where('id', '=', $idSurvey)->count();
            if($checkSurveyID>0){
                $dataDetail = [];
                $surveyDetail = Survey::find($idSurvey);

                $dataDetail['id_survey'] = $surveyDetail->id;
                $dataDetail['name'] = $surveyDetail->name;
                $dataDetail['description'] = $surveyDetail->description;
                $groupQuiz = Survey::find($idSurvey)->questionGroup;
                foreach ($groupQuiz as $key=>$group){
                   $quizs = QuestionGroup::find($group->id)->quiz;
                    $dataDetail['group'][$key]['id'] = $group->id;
                    $dataDetail['group'][$key]['group_name'] = $group->name;
                    foreach ($quizs as $keyq =>$quiz){
                        $anwsers = Quiz::find($quiz->id)->quizAnwser;
                        $dataDetail['group'][$key]['quiz'][$keyq]['id'] = $quiz->id;
                        $dataDetail['group'][$key]['quiz'][$keyq]['quiz_name'] = $quiz->title;
                        $dataDetail['group'][$key]['quiz'][$keyq]['type'] = $quiz->type;
                        foreach ($anwsers as $keya =>$anwser){
                               $dataDetail['group'][$key]['quiz'][$keyq]['anwser'][$keya]['id'] = $anwser->id;
                                $dataDetail['group'][$key]['quiz'][$keyq]['anwser'][$keya]['anwser_opt'] = $anwser->answer;
                        }
                    }
                }
                $returnHTML = view('Admin.Survey.company_survey_detail')->with('details', $dataDetail)->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));


            }

    }




//    public function getdetailQuiz(Request $request){
//        $idQuiz = (int)$request->id;
//        $quiz = Quiz::where('id','=',$idQuiz)->first();
//        $anwsers = Quiz::find($idQuiz)->quizAnwser;
//        $quiz->anwsers = $anwsers;
//        $returnHTML = view('Admin.Survey.quiz_edit')->with('quizs', $quiz)->render();
//        return response()->json(array('success' => true, 'html'=>$returnHTML));
//
//    }
//
//    public function updateQuiz(Request $request){
//        $idQuiz = (int)$request->id;
//        $type = (int)$request->type;
//        $name = $request->name;
//        $anwser = $request->anser;
//        $quizs = Quiz::find($idQuiz);
//        $quizs->title = $name;
//        $quizs->type = $type;
//        if($type == 4){
//             QuizAnwser::where('quiz_id','=',$idQuiz)->delete();
//             foreach ($anwser as $val){
//                 $anwsers = new QuizAnwser();
//                 $anwsers->answer = $val;
//                 $anwsers->quiz_id = $idQuiz;
//                 $anwsers->type = $quizs->type;
//                 $anwsers->save();
//             }
//        }else{
//            QuizAnwser::where('quiz_id','=',$idQuiz)->delete();
//        }
//        if($quizs->save()){
//            $dateTemp = array(
//                'id'=> $idQuiz,
//                'quiz_name' => $name,
//                'type' => $type,
//                'anwser' => $anwser
//            );
//
//            $returnHTML = view('Admin.Survey.temp_quiz_edit')->with('quiz', $dateTemp)->render();
//            return response()->json(array('success' => true, 'html'=>$returnHTML));
//        }
//    }

    public function updateStatusSurvey(Request $request){
             $id = (int)$request->id;
             $status = (int)$request->status;
             $checkSurveyID = Survey::where('id', '=', $id)->count();
             if($checkSurveyID>0){
                  $survey = Survey::find($id);
                  $survey->status = $status;
                  $survey->save();
                  return response()->json(array('success' => true));
             }

    }

    public function ajaxChangeDateSurvey(Request $request){
        $timeRepeat = $request->timeRepeat;
        $startDate = $request->dateStart;
        $dateSum = '';

        if($timeRepeat == 1){
            $dateSum = '+7 day';
        }elseif($timeRepeat == 2){
            $dateSum = '+1 month';
        }elseif($timeRepeat == 3){
            $dateSum = '+3 month';
        }else{
            $dateSum = '+5 year';
        }
        $endDate = strtotime ( $dateSum , strtotime ( $startDate ) ) ;
        $endDate = date ( 'Y-m-j' , $endDate );

        return response()->json(['end_date'=>$endDate]);
    }
}
