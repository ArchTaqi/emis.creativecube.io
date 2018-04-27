<?php

/**
 * Description of training
 *
 * @author Ashraf
 */
class Raw extends Admin_Controller
{
    public function index()
    {
        $data['title'] ="Charts";
        $data['subview'] = $this->load->view('admin/raw/raw', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
}
