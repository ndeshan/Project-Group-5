<?php

$i1 = null;


$i1_get_int = filter_input(INPUT_GET, 'i1', FILTER_VALIDATE_INT);
if ($i1_get_int !== false && $i1_get_int !== null) {
    $i1 = $i1_get_int;
} else {
    $i1_get_str = filter_input(INPUT_GET, 'i1', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($i1_get_str !== null && $i1_get_str !== '') {
        $i1 = trim($i1_get_str);
    }
}


$i1_post_int = filter_input(INPUT_POST, 'i1', FILTER_VALIDATE_INT);
if ($i1_post_int !== false && $i1_post_int !== null) {
    $i1 = $i1_post_int;
} else {
    $i1_post_str = filter_input(INPUT_POST, 'i1', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($i1_post_str !== null && $i1_post_str !== '') {
        $i1 = trim($i1_post_str);
    }
}


$planTitle = 'Share your experience';
if (is_int($i1)) {
    $titles = [
        1 => '8 Week Fat Loss Workout for Beginners',
        2 => '8 Week Strength Building Workout',
        3 => '10 Week Mass Building Program',
        4 => '3 Day Push/Pull/Legs Workout',
        5 => '4 Day Maximum Mass Workout',
        6 => '12 Week Fat Destroyer',
        7 => 'Fast Mass Program',
        8 => '4 Day Advanced Upper/Lower'
    ];
    if (array_key_exists($i1, $titles)) {
        $planTitle = $titles[$i1];
    } else {
        $planTitle = 'Workout Plan ' . htmlspecialchars((string)$i1, ENT_QUOTES, 'UTF-8');
    }
} elseif (is_string($i1)) {
    $planTitle = 'Review: ' . htmlspecialchars($i1, ENT_QUOTES, 'UTF-8');
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['comment'])) {
    $conn = mysqli_connect("localhost", "root", "", "php_group_project");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = trim($_POST['name']);
    $comment = trim($_POST['comment']);

   $planNo = $i1;

    if ($name === '' || $comment === '' || $planNo === null) {
        echo "Please provide a name and comment, and ensure the plan id is valid.";
        mysqli_close($conn);
    } else {
        
        $cols = array();// to clear old column names nathan ekama column name tika array ekata deparak enter wenawa wenawa 
        $colRes = mysqli_query($conn, "SHOW COLUMNS FROM reviews");
        if ($colRes) {
            while ($crow = mysqli_fetch_assoc($colRes)) { //column name tika assign karagannawa
                $cols[] = $crow['Field'];// column name ekata adala field value eka gannawa assosiative array ekata
            }
           
        }

        $dateCandidates = array('date','created','date','timestamp','createdat','dt');
        $dateCol = null;
        foreach ($dateCandidates as $cname) {
            if (in_array($cname, $cols, true)) { $dateCol = $cname; break; }
        }

        if ($dateCol !== null) {
      
            $sql = "INSERT INTO reviews (name, plan_no, comment, `" . $dateCol . "`) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                $now = date('Y-m-d H:i:s');
                mysqli_stmt_bind_param($stmt, "siss", $name, $planNo, $comment, $now);
                if (mysqli_stmt_execute($stmt)) {
                    echo "Record inserted successfully.";
                } else {
                    echo "ERROR: Could not execute statement: " . mysqli_stmt_error($stmt);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "ERROR: Could not prepare statement: " . mysqli_error($conn);
            }
        } else {
            
            $sql = "INSERT INTO reviews (name, plan_no, comment) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sis", $name, $planNo, $comment);
                if (mysqli_stmt_execute($stmt)) {
                    echo "Record inserted successfully.";
                } else {
                    echo "ERROR: Could not execute statement: " . mysqli_stmt_error($stmt);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "ERROR: Could not prepare statement: " . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>share review</title>
</head>
<body class="bg-gray-300 p-10">
    <div class="mb-6">
        <button type="button" onclick="window.location.href='Workout_plans.html'" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
            <span class="mr-2 text-lg">&larr;</span>
            <span>Back to plans</span>
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 justify-center">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>" style="background-color: #FF5733;" class="p-6 rounded shadow-md w-full md:col-span-1" method="POST">
            <h2 class="text-xl font-bold mb-4"><?php echo htmlspecialchars("Share your experience about " . $planTitle, ENT_QUOTES, 'UTF-8'); ?></h2>
            <input type="hidden" name="i1" value="<?php echo htmlspecialchars((string)$i1, ENT_QUOTES, 'UTF-8'); ?>">
            <label class="block mb-2 font-bold">Your name</label>
            <input type="text" name ="name" placeholder = "Enter your name" class="border border-gray-300 p-2 mb-4 w-full">
            <label class="block mb-2 font-bold">Your review</label>
            <textarea name="comment" id="comment" class="border border-gray-300 p-2 mb-4 w-full" placeholder = "Enter your review"></textarea>
            <input type="submit" value="submit" class="bg-green-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700">
        </form>

        <?php
 
   
    $planId = null;
    if (is_int($i1) && $i1 > 0) {
        $planId = $i1;
    } elseif (is_string($i1) && ctype_digit($i1)) {
        $planId = (int)$i1;
    }

    $conn = mysqli_connect("localhost", "root", "", "php_group_project");
    if ($conn) {
        if ($planId === null) {
            
            echo '<div class="bg-white p-6 rounded shadow-md w-full md:col-span-2">Please select a workout plan to view its reviews.</div>';
        } else {
            
            $dateCol = null;
            $cols = array();
            $colRes = mysqli_query($conn, "SHOW COLUMNS FROM reviews");
            if ($colRes) {
                while ($crow = mysqli_fetch_assoc($colRes)) {
                    $cols[] = $crow['Field'];
                }
                mysqli_free_result($colRes);
            }
            $dateCandidates = array('date','created','timestamp','created_at','createdat','dt');
            foreach ($dateCandidates as $cname) {
                if (in_array($cname, $cols, true)) { $dateCol = $cname; break; }
            }

            $selectCols = 'id, name, plan_no, comment';
            if ($dateCol !== null) {
                $selectCols .= ', `'. $dateCol . '`';
            }

            $sql = "SELECT $selectCols FROM reviews WHERE plan_no = ? ORDER BY id DESC";
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $planId);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($result && mysqli_num_rows($result) > 0) {
                    echo '<div style="background-color: #f0937eff;" class="bg-orange-100 p-6 rounded shadow-md w-full md:col-span-2">';
                    echo '<h3 class="text-lg font-semibold mb-4">Reviews for ' . htmlspecialchars($planTitle, ENT_QUOTES, 'UTF-8') . '</h3>';
                    echo '<table class="w-full border-collapse">';
                    
                    echo '<tbody>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        
                        $date = isset($row[$dateCol]) ? htmlspecialchars($row[$dateCol], ENT_QUOTES, 'UTF-8') : '';
                        echo '<td class="py-2">' .'👤 '. htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '</td>';
                        echo '<td class="px-2 py-1">' . nl2br(htmlspecialchars($row['comment'], ENT_QUOTES, 'UTF-8')).'<br>'.'📆 '.$date . '<hr></td>';
                        
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo '<div class="bg-white p-6 rounded shadow-md w-full md:col-span-2">No reviews yet for ' . htmlspecialchars($planTitle, ENT_QUOTES, 'UTF-8') . '.</div>';
                }
                mysqli_stmt_close($stmt);
            } else {
                echo '<div class="text-red-600">Error preparing statement: ' . htmlspecialchars(mysqli_error($conn), ENT_QUOTES, 'UTF-8') . '</div>';
            }
        }
        mysqli_close($conn);
    } else {
        echo '<div class="text-red-600">Could not connect to database to load reviews.</div>';
    }
    ?>
</body>
</html>