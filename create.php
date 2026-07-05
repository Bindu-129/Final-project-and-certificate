<?php
include("session.php");

if ($_SESSION['role'] != "Admin") {
    die("Access Denied! Only Admin can create posts.");
}

include("db.php");

if (isset($_POST['submit'])) {

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    // Validation
    if (empty($title)) {
        die("Title is required.");
    }

    if (empty($content)) {
        die("Content is required.");
    }

    if (strlen($title) > 100) {
        die("Title must be less than 100 characters.");
    }

    // Insert using Prepared Statement
    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h3>Add New Blog Post</h3>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Title</label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        required
                        minlength="5"
                        maxlength="100">
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>

                    <textarea
                        name="content"
                        class="form-control"
                        rows="5"
                        required
                        minlength="10"
                        maxlength="1000"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-success">
                    Save Post
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>