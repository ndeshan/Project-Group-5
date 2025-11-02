<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registered Event Participants</title>
  <link rel="icon" href="../Images/webLogo.png" type="icon" />
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/45cc59e5cb.js" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background-color: #ccc;
      margin: 0;
      padding: 0;
    }

    .section-0 {
      background-image: url(../Images/formcover.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      height: 400px;
    }

    .header nav {
      margin-left: auto;
      margin-right: auto;
      background-color: transparent;
      align-items: center;
    }

    .navbar {
      float: inline-end;
      padding: 20px;
      font-size: 30px;
    }

    .navbar a {
      padding: 20px;
      text-decoration: none;
      color: rgb(0, 0, 0);
    }

    .navbar a:hover {
      color: orange;
    }

    .navbar .nav-login {
      color: #f5ebeb;
      padding: 20px 30px;
      background-color: rgba(255, 0, 0, 0.9);
      border-radius: 30px 0px 30px 0px;
      transition: transform 0.3s ease-in-out;
      border: none;
    }

    .navbar .nav-login:hover {
      background-color: rgba(196, 59, 17);
      color: black;
      transform: scale(1.5);
    }

    .images img {
      width: 120px;
      float: inline-start;
      padding: 10px;
    }

    #header-text {
      position: absolute;
      top: 45%;
      left: 40%;
      color: rgb(0, 0, 0);
      font-size: 3em;
      font-weight: bold;
    }

    .container {
      max-width: 1200px;
      margin: 40px auto;
      background-color: white;
      border-radius: 20px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h2 {
      text-align: center;
      color: #ff6b00;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 16px;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #ff6b00;
      color: white;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    footer {
      background-color: #464545;
      width: 100%;
      margin-top: 60px;
    }

    .footer-table {
      width: 90%;
      margin: 0 auto;
      text-align: center;
      font-size: 20px;
      border: none;
      color: white;
      padding-top: 20px;
    }

    .footer-table a {
      text-decoration: none;
      color: white;
    }

    .footer-table a:hover {
      color: rgb(252, 143, 0);
    }

    .footer-table th {
      font-size: 30px;
      width: 15%;
    }

    footer .footer-second-part {
      text-align: center;
      background-color: #2f2f2f;
      padding: 20px;
      color: white;
      font-weight: bold;
    }

    footer .footer-second-part a {
      text-decoration: none;
      color: white;
      padding: 40px 20px;
    }

    footer .footer-second-part p {
      padding: 10px;
    }

    .footer-second-part a:hover {
      text-decoration: underline;
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
        <a href="index.html"><img src="../Images/webLogo.png" alt="logo" /></a>
      </div>
    </header>
    <div id="header-text" style="font-size: 80px; margin-top: -100px; margin-left: -300px;">Registered Participants</div>
  </section>

  <div class="container">
    <h2>All Event Registrations</h2>

   
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'healthandfitnesshub');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT name, email, phone, event_name, registration_date FROM event_registrations ORDER BY registration_date DESC";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Event</th><th>Registered On</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['event_name'] . "</td>";
            echo "<td>" . $row['registration_date'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='text-align:center; color:#444;'>No participants registered yet.</p>";
    }

    mysqli_close($conn);
    ?>
  </div>

  <footer>
    <section class="footer-section-one">
      <table class="footer-table">
        <tr>
          <th rowspan="4"><img src="../Images/webLogo.png" alt="LOGO" class="logo-footer" /></th>
          <th>Fitness</th>
          <th>Services</th>
          <th>Follow Us</th>
          <th>Links</th>
        </tr>
        <tr>
          <td>Empowering you with expert health and fitness tips to achieve a stronger, healthier life.</td>
          <td><a href="User_Feedback.html">Feedback</a></td>
          <td><a href="https://en.wikipedia.org/wiki/Gmail">Gmail</a></td>
          <td><a href="index.html">Home</a></td>
        </tr>
      </table>
    </section>

    <section>
      <div class="footer-second-part">
        <a href="#">Language Policy</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="Contact_Us.html">Contact Us</a>
        <a href="#">Cookies</a>
        <p>@ Group 5 mini project</p>
      </div>
    </section>
  </footer>
</body>
</html>
