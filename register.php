<?php
include("db.php");

if(isset($_POST['register'])){

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username already exists
    $check = $conn->prepare("SELECT id FROM users WHERE username=?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if($result->num_rows > 0){
        echo "Username already exists!";
    } else {

        // Insert user
        $stmt = $conn->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
        $stmt->bind_param("sss",$username,$email,$hashedPassword);

        if($stmt->execute()){
            echo "Registration Successful!";
        }else{
            echo "Registration Failed!";
        }
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit" name="register">Register</button>
</form>