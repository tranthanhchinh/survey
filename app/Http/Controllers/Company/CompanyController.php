<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class CompanyController extends Controller
{
    //
    public function dashboardCompany(){
        return view('Admin.Dashboard.dashboard_company');
    }
    public function registerUser(){

        if(session('user')){
            return redirect()->route('loginCompany');
        }
         return view('Admin.Companies.register');
    }

    public function postRegisterUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
            'password_confirm' => 'required',

        ]);
        $password = $request->input('password');
        $passwordConfirm = $request->input('password_confirm');
        if($password == $passwordConfirm){
            $userModel = new User();
            $checkEmail = $userModel->checkUserCompanyExits($request->input('email'),'email');
            if($checkEmail > 0){
                return redirect()->route('registerUser')->with('error','Email đã tồn tại');
            }else{
                $dataCompany = $request->all();
                unset($dataCompany['_token']);
                unset($dataCompany['password_confirm']);
                $dataCompany['password'] = md5($request->input('password'));
                $dataCompany['role'] = 'company';
                $dataCompany['created_at'] = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
                $insertUserCompany = $userModel->createUserCompany($dataCompany);
                if($insertUserCompany){
                    return redirect()->route('loginCompany')->with('message','Đăng ký tài khoản thành công');
                }else{
                    return redirect()->route('registerUser')->with('error','Có lỗi khi đăng ký');
                }

            }
        }else{
            return redirect()->route('registerUser')->with('error','Mật khẩu không trùng nhau');
        }


    }

}
