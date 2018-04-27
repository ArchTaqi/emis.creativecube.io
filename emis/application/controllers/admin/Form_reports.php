<?php

/**
 * Description of training
 *
 * @author Ashraf
 */
class Form_reports extends Admin_Controller
{
    public function index()
    {
        $data['title'] ="Form Reports";
        $data['subview'] = $this->load->view('admin/form_reports/verification', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
	
}