<?php

namespace app\core;

class Controller
{
    public function model($model){
        require_once "../app/models/" .$model . ".php";
        return new $model();
    }
    public function view($view, $datas = []){
        if (file_exists("../app/views/{$view}.php")) {
            if(file_exists("../app/views/".HEAD__LAYOUT)) require_once "../app/views/" . HEAD__LAYOUT;
            if(file_exists("../app/views/".HEADER__LAYOUT)) require_once "../app/views/" . HEADER__LAYOUT;
            require "../app/views/{$view}.php";
            if(file_exists("../app/views/".FOOTER__LAYOUT)) require_once "../app/views/" . FOOTER__LAYOUT;
        }else {
            header("HTTP/1.0 404 Not Found");
        }
    }
}