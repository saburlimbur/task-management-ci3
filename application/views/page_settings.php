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

            <a href="<?= base_url('homePage') ?>"
                style="text-decoration: none; color: black; transition: color 0.3s ease;"
                onmouseover="this.style.color='#007bff';" onmouseout="this.style.color='black';">
                <div class="menu-item">
                    <img src="<?= base_url('assets/icons/home.svg') ?>" alt="My Tasks">
                    <span>Home</span>
                </div>
            </a>

            <a href="<?= base_url('TaskController') ?>"
                style="text-decoration: none; color: black; transition: color 0.3s ease;"
                onmouseover="this.style.color='#007bff';" onmouseout="this.style.color='black';">
                <div class="menu-item">
                    <img src="<?= base_url('assets/icons/task.svg') ?>" alt="My Tasks">
                    <span>My Tasks</span>
                </div>
            </a>

            <a href="<?= base_url('settings_page') ?>"
                style="text-decoration: none; color: black; transition: color 0.3s ease;"
                onmouseover="this.style.color='#007bff';" onmouseout="this.style.color='black';">
                <div class="menu-item">
                    <img src="<?= base_url('assets/icons/settings.svg') ?>" alt="Settings">
                    <span>Settings</span>
                </div>
            </a>


            <div class="menu-item" style="text-decoration: none; color: black; transition: color 0.3s ease;"
                onmouseover="this.style.color='#007bff';" onmouseout="this.style.color='black';">
                <img src="<?= base_url('assets/icons/help.svg') ?>" alt="Help & Support">
                <span>Help & Support</span>
            </div>
        </div>


        <div class="user-info">
            <img src="<?= base_url('assets/img/users.png') ?>" alt="User">
            <span>
                <?= $this->session->userdata('username') ?>
                <p class="admin">
                    <?= $this->session->userdata('email') ?><br>
                </p>
                <?= $this->session->userdata('user_role') ?><br>
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

    <!-- Task list -->
    <section class="content-task col-lg-8 content-task card card-outline card-primary"
        style="height: 75vh; margin-top: 65px; margin-left: 180px;">


        <!-- display task list -->
        <?php if (!empty($tasks)): ?>
        <div class="container">
            <div class="col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Task Details</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <!-- <th>Username</th> -->
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php if (!empty($tasks)): ?>
                                    <?php foreach ($tasks as $task): ?>
                                    <tr>
                                        <!-- <td class="p-0 text-center">
                                            <?= $this->session->userdataO('username') ?>
                                            <div class="menu-item-content text" class="display: flex">
                                                <img src="<?= base_url('assets/img/users.png') ?>" alt="Profile">
                                            </div>
                                        </td> -->
                                        <td><?= $task['title'] ?></td>
                                        <td><?= $task['description'] ?></td>
                                        <td>
                                            <span class="badge badge-<?php
                                                if ($task['status'] == 'Pending') {
                                                    echo 'warning';
                                                } elseif ($task['status'] == 'In Progress') {
                                                    echo 'primary';
                                                } elseif ($task['status'] == 'Completed') {
                                                    echo 'success';
                                                }
                                            ?>">
                                                <?= $task['status'] ?>
                                            </span>
                                        </td>



                                        <td>
                                            <a class="btn btn-primary btn-action mr-1"
                                                href="<?= site_url('TaskController/edit/' . $task['id']) ?>"
                                                data-toggle="tooltip" title="Edit"><img
                                                    src="<?= base_url('assets/icons/Edit.svg') ?>" alt=""></a>
                                            <a class="btn btn-danger btn-action"
                                                href="<?= site_url('TaskController/delete/' . $task['id']) ?>"
                                                data-toggle="tooltip" title="Delete"
                                                onclick="return confirm('Apakah yakin ingin menghapus tugas?');"><img
                                                    src="<?= base_url('assets/icons/Delete.svg') ?>" alt=""></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No tasks available</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php else: ?>

        <?php endif; ?>


    </section>

    <section class="content-task col-lg-8 content-task card-primary">
        <div class="wrapper bg-white mt-sm-5" style="height: 50%;">
            <h4 class="pb-4 border-bottom">Settings</h4>

            <div class="d-flex align-items-start py-3 border-bottom">
                <img src="<?= base_url('assets/img/users.png') ?>" alt="Profile Photo" class="img-profile">
                <div class="pl-sm-4 pl-2" id="img-section">
                    <b>Profile Photo</b>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>

                </div>
            </div>
            <div class="py-2">
                <div class="row py-2">

                    <div class="col-md-6">
                        <label for="username">Username</label>
                        <!-- <input type="text" class="bg-light form-control" placeholder="Steve"> -->
                        <div class="bg-light form-control"><?= $this->session->userdata('username') ?>
                            <p class="admin">
                        </div>
                    </div>

                    <div class=" col-md-6 pt-md-0 pt-3">
                        <label for="email">Email</label>
                        <div class="bg-light form-control"><?= $this->session->userdata('email') ?>
                            <p class="admin">
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-6">
                        <label for="email">Position</label>
                        <div class="bg-light form-control">Hacker International
                            <p class="admin">
                        </div>
                    </div>
                </div>
                <!-- <div class="row py-2">
                    <div class="col-md-6">
                        <label for="country">Country</label>
                        <select name="country" id="country" class="bg-light">
                            <option value="india" selected>India</option>
                            <option value="usa">USA</option>
                            <option value="uk">UK</option>
                            <option value="uae">UAE</option>
                        </select>
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3" id="lang">
                        <label for="language">Language</label>
                        <div class="arrow">
                            <select name="language" id="language" class="bg-light">
                                <option value="english" selected>English</option>
                                <option value="english_us">English (United States)</option>
                                <option value="enguk">English UK</option>
                                <option value="arab">Arabic</option>
                            </select>
                        </div>
                    </div>
                </div> -->
                <div class="py-3 pb-4 border-bottom">
                    <a href="<?= base_url('homePage') ?>">
                        <button class="btn btn-primary mr-3">Back to Home</button>
                    </a>
                </div>
                <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                    <div>
                        <b>Settings for Account pages</b>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
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