<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: white;
            border-bottom: 1px solid #e9ecef;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .greeting button {
            background-color: white;
            border: 1px solid #6c5ce7;
            border-radius: 6px;
            color: #6c5ce7;
        }

        .greeting {
            background-color: #edf2ff;
            border-radius: 8px;
            padding: 30px;
            margin-top: 20px;
            position: relative;
        }

        .greeting h2 {
            font-size: 24px;
            font-weight: bold;
        }


        .profile-dropdown a {
            color: black;
            text-decoration: none;
        }

        .info-box {
            background-color: #f8f9fa;
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            margin-top: 20px;
        }

        .profile-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            background-color: #6c5ce7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Printsoft Logo" width="120">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle profile-dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-img">
                                <i class="bi bi-person"></i>
                            </div>
                            <span><?php echo $user['username']; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo site_url('dashboard/edit_profile'); ?>">Edit Profil</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('dashboard/change_password'); ?>">Ubah Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="<?php echo site_url('logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="greeting d-flex justify-content-between align-items-center">
            <div>
                <h2>Hi <?php echo $user['username']; ?>, Have a nice day!</h2>
                <a href="#" class="btn btn-outline-primary">Account Information</a>
            </div>
            <div>
                <img src="<?php echo base_url('assets/images/illustration-2.png'); ?>" alt="Welcome" width="150">
            </div>
        </div>

        <div class="info-box mt-4">
            <h5>Your current information!</h5>
            <p>Username: <strong><?php echo $user['username']; ?></strong></p>
            <p>Name: <strong><?php echo $user['name']; ?></strong></p>
            <p>Address: <strong><?php echo $user['address']; ?></strong></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>