<?php
include('./includes/db.php');
if (isset($_SESSION['isLogged'])) {

    if (isset($_POST['add_student'])) {
        $student_name = $_POST['student_name'];
        $mobile_no = $_POST['mobile_no'];


        mysqli_query($con, "INSERT INTO `students`( `student_name`, `mobile_no`) VALUES ('" . $student_name . "'," . $mobile_no . " )
        ");
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">  
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add student</title>
        <link href="./img/icon.jpg" rel="icon" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body class="d-flex flex-column" style="height: 100vh;">

        <?php include('./includes/navbar.php'); ?>

        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="add_student.php" method="post">
                        <div class="mb-3">
                            <label for="student_name">Student Name</label>
                            <input type="text" name="student_name" id="student_name" placeholder="Enter student Name" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="mobile_no">Mobile_no</label>
                            <input type="text" name="mobile_no" id="mobile_no" placeholder="Enter mobile_no" class="form-control" />
                         <span id="mobile_msg"></span>
                        </div>

                        <input type="submit" id="add_student" name="add_student" class="btn btn-primary" />
                    </form>
                </div>

            </div>
        </div>

        <?php include('./includes/footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            let mobile = document.getElementById('mobile_no')
            let mobile_msg = document.getElementById('mobile_msg')
            mobile.addEventListener('keyup', function() {
                // console.log('kkkk')
                let mobileRegExp = /^[6789][0-9]{9}$/gm;

                if (mobileRegExp.test(mobile.value)) {
                    mobile_msg.innerText = 'Valid mobile Address';
                    mobile_msg.setAttribute('class', 'text-success')
                } else {
                    mobile_msg.innerText = 'Invalid mobile Address';
                    mobile_msg.setAttribute('class', 'text-danger')
                }
            })
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>