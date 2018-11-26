<?php

use App\core\Controller;

//namespace undefined;

class Pages extends Controller
{
    public function __construct()
    {
        
    }
    public function index(){
        $datas = [
            "title"=> "Mini Framework PHP"
        ];
        $this->view('Pages/index.view', $datas);
    }
}