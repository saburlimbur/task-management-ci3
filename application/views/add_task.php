<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management - Home</title>
    <!-- Bootstrap -->
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
        <a href="">
            <img class="logo" src="<?= base_url('assets/img/Logo-homepage.png')?>" alt="Logo">
        </a>

        <div class="menu-content">
            <div class="menu-item">
                <img src="<?= base_url('assets/icons/home.svg')?>" alt="Home">
                <span>Home</span>
            </div>

            <a href="<?= base_url('TaskController') ?>">
                <div class="menu-item">
                    <img src="<?= base_url('assets/icons/task.svg') ?>" alt="My Tasks">
                    <span>My Tasks</span>
                </div>
            </a>

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

            <a href="">
                <div class="menu-item-content">
                    <img src="<?= base_url('assets/icons/search.svg')?>" alt="Home">
                </div>
            </a>

            <a href="">
                <div class="menu-item-content-share">
                    <p>Share</p>
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
                        <div class="card-body">
                            <div class="profile-info">
                                <p><strong>Username:</strong> <span
                                        id="profile-username"><?= $this->session->userdata('username') ?></span></p>
                                <p><strong>Email:</strong> <span
                                        id="profile-email"><?= $this->session->userdata('email') ?></span></p>
                            </div>
                            <img src="<?= $this->session->userdata('profile_photo') ?>" alt="Profile Photo"
                                class="profile-photo">
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <section class="col-lg-8 content-task card card-outline card-primary"
        style="height: 75vh; margin-top: 65px; margin-left: 180px;">
        <?php echo form_open('TaskController/create'); ?>

        <div class="form-row">
            <!-- Create a new Task -->
            <!-- form title -->
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
                <?= form_error('title', '<small class="text-danger">', '</small>') ?>
            </div>
            <!-- form status -->
            <div class="form-group col-md-6">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
                <?= form_error('status', '<small class="text-danger">', '</small>') ?>
            </div>
        </div>

        <!-- form deskripsi -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required
                style="height: 120px;"></textarea>
            <?= form_error('description', '<small class="text-danger">', '</small>') ?>
        </div>

        <!-- form Tanggal Mulai -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date" class="control-label">Start Date</label>
                    <input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date">
                </div>
            </div>

            <!-- form Tanggal Selesai -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date" class="control-label"> End Date</label>
                    <input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date">
                </div>
            </div>
        </div>

        <!-- tombol -->
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

        <?= form_close(); ?>
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