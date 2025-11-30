<?php
include '../../Config/conect.php';
include '../../root/Header.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
            background-image: url(../../assets/images/spider.jpg);
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.58);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header img {
            width: 80px;
            margin-bottom: 1rem;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
            border-color: #667eea;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <!-- Login Form Tab for waiter or cashier and tab admin or manager -->
    <div style="max-width: 500px; margin: auto">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Employee</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Admin or Manager</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent" style="padding: 15px 0px 10px 0px; box-sizing:border-box">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="login-container">
                    <div class="login-header">
                        <img src="/PHP9/HR_Sytem/assets/images/logo.png" alt="Logo" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4MCIgaGVpZ2h0PSI4MCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiM2NjdlZWEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cGF0aCBkPSJNMjAgMjFWMTlhNCA0IDAgMCAwLTQtNEg4YTQgNCAwIDAgMC00IDR2MiI+PC9wYXRoPjxjaXJjbGUgY3g9IjEyIiBjeT0iNyIgcj0iNCIgLz48L3N2Zz4='">
                        <h3>Welcome Back</h3>
                        <p class="text-muted">Please login to your account</p>
                    </div>

                    <form id="loginForm" method="POST">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="password" name="password" required>

                        </div>

                        <button type="button" class="btn btn-primary" id="loginButton">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </form>
                </div>

            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="login-container">
                    <div class="login-header">
                        <img src="/PHP9/HR_Sytem/assets/images/logo.png" alt="Logo" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4MCIgaGVpZ2h0PSI4MCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiM2NjdlZWEiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cGF0aCBkPSJNMjAgMjFWMTlhNCA0IDAgMCAwLTQtNEg4YTQgNCAwIDAgMC00IDR2MiI+PC9wYXRoPjxjaXJjbGUgY3g9IjEyIiBjeT0iNyIgcj0iNCIgLz48L3N2Zz4='">
                        <h3>Welcome Back</h3>
                        <p class="text-muted">Please login to your account</p>
                    </div>

                    <form id="loginForm" method="POST">
                        <!-- select role -->
                        <div class="mb-3">
                            <label for="role" class="form-label fw-semibold">
                                <i class="fas fa-user-tag me-2"></i>Role
                            </label>
                            <select class="form-select" id="role" required>
                                <option value="">Select role...</option>
                                <option value="Manager">Manager</option>
                                <option value="Admin">Admin</option>
                            </select>
                            <div class="invalid-feedback">Please select a role.</div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="usernameadmin" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordadmin" name="password" required>

                        </div>

                        <button type="button" class="btn btn-primary" id="loginButtonadmin">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#loginButtonadmin').click(function() {
                var username = $('#usernameadmin').val();
                var password = $('#passwordadmin').val();
                var role = $('#role').val();

                if (role === '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: 'Please select a role.',
                    });
                } else if (role === 'Admin') {
                    usernameshow = 'Admin';
                    $.post('../../action/Login/login.php', {
                        action: 'adminSMS',
                        username: username,
                        password: password
                    }, function(response) {
                        if (response === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Login successfully!',
                            }).then(() => {
                                window.location.href = '../../index.php ?usernameshow=' + encodeURIComponent(usernameshow.trim());
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Invalid username or password.',
                            });
                        }
                    });
                } else if (role === 'Manager') {
                    usernameshow = 'Manager';
                    $.post('../../action/Login/login.php', {
                        action: 'adminSMS',
                        username: username,
                        password: password
                    }, function(response) {
                        if (response === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Login successfully!',
                            }).then(() => {
                                window.location.href = '../../index.php ?usernameshow=' + encodeURIComponent(usernameshow.trim());
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Invalid username or password.',
                            });
                        }
                    });
                }

            });


            $('#loginButton').click(function() {
                var username = $('#username').val();
                var password = $('#password').val();

                $.post('../../action/Login/login.php', {
                    action: 'employeeSMS',
                    username: username,
                    password: password
                }, function(response) {
                    if (response === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Login successfully!',
                        }).then(() => {
                            window.location.href = '../../../User/index.php?username=' + encodeURIComponent(username.trim());
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Invalid username or password.',
                        });
                    }
                });



            });


        });
    </script>

</body>

</html>