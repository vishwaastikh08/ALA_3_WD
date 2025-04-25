<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Book - BookVault</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



    <h1>Add a New Book to the Vault 📚</h1>
    <form method="POST" action="">
        <label>Title:</label><input type="text" name="title" required><br>
        <label>Author:</label><input type="text" name="author" required><br>
        <label>Genre:</label><input type="text" name="genre"><br>
        <label>Published Year:</label><input type="number" name="year"><br>
        <button type="submit" name="submit">⚡ Add Book</button>
        <a href="index.php" class="btn">🔙 Back</a>
    </form>
    
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    $sql = "INSERT INTO books (title, author, genre, published_year) VALUES ('$title', '$author', '$genre', '$year')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('🪄 Book added successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
