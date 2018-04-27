<?php

/**
 * Description of training
 *
 * @author Ashraf
 */
class Fieldperson_overview extends Admin_Controller
{
    public function index()
    {
        $data['title'] ="Overview";
        $data['subview'] = $this->load->view('admin/fieldperson_overview/field_person_overview', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
}
