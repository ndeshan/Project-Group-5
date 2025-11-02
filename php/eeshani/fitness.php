<?php
$host = 'localhost';
$dbname = 'healthandfitnesshub';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$errors = [];
$success = false;
$showTips = false;

if (isset($_POST['submit_tip'])) {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $age   = trim($_POST['age'] ?? '');
    $tip   = trim($_POST['tip'] ?? '');

    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email required.";
    if (empty($tip)) $errors[] = "Fitness tip is required.";
    if (strlen($tip) > 300) $errors[] = "Tip must be 300 characters or less.";
    if ($age !== '' && (!is_numeric($age) || $age < 1 || $age > 120)) $errors[] = "Age must be 1–120.";

    if (empty($errors)) {
        $today = date('Y-m-d');
        $sql = "SELECT id FROM fitness_tips WHERE email = ? AND DATE(created_at) = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $today);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) $errors[] = "You've already shared a tip today!";
        mysqli_stmt_close($stmt);
    }

    if (empty($errors)) {
        $sql = "INSERT INTO fitness_tips (name, email, age, tip) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        $age = $age === '' ? null : (int)$age;
        mysqli_stmt_bind_param($stmt, "ssis", $name, $email, $age, $tip);
        if (mysqli_stmt_execute($stmt)) {
            $success = true;
            $showTips = true;
        } else {
            $errors[] = "Database error.";
        }
        mysqli_stmt_close($stmt);
    }
}

