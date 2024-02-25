<?php
    class PageController{
        public function __construct(){
            echo "Inside PageController <br>";
        }

        public function index(){
            echo "This is index from pageController";
        }

        public function about($id){
            echo "this is about " . $id;
        }

        public function create(){
            echo "This is create function from PageController";
        }
    }