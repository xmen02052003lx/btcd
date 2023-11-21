<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $keyword = $_GET['keyword'];
    $keyword = "%$keyword%";

    $sql = "SELECT * FROM posts WHERE title LIKE ? LIMIT 6";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();


    if ($result->num_rows > 0) {
        echo '<ul class="suggestion-list">';
        while ($row = $result->fetch_assoc()) {

            echo '<li class="suggestion-item">';
            echo '<a href="#" data-post-id="' . $row['id'] . '">' . $row['title'] . '</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<div class="no-results">No suggestions found.</div>';
    }
    $conn->close();
}
?>
