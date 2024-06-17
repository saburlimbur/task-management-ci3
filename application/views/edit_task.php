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
        <img class="logo" src="<?= base_url('assets/img/Logo-home.png')?>" alt="Logo">


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
        <h2>Edit Task</h2>
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

    <section class="col-lg-8 content-task card card-outline card-primary" style="height: 75vh; margin-top: 65px; margin-left: 180px;" >
                    <?php echo form_open('TaskController/update/' . $task['id']); ?>
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">    
                    
                    <form>
                        <div class="form-row">
                            <!-- form title -->
                            <div class="form-group col-md-6">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $task['title']; ?>" required>
                                <?= form_error('title', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <!-- form status -->
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Pending" <?php echo $task['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="In Progress" <?php echo $task['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                    <option value="Completed" <?php echo $task['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <!-- form status -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required style="height: 120px;"><?php echo $task['description']; ?></textarea>
                            <?= form_error('description', '<small class="text-danger">', '</small>') ?>
                        </div>
                        
                        <!-- form Date Start -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Start Date</label>
                                    <input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" value="<?php echo isset($start_date) ? date("Y-m-d",strtotime($start_date)) : '' ?>">
                                </div>
                            </div>
                            
                        <!-- form Date End -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">End Date</label>
                                <input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date" value="<?php echo isset($end_date) ? date("Y-m-d",strtotime($end_date)) : '' ?>">
                            </div>
                        </div>
                        <!-- button -->
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save</button>
                             <?= form_close(); ?>
                        </div>
                    </form>
    </section>
</body>
                    
                



