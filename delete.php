<?php
include 'session.php';
?>
<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] != "Admin") {
    die("Access Denied! Only Admin can delete posts.");
}

include("db.php");

// Check if id exists
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    // Prepared Statement
    $stmt = $conn->prepare("DELETE FROM posts WHERE id=?");

    $stmt->bind_param("i", $id);

    $stmt->execute();
}

header("Location: index.php");
exit();

?>