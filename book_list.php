<?php
include 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php?menu=login");
    exit;
}

$username = $_SESSION['username'];

$sql = "SELECT book_name, category FROM books WHERE user_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    ?>
    <div class="container">
        <h2>My Book List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="color:white">Title</th>
                    <th style="color:white">Category</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td style="color:white"><?php echo htmlspecialchars($row['book_name']); ?></td>
                        <td style="color:white"><?php echo htmlspecialchars($row['category']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    echo "Error executing SQL statement: " . $stmt->error;
}

$stmt->close();

?>
<br>
<button onclick="window.location.href='index.php'">Go to Home Page</button>
<?php
include 'footer.php';
?>
