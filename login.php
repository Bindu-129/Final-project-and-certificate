<?php
session_start();
include("db.php");

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepared statement to fetch password and role
    $stmt = $conn->prepare("SELECT password, role FROM users WHERE username=?");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {

            // Store session variables
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            header("Location: dashboard.php");
            exit();

        } else {
            echo "<script>alert('Invalid Password!');</script>";
        }

    } else {
        echo "<script>alert('User not found!');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow mx-auto" style="max-width:400px;">

        <div class="card-header bg-primary text-white text-center">
            <h3>Login</h3>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Username</label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required>
                </div>

                <button
                    type="submit"
                    name="login"
                    class="btn btn-primary w-100">
                    Login
                </button>

                <div class="text-center mt-3">
                    <a href="register.php">Don't have an account? Register</a>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>