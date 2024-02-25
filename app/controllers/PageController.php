<?php
    class PageController{
        public function __construct(){

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