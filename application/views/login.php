<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Page</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      </head>
      <body>
            <div class="container border mt-5 bg-secondary rounded p-5 w-50">
<?php if($this->session->flashdata('notif')) { ?>
      <div class="alert alert-<?= $this->session->flashdata('notif')['status']; ?>"> <?= $this->session->flashdata('notif')['message']; ?> </div>
<?php       }     ?>
                  <div>
                        <h1 class="border-bottom text-light">Login Account</h1>
                        <form action= <?= base_url(). "employees/process_login"; ?> method="post">
                              <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Username/Email:</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                    </div>
                              </div>
                              <div class="mb-3 row">
                                    <label for="password" class="col-sm-2 col-form-label">Password:</label>
                                    <div class="col-sm-10">
                                          <input type="password" class="form-control" name="password" value="<?= set_value('password'); ?>">
                                    </div>
                              </div>
                              <div class="d-flex justify-content-end">
                                    <input type="submit" class="btn btn-success" name="Login">
                              </div>
                        </form>
                  </div>
            </div>

      </body>
</html>