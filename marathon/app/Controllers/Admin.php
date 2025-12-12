<?php

namespace App\Controllers;

use App\Models\Race;

class Admin extends BaseController
{

    public function index(): string
    {
        $data = array('index'=>'true');
        return view('admin_page', $data);
    }
    public function manage_marathon(): string
    {
        $Race = new Race();
        $data = array('manage_marathon'=>'true');
        $data['races'] = $Race->get_races();
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

    //Add new Race
    public function add_race()
    {
       $Race = new Race();
       $Race->add_race($this->request->getPost('race_name'), $this->request->getPost('race_location'), $this->request->getPost('race_description'), $this->request->getPost('race_date'));
        header('Location: marathon');
        exit();
    }
    public function delete_race($id)
    {
        $Race = new Race();
        $Race->delete_race($id);
        header('Refresh:0; url=/marathon/public/marathon');
        exit();
    }
    //loading view with the data that needs updating
    public function update_race($id)
    {
        $Race = new Race();
        $data = array('manage_marathon'=>'true');
        $data['race'] = $Race->get_race($id);
        return view('update_page', $data);
    }
    public function edit_race()
    {
        $Race = new Race();
        $Race->update_race($this->request->getPost('race_name'), $this->request->getPost('race_location'), $this->request->getPost('race_description'), $this->request->getPost('race_date'), $this->request->getPost('txtID'));
        header('Refresh:0; url=/marathon/public/marathon');
        exit();
    }
}