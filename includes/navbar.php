<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./dashboard.php">Library Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./dashboard.php">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Books
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./add_book.php">Add Book</a></li>
                        <li><a class="dropdown-item" href="./book_list.php">View Book List</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Students
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./add_student.php">Add Student</a></li>
                        <li><a class="dropdown-item" href="./student_list.php">View Student List</a></li>
                    </ul>

                <li class="nav-item">
                    <a class="nav-link "  aria-labelledby="page" href="./issue_book.php">Issue Books</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link "  aria-labelledby="page" href="./return_book.php">Return Books</a>
                </li>

                </li>
            </ul>
            <div class="d-flex">
                <a class="nav-link active text-white" aria-current="page" href="./logout.php">Logout</a>

            </div>
        </div>
    </div>
</nav>