<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Records | Add Student</title>
    <meta name="description" content="Add student using OOP PHP">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>

<?php include_once('includes/header.php'); ?>

<main class="container mt-5">
    <h2 class="mb-4">Add Student Record</h2>

    <?php
    include_once('./class/crud.php');
    include_once('./class/validate.php');

    $crud = new Crud();
    $valid = new Validate();

    if (isset($_POST['submit'])) {
        $name   = $crud->escape_string($_POST['name']);
        $email  = $crud->escape_string($_POST['email']);
        $course = $crud->escape_string($_POST['course']);
        $grade  = $crud->escape_string($_POST['grade']);

        // Validate required fields
        $msg = $valid->checkEmpty($_POST, array('name', 'email', 'course', 'grade'));
        $checkEmail = $valid->validEmail($email);
        $checkGrade = $valid->validGrade($grade) && $grade >= 0 && $grade <= 100;

        if ($msg != null) {
            echo "<div class='alert alert-danger'>$msg</div>";
        } elseif (!$checkEmail) {
            echo "<div class='alert alert-danger'>Invalid email format.</div>";
        } elseif (!$checkGrade) {
            echo "<div class='alert alert-danger'>Grade must be a number between 0 and 100.</div>";
        } else {
            $result = $crud->execute("INSERT INTO students(name, email, course, grade) VALUES ('$name', '$email', '$course', '$grade')");
            echo "<div class='alert alert-success'>Student added successfully.</div>";
            echo "<a href='view.php' class='btn btn-primary'>View All Students</a>";
        }
    }
    ?>

    <!-- HTML Form -->
    <form method="post" action="add.php" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Student Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" name="course" id="course" required>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="number" class="form-control" name="grade" id="grade" required min="0" max="100">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Add Student</button>
    </form>
</main>

<?php include_once('includes/footer.php'); ?>

</body>
</html>

