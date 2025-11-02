<?php
include('binoy_conn.php');

// --- DELETE operation ---
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $conn->query("DELETE FROM contact_us WHERE id=$id");
    header("Location: cntact_retrive.php");
    exit;
}

// --- UPDATE operation ---
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comment = $_POST['comment'];

    $sql = "UPDATE contact_us 
            SET name='$name', email='$email', phone='$phone', comment='$comment'
            WHERE id=$id";
    $conn->query($sql);
    header("Location: cntact_retrive.php");
    exit;
}

// --- SEARCH operation ---
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM contact_us 
            WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' 
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM contact_us ORDER BY id DESC";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Contact Data</title>
<style>
    body { font-family: Arial, sans-serif; background: #f7f7f7; padding: 20px; }
    h2 { color: #333; }
    form.search-box { margin-bottom: 20px; }
    input[type="text"], input[type="email"], textarea { width: 100%; padding: 6px; margin: 5px 0; }
    .card { background: white; padding: 15px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
    .btn { padding: 6px 10px; border: none; border-radius: 5px; cursor: pointer; }
    .btn-delete { background: red; color: white; }
    .btn-update { background: green; color: white; }
    .btn-search { background: dodgerblue; color: white; }
</style>
</head>
<body>

<h2>Search / Update / Delete Contacts</h2>

<!-- Search Box -->
<form method="post" action="" class="search-box">
    <input type="text" name="search" placeholder="Search by name, email or number..." value="<?= htmlspecialchars($search) ?>">
    <button type="submit" class="btn btn-search">Search</button>
</form>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card">
            <form method="post" action="">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <label><strong>Name:</strong></label>
                <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>">

                <label><strong>Email:</strong></label>
                <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>">

                <label><strong>Phone:</strong></label>
                <input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>">

                <label><strong>Comment:</strong></label>
                <textarea name="comment"><?= htmlspecialchars($row['comment']) ?></textarea>

                <button type="submit" name="update" class="btn btn-update">Update</button>

                <!-- DELETE as POST button -->
                <button type="submit" name="delete" value="<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Delete this record?');">Delete</button>
            </form>
        </div>
        <?php
    }
} else {
    echo "<p>No data found.</p>";
}
$conn->close();
?>

</body>
</html>
