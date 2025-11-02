<?php
include 'conn.php';
mysqli_select_db($conn, 'healthandfitnesshub');

$createTable = "CREATE TABLE IF NOT EXISTS Diet_Plans (
    Plan_id INT AUTO_INCREMENT PRIMARY KEY,
    User_name VARCHAR(100),
    Goal VARCHAR(100),
    Diet_type VARCHAR(100),
    Duration VARCHAR(50),
    Food_preference VARCHAR(100)
)";
$conn->query($createTable);

$message = ""; 

if (isset($_POST['submit'])) {
    $user_name = trim($_POST['user_name']);
    $goal = trim($_POST['goal']);
    $diet_type = trim($_POST['diet_type']);
    $duration = trim($_POST['duration']);
    $food_preference = trim($_POST['food_preference']);

    if (empty($user_name)) {
        $message = "<div class='error-box'>Please enter your name.</div>";
    } 
    elseif (!preg_match("/^[a-zA-Z ]+$/", $user_name)) {
        $message = "<div class='error-box'>Please enter a valid name (letters and spaces only).</div>";
    } 
    elseif (empty($goal)) {
        $message = "<div class='error-box'>Please enter your goal.</div>";
    } 
    elseif (!preg_match("/^[a-zA-Z ]+$/", $goal)) {
        $message = "<div class='error-box'>Invalid Goal: Only letters and spaces are allowed.</div>";
    } 
    elseif (empty($diet_type)) {
        $message = "<div class='error-box'>Please enter the diet type.</div>";
    } 
    else {
    
        $stmt = $conn->prepare("INSERT INTO Diet_Plans (User_name, Goal, Diet_type, Duration, Food_preference)
        VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $user_name, $goal, $diet_type, $duration, $food_preference);

        if ($stmt->execute()) {
            $message = "<div class='success-box'>Diet Plan Added Successfully!</div>";
        } else {
            $message = "<div class='error-box'>Error: " . htmlspecialchars($conn->error) . "</div>";
        }

        $stmt->close();
    }
}

$result = $conn->query("SELECT * FROM Diet_Plans");
?>

<html>
<head>
<title>Saved Diet Plans | NutriAura</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #ffe5c4, #fff8f0);
    min-height: 100vh;
    padding: 40px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  h2 {
    color: #8b4513;
    font-size: 2.2rem;
    margin-bottom: 25px;
    text-align: center;
    letter-spacing: 1px;
    background: linear-gradient(90deg, #ffb988, #ffd8b2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .success-box, .error-box {
    padding: 12px 20px;
    border-radius: 12px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: 500;
    width: 100%;
    max-width: 600px;
  }

  .success-box {
    background: rgba(255, 209, 164, 0.25);
    color: #7a4a00;
    border: 1px solid #e3b77a;
  }

  .error-box {
    background: rgba(255, 150, 120, 0.25);
    color: #a94442;
    border: 1px solid #e67e73;
  }

  .plans-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
    gap: 25px;
    max-width: 1100px;
    width: 100%;
    margin-bottom: 40px;
  }

  .plan-card {
    position: relative;
    color: #ff4d4d; 
    text-transform: uppercase;
    font-size: 26px;
    background: rgba(255, 248, 240, 0.7);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 8px 20px rgba(255, 193, 158, 0.3);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    border: 1px solid rgba(255, 209, 164, 0.6);
  }

  .plan-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(255, 180, 120, 0.35);
  }

  .user-name {
    font-size: 1.3rem;
    font-weight: 600;
    color: #b35c00;
    margin-bottom: 10px;
    border-bottom: 2px solid rgba(255, 160, 100, 0.3);
    padding-bottom: 5px;
  }

  .plan-info {
    font-size: 0.95rem;
    color: #5a4636;
    margin: 8px 0;
  }

  .plan-info strong {
    color: #cc7722;
  }

  .no-data {
    text-align: center;
    color: #9a7b5a;
    font-size: 1.1rem;
    margin-top: 40px;
  }

  .back-btn {
    display: inline-block;
    background: linear-gradient(90deg, #ffb988, #ffe5c4);
    color: #5a3c1a;
    text-decoration: none;
    padding: 12px 28px;
    border-radius: 14px;
    font-weight: 600;
    font-size: 1rem;
    box-shadow: 0 6px 14px rgba(255, 185, 136, 0.3);
    transition: all 0.3s ease;
    margin-top: 20px;
  }

  .back-btn:hover {
    background: linear-gradient(90deg, #ffe5c4, #ffb988);
    transform: translateY(-3px);
    box-shadow: 0 8px 18px rgba(255, 200, 160, 0.4);
  }

  footer {
    margin-top: 50px;
    text-align: center;
    color: #a67c52;
    font-size: 0.9rem;
  }
</style>
</head>
<body>

<h2>Saved Diet Plans</h2>


<?php if (!empty($message)) echo $message; ?>

<div class="plans-container">
  <?php
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "
          <div class='plan-card'>
            <div>" . htmlspecialchars($row['Diet_type']) . "</div>
            <div class='plan-info'><strong>User Name:</strong> " . htmlspecialchars($row['User_name']) . "</div>
            <div class='plan-info'><strong>Goal:</strong> " . htmlspecialchars($row['Goal']) . "</div>
            <div class='plan-info'><strong>Duration:</strong> " . htmlspecialchars($row['Duration']) . "</div>
            <div class='plan-info'><strong>Food Preference:</strong> " . htmlspecialchars($row['Food_preference']) . "</div>
          </div>";
      }
  } else {
      echo "<div class='no-data'>No diet plans found yet</div>";
  }
  ?>
</div>

<a href="Diet_and_Nutrition.html" class="back-btn">← Back to Diet & Nutrition</a>

</body>
</html>
