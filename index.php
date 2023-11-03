<?php
include('./includes/db.php');

if (isset($_SESSION['isLogged'])) {
    header("Location: dashboard.php");
} else {
    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $admin_qry = mysqli_query($con, 'SELECT * FROM `admin` WHERE `email` = "' . $email . '" AND `password` = "' . $password . '" ');

        $num_admin = mysqli_num_rows($admin_qry);

        if ($num_admin == 1) {
            $_SESSION['isLogged'] = true;
            header("Location: dashboard.php");
        } else {
            header("Location: index.php");
        }
    }



    // echo $num_admin;

    // $row_admin = mysqli_fetch_assoc($admin_qry);

    // echo $row_admin['name'];


}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="./index.php" method="post">
                    <img class="mb-4" src="./img/logo.jpg" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                        <span id="emailMsg"></span>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                        <span id="passwordMsg"></span>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <input class="w-100 btn btn-lg btn-primary" type="submit" name="signin" value="Sign in">
                    <p class="mt-5 mb-3 text-muted">© 2021–2022</p>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let email = document.getElementById('email')
        let emailMsg = document.getElementById('emailMsg')
        email.addEventListener('keyup', function() {
            // console.log('kkkk')
            let emailRegExp = /^[a-z._0-9]{3,}[@]{1}[a-z]{3,9}[.]{1}[a-z.]{2,6}$/gm;

            if (emailRegExp.test(email.value)) {
                emailMsg.innerText = 'Valid Email Address';
                emailMsg.setAttribute('class', 'text-success')
            } else {
                emailMsg.innerText = 'Invalid Email Address';
                emailMsg.setAttribute('class', 'text-danger')
            }
        })


        let password = document.getElementById('password')
        let passwordMsg = document.getElementById('passwordMsg')
        password.addEventListener('keyup', function() {
            // console.log('kkkk')
            let passwordRegExp = /^[A-Za-z!@#%&]{1,8}/;

            if (passwordRegExp.test(password.value)) {
                passwordMsg.innerText = 'Valid password ';
                passwordMsg.setAttribute('class', 'text-success')
            } else {
                passwordMsg.innerText = 'Invalid password ';
                passwordMsg.setAttribute('class', 'text-danger')
            }
        })
    </script>
</body>

</html>