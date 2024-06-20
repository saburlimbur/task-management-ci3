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
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">


</head>

<body>
    <div class="sidebar">
        <img class="logo" src="<?= base_url('assets/img/Logo-homepage.png') ?>" alt="Logo">
        <!-- <img class="logo" src="<?= base_url('assets/img/Logo-home.png') ?>" alt="Logo"> -->


        <div class="menu-content">
            <div class="menu-item">
                <img src="<?= base_url('assets/icons/home.svg') ?>" alt="Home">
                <span>Home</span>
            </div>

            <a href="<?= base_url('TaskController') ?>">
                <div class="menu-item">
                    <img src="<?= base_url('assets/icons/task.svg') ?>" alt="My Tasks">
                    <span>My Tasks</span>
                </div>
            </a>

            <div class="menu-item">
                <img src="<?= base_url('assets/icons/settings.svg') ?>" alt="Settings">
                <span>Settings</span>
            </div>

            <div class="menu-item">
                <img src="<?= base_url('assets/icons/help.svg') ?>" alt="Help & Support">
                <span>Help & Support</span>
            </div>
        </div>


        <div class="user-info">
            <img src="<?= base_url('assets/img/users.png') ?>" alt="User">
            <span>
                <?= $this->session->userdata('username') ?>
                <p class="admin">Users<br></p>
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

            <a href="">
                <div class="menu-item-content">
                    <img src="<?= base_url('assets/icons/search.svg') ?>" alt="Home">
                </div>
            </a>

            <a href="">
                <div class="menu-item-content-share">
                    <p>
                        Share
                    </p>
                    <img src="<?= base_url('assets/icons/share.svg') ?>" alt="Home">
                </div>
            </a>


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
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- User Profile Content -->
                            <p><strong>Username:</strong> <span
                                    id="profile-username"><?= $this->session->userdata('username') ?></span></p>
                            <p><strong>Email:</strong> <span
                                    id="profile-email"><?= $this->session->userdata('email') ?></span></p>
                            <p><strong>User Role: Users</strong> <span
                                    id="profile-role"><?= $this->session->userdata('user_role') ?></span></p>
                        </div>
                        <div class="modal-footer">
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

    <section class="content-task">



        <!-- Task list -->

        <!-- display task list -->
        <?php if (!empty($tasks)): ?>
        <div class="col-text-left">
            <ul class=" d-flex flex-wrap" list-group list-group-flush" style="gap:26px;">
                <?php foreach ($tasks as $task): ?>
                <li class="list-group-item p-2">
                    <div class="task-info">
                        <strong style="font-size: x-large;"><?= $task['title'] ?></strong>
                        <div>
                            <p style="color: #808080; font-size: small;"><?= $task['description'] ?></p>
                            <!-- status progress -->
                            <h7>status: <span class="badge badge-<?php
                                    if ($task['status'] == 'Pending') {
                                        echo 'warning';
                                    } elseif ($task['status'] == 'In Progress') {
                                        echo 'primary';
                                    } elseif ($task['status'] == 'Completed') {
                                        echo 'success';
                                    }
                                    ?>" style=""><?= $task['status']; ?></span>
                            </h7>
                        </div>
                        <!-- progress bar -->
                        <div class="progress mt-2">
                            <?php
                                    $status = $task['status'];
                                    if ($status == 'Pending') {
                                        $progress = 20;
                                    } elseif ($status == 'In Progress') {
                                        $progress = 50;
                                    } elseif ($status == 'Completed') {
                                        $progress = 100;
                                    }
                                    ?>
                            <div class="progress-bar" role="progressbar" style="width: <?= $progress ?>%;"
                                aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100">
                                <?= $progress ?>%
                            </div>
                        </div>
                        <!-- dropdown menu -->
                        <div class="dropdown" style="position: absolute; top: 0; right: 0; ">
                            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="background: none; border: none; color: black;">
                                &#8942;
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                    href="<?= site_url('TaskController/edit/' . $task['id']) ?>">Edit</a>
                                <a class="dropdown-item" href="<?= site_url('TaskController/delete/' . $task['id']) ?>"
                                    onclick="return confirm('Apakah yakin ingin menghapus tugas?');">Hapus</a>
                            </div>
                            <style>
                            .dropdown-toggle::after {
                                display: none;
                            }
                            </style>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php else: ?>

        <?php endif; ?>


    </section>

    <section class="content-task">
        <?php if (!empty($tasks)): ?>
        <?php else: ?>
        <div class="card text-center card card-outline card-primary"
            style="height: 500px; margin-top: 150px; margin-left: 400px;">
            <img class="card-img-top" src="<?= base_url('assets/img/Opsss.png') ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">No tasks found</h5>
                <p class="card-text">There are no tasks available.</p>
                <a href="<?= base_url('TaskController/create') ?>" class="btn btn-primary">Add Task</a>
            </div>
        </div>
        <?php endif; ?>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    // pop up pada profile
    $(document).ready(function() {
        $('#profileModal').on('show.bs.modal', function(event) {
            $.ajax({
                url: '<?= site_url('welcome/get_profile') ?>', // URL untuk mendapatkan data profil
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#profile-username').text(data.username);
                    $('#profile-email').text(data.email);
                    $('#profile-role').text(data.user_role);
                },
                error: function() {
                    alert('Gagal memuat data profil.');
                }
            });
        });
    });
    </script>

</body>



</html>