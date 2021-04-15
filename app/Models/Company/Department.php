<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;
    public $table = 'departments';

    public function listDepartment($companyID){
         $result = DB::table($this->table)->select('*')->where('company_id', '=', $companyID)->orderByDesc('created_at')->paginate(20);
         return $result;
    }

    public function getList($companyID){
        $result = DB::table($this->table)->select('*')->where('company_id', '=', $companyID)->orderByDesc('created_at')->get();
        return $result;
    }
    public function detailDepartment($departmentID, $companyID){
        $result =  DB::table($this->table)->select('*')
                   ->where('company_id', '=', $companyID)
                   ->where('id', '=', $departmentID)
                   ->get();
        return $result;
    }
    public function addDepartment($data){
        $result = DB::table($this->table)->insert($data);
        if($result){
            return true;
        }
        return false;
    }

    public function updateDepartment($departmentID, $companyID,$data){
        $update = DB::table($this->table)
              ->where('id', '=',$departmentID)
              ->where('company_id', '=', $companyID)
              ->update($data);
        if($update){
            return true;
        }
        return false;
    }
    public function deleteDepartent($departmentID, $companyID){
        $delete = DB::table($this->table)->where('id', '=', $departmentID)
                ->where('company_id', '=',$companyID )
                ->delete();
        if($delete){
            return true;
        }
        return false;
    }
}
