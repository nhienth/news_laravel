<?php 

namespace App\Models;

use Illuminate\Support\Facades\DB;


class News
{
    public function GetAll() {
        return DB::table('tin')->get();
    }
    
    public function GetById($id) {
        return DB::table('tin')->where('tin_id', $id)->first();
    }

    public function GetByAuthor() {
        return DB::table('tin')
            ->join('tac_gia', 'tin.tacgia_id', '=', 'tg_id')
            ->get();
    } 

    public function GetByCateId($idLT) {
        return DB::table('tin')->where('danhmuc_id', $idLT)->get();
    }

    public function timKiem($kyw) {
        return DB::table('tin')->where('tin_tieude', 'LIKE', '%'.$kyw.'%')->get();
    }
}

