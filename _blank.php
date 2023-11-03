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
        
    <?php include('./includes/navbar.php');?>

        <div class="container">
            <div class="row mt-5 mb-5">
                
            </div>
        </div>

    <?php include('./includes/footer.php');?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>