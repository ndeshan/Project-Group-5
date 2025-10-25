<?php

$bmiDisplay = '';
$status = '';
$guideline = '';
$ageVal = '';
$weightVal = '';
$heightVal = '';
$genderVal = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
   $genderVal = isset($_POST['gender']) ? $_POST['gender'] : '';

   
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    if ($weight > 0 && $height > 0) {
        $heightM = $height / 100.0;
        $bmi = $weight / ($heightM * $heightM);
        $bmiDisplay = number_format($bmi, 2);

      
        $gender = strtolower($genderVal ?? '');
        
        if ($age === null) { $age = 30; }

        
        $fmtDiff = function($targetWeight, $currentWeight) {
            $diff = $currentWeight - $targetWeight;
            return number_format(abs($diff), 2);
        };

       
        if ($gender === 'male') {
            if ($age < 19) {
                if ($bmi < 18.5) {
                    $status = 'You are Underweight as a under 19 male';
                    $target = 18.5 * ($heightM * $heightM);
                    $guideline = 'You have to increase your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
                    $status = 'You are Healthy as a under 19 male male';
                    $guideline = '';
                } elseif ($bmi >= 25 && $bmi <= 29.9) {
                    $status = 'You are Overweight as a under 19 male';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } else {
                    $status = 'You are Obese as a under 19 male';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                }
            } elseif ($age >= 19 && $age <= 40) {
                if ($bmi < 18.5) {
                    $status = 'You are Underweight as a young male';
                    $target = 18.5 * ($heightM * $heightM);
                    $guideline = 'You have to increase your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
                    $status = 'You are Healthy as a young male';
                    $guideline = '';
                } elseif ($bmi >= 25 && $bmi <= 29.9) {
                    $status = 'You are Overweight as a young male';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } else {
                    $status = 'You are Obese as a young male';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                }
            } else {
                if ($bmi < 18.5) {
                    $status = 'You are Underweight as a adult male';
                    $target = 18.5 * ($heightM * $heightM);
                    $guideline = 'You have to increase your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
                    $status = 'You are Healthy as a adult male';
                    $guideline = '';
                } elseif ($bmi >= 25 && $bmi <= 29.9) {
                    $status = 'You are Overweight as a adult male';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } else {
                    $status = 'You are Obese as a adult male';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                }
            }
        } else {
           
            if ($age < 19) {
                if ($bmi < 18.5) {
                    $status = 'You are Underweight as a under 19 female';
                    $target = 18.5 * ($heightM * $heightM);
                    $guideline = 'You have to increase your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
                    $status = 'You are Healthy as a under 19 female';
                    $guideline = '';
                } elseif ($bmi >= 25 && $bmi <= 29.9) {
                    $status = 'You are Overweight as a under 19 female';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } else {
                    $status = 'You are Obese as a under 19 female';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                }
            } elseif ($age >= 19 && $age <= 40) {
                if ($bmi < 18.5) {
                    $status = 'You are Underweight as a young female';
                    $target = 18.5 * ($heightM * $heightM);
                    $guideline = 'You have to increase your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
                    $status = 'You are Healthy as a young female';
                    $guideline = '';
                } elseif ($bmi >= 25 && $bmi <= 29.9) {
                    $status = 'You are Overweight as a young female';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } else {
                    $status = 'You are Obese as a young female';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                }
            } else {
                if ($bmi < 18.5) {
                    $status = 'You are Underweight as a adult female';
                    $target = 18.5 * ($heightM * $heightM);
                    $guideline = 'You have to increase your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
                    $status = 'You are Healthy as a adult female';
                    $guideline = '';
                } elseif ($bmi >= 25 && $bmi <= 29.9) {
                    $status = 'You are Overweight as a adult female';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                } else {
                    $status = 'You are Obese as a adult female';
                    $target = 24.9 * ($heightM * $heightM);
                    $guideline = 'You have to decrease your weight ' . $fmtDiff($target, $weight) . ' Kg to keep good BMI value!';
                }
            }
        }
    } else {
        $bmiDisplay = '';
        $status = '';
        $guideline = 'Please enter valid values';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BMI</title>
  <link rel="icon" href="../Images/webLogo.png" type="icon" />
  <link rel="stylesheet" href="../Layout/style.css" />
  <style>
    .section {
      background-color: #343a40;
    }

    .section2 {
      width: 50%;
      margin: auto;
      text-align: center;
      padding: 10px;
      border: 1px solid black;
      border-radius: 30px;
      background: rgba(255, 255, 255, 0.8);
      margin-top: 50px;
      margin-bottom: 50px;
    }

    body {
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(217, 72, 15, 0.5)),
        url("../Images/bmi3.jpg");

      background-position: center;
      background-attachment: fixed;
      background-size: cover;
      background-repeat: no-repeat;
    }

    .calbtn {
      background-color: #343a40;
      color: #fff;
      padding: 5px;
      border-radius: 100px;
      font-size: 30px;
      transition: background-color 0.4s ease, transform 0.4s ease;
    }

    .calbtn:hover {
      background-color: #d9480f;
    }

    .clebtn {
      background-color: #343a40;
      color: #fff;
      padding: 5px;
      padding-left: 25px;
      padding-right: 25px;
      border-radius: 100px;
      font-size: 30px;
      transition: background-color 0.4s ease, transform 0.4s ease;
    }

    .clebtn:hover {
      background-color: #d9480f;
    }

    .title {
      color: #191f26;
      font-family: "Roboto", sans-serif;
      font-optical-sizing: auto;
      font-weight: 800;
      font-style: normal;
      text-align: center;
      margin-bottom: 50px;
      margin-top: 10px;
      font-size: 70px;
      color: #fff;
      text-shadow: 0 0 5px #d9480f, 0 0 10px #d9480f, 0 0 20px #d9480f, 0 0 40px #d9480f, 0 0 80px #d9480f;
      animation: glow 1.5s infinite alternate;
    }

    @keyframes glow {
      0% {
        text-shadow: 0 0 5px #d9480f, 0 0 10px #d9480f, 0 0 20px #d9480f, 0 0 40px #d9480f, 0 0 80px #d9480f;
      }

      100% {
        text-shadow: 0 0 10px #191f26, 0 0 20px #191f26, 0 0 40px #191f26, 0 0 80px #191f26, 0 0 160px #191f26;
      }

    }

    .t1 td {
      padding: 5px;
      font-size: 30px;
      font-family: "Roboto", sans-serif;
      font-optical-sizing: auto;
      font-weight: 400;
      font-style: normal;
    }

    .input {
      padding: 10px;
      width: 100%;
      font-size: 20px;
      border-radius: 50px;
    }

    .input:focus {
      outline: none;
      border: 2px solid #d9480f;
    }

    .input:hover {
      border: 2px solid #d9480f;
    }

    input[type="radio"] {
      width: 20px;
      height: 20px;
    }

    .xxx {
      font-size: 50px;
      color: #d9480f;
      font-weight: bold;
      margin-top: 20px;
      text-align: center;
    }

    .xxx:hover {
      color: #343a40;
    }

    .xx {
      font-size: 40px;
      color: #240faf;
      font-weight: bold;
      margin-top: 20px;
      text-align: center;
    }

    .xx:hover {
      color: #343a40;
    }

    .x {
      font-size: 30px;
      color: #0f911c;
      font-weight: bold;
      margin-top: 20px;
      text-align: center;
    }

    .x:hover {
      color: #343a40;
    }
  </style>
