<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Page</title>
    <!-- Bootstrap 5 CSS -->
    <link href="assets/bootstrap-5.3.0/dist/css/bootstrap.min.css" <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark-subtle">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
                <img class="mb-5" src="assets/assets/img/logo.png" width="800px" height="250px">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <form action="/auth-login" method="POST">
                                <?= csrf_field(); ?>
                                <div class="form-floating mb-3">
                                    <input class="shadow bg-body rounded-4 form-control" type="email" name="Email" placeholder="name@example.com" autofocus>
                                    <label for="inputEmail">E-mail Address</label>
                                </div>
                                <div class="form-floating mb-5">
                                    <input class="shadow bg-body rounded-4 form-control" type="password" name="Password" placeholder="Password">
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="shadow col-lg-8 btn btn-success btn-lg rounded-pill">
                                        <i class="fa fa-sign-in"></i>
                                        <span>Login</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>