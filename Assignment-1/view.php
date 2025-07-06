<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Records | View Students</title>
    <meta name="description" content="View student records using OOP PHP" />
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
                <img src="./img/logo.jpeg" alt="Student Records Logo" height="30" />
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Add Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="view.php">View Students</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="container my-4">
    <h1 class="text-center mb-4">Student Records</h1>

    <?php
    include_once './class/crud.php';
    $crud = new crud();
    $query = "SELECT * FROM students";
    $result = $crud->getData($query);
    ?>

    <!-- Flash Message -->
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success text-center">
            <?= htmlspecialchars($_GET['message']) ?>
        </div>
    <?php endif; ?>

    <?php if ($result && count($result) > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($result as $res): ?>
                    <tr>
                        <td><?= htmlspecialchars($res['name']) ?></td>
                        <td><?= htmlspecialchars($res['email']) ?></td>
                        <td><?= htmlspecialchars($res['course']) ?></td>
                        <td><?= htmlspecialchars($res['grade']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $res['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $res['id'] ?>" class="btn btn-sm btn-danger"
                               onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">No student records found.</div>
    <?php endif; ?>
</main>
</body>
</html>
