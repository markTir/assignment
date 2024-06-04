<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password_hash FROM users WHERE user_name = ?";
    
    $stmt = $conn->prepare($sql);


    $stmt->bind_param("s", $username);


    if ($stmt->execute()) {

        $stmt->bind_result($hashedPassword);
        

        if ($stmt->fetch()) {

            if (password_verify($password, $hashedPassword)) {

                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        } else {

            $error = "Invalid username or password.";
        }
    } else {

        $error = "Error executing SQL statement: " . $stmt->error;
    }

    $stmt->close();
}
include 'header.php';
?>


<h2>Log In</h2>
<form action="index.php?menu=login" method="post">
    <div>
        <label for="username" style="color:white">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <br>
    <div>
        <label for="password" style="color:white">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <br>
    <div>
        <input type="submit" value="Log In">
        <button onclick="window.location.href='index.php'">Go to Home Page</button>
    </div>
</form>
<?php if (isset($error)) : ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

<?php include 'footer.php'; ?>
