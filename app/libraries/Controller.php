<?php

/*
* Base Controller
* Loads the models and views
*/
class Controller{
    // Load model
    public function model($model){
        //Require model file
        require_once '../app/models/' . $model . '.php';

        //instantiate model
        return new $model();
    }

    //Load View
    public function view($view , $data = []){
        // check for the view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }
        else{
            //when view not exist
            die('View does not exist');
        }

    }
}