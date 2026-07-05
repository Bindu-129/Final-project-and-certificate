<?php
include("session.php");
include("db.php");

// Only Admin can edit posts
if ($_SESSION['role'] != "Admin") {
    die("Access Denied! Only Admin can edit posts.");
}

// Check if ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Request!");
}

$id = (int)$_GET['id'];

// Fetch post details
$stmt = $conn->prepare("SELECT * FROM posts WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Post not found!");
}

$row = $result->fetch_assoc();

// Update post
if (isset($_POST['update'])) {

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
        die("Title should not exceed 100 characters.");
    }

    // Prepared Statement
    $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $content, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Update Failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Blog Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">
            <h3>Edit Blog Post</h3>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Title</label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="<?php echo htmlspecialchars($row['title']); ?>"
                        required
                        maxlength="100">
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>

                    <textarea
                        name="content"
                        class="form-control"
                        rows="6"
                        required><?php echo htmlspecialchars($row['content']); ?></textarea>
                </div>

                <button type="submit" name="update" class="btn btn-warning">
                    Update Post
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>