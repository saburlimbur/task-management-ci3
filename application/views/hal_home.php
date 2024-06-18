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
        <img class="logo" src="<?= base_url('assets/img/Logo-homepage.png')?>" alt="Logo">
        <!-- <img class="logo" src="<?= base_url('assets/img/Logo-home.png') ?>" alt="Logo"> -->


        <div class="menu-content">
            <div class="menu-item-search">
                <img src="<?= base_url('assets/icons/search.svg') ?>" alt="Home">
                <span>Search</span>
            </div>

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
            <span>Fikih Aldiansyah
                <p class="admin">Admin<br></p>
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

            <a href="">
                <div class="menu-item-content">
                    <img src="<?= base_url('assets/icons/sending.svg') ?>" alt="Home">
                </div>
            </a>

            <a href="<?= base_url('TaskController') ?>">
                <div class="menu-item-content">
                    <img src="<?= base_url('assets/icons/add-create.svg') ?>" alt="Home">
                </div>
            </a>

        </div>
    </div>

    <section class="content-task col-lg-8 content-task card card-outline card-primary"
        style="height: 75vh; margin-top: 65px; margin-left: 200px;">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">

                    <!-- Task list -->
                    <div class="body-card">
                        <!-- display task list -->
                        <?php if (!empty($tasks)) : ?>
                        <ul class="list-group task-list">
                            <?php foreach ($tasks as $task) : ?>
                            <li class="list-group-item">
                                <div class="task-info">
                                    <strong style="font-size: x-large;"><?= $task['title'] ?></strong>
                                    <div>
                                        <p style="color: #808080; font-size: small;"><?= $task['description'] ?></p>

                                        <!-- status progress -->
                                        <h7>status: <span class="badge badge-<?php if($task['status'] == 'Pending')
                                                { echo 'warning'; }elseif($task['status'] == 'In Progress')
                                                { echo 'primary'; }elseif($task['status'] == 'Completed')
                                                { echo 'success'; } ?>"
                                                style="border-radius: 15px; padding: 5px;  font-weight: 600;"><?php echo $task['status']; ?></span>
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
                                            <?= $progress ?>%</div>
                                    </div>

                                    <!-- dropdown menu -->
                                    <div class="dropdown" style="position: absolute; top: 0; right: 0;">
                                        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" style="background: none; border: none; color: black;">
                                            &#8942;
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="<?= site_url('TaskController/update/' . $task['id']) ?>">Edit</a>
                                            <a class="dropdown-item"
                                                href="<?= site_url('TaskController/delete/' . $task['id']) ?>"
                                                onclick="return confirm('Apakah yakin ingin menghapus tugas?');">Hapus</a>
                                        </div>
                                        <style>
                                        .dropdown-toggle::after {
                                            display: none;
                                        }
                                        </style>
                                    </div>
                                </div>
                    </div>
                    </li>
                    <?php endforeach; ?>
                    </ul>
                    <?php else : ?>

                    <div class="card text-center card card-outline card-primary"
                        style="height: 500px; margin-top: 65px; margin-left: 200px;">
                        <img class="card-img-top" src="<?= base_url('assets/img/Opsss.png') ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="<?= base_url('TaskController/create') ?>" class="btn btn-primary">Add Task</a>
                        </div>
                        <?php endif; ?>
                    </div>



                </div>
                <div class="col-md-4">

                    <!-- Form untuk create atau edit task -->
                    <!-- <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Create / Edit Task</h5>
                            <?php echo form_open('TaskController/create'); ?>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="<?= set_value('title') ?>" required>
                                <?= form_error('title', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    required><?= set_value('description') ?></textarea>
                                <?= form_error('description', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?= form_close(); ?>
                        </div> -->
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
    </script>
</body>

</html>