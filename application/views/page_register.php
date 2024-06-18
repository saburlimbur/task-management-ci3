<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management - Registrasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alata&display=swap">
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/sweetalert2.min.css') ?>">
    <script src="<?= base_url('assets/js/sweetalert2.all.min.js') ?>"></script>
    <!--  -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css')?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <section class="login">
        <div class="left">
            <div class="brand">
                <img src="<?= base_url('assets/img/Logo-register.png')?>" alt="">
            </div>

            <!-- <div class="heading-text">
                <h3>Let’s create your account</h3>
                <p>Sign up now to manage your tasks.</p>
            </div> -->

            <div class="form-content">
                <form id="registrationForm" action="<?= site_url('welcome/proccess_register') ?>" method="POST"
                    class="forms">

                    <div class="email-form">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Enter Your Username"
                            value="<?php echo set_value('username'); ?>" />
                        <!-- error message -->
                        <div class="error-message"><?php echo form_error('username'); ?></div>
                    </div>

                    <div class="email-form">
                        <label for="user-role">User Role</label>
                        <select name="user-role" id="user-role">
                            <option value="">Select User Role</option>
                            <option value="admin" <?php echo set_select('user-role', 'admin'); ?>>Admin</option>
                            <option value="user" <?php echo set_select('user-role', 'user'); ?>>User</option>
                        </select>
                        <!-- error message -->
                        <div class="error-message"><?php echo form_error('user-role'); ?></div>
                    </div>



                    <div class="email-form">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter Your Email"
                            value="<?php echo set_value('email'); ?>" />
                        <!-- error message -->
                        <div class="error-message"><?php echo form_error('email'); ?></div>
                    </div>


                    <div class="password-form">
                        <label for="password">Password</label>
                        <div class="password-input">
                            <input type="password" name="password" id="password" placeholder="Enter Your Password"
                                value="<?php echo set_value('password'); ?>" />

                            <!-- error message -->
                            <div class="error-message"><?php echo form_error('password'); ?></div>
                        </div>
                    </div>

                    <div class="password-form">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="password-input">
                            <input type="password" name="confirm_password" id="confirm_password"
                                placeholder="Confirm Your Password"
                                value="<?php echo set_value('confirm_password'); ?>" />
                            <!-- error message -->
                            <div class="error-message"><?php echo form_error('confirm_password'); ?></div>
                        </div>
                    </div>

                    <div class="terms" id="terms">
                        <p>Already have an account? <span><a href="<?= base_url('welcome/login') ?>"> Login</a></span>
                        </p>
                    </div>

                    <button type="submit" class="btn-sign-up">Register</button>
                </form>
            </div>
        </div>

        <div class="right">
            <img src="<?= base_url('assets/img/beavis.png')?>" alt="">
        </div>
    </section>

    <!-- JS dan Sweet Alert -->
    <script>
    function periksaFieldDanRegistrasi() {
        // Mengambil semua input field dari form
        var fields = document.querySelectorAll('form input');
        var allFilled = true;

        // memeriksa setiap field apakah telah terisi
        fields.forEach(function(field) {
            if (field.value.trim() === '') {
                allFilled = false;
            }
        });

        // validasi dgn perulangan if. jika semua field terisi, kirim data menggunakan AJAX akan tampil alert berikut
        if (allFilled) {
            var formData = $('#registrationForm').serialize(); // lalu mengambil data dari form

            $.ajax({
                type: 'POST', // dgn POST method type
                url: $('#registrationForm').attr('action'),
                data: formData, // yang mengirim formData dari form
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registrasi Berhasil',
                        text: 'Silakan login untuk melanjutkan',
                        showConfirmButton: false,
                        timer: 500
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location.href =
                                '<?= site_url('welcome/login') ?>'; // jika benar saat register maka ke halaman login
                        }
                    });
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat mengirim data',
                        showConfirmButton: true
                    });
                }
            });
        } else {
            // Jika ada field yang belum terisi, tampilkan pesan error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Harap isi semua field',
                showConfirmButton: true
            });
        }
    }

    // Panggil fungsi ini saat form registrasi disubmit
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah submit form default
        periksaFieldDanRegistrasi();
    });
    </script>

</body>

</html>