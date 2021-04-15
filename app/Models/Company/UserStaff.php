<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserStaff extends Model
{
    use HasFactory;

    public $table = 'user_staffs';

    public function checkStaffExits($email, $companyID){
        $result = DB::table($this->table)
                 ->where('email', '=',$email )
                 ->where('company_id', '=', $companyID)
                 ->count();
        return $result;
    }

    public function getListStaff($companyID){
        $result = DB::table($this->table)
                  ->join('departments', 'user_staffs.department_id', '=', 'departments.id')
                  ->select('user_staffs.*', 'departments.name as departmentsName')
            ->where('user_staffs.company_id', '=', $companyID)
            ->orderByDesc('created_at')
                  ->paginate(20);
        return $result;
    }

    public function getDetailStaffUser($idStaff, $companyID){
        $result = DB::table($this->table)
            ->select('*')
            ->where('company_id', '=', $companyID)
            ->where('id' ,'=', $idStaff)
           ->get();

        return $result;
    }
    public function insertUserStaff($data){
       $insert = DB::table($this->table)->insert($data);
       if($insert){
           return true;
       }
       return false;
    }

    public function updateUserStaff($id, $companyID, $data){
        $update = DB::table($this->table)
            ->where('id', '=',$id)
            ->where('company_id', '=', $companyID)
            ->update($data);
        if($update){
            return true;
        }
        return false;
    }

    public function deleteUserStaff($id, $companyID){
        $delete = DB::table($this->table)->where('id', '=', $id)
            ->where('company_id', '=',$companyID )
            ->delete();
        if($delete){
            return true;
        }
        return false;
    }

    public function fillterUser($deparentID, $companyID){
        $result = DB::table($this->table)->where('company_id', '=',$companyID )->where('department_id', '=', $deparentID)
            ->select('id', 'email', 'name')
            ->orderByDesc('created_at')->get();
         return $result;
    }

}
