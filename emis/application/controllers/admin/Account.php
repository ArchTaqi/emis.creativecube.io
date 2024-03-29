<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');

        $this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            'id' => 'ck_editor',
            'path' => 'asset/js/ckeditor',
            'config' => array(
                'toolbar' => "Full",
                'width' => "99.8%",
                'height' => "400px"
            )
        );
    }

    public function manage_account($id = NULL)
    {
        $data['title'] = lang('manage_account');
        if ($id) {
            $data['active'] = 2;
            $can_edit = $this->account_model->can_action('tbl_accounts', 'edit', array('account_id' => $id));
            $edited = can_action('36', 'edited');
            if (!empty($can_edit) && !empty($edited)) {
                $data['account_info'] = $this->account_model->check_by(array('account_id' => $id), 'tbl_accounts');
            }
        } else {
            $data['active'] = 1;
        }
        $data['permission_user'] = $this->account_model->all_permission_user('36');

        $data['all_account'] = $this->account_model->get_permission('tbl_accounts');

        $data['subview'] = $this->load->view('admin/account/manage_account', $data, TRUE);
        $this->load->view('admin/_layout_main', $data); //page load
    }

    public function save_account($id = NULL)
    {
        $created = can_action('36', 'created');
        $edited = can_action('36', 'edited');
        if (!empty($created) && !empty($edited)) {
            $this->account_model->_table_name = 'tbl_accounts';
            $this->account_model->_primary_key = 'account_id';

            $data = $this->account_model->array_from_post(array('account_name', 'description', 'balance'));

            // update root category
            $where = array('account_name' => $data['account_name']);
            // duplicate value check in DB
            if (!empty($id)) { // if id exist in db update data
                $account_id = array('account_id !=' => $id);
            } else { // if id is not exist then set id as null
                $account_id = null;
            }

            // check whether this input data already exist or not
            $check_account = $this->account_model->check_update('tbl_accounts', $where, $account_id);
            if (!empty($check_account)) { // if input data already exist show error alert
                // massage for user
                $type = 'error';
                $msg = "<strong style='color:#000'>" . $data['account_name'] . '</strong>  ' . lang('already_exist');
            } else { // save and update query
                $permission = $this->input->post('permission', true);
                if (!empty($permission)) {
                    if ($permission == 'everyone') {
                        $assigned = 'all';
                    } else {
                        $assigned_to = $this->account_model->array_from_post(array('assigned_to'));
                        if (!empty($assigned_to['assigned_to'])) {
                            foreach ($assigned_to['assigned_to'] as $assign_user) {
                                $assigned[$assign_user] = $this->input->post('action_' . $assign_user, true);
                            }
                        }
                    }
                    if (!empty($assigned)) {
                        if ($assigned != 'all') {
                            $assigned = json_encode($assigned);
                        }
                    } else {
                        $assigned = 'all';
                    }
                    $data['permission'] = $assigned;
                } else {
                    set_message('error', lang('assigned_to') . ' Field is required');
                    redirect($_SERVER['HTTP_REFERER']);
                }
                $return_id = $this->account_model->save($data, $id);
                if (!empty($id)) {
                    $id = $id;
                    $action = 'activity_update_account';
                    $msg = lang('update_account');
                } else {
                    $id = $return_id;
                    $action = 'activity_save_account';
                    $msg = lang('save_account');
                }
                $activity = array(
                    'user' => $this->session->userdata('user_id'),
                    'module' => 'account',
                    'module_field_id' => $id,
                    'activity' => $action,
                    'icon' => 'fa-circle-o',
                    'value1' => $data['account_name']
                );
                $this->account_model->_table_name = 'tbl_activities';
                $this->account_model->_primary_key = 'activities_id';
                $this->account_model->save($activity);
                // messages for user
                $type = "success";
            }
            $message = $msg;
            set_message($type, $message);
        }
        redirect('admin/account/manage_account');

    }

    public function new_account()
    {
        $data['title'] = lang('new_account');
        $data['subview'] = $this->load->view('admin/account/new_account', $data, FALSE);
        $this->load->view('admin/_layout_modal', $data);
    }

    public function saved_account($id = null)
    {
        $created = can_action('36', 'created');
        $edited = can_action('36', 'edited');
        if (!empty($created) && !empty($edited)) {
            $this->account_model->_table_name = 'tbl_accounts';
            $this->account_model->_primary_key = 'account_id';

            $data = $this->account_model->array_from_post(array('account_name', 'description', 'balance'));

            // update root category
            $where = array('account_name' => $data['account_name']);
            // duplicate value check in DB
            if (!empty($id)) { // if id exist in db update data
                $account_id = array('account_id !=' => $id);
            } else { // if id is not exist then set id as null
                $account_id = null;
            }
            // check whether this input data already exist or not
            $check_account = $this->account_model->check_update('tbl_accounts', $where, $account_id);
            if (!empty($check_account)) { // if input data already exist show error alert
                // massage for user
                $type = 'error';
                $msg = "<strong style='color:#000'>" . $data['account_name'] . '</strong>  ' . lang('already_exist');
            } else { // save and update query
                $data['permission'] = 'all';

                $return_id = $this->account_model->save($data, $id);
                if (!empty($id)) {
                    $id = $id;
                    $action = 'activity_update_account';
                    $msg = lang('update_account');
                } else {
                    $id = $return_id;
                    $action = 'activity_save_account';
                    $msg = lang('save_account');
                }
                $activity = array(
                    'user' => $this->session->userdata('user_id'),
                    'module' => 'account',
                    'module_field_id' => $id,
                    'activity' => $action,
                    'icon' => 'fa-circle-o',
                    'value1' => $data['account_name']
                );
                $this->account_model->_table_name = 'tbl_activities';
                $this->account_model->_primary_key = 'activities_id';
                $this->account_model->save($activity);
                // messages for user
                $type = "success";
            }
        }
        if (!empty($id)) {
            $result = array(
                'id' => $id,
                'account_name' => $data['account_name'],
                'status' => $type,
                'message' => $msg,
            );
        } else {
            $result = array(
                'status' => $type,
                'message' => $msg,
            );
        }
        echo json_encode($result);
    }

    public function delete_account($id)
    {
        $deleted = can_action('36', 'deleted');
        if (!empty($deleted)) {

            $all_files_info = $this->db->where(array('account_id' => $id))->get('tbl_transactions')->result();
            if (!empty($all_files_info)) {
                foreach ($all_files_info as $v_files) {
                    $attachment = json_decode($v_files->attachment);
                    foreach ($attachment as $v_file) {
                        remove_files($v_file->fileName);
                    }
                }
            }

            $action = 'activity_delete_account';
            $msg = lang('delete_account');
            $acc_info = $this->account_model->check_by(array('account_id' => $id), 'tbl_accounts');
            $activity = array(
                'user' => $this->session->userdata('user_id'),
                'module' => 'account',
                'module_field_id' => $id,
                'activity' => $action,
                'icon' => 'fa-circle-o',
                'value1' => $acc_info->account_name
            );
            $this->account_model->_table_name = 'tbl_activities';
            $this->account_model->_primary_key = 'activities_id';
            $this->account_model->save($activity);

            $this->account_model->_table_name = "tbl_transactions"; //table name
            $this->account_model->delete_multiple(array('account_id' => $id));

            $this->account_model->_table_name = "tbl_transfer"; //table name
            $this->account_model->delete_multiple(array('to_account_id' => $id));
            $this->account_model->delete_multiple(array('from_account_id' => $id));

            $this->account_model->_table_name = 'tbl_accounts';
            $this->account_model->_primary_key = 'account_id';
            $this->account_model->delete($id);

            $type = "success";
//            $message = $msg;
//            set_message($type, $message);
            echo json_encode(array("status" => $type, 'message' => $msg));

        }
//        redirect('admin/account/manage_account');
    }

    public function account_balance()
    {
        $data['title'] = lang('account_balance');
        $data['subview'] = $this->load->view('admin/account/account_balance', $data, TRUE);
        $this->load->view('admin/_layout_main', $data); //page load
    }

    public function trigger_event()
    {
        $user = array(1);
        show_notification($user);
        $data['title'] = lang('account_balance');
        $data['subview'] = $this->load->view('admin/account/account_balance', $data, TRUE);
        $this->load->view('admin/_layout_main', $data); //page load

    }

    public function test()
    {
        $data['title'] = lang('account_balance');
        $data['subview'] = $this->load->view('admin/account/desktop', $data, TRUE);
        $this->load->view('admin/_layout_main', $data); //page load

    }


}
