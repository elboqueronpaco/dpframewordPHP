<?php

namespace app\core;

class Core
{
    protected $controllerDefault = CONTROLLER__DEFAULT;
    protected $methodDefault = METHOD__DEFAULT;
    protected $parameter = PARAMETER;
    public function __construct()
    {
        $url = $this->getUrl();

        if(file_exists("../app/controllers/" . ucwords($url[0]) . ".php")){
            $this->controllerDefault = ucwords($url[0]);
            unset($url[0]);
        }
        require_once "../app/controllers/" . $this->controllerDefault . ".php";
        $this->controllerDefault = new $this->controllerDefault();
        if (isset($url[1])) {
            if (method_exists($this->controllerDefault, $url[1])) {
                $this->methodDefault = $url[1];
                unset($url[1]);
            }
        }
       $this->parameter = $url ? array_values($url) : [];
       call_user_func_array([$this->controllerDefault,$this->methodDefault], $this->parameter);
    }

    public function getUrl(){
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"]);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}