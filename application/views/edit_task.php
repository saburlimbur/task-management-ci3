<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management - Home</title>
    <!-- boosrapt -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Ext CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
    <!--  css normalize-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <div class="sidebar">
        <a href="">
            <img class="logo" src="<?= base_url('assets/img/Logo-homepage.png')?>" alt="Logo">
        </a>

        <div class="menu-content">
            <a href="<?= base_url('homePage') ?>" style="text-decoration:none; color:black;">
                <div class="menu-item">
                    <img src="<?= base_url('assets/icons/home.svg') ?>" alt="My Tasks"
                        style="text-decoration:none; color:black;">
                    <span>Home</span>
                </div>
            </a>

            <a href="<?= base_url('TaskController') ?>" style="text-decoration:none; color:black; hover:color-">
                <div class="menu-item">
                    <img src="<?= base_url('assets/icons/task.svg') ?>" alt="My Tasks"
                        style="text-decoration:none; color:black;">
                    <span>My Tasks</span>
                </div>
            </a>

            <a href="<?= base_url('settings_page') ?> " style="text-decoration:none; color:black;">
                <div class="menu-item">
                    <img src="<?= base_url('assets/icons/settings.svg') ?>" alt="Settings"
                        style="text-decoration:none; color:black;">
                    <span>Settings</span>
                </div>
            </a>

            <div class="menu-item">
                <img src="<?= base_url('assets/icons/help.svg')?>" alt="Help & Support"
                    style="text-decoration:none; color:black;">
                <span>Help & Support</span>
            </div>
        </div>

        <div class="user-info">
            <img src="<?= base_url('assets/img/users.png') ?>" alt="User">
            <span>
                <?= $this->session->userdata('username') ?>
                <p class="admin">
                    <?= $this->session->userdata('email')?><br>
                </p>
                <!-- <p class="admin"><?= $this->session->userdata('user_role') ?><br></p> -->
            </span>
            <a href="<?= base_url('welcome/index') ?>" onclick="return confirm('Apakah yakin ingin keluar?');">
                <img class="logout-icon" src="<?= base_url('assets/icons/logout.svg') ?>" alt="Logout">
            </a>
        </div>

    </div>

    <div class="main-content">
        <h2>Task Management</h2>
        <div class="wrapper-menu-content">

            <a href="<?= base_url('TaskController/create') ?>">
                <div class="menu-item-content">
                    <img src="<?= base_url('assets/icons/add-create.svg') ?>" alt="Home">
                </div>
            </a>


            <a href="#" data-toggle="modal" data-target="#profileModal">
                <div class="menu-item-content">
                    <img src="<?= base_url('assets/img/users.png') ?>" alt="Profile">
                </div>
            </a>

            <!-- Profile Modal -->
            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content card">
                        <div class="card-header">
                            <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets/img/users.png') ?>" alt="Profile Photo"
                                class="profile-photo mb-3">
                            <p><strong>Username:</strong> <span
                                    id="profile-username"><?= $this->session->userdata('username') ?></span></p>
                            <p><strong>Email:</strong> <span
                                    id="profile-email"><?= $this->session->userdata('email') ?></span></p>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <a href="">
                <div class="menu-item-content">
                    <img src="<?= base_url('assets/icons/sending.svg') ?>" alt="Home">
                </div>
            </a> -->

        </div>
    </div>

    <section class="col-lg-8 content-task card card-outline card-primary"
        style="height: 75vh; margin-top: 65px; margin-left: 180px;">
        <?php echo form_open('TaskController/update/' . $task['id']); ?>
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">

        <form>
            <div class="form-row">
                <!-- form title -->
                <div class="form-group col-md-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="<?php echo $task['title']; ?>" required>
                    <?= form_error('title', '<small class="text-danger">', '</small>') ?>
                </div>
                <!-- form status -->
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Pending" <?php echo $task['status'] == 'Pending' ? 'selected' : ''; ?>>Pending
                        </option>
                        <option value="In Progress" <?php echo $task['status'] == 'In Progress' ? 'selected' : ''; ?>>In
                            Progress</option>
                        <option value="Completed" <?php echo $task['status'] == 'Completed' ? 'selected' : ''; ?>>
                            Completed</option>
                    </select>
                    <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>
            <!-- form status -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required
                    style="height: 120px;"><?php echo $task['description']; ?></textarea>
                <?= form_error('description', '<small class="text-danger">', '</small>') ?>
            </div>

            <!-- form Date Start -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Start Date</label>
                        <input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date"
                            value="<?php echo isset($start_date) ? date("Y-m-d",strtotime($start_date)) : '' ?>">
                    </div>
                </div>

                <!-- form Date End -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">End Date</label>
                        <input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date"
                            value="<?php echo isset($end_date) ? date("Y-m-d",strtotime($end_date)) : '' ?>">
                    </div>
                </div>
                <!-- button -->
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </form>
    </section>
</body>