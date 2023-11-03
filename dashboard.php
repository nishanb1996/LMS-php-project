<?php
include('./includes/db.php');
if (isset($_SESSION['isLogged'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMS</title>
        <link href="./img/icon.jpg" rel="icon" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body class="d-flex flex-column" style="height: 100vh;">

        <?php include('./includes/navbar.php'); ?>

        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-sm-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <?php
                            $books_qry = mysqli_query($con, "SELECT * FROM `books`");
                            $books_num = mysqli_num_rows($books_qry)
                            ?>
                            <h5 class="card-title"><?php echo $books_num; ?></h5>
                            <p class="card-text">No Of Books</p>
                            <a href="#" class="btn btn-dark">Go </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <?php
                            $students_qry = mysqli_query($con, "SELECT * FROM `students`");
                            $students_num = mysqli_num_rows($students_qry)
                            ?>
                            <h5 class="card-title"><?php echo $students_num; ?></h5>
                            <p class="card-text">No of User</p>
                            <a href="#" class="btn btn-dark">Go </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <?php
                            $book_issue_num = mysqli_num_rows(mysqli_query($con, "SELECT `id` FROM `book_issue` WHERE `is_return` = 0"));
                            ?>
                            <h5 class="card-title"><?php echo $book_issue_num ?></h5>
                            <p class="card-text">No of issue book</p>
                            <a href="#" class="btn btn-dark">Go </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('./includes/footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>