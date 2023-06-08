<?php
    class Access_level extends CI_Model {


        function fetch_access_levels() {
            return $this->db->query("SELECT * FROM Access_levels")->result_array();
        }

        function insert_record($post) {
            $this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[45]');

            if(!$this->form_validation->run()) {
                return array(
                    'status' => 'danger',
                    'message' => validation_errors()
                );
            } else {
                $query = "INSERT INTO Access_levels (description) VALUES (?)";
                $values = array($post['description']); 
                $this->db->query($query, $values);
                return array(
                    'status' => 'success',
                    'message' => "New Access Level Created!"
                );
            }
        }

    }
?>