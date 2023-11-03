<?php
include('./includes/db.php');
if (isset($_SESSION['isLogged'])) {

    if(isset($_GET['book_issue_id'])){
        mysqli_query($con, "UPDATE `book_issue` SET `is_return` = 1 WHERE `id` = ".$_GET['book_issue_id']." ");
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Return Book</title>
        <link href="./img/icon.jpg" rel="icon" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body class="d-flex flex-column" style="height: 100vh;">

        <?php include('./includes/navbar.php'); ?>

        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="return_book.php" method="post">
                        <label>Select Book</label>
                        <select class="form-select" name="book_id">
                            <option selected value="0">Select Book</option>
                            <?php
                            $qry_books = mysqli_query($con, "SELECT * FROM `books`");
                            // while($row_books = mysqli_fetch_assoc($qry_books)){
                            //     echo "<option>".$row_books['book_name']."</option>";
                            // }
                            while ($row_books = mysqli_fetch_assoc($qry_books)) {
                            ?>
                                <option value="<?php echo $row_books['id'] ?>"><?php echo $row_books['book_name'] ?></option>
                            <?php } ?>
                        </select>

                        <input type="submit" id="check_issue_book_list" name="check_issue_book_list" class="btn btn-primary mt-2" />

                    </form>
                </div>
                <!-- <input type="submit" id="return_book" name="return_book" class="btn btn-primary" /> -->
            </div>

            <div class="row mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SR No</th>
                            <th>Book Name</th>
                            <th>Student Name</th>
                            <th>Return Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['check_issue_book_list'])) {

                            $book_id = $_POST['book_id'];

                            $book_issue_qry = mysqli_query($con, "SELECT `id`,`books_id`,`students_id`,`return_date` FROM `book_issue` WHERE `books_id` = " . $book_id . "  AND `is_return` = 0 ");

                            while ($book_issue_row = mysqli_fetch_assoc($book_issue_qry)) {

                                $book_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT `book_name` FROM `books` WHERE `id` =  " . $book_issue_row['books_id'] . " "));
                                $student_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT `student_name` FROM `students` WHERE `id` =  " . $book_issue_row['students_id'] . " "));
                        ?>
                                <tr>
                                    <td><?php echo 1 ?></td>
                                    <td><?php echo $book_name['book_name'] ?></td>
                                    <td><?php echo $student_name['student_name'] ?></td>
                                    <td><?php echo $book_issue_row['return_date'] ?></td>
                                    <td>
                                        <a href="return_book.php?book_issue_id=<?php echo $book_issue_row['id'] ?>" class="btn btn-danger">Return Book</a>
                                    </td>
                                </tr>
                        <?php

                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>


        </div>
        <?php include('./includes/footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    <script>
        function note() {
            alert("Book Returned");
        }
    </script>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>