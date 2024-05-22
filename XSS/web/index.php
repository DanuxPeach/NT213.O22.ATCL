<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XSS Example</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Post a Comment</h1>
    <form action="php/xss.php" method="POST">
        <textarea name="comment"></textarea>
        <button type="submit">Submit</button>
    </form>
    <h2>Comments</h2>
    <?php
        $servername = "mysql"; 
        $username = getenv('MYSQL_USER');
        $password = getenv('MYSQL_PASSWORD');
        $dbname = getenv('MYSQL_DATABASE');

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $result = $conn->query("SELECT comment FROM comments");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row['comment'] . "</p>";
            }
        } else {
            echo "No comments found.";
        }

        $conn->close();
    ?>
</body>
</html>
