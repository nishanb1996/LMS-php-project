<?php
include('./includes/db.php');
if (isset($_SESSION['isLogged'])) {

    if (isset($_POST['issue_book'])) {
        $book_id = $_POST['book_id'];
        $student_id = $_POST['student_id'];
        $return_date = $_POST['return_date'];
        $return_date = date('Y-m-d', strtotime($return_date));
        $issue_date = date('Y-m-d');

        $book_issue_qry = mysqli_query($con, "SELECT `id` FROM `book_issue` WHERE `books_id` = ".$book_id."  AND `students_id` = ".$student_id." AND `is_return` = 0 ");

        if(mysqli_num_rows($book_issue_qry) == 0){
            mysqli_query($con, "INSERT INTO `book_issue`(`books_id`, `students_id`, `issue_date`, `return_date`) VALUES (" . $book_id . ", " . $student_id . ", '" . $issue_date . "', '" . $return_date . "'  )");

            $current_qty_qry = mysqli_query($con, "SELECT `current_qty` FROM `books` WHERE `id` = " . $book_id . " ");
            $current_qty_row = mysqli_fetch_assoc($current_qty_qry);
    
            $current_qty = $current_qty_row['current_qty'] - 1;
            mysqli_query($con, "UPDATE `books` SET `current_qty` = " . $current_qty . "  WHERE `id` = " . $book_id . " ");
        }else{

            echo "<script>alert('already Issue')</script>";

        }
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
                    <form action="issue_book.php" method="post">
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

                        <label class="mt-3">Select Student</label>
                        <select class="form-select " name="student_id">
                            <option selected value="0">Select Student</option>
                            <?php
                            $qry_students = mysqli_query($con, "SELECT * FROM `students`");
                            // while($row_students = mysqli_fetch_assoc($qry_students)){
                            //     echo "<option>".$row_students['book_name']."</option>";
                            // }
                            while ($row_students = mysqli_fetch_assoc($qry_students)) {
                            ?>
                                <option value="<?php echo $row_students['id'] ?>"><?php echo $row_students['student_name'] ?></option>
                            <?php } ?>
                        </select>

                        <label class="mt-3">Choose Return Date</label>
                        <input type="date" class="form-select" name="return_date" />

                        <input type="submit" value="Issue Book" id="issue_book" onclick="note()" name="issue_book" class="btn btn-primary mt-3" />
                    </form>
                </div>
                <!-- <input type="submit" id="issue_book" name="issue_book" class="btn btn-primary" /> -->
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