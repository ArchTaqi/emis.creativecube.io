<?php

/**
 * Description of training
 *
 * @author Ashraf
 */
class Problem_areas extends Admin_Controller
{
    public function index()
    {
        $data['title'] ="Ploting";
        $data['subview'] = $this->load->view('admin/problem-areas/problem_areas', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
}
