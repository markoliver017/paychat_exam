<?php

    class Access_levels extends CI_Controller {

        public function index() {
            $this->load->view("access_level_index");
        }

        public function process_new_access_level() {
            $post =  $this->input->post(NULL, TRUE);
            $result = $this->Access_level->insert_record($post);
            $this->session->set_flashdata('notif', $result);
            redirect('/manage_access_level');
        }
        
    }
?>