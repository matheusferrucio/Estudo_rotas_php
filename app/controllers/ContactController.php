<?php
namespace app\controllers;

class ContactController 
{
    public function index() {
        return Controller::view('contact');
    }

    public function store($params) {
        var_dump($params);
    }
}