</head>

<body>
  <section class="section-0">
    <header class="header">
      <nav class="navbar">
        <a href="index.html" class="nav-home">Home</a>
        <a href="Gym_membership_And_Fitness_Articles.html" class="nav-diet">Membership</a>
        <a href="Blog_and_Articles.html" class="nav-fitness">Blogs</a>
        <a href="About_Us.html" class="nav-about">About</a>
        <a href="Contact_Us.html" class="nav-contact">Contact</a>
        <a href="login.html" class="nav-login">Login</a>
      </nav>
      <div class="images">
        <a href="index.html"><img src="../Images/webLogo.png" alt="logo" />
        </a>
      </div>
    </header>
  </section>
  <br><br><br>

  <form action="" method="post">
    <section class="section2">
      <h1 class="title">BMI CALCULATER</h1>
      <center>
        <table class="t1">
          <tr>
            <td>Age:</td>
            <td colspan="2"><input type="number" id="age" name="age" class="input" placeholder="Enter your age" min="1" max="100" value="<?php echo htmlspecialchars($ageVal); ?>"></td>
          </tr>
          <tr>

            <td>Gender:</td>
            <td>Male:<input type="radio" name="gender" value="male" <?php echo ($genderVal === 'male') ? 'checked' : ''; ?>></td>
            <td>Female: <input type="radio" name="gender" value="female" <?php echo ($genderVal === 'female') ? 'checked' : ''; ?>></td>
          </tr>

          <tr>
            <td>
              Weight (kg):
            </td>
            <td colspan="2">
              <input type="number" id="weight" name="weight" class="input" placeholder="Enter your weight" min="1" max="200" step="0.1" value="<?php echo htmlspecialchars($weightVal); ?>">
            </td>
          </tr>
          <tr>
            <td>
              Height (cm):
            </td>
            <td colspan="2">
              <input type="number" id="height" name="height" class="input" placeholder="Enter your height" min="1" max="300" step="0.1" value="<?php echo htmlspecialchars($heightVal); ?>">
            </td>


          <tr>
            <td><input type="submit" value="Calculate" class="calbtn"></td>

            <td><input type="reset" value="clear" class="clebtn"></td>
          </tr>
        </table>
        <p id="result" class="xxx"><?php echo ($bmiDisplay !== '') ? 'Your BMI is: <strong style="color:red;">' . $bmiDisplay . '</strong>' : ''; ?></p>
        <p id="status" class="xx"><?php echo htmlspecialchars($status); ?></p>
        <p id="guideline" class="x"><?php echo htmlspecialchars($guideline); ?></p>
    </section>
    </center>

  </form>

  <footer>
    <div class="footer-flexbox">
      <div class="footer-img"></div>
    </div>
  </footer>
</body>

</html>
