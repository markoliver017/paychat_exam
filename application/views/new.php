<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Add New Employee</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      </head>
      <body>
            <div class="container border mt-5 bg-secondary rounded p-5 w-50">
<?php if($this->session->flashdata('notif')) { ?>
      <div class="alert alert-<?= $this->session->flashdata('notif')['status']; ?>"> <?= $this->session->flashdata('notif')['message']; ?> </div>
<?php       }     ?>
                  <div class="d-flex justify-content-end">
                        <a class="btn btn-primary " href=<?= base_url(). "/"; ?> >Back</a>
                  </div>
                  <div>
                        <h1 class="border-bottom text-light">Add New Employee</h1>
                        <form action= <?= base_url(). "employees/process_new_employee"; ?> method="post">
                              <div class="mb-3 row">
                                    <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control" name="firstname" value="<?= set_value('firstname'); ?>" autofocus>
                                    </div>
                              </div>
                              <div class="mb-3 row">
                                    <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control" name="lastname" value="<?= set_value('lastname'); ?>">
                                    </div>
                              </div>
                              <div class="mb-3 row">
                                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                                    <div class="col-sm-10">
                                          <input type="number" min=0 class="form-control" name="age" value="<?= set_value('age'); ?>">
                                    </div>
                              </div>
                              <div class="mb-3 row">
                                    <label for="birth_date" class="col-sm-2 col-form-label">Birth Date</label>
                                    <div class="col-sm-10">
                                          <input type="date" class="form-control" name="birth_date" value="<?= set_value('birth_date'); ?>">
                                    </div>
                              </div>
                              <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                    </div>
                              </div>
                              <div class="mb-3 row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                          <input type="password" class="form-control" name="password" value="<?= set_value('password'); ?>">
                                    </div>
                              </div>
                              <div class="mb-3 row">
                                    <label for="job_title" class="col-sm-2 col-form-label">Job Title</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control" name="job_title" value="<?= set_value('job_title'); ?>">
                                    </div>
                              </div>
                              <div class="mb-3">
                                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                                    <select name="role">
<?php foreach($roles as $role) { ?>                                          
                                          <option value="<?= $role['id']; ?>" <?= set_select('role', $role['id']); ?>><?= $role['description']; ?></option>
<?php }     ?>
                                    </select>
                              </div>
                              <div class="d-flex justify-content-end">
                                    <input type="submit" class="btn btn-success" value="Add Employee">
                              </div>
                        </form>
                  </div>
            </div>

      </body>
</html>