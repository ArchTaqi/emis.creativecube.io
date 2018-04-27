<?php

/**
 * Description of training
 *
 * @author Ashraf
 */
class Form_verification extends Admin_Controller
{
    public function index()
    {
        $data['title'] ="Form Verification";
        $data['subview'] = $this->load->view('admin/form_verification/verification', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
	
}
