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
                <img src="<?= base_url('assets/img/Logo-register.png')?>" alt="Logo">
            </div>

            <div class="form-content">
                <!-- Form Registrasi -->
                <form id="registrationForm" action="<?= site_url('welcome/proccess_register') ?>" method="POST"
                    class="forms">
                    <div class="email-form">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter Your Username"
                            value="<?= set_value('username'); ?>" />
                        <div class="error-message"><?= form_error('username'); ?></div>
                    </div>

                    <div class="email-form">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email"
                            value="<?= set_value('email'); ?>" />
                        <div class="error-message"><?= form_error('email'); ?></div>
                    </div>

                    <div class="password-form">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password"
                            value="<?= set_value('password'); ?>" />
                        <div class="error-message"><?= form_error('password'); ?></div>
                    </div>

                    <div class="password-form">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password"
                            placeholder="Confirm Your Password" value="<?= set_value('confirm_password'); ?>" />
                        <div class="error-message"><?= form_error('confirm_password'); ?></div>
                    </div>

                    <!-- Error Message Email Sudah Terdaftar -->
                    <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                    <?php endif; ?>

                    <div class="terms" id="terms">
                        <p>Already have an account? <span><a href="<?= base_url('welcome/login') ?>">Login</a></span>
                        </p>
                    </div>

                    <button type="submit" class="btn-sign-up">Register</button>
                </form>
            </div>
        </div>

        <div class="right">
            <img src="<?= base_url('assets/img/beavis.png')?>" alt="Image">
        </div>
    </section>

    <script>
    $(document).ready(function() {
        $('#registrationForm').submit(function(event) {
            event.preventDefault();

            $('.error-message').empty();

            // Get value pada form
            var username = $('#username').val().trim();
            var email = $('#email').val().trim();
            var password = $('#password').val().trim();
            var confirmPassword = $('#confirm_password').val().trim();

            var valid = true;

            if (username === '') {
                $('#username').next('.error-message').text('Username is required');
                valid = false;
            }

            if (email === '') {
                $('#email').next('.error-message').text('Email is required');
                valid = false;
            } else if (!validateEmail(email)) {
                $('#email').next('.error-message').text('Invalid email format');
                valid = false;
            }

            if (password === '') {
                $('#password').next('.error-message').text('Password is required');
                valid = false;
            }

            if (confirmPassword === '') {
                $('#confirm_password').next('.error-message').text('Confirm password is required');
                valid = false;
            } else if (password !== confirmPassword) {
                $('#confirm_password').next('.error-message').text('Passwords do not match');
                valid = false;
            }

            if (!valid) return;

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrasi Berhasil',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.href =
                                '<?= site_url('welcome/login') ?>';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Registrasi',
                            text: response.message,
                            showConfirmButton: true
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Registrasi',
                        text: 'Terjadi masalah saat mengirim data.',
                        showConfirmButton: true
                    });
                }
            });
        });
    });

    function validateEmail(email) {
        var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(email);
    }
    </script>


</body>

</html>