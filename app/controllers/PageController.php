<?php
    class PageController extends Controller{
        public function __construct(){
            echo "Inside PageController <br>";
        }

        public function index(){
            echo "This is index from pageController <br>";
            $data = ['title' => "Welcome"];
            $this->view('pages/index',$data);
        }

        public function about($id){
            $data = ["title" => "About Page"];
            echo "this is about " . $id . "<br>";
            $this->view("pages/about",$data);
        }

        public function create(){
            echo "This is create function from PageController";
        }
    }