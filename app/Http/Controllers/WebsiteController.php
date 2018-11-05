<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function testAction() {
        return (' Xin chào ');
    }

    public function test1Action($id) {
        return (' Xin chào '.$id);
    }

    public function getDataAction(Request $request) {
        if($request->isMethod('get')) {
            echo ('phương thức get');
        }

        return $request->url(); 
    }

    public function getFormDataAction() {
     
        return view('form');
    }

    public function postForm(Request $request) {
        if($request->input('hoten')) {
            // kiểm tra tồn tại
            // $request->has('hoten')
            // $request->input('hoten')  nhân dữ liệu từ input name =hoten
            // $request->input('hoten.0.name')  nhân dữ liệu từ mảng
            // $request->all()// nhận hết dữ liệu và lưu dạng mảng
            // $request->only('hoten') chỉ nhận  tham số hoten
            // $request->except('hoten')  nhân  tất cả dữ liệu  trừ tham số hoten
            echo $request->input('hoten');
        }
    }
}
