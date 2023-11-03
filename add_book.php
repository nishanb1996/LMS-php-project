<?php
include('./includes/db.php');
if (isset($_SESSION['isLogged'])) {

    if(isset($_POST['add_book'])){
        $book_name = $_POST['book_name'];
        $isbn = $_POST['isbn'];
        $actual_qty = $_POST['actual_qty'];

        mysqli_query($con, "INSERT INTO `books`( `book_name`, `isbn`, `actual_qty`, `current_qty`) VALUES ('".$book_name."','".$isbn."',".$actual_qty.",".$actual_qty." )
        ");
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Book</title>
        <link href="./img/icon.jpg" rel="icon" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
    
    </head>

    <body class="d-flex flex-column" style="height: 100vh;">

        <?php include('./includes/navbar.php'); ?>

        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="add_book.php" method="post">
                        <div class="mb-3">
                            <label for="book_name">Book Name</label>
                            <input type="text" name="book_name" id="book_name" placeholder="Enter Book Name" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="isbn">ISBN</label>
                            <input type="text" name="isbn" id="isbn" placeholder="Enter ISBN" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="actual_qty">Qty</label>
                            <input type="number" name="actual_qty" id="actual_qty" placeholder="Enter Quntity" class="form-control" />
                        </div>

                        <input type="submit" id="add_book" name="add_book" class="btn btn-primary" />
                    </form>
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