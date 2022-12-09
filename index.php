<?php
    include('include/link.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/login.scss">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="card card-login mx-auto text-center bg-dark">
            <div class="card-header mx-auto bg-dark">
                <!-- <span> <img src="https://amar.vote/assets/img/amarVotebd.png" class="w-75" alt="Logo"> </span><br/> -->
                <span class="logo_title mt-5"> เข้าสู้ระบบ เพื่อใช้งาน </span>
            </div>
            <div class="card-body">
                <form action="web/edit.login.php" method="POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-danger btn-block float-right login_btn">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>