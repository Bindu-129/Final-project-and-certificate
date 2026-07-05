<?php
include("session.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }

        .container{
            width:500px;
            margin:80px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
            text-align:center;
        }

        a{
            display:block;
            margin:15px 0;
            padding:12px;
            background:#007BFF;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }

        a:hover{
            background:#0056b3;
        }
    </style>

</head>

<body>

<div class="container">

    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>

    <p><strong>Role:</strong> <?php echo $_SESSION['role']; ?></p>

    <?php
    if($_SESSION['role']=="Admin"){
    ?>
        <a href="create.php">Create Blog</a>
    <?php
    }
    ?>

    <a href="index.php">View Blogs</a>

    <a href="logout.php">Logout</a>

</div>

</body>
</html>