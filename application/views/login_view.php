<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for styling -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 450px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .sign-in {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            /* text-align: center; */
        }

        .side-image {
            background-color: #6c5ce7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            height: 100vh;
        }

        .side-image img {
            max-width: 100%;
        }

        .side-image p {
            margin-top: 10px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6 login-container">

                <div class="form-container">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo pict" class="logo">
                    <div class="sign-in">Sign-In</div>

                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>

                    <?php echo form_open('auth/login'); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                        <a href="#" class="float-end">Forgot Password?</a>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="col-md-6 side-image">
                <div>
                    <img src="<?php echo base_url('assets/images/illustration.png'); ?>" alt="Login Illustration" class="img-fluid">
                    <p style="text-align: center;">Work from anywhere, anytime, and any moments</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>