<?php

class Credentials extends Admin_Controller
{
    public function index()
    {
        $data['title'] ="Credentials";
        $data['subview'] = $this->load->view('admin/loginlist/loginList', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
	
	public function hash($string)
    {
        //return hash('sha512', $string . config_item('encryption_key'));
          return sha1($string);
    }
	
}
