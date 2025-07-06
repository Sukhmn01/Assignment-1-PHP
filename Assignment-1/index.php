<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Records | Add Student</title>
    <meta name="description" content="Add student records with grades using OOP PHP" />
    <meta name="robots" content="noindex, nofollow" />
    <!--  CSS -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto&display=swap" rel="stylesheet" />
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php">
                <img src="./img/logo.jpeg" alt="Student Records Logo" height="40" class="me-2" />
                Student Records
            </a>
            <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Add Student</a></li>
                    <li class="nav-item"><a class="nav-link" href="view.php">View Students</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section class="masthead text-center my-4">
    <div class="container">
        <h1>Add Student Record</h1>
        <p class="lead">Use the form below to add new student information</p>
    </div>
</section>

<main class="container">
    <section class="row justify-content-center">
        <form action="add.php" method="post" class="col-md-6">
            <!-- PHP feedback message here -->
            <?php if (isset($msg)) echo $msg; ?>

            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required />
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <input type="text" class="form-control" id="course" name="course" placeholder="Course name" required />
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <input
                        type="number"
                        class="form-control"
                        id="grade"
                        name="grade"
                        min="0"
                        max="100"
                        placeholder="0 - 100"
                        required
                />
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Add Student</button>
            <button type="reset" class="btn btn-secondary ms-2">Clear</button>
        </form>
    </section>
</main>
</body>
</html>
