<?php
class Pages extends Controller{

    public function __construct()
    {
        
    }

    public function index(){
        $data=[
            'title'=>'Share Posts',
            'description'=>'This is the first post description that is going to be added!!'
        ];
        $this->view('pages/index',$data);
    }
    public function about(){
        $data=[
            'title'=>'About Us',
            'description'=>'This is the first post About that is going to be added!!'
        ];
        $this->view('pages/about',$data);
    }
}