<?php

/**
 * Description of training
 *
 * @author Ashraf
 */
class Logs extends Admin_Controller
{
    public function index()
    {
        $data['title'] ="Logs";
        $data['subview'] = $this->load->view('admin/logs/logs', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
	
}
