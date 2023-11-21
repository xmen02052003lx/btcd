<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $keyword = $_POST['keyword'];
    $keyword = "%$keyword%";

    $sql = "SELECT * FROM posts WHERE title LIKE ? OR body LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $keyword, $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>{$row['title']}</h3>";
            echo "<p>{$row['body']}</p>";
            echo "</div>";
        }
    } else {
        echo "No results found.";
    }

    $conn->close();
}
?>
