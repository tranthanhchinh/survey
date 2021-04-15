<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\Department;
use App\Models\Company\UserStaff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
     public $userStaffModel;
    public function __construct()
    {
          $this->userStaffModel = new UserStaff();
    }

    public function listStaff(){
        $companyID = session('user')[0]->id;
        $listUsers = $this->userStaffModel->getListStaff($companyID);
        $departmentList = new Department();
        $departmentList = $departmentList->getList($companyID);
        return view('Admin.Staffs.list', ['listUsers' => $listUsers,'departmentLists'=>$departmentList]);
    }

    public function index(){
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $departmentList = new Department();
        $departmentList = $departmentList->getList($companyID);

        return view('Admin.Staffs.add', ['departmentLists'=>$departmentList]);
    }

    public function postStaff(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
        $companyID = session('user')[0]->id;
         $checkEmail = $this->userStaffModel->checkStaffExits($request->input('email'),$companyID );
         if($checkEmail > 0){
             return redirect()->route('indexStaff')->with('error','Tài khoản đã tồn tại');
         }else{

             $createUser = $this->userStaffModel->insertUserStaff(
                 array(
                     'email' => $request->input('email'),
                     'password' => md5($request->input('password')),
                     'name' => $request->input('name'),
                     'job' => $request->input('job'),
                     'company_id' =>$companyID,
                     'department_id' =>$request->input('department_id'),
                     'parent_id' => $request->input('parent_id'),
                     'role' => 'staff',
                     'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
                 )
             );
             if($createUser){
                 return redirect()->route('listStaff')->with('message','Thêm bản ghi thành công');
             }else{
                 return redirect()->route('indexStaff')->with('error','Lỗi khi thêm bản ghi');
             }
         }
    }

    public function editStaffUser($id){
        $companyID = session('user')[0]->id;
           $checkId  = UserStaff::where('id', '=', $id)->where('company_id', '=', $companyID)->count();
           if($checkId > 0){
               $departmentList = new Department();
               $departmentList = $departmentList->getList($companyID);
               $detailStaffUser = $this->userStaffModel->getDetailStaffUser($id, $companyID);
               $listUsers = $this->userStaffModel->getListStaff($companyID);
               return view('Admin.Staffs.edit', ['detailStaffUser' => $detailStaffUser, 'departmentLists'=>$departmentList, 'listUsers' => $listUsers]);
           }else{
               return redirect()->route('listStaff');
           }
    }

    public function postEditStaffUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);
        $companyID = session('user')[0]->id;
        $id = (int)$request->input('id');
        $checkId  = UserStaff::where('id', '=', $id)->where('company_id', '=', $companyID)->count();
        if($checkId > 0){
            $dataUpdate  = $request->all();
            unset($dataUpdate['_token']);
            unset($dataUpdate['id']);
            unset($dataUpdate['email']);
            unset($dataUpdate['password']);
            $dataUpdate['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            $dataUpdate['company_id'] =  $companyID;
            $password = $request->input('password');
            if(!empty($password)){
                $dataUpdate['password'] = md5($request->input('password'));
            }
            $update = $this->userStaffModel->updateUserStaff($id, $companyID, $dataUpdate);
            if($update){
                return redirect()->route('editStaffUser', $request->input('id'))->with('message','Cập nhật bản ghi thành công');
            }else{
                return redirect()->route('editStaffUser', $request->input('id'))->with('error','Lỗi khi cập nhật bản ghi');
            }
        }


    }

    public function deleteUserStaff($id){
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $checkID = UserStaff::where('id', '=', $id)->count();
        if($checkID>0){
            $this->userStaffModel->deleteUserStaff($id, $companyID);
            return redirect()->route('listStaff')->with('message','Xóa bản ghi thành công');
        }else{
            return redirect()->route('listStaff')->with('error','Bản ghi không tồn tại');
        }
    }

    public function deleteAllUserStaff(Request $request){
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $data = [];
        if($request->input('allcheck')){
            $data = $request->input('allcheck');
        }
        $deleteAll = UserStaff::whereIn('id',$data)->where('company_id', '=', $companyID)->delete();
        if($deleteAll){
            return redirect()->route('listStaff')->with('message','Xóa bản ghi thành công');
        }else{
            return redirect()->route('listStaff')->with('error','Bị lỗi khi xóa');
        }
    }

    public function ajaxFillterUserStaff(Request $request){
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $departmentID = (int) $request->get('query');
        $result = $this->userStaffModel->fillterUser($departmentID,$companyID);
        return response()->json($result);


    }
}
