<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WebsiteController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testAction()
    {
        die('Đây là action test của websitecontroller');
    }

    public function test1Action($id)
    {
        die('Đây là action test của websitecontroller '.$id);
    }
    
}
