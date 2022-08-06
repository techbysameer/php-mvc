<?php
/*
 *App Core Class
 *Creates URL & Load core controller
 *URL Format - /controller/method/params
 */
class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        // if(){
        //     echo "yes";
        // }
        //Look into Controllers for first value
        if(isset($url[0]) && file_exists('../app/controllers/'. ucwords($url[0]). '.php')){
            //If exists, set as controller
            $this->currentController = ucwords($url[0]);
            //Unset 0 index of the URL
            unset($url[0]);
        }

        //Require the Controller
        require_once '../app/controllers/'. $this->currentController .'.php';

        //instantiate controller class
        $this->currentController =  new $this->currentController;


        //check if 2nd value exist
        if(isset($url[1])){
            //Look into Controllers method for 2nd value
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }   

        // print_r($url);die;
        // Get params
        $this->params = $url ? array_values($url) : [];

        //call a callback with array of parameters
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

    }
    public function getUrl(){
        if(isset($_GET['url'])){
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url,FILTER_SANITIZE_URL);//remove characters that should not contain in the URL
            $url=explode('/',$url);//convert into array
            return $url;

        }
        

    }
}