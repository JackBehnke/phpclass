<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function index(): string
    {
        $data = array('index'=>'true');
        return view('admin_page', $data);
    }
    public function manage_marathon(): string
    {
        $data = array('manage_marathon'=>'true');
        return view('marathon_page', $data);
    }
    public function add_marathon(): string
    {
        $data = array('add_marathon'=>'true');
        return view('add_page', $data);
    }
    public function manage_runners(): string
    {
        $data = array('manage_runners'=>'true');
        return view('runners_page', $data);
    }
    public function registration_form(): string
    {
        $data = array('registration_form'=>'true');
        return view('registration_page', $data);
    }

}