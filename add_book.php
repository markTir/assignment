<?php
if (!isset($_SESSION['username'])) {
    header("Location: index.php?menu=login");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $username = $_SESSION['username'];

    
    $sql = "INSERT INTO books (user_name, book_name, category) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $title, $category);

 
    if ($stmt->execute() === FALSE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    $stmt->close();
    
    header("Location: index.php?menu=book_list");
    exit;
}
include 'header.php';
?>

<h2>Add Book</h2>
<form action="index.php?menu=add_book" method="post">
    <div>
        <label for="title" style="color:white">Book Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <br>
    <div>
        <label for="category" style="color:white">Category:</label>
        <select id="category" name="category" required>
            <option value="Present">Watching</option>
            <option value="Past">Watched</option>
            <option value="Future">To Watch</option>
        </select>
    </div>
    <br>
    <div>
        <input type="submit" value="Add Book">
    
        <button onclick="window.location.href='index.php'">Go to Home Page</button>
    </div>
</form>

<?php include 'footer.php'; ?>