$tips = [];
if (isset($_POST['show_tips']) || $showTips) {
    $sql = "SELECT name, email, age, tip, created_at FROM fitness_tips ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) $tips[] = $row;
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Tips – Share & View</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Inter', 'Segoe UI', sans-serif; 
            background: #0f0f0f; 
            color: #e0e0e0; 
            padding: 20px; 
            line-height: 1.6; 
        }
        .container { max-width: 1000px; margin: auto; }
        h1, h2 { text-align: center; color: #ff8c00; margin: 20px 0; font-weight: 700; }
        .box { 
            background: #1a1a1a; 
            padding: 28px; 
            border-radius: 18px; 
            margin-bottom: 30px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.5); 
            border: 1px solid #333; 
        }

        /* Form */
        label { display: block; margin: 14px 0 6px; color: #bbb; font-weight: 600; font-size: 0.95rem; }
        input, textarea {
            width: 100%; padding: 14px; background: #252525; border: 1px solid #444; color: #fff;
            border-radius: 12px; font-size: 16px; margin-bottom: 14px; transition: 0.3s;
        }
        input:focus, textarea:focus { border-color: #ff8c00; outline: none; box-shadow: 0 0 0 3px rgba(255,140,0,0.2); }
        textarea { resize: vertical; min-height: 110px; }

        .btn {
            display: inline-block; padding: 14px 30px; margin: 10px 5px 10px 0; border: none; border-radius: 50px;
            font-weight: 600; cursor: pointer; text-decoration: none; text-align: center; transition: all 0.3s ease;
            font-size: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .btn-full { width: 100%; margin: 12px 0; }
        .btn-submit { background: #ff8c00; color: white; }
        .btn-submit:hover { background: #e67e00; transform: translateY(-3px); box-shadow: 0 8px 25px rgba(255,140,0,0.3); }
        .btn-view { background: #28a745; color: white; }
        .btn-view:hover { background: #218838; transform: translateY(-3px); box-shadow: 0 8px 25px rgba(40,167,69,0.3); }
        .btn-back { background: #4361ee; color: white; padding: 12px 32px; font-size: 15px; }
        .btn-back:hover { background: #3a56d4; transform: translateY(-3px); box-shadow: 0 8px 25px rgba(67,97,238,0.3); }

        .error, .success {
            padding: 14px; border-radius: 12px; margin: 14px 0; font-weight: 500; font-size: 0.95rem;
            border-left: 5px solid;
        }
        .error { background: #330000; color: #ff6b6b; border-color: #ff6b6b; }
        .success { background: #0a2a0a; color: #51cf66; border-color: #51cf66; }

        /* Tips Cards */
        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 22px;
            margin-top: 20px;
        }

        .tip-card {
            background: linear-gradient(135deg, #1f1f1f, #171717);
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
            transition: all 0.4s ease;
            border: 1px solid #333;
            position: relative;
            overflow: hidden;
        }

        .tip-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 5px;
            background: linear-gradient(90deg, #ff8c00, #4361ee);
        }

        .tip-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 35px rgba(255,140,0,0.25);
            border-color: #ff8c00;
        }

        .tip-name {
            font-weight: 700; font-size: 1.15rem; color: #ff8c00; margin-bottom: 8px;
            display: flex; align-items: center; gap: 8px;
        }
        .tip-name::before { content: "Person"; font-size: 16px; }

        .tip-email {
            font-size: 0.9rem; color: #aaa; margin-bottom: 10px;
            display: flex; align-items: center; gap: 6px;
        }
        .tip-email::before { content: "Email"; font-size: 14px; }

        .tip-age {
            font-size: 0.85rem; color: #4ade80; background: rgba(74,222,128,0.15); 
            padding: 4px 10px; border-radius: 20px; display: inline-block; margin-bottom: 14px;
            font-weight: 600;
        }

        .tip-text {
            font-size: 0.98rem; color: #ddd; line-height: 1.7; margin-bottom: 14px;
            word-break: break-word;
        }

        .tip-date {
            font-size: 0.82rem; color: #888; text-align: right;
            display: flex; align-items: center; justify-content: flex-end; gap: 6px;
        }
        .tip-date::before { content: "Calendar"; font-size: 13px; }

        .back-section {
            text-align: center; margin-top: 35px;
        }

        @media (max-width: 600px) {
            .tips-grid { grid-template-columns: 1fr; }
            .btn { padding: 13px 22px; font-size: 15px; }
            .box { padding: 20px; }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Share Your Fitness Tip</h1>

    <div class="box">
        <?php if ($errors): ?>
            <div class="error">
                <?php foreach ($errors as $e) echo "<p>• $e</p>"; ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="success">Thank you! Your tip has been saved.</div>
        <?php endif; ?>

        <form action="" method="POST">
            <label>Your Name:</label>
            <input type="text" name="name" required value="<?=htmlspecialchars($_POST['name']??'')?>">

            <label>Your Email:</label>
            <input type="email" name="email" required value="<?=htmlspecialchars($_POST['email']??'')?>">

            <label>Your Age (optional):</label>
            <input type="number" name="age" min="1" max="120" value="<?=htmlspecialchars($_POST['age']??'')?>">

            <label>Fitness Tip (max 300 chars):</label>
            <textarea name="tip" rows="4" maxlength="300" required><?=htmlspecialchars($_POST['tip']??'')?></textarea>

            <button type="submit" name="submit_tip" class="btn btn-full btn-submit">Submit Tip</button>
        </form>

        <form action="" method="POST">
            <button type="submit" name="show_tips" class="btn btn-full btn-view">View All Tips</button>
        </form>
    </div>

    <?php if ($tips): ?>
    <div class="box">
        <h2>Community Fitness Tips</h2>
        <div class="tips-grid">
            <?php foreach ($tips as $t): ?>
            <div class="tip-card">
                <div class="tip-name"><?=htmlspecialchars($t['name'])?></div>
                <div class="tip-email"><?=htmlspecialchars($t['email'])?></div>
                <span class="tip-age">Age: <?= $t['age'] ?? '—' ?></span>
                <div class="tip-text"><?=nl2br(htmlspecialchars($t['tip']))?></div>
                <div class="tip-date"><?=date('M j, Y • g:i A', strtotime($t['created_at']))?></div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="back-section">
            <a href="fitness_Tips.html" class="btn btn-back">Back to Main Page</a>
        </div>
    </div>
    <?php endif; ?>
</div>
</body>
</html>