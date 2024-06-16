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

</head>

<body>
    <div class="sidebar">
        <img class="logo" src="<?= base_url('assets/img/Logo.png')?>" alt="Logo">


        <div class="menu-content">
            <div class="menu-item-search">
                <img src="<?= base_url('assets/icons/search.svg')?>" alt="Home">
                <span>Search</span>
            </div>

            <div class="menu-item">
                <img src="<?= base_url('assets/icons/home.svg')?>" alt="Home">
                <span>Home</span>
            </div>

            <div class="menu-item">
                <img src="<?= base_url('assets/icons/task.svg')?>" alt="My Tasks">
                <span>My Tasks</span>
            </div>

            <div class="menu-item">
                <img src="<?= base_url('assets/icons/settings.svg')?>" alt="Settings">
                <span>Settings</span>
            </div>

            <div class="menu-item">
                <img src="<?= base_url('assets/icons/help.svg')?>" alt="Help & Support">
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
                    <img src="<?= base_url('assets/icons/search.svg')?>" alt="Home">
                </div>
            </a>

            <a href="">
                <div class="menu-item-content-share">
                    <p>
                        Share
                    </p>
                    <img src="<?= base_url('assets/icons/share.svg')?>" alt="Home">
                </div>
            </a>

            <a href="">
                <div class="menu-item-content">
                    <img src="<?= base_url('assets/icons/sending.svg')?>" alt="Home">
                </div>
            </a>

            <a href="">
                <div class="menu-item-content">
                    <img src="<?= base_url('assets/icons/add-create.svg')?>" alt="Home">
                </div>
            </a>

        </div>
    </div>

    <section class="content-task">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">

                    <!-- Task List -->
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Task List</h2>
                            <!-- Display Task List -->
                            <?php if (!empty($tasks)): ?>
                            <ul class="list-group">
                                <?php foreach ($tasks as $task): ?>
                                <li class="list-group-item">
                                    <div class="task-info">
                                        <strong><?= $task['title'] ?></strong>
                                        <div>
                                            <p><?= $task['description'] ?></p>
                                            <small>Status: <?= $task['status'] ?></small>
                                        </div>
                                        <div class="btn-group">
                                            <a href="<?= site_url('TaskController/edit/' . $task['id']) ?>"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?= site_url('TaskController/delete/' . $task['id']) ?>"
                                                onclick="return confirm('Apakah yakin ingin menghapus task?');"
                                                class="btn btn-sm btn-danger">Delete</a>

                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php else: ?>
                            <p>No tasks found.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">

                    <!-- Form untuk create atau edit task -->
                    <div class="card">
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
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>