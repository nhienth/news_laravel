<?php 

namespace App\Models;

use Illuminate\Support\Facades\DB;


class News
{
    public function GetAll() {
        return DB::table('news')->get();
    }
    
    public function GetById($id) {
        return DB::table('news')->where('news_id', $id)->first();
    }

    public function GetByAuthor() {
        return DB::table('news')
            ->join('tac_gia', 'news.author_id', '=', 'user_id')
            ->get();
    } 

    public function GetByCateId($idLT) {
        return DB::table('news')->where('category_id', $idLT)->get();
    }

    public function timKiem($kyw) {
        return DB::table('news')->where('news_title', 'LIKE', '%'.$kyw.'%')->get();
    }
}

