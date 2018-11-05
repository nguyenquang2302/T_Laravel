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
}
