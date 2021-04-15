<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;
    public $table = 'users';
    public $tb_user_companies = 'user_companies';
    public function checkUserExits($key, $check){
        if($check == 'email'){
            $checkUser = DB::table($this->table)->select($check)->where($check, '=', $key)->count();
        }else{
            $checkUser = DB::table($this->table)->select($check)->where($check, '=', $key)->count();
        }
        return $checkUser;

    }
    public function checkUserCompanyExits($key, $check){
        if($check == 'email'){
            $checkUser = DB::table($this->tb_user_companies)->select($check)->where($check, '=', $key)->count();
        }else{
            $checkUser = DB::table($this->tb_user_companies)->select($check)->where($check, '=', $key)->count();
        }
        return $checkUser;

    }
    public function getListUser(){
        $listUser = DB::table($this->table)->select('*')->orderByDesc('created_at')->paginate(20);
        return $listUser;
    }

    public function getDetailUser($id){
        $detailUser = DB::table($this->table)->select('*')->where('id', '=', $id)->get();
        return $detailUser;
    }
    public function createUser($data){
         $insertUser = DB::table($this->table)->insert($data);
         if($insertUser){
             return true;
         }
         return false;
    }
    public function updateUser($id, $data){
        $updateUser = DB::table($this->table)->where('id', $id)->update($data);
        if($updateUser){
            return true;
        }
        return false;
    }
    public function deleteUser($id){
        $data = DB::table($this->table)->delete($id);
        if($data){
            return true;
        }
        return false;
    }

    // CRUD user copany
    public function createUserCompany($data){
        $insertUser = DB::table($this->tb_user_companies)->insert($data);
        if($insertUser){
            return true;
        }
        return false;
    }
    public function getListUserCompany(){
        $listUser = DB::table($this->tb_user_companies)->select('*')->orderByDesc('created_at')->paginate(20);
        return $listUser;
    }
    public function getDetailUserCompany($id){
        $detailUser = DB::table($this->tb_user_companies)->select('*')->where('id', '=', $id)->get();
        return $detailUser;
    }
    public function updateUserCompany($id, $data){
        $updateUser = DB::table($this->tb_user_companies)->where('id', $id)->update($data);
        if($updateUser){
            return true;
        }
        return false;
    }
    public function deleteUserCompany($id){
        $data = DB::table($this->tb_user_companies)->delete($id);
        if($data){
            return true;
        }
        return false;
    }

    public function updateLastlogin($user, $data){
        DB::table($this->table)->where('email', $user)->update($data);
        $detailUser = DB::table($this->table)->select('id', 'email','fullname', 'role')->where('email', '=', $user)->get();
        if($detailUser){
            return $detailUser;
        }
        return false;
    }

    public function updateLastLoginCompany($user, $data){
        DB::table($this->tb_user_companies)->where('email', $user)->update($data);
        $detailUserCompany = DB::table($this->tb_user_companies)->select('id', 'email','name', 'role')->where('email', '=', $user)->get();
        if($detailUserCompany){
            return $detailUserCompany;
        }
        return false;

    }
}
