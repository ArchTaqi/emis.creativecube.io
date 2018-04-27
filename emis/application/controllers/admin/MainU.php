<?php

/**
 * Description of training
 *
 * @author Ashraf
 */
class MainU extends Admin_Controller
{
    public function index()
    {
        $data['title'] ="Main";
        $data['subview'] = $this->load->view('admin/mainU/main', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
}
