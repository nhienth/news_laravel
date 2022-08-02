<?php 

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Category
{
    public function GetAll() {
        return DB::table('danh_muc')->get();
    }
    
    public function GetById($id) {
        return DB::table('danh_muc')->where('danhmuc_id', $id)->get();
    }
}

