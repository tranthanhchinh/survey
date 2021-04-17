<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Company\UserCompany;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
class UserController extends Controller
{
    //
    public $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function getListUser(){
         $listUser = $this->userModel->getListUser();
        return view('Admin.Users.list', ['listUsers'=>$listUser]);
    }
    public function registerUserView(){
        return view('Admin.Users.add');
    }

    public function postRegisterUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'fullname' => 'required'
        ]);
        $checkEmail =  $this->userModel->checkUserExits($request->input('email'), 'email');
        if($checkEmail > 0){
          return redirect()->route('registerUserView')->with('error','Email đã tồn tại');
        }else{
           $birthday =  explode('/',$request->input('birthday'));
           $creatUser =  $this->userModel->createUser(array(
               'email' => $request->input('email'),
               'password' => md5($request->input('password')),
               'fullname' => $request->input('fullname'),
               'address' => $request->input('address'),
               'birthday' => $birthday[2].'-'.$birthday[1].'-'.$birthday[0],
               'role' => 'admin',
               'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
           ));
           if($creatUser){
               return redirect()->route('listUser')->with('message','Thêm bản ghi thành công');
           }else{
               return redirect()->route('registerUserView')->with('error','Lỗi khi thêm bản ghi');
           }
        }

    }

    public function editUserView($id){
        $checkId = $this->userModel->checkUserExits($id, 'id');
        if($checkId > 0){
            $detailUser = $this->userModel->getDetailUser($id);
            $detailUser[0]->birthday = Carbon::parse($detailUser[0]->birthday)->format('d/m/Y');
            return view('Admin.Users.edit', ['detailUser'=>$detailUser]);
        }else{
            return redirect()->route('listUser')->with('error','Bản ghi không tồn tại');
        }

    }

    public function updateUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'fullname' => 'required'
        ]);
        $id = (int)$request->input('id');
        $checkId = $this->userModel->checkUserExits($id, 'id');
        if($checkId > 0){
            $birthday =  explode('/',$request->input('birthday'));
            $dataUpdate = array(
                'fullname' => $request->input('fullname'),
                'address' => $request->input('address'),
                'birthday' => $birthday[2].'-'.$birthday[1].'-'.$birthday[0],
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
            );
            $password = $request->input('password');
            if(!empty($password)){
                $dataUpdate['password'] = md5($request->input('password'));
            }
            $updateUser = $this->userModel->updateUser($id, $dataUpdate);
            if($updateUser){
                return redirect()->route('editUser', $id)->with('message','Cập nhật bản ghi thành công');
            }else{
                return redirect()->route('editUser', $id)->with('error','Lỗi khi cập nhật bản ghi');
            }
        }else{
            return redirect()->route('listUser')->with('error','Bản ghi không tồn tại');
        }

    }

    public function deleteUser($id){
        $checkId = $this->userModel->checkUserExits($id, 'id');
        if($checkId > 0){
            $deleteUser = $this->userModel->deleteUser($id);
            if($deleteUser){
                return redirect()->route('listUser')->with('message','Xóa bản ghi thành công');
            }else{
                return redirect()->route('listUser')->with('error','Xóa bản ghi bị lỗi');
            }
        }else{
            return redirect()->route('listUser')->with('error','Bản ghi không tồn tại');
        }
    }

    // controller CRUD User Company

    public function getUserCompany(){
         $listUserCompany = $this->userModel->getListUserCompany();
         return view('Admin.Companies.list', ['listUserCompanies'=>$listUserCompany]);
    }
    public function createUserCompanyView(){
         return view('Admin.Companies.add');
    }

    public function postCreateUserCompany(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
         $checkCompanyEmail = $this->userModel->checkUserCompanyExits($request->input('email'),'email');
        if($checkCompanyEmail > 0){
            return redirect()->route('createUserCompanyView')->with('error','Email đã tồn tại');
        }else{
            $dataCompany = $request->all();
            unset($dataCompany['_token']);
            $dataCompany['password'] = md5($request->input('password'));
            $dataCompany['role'] = 'company';
            $dataCompany['created_at'] = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            $insertUserCompany = $this->userModel->createUserCompany($dataCompany);
            if($insertUserCompany){
                return redirect()->route('getUserCompany')->with('message','Thêm bản ghi thành công');
            }else{
                return redirect()->route('getUserCompany')->with('error','Lỗi khi thêm bản ghi');
            }
        }
    }

    public function getEditUserCompany($id){
        $checkId = $this->userModel->checkUserCompanyExits($id, 'id');
        if($checkId > 0){
            $listUserCompany = $this->userModel->getListUserCompany();
            $detailUser = $this->userModel->getDetailUserCompany($id);
            return view('Admin.Companies.edit', ['detailUser'=>$detailUser, 'listUserCompanies'=>$listUserCompany]);
        }else{
            return redirect()->route('getUserCompany')->with('error','Bản ghi không tồn tại');
        }
    }

    public function updateUserCompany(Request $request){
        $request->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);
        $id = (int)$request->input('id');
        $checkId = $this->userModel->checkUserCompanyExits($id, 'id');

        if($checkId > 0){
            $dataUpdate = array(
                'name' => $request->input('name'),
                'fullname' =>$request->input('fullname'),
                'scale' => $request->input('scale'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
            );

            $password = $request->input('password');
            if(!empty($password)){
                $dataUpdate['password'] = md5($request->input('password'));
            }
            $updateUser = $this->userModel->updateUserCompany($id, $dataUpdate);
            if($updateUser){
                return redirect()->route('getEditUserCompany', $id)->with('message','Cập nhật bản ghi thành công');
            }else{
                return redirect()->route('getEditUserCompany', $id)->with('error','Lỗi khi cập nhật bản ghi');
            }
        }else{
            return redirect()->route('getEditUserCompany',  $id)->with('error','Bản ghi không tồn tại');
        }
    }

    public function deleteUserCompany($id){
        $checkId = $this->userModel->checkUserCompanyExits($id, 'id');
        if($checkId > 0){
            $deleteUser = $this->userModel->deleteUserCompany($id);
            if($deleteUser){
                return redirect()->route('getUserCompany')->with('message','Xóa bản ghi thành công');
            }else{
                return redirect()->route('getUserCompany')->with('error','Xóa bản ghi bị lỗi');
            }
        }else{
            return redirect()->route('getUserCompany')->with('error','Bản ghi không tồn tại');
        }
    }

    public function login(){
          if(session('user')&& session('user')[0]->role == 'admin'){
              return redirect()->route('dashboard');
          }
          return view('Admin.Users.login');
    }
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = $request->input('email');
        $pasword = $request->input('password');
        $check = User::where('email', '=', $user)->where('password', '=', md5($pasword))->first();
        if($check){
            $detailUser = $this->userModel->updateLastlogin($user, [ 'last_login' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()]);

            Session::put('user' , $detailUser);

            return redirect()->route('dashboard');

        }else{
            Session::flash('error', 'Email hoặc mật khẩu không đúng!');
            return redirect()->route('login');
        }
    }
    public function logout(){
        Session::forget('user');
        return redirect()->route('login');
    }

    //login company

    public function loginCompany(){
        if(session('user') && session('user')[0]->role == 'company'){
            return redirect()->route('dashboardCompany');
        }
        return view('Admin.Companies.login');
    }

    public function postloginCompany(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = $request->input('email');
        $pasword = $request->input('password');
        $check = UserCompany::where('email', '=', $user)->where('password', '=', md5($pasword))->first();
        if($check){
            $detailUserCompany = $this->userModel->updateLastLoginCompany($user, [ 'last_login' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()]);
            Session::put('user' , $detailUserCompany);
            return redirect()->route('dashboardCompany');
        }else{
            Session::flash('error', 'Email hoặc mật khẩu không đúng!');
            return redirect()->route('loginCompany');
        }
    }
    public function logoutCompany(Request $request){

        Session::forget('user');

        return redirect()->route('loginCompany');
    }
}
