<?php

    class Employees extends CI_Controller {

        public function index() {
            if($this->session->userdata('user') == NULL) {
                redirect("/login");
            }

            $record['employees'] = $this->Employee->fetch_all();

            $this->load->view("index", $record);
        }

        public function login() {
            $this->load->view("login");
        }

        public function new_employee() {
            $record['roles'] = $this->Access_level->fetch_access_levels();
            $this->load->view("new", $record);
        }

        public function process_login() {
            
            $post =  $this->input->post(NULL, TRUE);
            $user_data = $this->Employee->fetch_record($post);

            if($user_data === "Invalid Credentials!") {
                $this->session->set_flashdata('notif', array(
                    'status' => "danger",
                    'message' => $user_data
                ));
                redirect("/login");
            } else {
                $this->session->set_userdata('user',array(
                    'user_id' => $user_data->id,
                    'role' => $user_data->description,
                    'employee_name' => $user_data->firstname . " " . $user_data->lastname
                ));
                redirect("/");
            }
        }

        public function process_new_employee() {
            
            $post =  $this->input->post(NULL, TRUE);
            $validate_data = $this->Employee->validate_data($post);

            if($validate_data != "success") {
                $record['roles'] = $this->Access_level->fetch_access_levels(); //temp
                $this->session->set_flashdata('notif', $validate_data);
                $this->load->view("new", $record);
            } else {

                $result = $this->Employee->insert_record($post);
                if($result) {
                    $this->session->set_flashdata('notif', array(
                        'status' => 'success',
                        'message' => 'Added New Employee succesfully!'
                    ));
                }
                redirect('/add_employee');
            }
        }

        public function edit_account($user_id) {
            if($this->session->userdata('user')['role'] !== "SUPER USER") {
                $this->session->set_flashdata('notif', array(
                    'status' => 'danger',
                    'message' => 'Access Denied!'
                ));
                redirect("/");
            } else {
                $record['roles'] = $this->Access_level->fetch_access_levels();
                $record['employee'] = $this->Employee->edit_record($user_id);
                $this->load->view("edit", $record);
            }
        }

        public function process_update($user_id) {
            $post =  $this->input->post(NULL, TRUE);
            $this->Employee->update_record($user_id, $post);
            $this->session->set_flashdata('notif', array(
                'status' => 'success',
                'message' => "User $user_id Successfully Updated!"
            ));
            redirect("/");
        }

        public function delete_account($user_id) {
            if($this->session->userdata('user')['role'] !== "SUPER USER") {
                $this->session->set_flashdata('notif', array(
                    'status' => 'danger',
                    'message' => "$user_id Access Denied!"
                ));
            } else {
                $this->Employee->delete_record($user_id);
                $this->session->set_flashdata('notif', array(
                    'status' => 'success',
                    'message' => "User $user_id Successfully Deleted!"
                ));
            }
            redirect("/");
        }

        public function logout() {
            $this->session->unset_userdata('user');
            redirect("/login");
        }
        
    }
?>