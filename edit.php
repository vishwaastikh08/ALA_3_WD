<?php include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
$book = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book - BookVault</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



    <h1>Edit Spell for Book ID: <?php echo $id; ?> 🪄</h1>
    <form method="POST" action="">
        <label>Title:</label><input type="text" name="title" value="<?php echo $book['title']; ?>" required><br>
        <label>Author:</label><input type="text" name="author" value="<?php echo $book['author']; ?>" required><br>
        <label>Genre:</label><input type="text" name="genre" value="<?php echo $book['genre']; ?>"><br>
        <label>Published Year:</label><input type="number" name="year" value="<?php echo $book['published_year']; ?>"><br>
        <button type="submit" name="update">🧙 Update Book</button>
        <a href="index.php" class="btn">🔙 Back</a>
    </form>
 

</body>
</html>

<?php
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    $sql = "UPDATE books SET title='$title', author='$author', genre='$genre', published_year='$year' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('✨ Book updated!'); window.location='index.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
