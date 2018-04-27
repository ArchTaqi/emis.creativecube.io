<?php

/**
 * Description of training
 *
 * @author Ashraf
 */
class Location extends Admin_Controller
{
    public function index()
    {
        $data['title'] ="Location";
        $data['subview'] = $this->load->view('admin/location/location', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
}
