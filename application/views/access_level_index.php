<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Manage Access Levels</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>
                <div class="container border mt-5 bg-secondary rounded p-5">
<?php if($this->session->flashdata('notif')) { ?>
        <div class="alert alert-<?= $this->session->flashdata('notif')['status']; ?>"> <?= $this->session->flashdata('notif')['message']; ?> </div>
<?php       }     ?>
                        <div class="d-flex justify-content-end">
                                <a class="btn btn-primary" href=<?= base_url(). "/"; ?> >Back</a>
                        </div>
                        <div>
                                <h1 class="border-bottom text-light">Manage Access Levels</h1>
                                <form action= <?= base_url(). "access_levels/process_new_access_level"; ?> method="post">
                                <div class="mb-3 row">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" name="description" value="<?= set_value('description'); ?>" autofocus>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                                <input type="submit" class="btn btn-success" value="Add Access Level">
                                        </div>
                                        </form>
                                </div>
                        </div>
                </div>

        </body>
</html>