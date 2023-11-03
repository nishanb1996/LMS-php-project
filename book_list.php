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
        <title>Document</title>
        <link href="./img/icon.jpg" rel="icon" />
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body class="d-flex flex-column" style="height: 100vh;">

        <?php include('./includes/navbar.php'); ?>

        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-12">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Actual Qty</th>
                                <th scope="col">Current Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- SELECT * FROM `books` WHERE 1; -->
                            <?php
                            $books_qry = mysqli_query($con, "SELECT * FROM `books`");

                            while ($books_row = mysqli_fetch_assoc($books_qry)) {
                            ?>

                                <tr>
                                    <td><?php echo $books_row['id'] ?></td>
                                    <td><?php echo $books_row['book_name'] ?></td>
                                    <td><?php echo $books_row['isbn'] ?></td>
                                    <td><?php echo $books_row['actual_qty'] ?></td>
                                    <td><?php echo $books_row['current_qty'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>
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