<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;


class TinController extends Controller
{
    //
    public function ChiTiet($id) {
        $new = new News();
        $cate = new Category();
        $tin = $new->GetById($id);
        $listCate = $cate->GetAll();
        return view('chitiet', ['tin'=>$tin, 'listCate'=>$listCate]);
    }

    public function TinTrongLoai($category_id) {
        $new = new News();
        $cate = new Category();
        $listTin = $new->GetByCateId($category_id);
        $listCate = $cate->GetAll();
        $data = ['category_id'=>$category_id, 'listTin'=>$listTin, 'listCate'=>$listCate];
        return view('tintrongloai', $data);
    }

    public function GetByAuthor() {
        $new = new News();
        $listTin = $new->GetByAuthor();
        return view('demo', ['listTin' => $listTin]);
    }

    public function timKiem() {
        $kyw = $_GET['keyword'];
        $new = new News();
        $cate = new Category();
        $listTin = $new->timKiem($kyw);
        $listCate = $cate->GetAll();
        return view('tintrongloai', ['listTin'=>$listTin, 'listCate'=>$listCate]);
    }

    public function list() {
        $new = new News();
        $listNews = $new->GetAll();
        return view('admin.news.list', ['listNews'=>$listNews]);
    }
}
