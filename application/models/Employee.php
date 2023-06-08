<?php
    class Employee extends CI_Model {

        function fetch_all() {
            return $this->db->query("SELECT Employees.*, Access_levels.id AS access_id, Access_levels.description  FROM Employees
                                    JOIN Access_levels ON Access_levels.id = Employees.access_level_id"
            )->result_array();
        }

        function fetch_record($post) {
            $query = "SELECT * FROM Employees
                        JOIN Access_levels ON Access_levels.id = Employees.access_level_id
                        WHERE email = ? AND password = ?";
            $values = array($post['email'], $post['password']);
            $result = $this->db->query($query, $values)->row();
            if(!$result) {
                return "Invalid Credentials!";
            } else {
                return $result;
            }
        }

        function edit_record($user_id) {
            $query = "SELECT * FROM Employees WHERE id = ?";
            $values = array($user_id);
            return $this->db->query($query, $values)->row();
        }

        function update_record($user_id, $post) {
            $query = "UPDATE Employees
                    SET firstname = ?, lastname = ?, age = ?, birth_date = ?, email = ?, password = ?, job_title = ?, access_level_id = ?
                    WHERE id = ? ";
            $values = array($post['firstname'], $post['lastname'], $post['age'], $post['birth_date'], $post['email'], $post['password'], $post['job_title'], $post['role'], $user_id); 
            $this->db->query($query, $values);
        }

        function insert_record($post) {
            $query = "INSERT INTO Employees (firstname, lastname, age, birth_date, email, password, job_title, access_level_id)
                    VALUES (?,?,?,?,?,?,?,?)";
            $values = array($post['firstname'], $post['lastname'], $post['age'], $post['birth_date'], $post['email'], $post['password'], $post['job_title'], $post['role']); 
            return $this->db->query($query, $values);
        }

        function delete_record($user_id) {
            return $this->db->query("DELETE FROM Employees WHERE id = ?", array($user_id));
        }

        function validate_data($post) {
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[employees.email]');
            $this->form_validation->set_rules('age', 'Age', 'trim|required|integer');
            $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
            $this->form_validation->set_rules('birth_date', 'Birth Date', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[45]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required');

            if(!$this->form_validation->run()) {
                return array(
                    'status' => 'danger',
                    'message' => validation_errors()
                );
            } else {
                return "success";
            }
        }

    }
?>