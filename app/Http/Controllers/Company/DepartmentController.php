<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public $departmentModel ;

    public function __construct(){
         $this->departmentModel = new Department();

    }
    public function index(){
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $resultDepartments = $this->departmentModel->listDepartment($companyID);
          return view('Admin.Departments.add', [
              'departments' =>$resultDepartments
          ]);
    }
    public function postDepartment(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $checkName = Department::where('name', '=', $request->input('name'))->where('company_id', '=',  $companyID)->count();
        if($checkName > 0){
            return redirect()->route('departmentsview')->with('error','Đã tồn tại bản ghi');
        }else{
             $insertDepartment = $this->departmentModel->addDepartment(array(
                 'name' => $request->input('name'),
                 'company_id' =>  $companyID,
                 'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
             ));
            if($insertDepartment){
                return redirect()->route('departmentsview')->with('message','Thêm bản ghi thành công');
            }else{
                return redirect()->route('departmentsview')->with('error','Lỗi khi thêm bản ghi');
            }
        }

    }

    public function detailDepartment($id){

        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $detailDepartment = $this->departmentModel->detailDepartment($id, $companyID);
        $resultDepartments = $this->departmentModel->listDepartment($companyID);
         return view('Admin.Departments.edit', [
             'departments' =>$resultDepartments,
             'detailDepartment' => $detailDepartment
         ]);
    }

    public function postDetailDepartment(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $checkName = Department::where('name', '=', $request->input('name'))->where('company_id', '=',  $companyID)->count();
        if($checkName > 0){
            return redirect()->route('detailDepartment', $request->input('id'))->with('error','Đã tồn tại bản ghi');
        }else{
            $dataUpdate = array(
                 'name' => $request->input('name'),
                 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
            );
              $update = $this->departmentModel->updateDepartment($request->input('id'), $companyID, $dataUpdate);
            if($update){
                return redirect()->route('detailDepartment', $request->input('id'))->with('message','Cập nhật bản ghi thành công');
            }else{
                return redirect()->route('detailDepartment', $request->input('id'))->with('error','Lỗi khi cập nhật bản ghi');
            }
        }
    }

    public function deleteDepartment($id){
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $checkID = Department::where('id', '=', $id)->count();
        if($checkID>0){
            $delete = $this->departmentModel->deleteDepartent($id,$companyID );
            return redirect()->route('departmentsview')->with('message','Xóa bản ghi thành công');
        }else{
            return redirect()->route('departmentsview')->with('error','Bản ghi không tồn tại');
        }

    }

    public function deleteAllDepartment(Request $request){
        if(session('user')){
            $companyID = session('user')[0]->id;
        }
        $data = [];
        if($request->input('allcheck')){
            $data = $request->input('allcheck');
        }
        $deleteAll = Department::whereIn('id',$data)->where('company_id', '=', $companyID)->delete();
        if($deleteAll){
            return redirect()->route('departmentsview')->with('message','Xóa bản ghi thành công');
        }else{
            return redirect()->route('departmentsview')->with('error','Bị lỗi khi xóa');
        }
    }

}
