<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>List of Employees</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="/assets/js/main.js"></script>
      </head>
      <body>
            <div class="container border mt-5 bg-secondary text-light rounded p-5">
<?php if($this->session->flashdata('notif')) { ?>
      <div class="alert alert-<?= $this->session->flashdata('notif')['status']; ?>"> <?= $this->session->flashdata('notif')['message']; ?> </div>
<?php       }     ?>
                  <div class="d-flex justify-content-between">
                        <div>
                              <h3><b class="text-info">Account Name:</b> <i><?= ucwords($this->session->userdata('user')['employee_name']); ?></i></h3>
                              <h3><b class="text-info">Role:</b> <i><?= ucwords($this->session->userdata('user')['role']); ?></i></h3>
                        </div>
                  </div>
                  <div class="d-flex justify-content-end">
                              <a class="btn btn-success mx-2 h-auto" href=<?= base_url(). "manage_access_level"; ?> >Manage Access Level</a>
                              <a class="btn btn-success mx-2" href=<?= base_url(). "add_employee"; ?> >Add Employee</a>
                              <a class="btn btn-danger mx-2" href=<?= base_url(). "logout"; ?> onclick="return confirm('Are you sure you want to logout?' );" >Logout</a>
                        </div>
                  <div>
                        <h3 class="border-bottom text-light">List of Employees</h3>
                        <table class="table table-light table-striped table-hover">
                              <thead>
                                    <tr>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Age</th>
                                          <th>Birth Day</th>
                                          <th>Email</th>
                                          <th>Job Title</th>
                                          <th>Access Level</th>
                                          <th>Date Created</th>
                                          <th>Date Modified</th>
                                          <th colspan="2">Action</th>
                                    </tr>
                              </thead>
                              <tbody>
<?php       foreach($employees as $employee) {      ?>                                    
                                    <tr>
                                          <td><?= $employee['firstname']; ?></td>
                                          <td><?= $employee['lastname']; ?></td>
                                          <td><?= $employee['age']; ?></td>
                                          <td><?= $employee['birth_date']; ?></td>
                                          <td><?= $employee['email']; ?></td>
                                          <td><?= $employee['job_title']; ?></td>
                                          <td><?= $employee['description']; ?></td>
                                          <td><?= $employee['date_created']; ?></td>
                                          <td><?= $employee['date_modified']; ?></td>
                                          <td><a class="btn btn-info" href=<?= base_url(). "employees/edit_account/". $employee['id']; ?> >Edit</a></td>
                                          <td><a class="btn btn-danger" href=<?= base_url(). "employees/delete_account/". $employee['id']; ?> onclick="return confirm('Are you sure you want to delete this record?' );">x</a></td>
                                    </tr>
<?php       }     ?>                                    
                              </tbody>
                        </table>
                  </div>
            </div>

      </body>
</html>