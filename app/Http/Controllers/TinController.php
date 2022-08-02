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

    public function TinTrongLoai($danhmuc_id) {
        $new = new News();
        $cate = new Category();
        $listTin = $new->GetByCateId($danhmuc_id);
        $listCate = $cate->GetAll();
        $data = ['danhmuc_id'=>$danhmuc_id, 'listTin'=>$listTin, 'listCate'=>$listCate];
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
        $listTin = $new->timKiem($kyw);
        $cate = new Category();
        $listCate = $cate->GetAll();
        $data = [ 'listTin'=>$listTin, 'listCate'=>$listCate];
        return view('tintrongloai', $data);
    }
}
