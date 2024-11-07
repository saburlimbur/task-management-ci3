<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manaement - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alata&display=swap">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url('assets/css/sweetalert2.min.css') ?>">
    <script src="<?= base_url('assets/js/sweetalert2.all.min.js') ?>"></script>
    <!--  -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/login.css')?>">
</head>

<body>

    <section class="login">
        <div class="left">
            <div class="brand">
                <img src="<?= base_url('assets/img/Logo-login.png')?>" alt="">
            </div>

            <div class="heading-text">

                <!-- <h3>Let’s create your account</h3>
                <p>Sign up now to manage your tasks.</p> -->
            </div>

            <div class="form-content">
                <form id="registrationForm" action="<?= site_url('welcome/proccess_login') ?>" method="POST"
                    class="forms">


                    <div class="email-form">
                        <label for="email">Email</label>
                        <input type="email" autocomplete="off" name="email" placeholder="Enter Your Email"
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

                    <div class="terms">
                        <!-- <input type="checkbox" /> -->
                        <!-- <p>By signing up. I have read an agree to Task Management <span>Terms</span> and <span>Privacy
                        Policy</span></p> -->
                        <!-- <p>Remember me</p> -->

                        <p>Don’t Have account?<a href="<?= base_url('welcome/index') ?>"> Register</a></p>
                    </div>

                    <button type="submit" class="btn-sign-up">Login</button>
                </form>
            </div>

        </div>

        <div class="right">
            <img src="<?= base_url('assets/img/beavis.png')?>" alt="">
        </div>

    </section>

    <!-- <script>
    Swal.fire({
        icon: 'success',
        title: 'Registrasi Berhasil',
        text: 'Silakan login untuk melanjutkan',
        showConfirmButton: false,
        timer: 2000
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            window.location.href = '<?= site_url('homePage') ?>';
        }
    });
    </script> -->

</body>

</html>