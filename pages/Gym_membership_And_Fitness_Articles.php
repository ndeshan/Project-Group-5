<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: ../../php/naveen/login.html');
    exit();

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="keywords" content="HTML, Helth & Fitness, Fitness, Health, Wellness, yoga, Gym" />
  <meta name="author" content="Group-5 project" />

  <title>Membership</title>
  <link rel="icon" href="../Images/webLogo.png" type="icon" />
  <link rel="stylesheet" href="../Layout/membershipCss.css" />


  <style>
    body {
      background-color: rgb(255, 255, 255);
      font-family: sans-serif;

    }

    .main-membership-container {
      margin-top: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 40px;
      margin-bottom: 80px;
    }


    .main-membership-container .goldPlan {

      margin: 0;
      padding: 0;
      background-color: rgb(255, 255, 255);
      height: 600px;
      width: 350px;
      border-radius: 30px;
      /*  box-shadow: 2px 2px 8px rgb(151, 151, 151);   */
      transition: transform 0.3s, box-shadow 0.4s;
      cursor: pointer;
      border: solid #7f7f7f 1px;
    }



    .main-membership-container .goldPlan:hover {
      transform: scale(1.01);
      box-shadow: #4f4f4f 1px 1px 9px;

    }


    .main-membership-container .premiumPlan {
      background-color: rgb(255, 255, 255);
      height: 600px;
      width: 350px;
      border-radius: 30px;
      /*  box-shadow: 2px 2px 10px rgb(151, 151, 151);  */
      transition: transform 0.3s, box-shadow 0.4s;
      cursor: pointer;
      border: solid #7f7f7f 1px;
    }

    .main-membership-container .premiumPlan:hover {
      transform: scale(1.01);
      box-shadow: #4f4f4f 1px 1px 9px;
    }

    .main-membership-container .ProPlan {
      background-color: rgb(255, 255, 255);
      height: 600px;
      width: 350px;
      border-radius: 30px;
      /*  box-shadow: 2px 2px 10px rgb(151, 151, 151);  */
      transition: transform 0.3s, box-shadow 0.4s;
      cursor: pointer;
      border: solid #7f7f7f 1px;
    }

    .main-membership-container .ProPlan:hover {
      transform: scale(1.01);
      box-shadow: #4f4f4f 1px 1px 9px;
    }



    .subcrib-header {
      margin-top: 0;
      margin-bottom: 40px;
      color: #FF6600;
      text-align: center;
      font-size: 40px;
    }

    /* gold plan */
    .gold-head h1 {
      position: absolute;
      font-size: 40px;
      color: rgb(255, 255, 255);
      margin-left: 120px;

    }

    .gold-head h3 {
      position: absolute;
      color: white;
      font-size: 30px;
      margin-top: 70px;
      margin-left: 120px;
    }

    .gold-head h2 {
      position: absolute;
      color: white;
      margin-top: 120px;
      margin-left: 105px;
      font-size: 70px;
      font-weight: 500;
    }

    .gold-image img {
      margin-top: -30px;
      height: 250px;
      width: 350px;

    }

    /* premium plan */
    .premium-head h1 {
      position: absolute;
      font-size: 40px;
      color: rgb(255, 255, 255);
      margin-left: 90px;

    }

    .premium-head h3 {
      position: absolute;
      color: white;
      font-size: 30px;
      margin-top: 70px;
      margin-left: 90px;
    }

    .premium-head h2 {
      position: absolute;
      color: white;
      margin-top: 120px;
      margin-left: 90px;
      font-size: 70px;
      font-weight: 500;
    }

    /* pro plan */
    .pro-head h1 {
      position: absolute;
      font-size: 40px;
      color: rgb(255, 255, 255);
      margin-left: 130px;

    }

    .pro-head h3 {
      position: absolute;
      color: white;
      font-size: 30px;
      margin-top: 70px;
      margin-left: 90px;
    }

    .pro-head h2 {
      position: absolute;
      color: white;
      margin-top: 120px;
      margin-left: 90px;
      font-size: 70px;
      font-weight: 500;
    }

    .gold-membership-tabel {
      margin-left: auto;
      margin-right: auto;

    }

    .gold-membership-tabel td {
      height: 10px;
      background-color: #ffffff;

      font-size: 17px;
    }

    .gold-plan-sub-button {
      margin-left: auto;
      margin-right: auto;
      display: block;
      height: 45px;
      width: 60%;
      font-size: 18px;
      background-color: #e75100;
      color: white;
      border: 0;
      border-radius: 88px;
      margin-top: 50px;
      transition: background-color 0.3s, transform 0.3s;
      cursor: pointer;
    }

    .gold-plan-sub-button:hover {
      background-color: #ff8400;
    }

    .gold-plan-sub-button:active {
      transform: scale(1.01);
    }

    .premium-plan-sub-button {
      margin-left: auto;
      margin-right: auto;
      display: block;
      height: 45px;
      width: 60%;
      font-size: 18px;
      background-color: #e75100;
      color: white;
      border: 0;
      border-radius: 88px;
      margin-top: -18px;
      transition: background-color 0.3s, transform 0.3s;
      cursor: pointer;
    }

    .premium-plan-sub-button:hover {
      background-color: #ff8400;
    }

    .premium-plan-sub-button:active {
      transform: scale(1.01);
    }

    .pro-plan-sub-button {
      margin-left: auto;
      margin-right: auto;
      display: block;
      height: 45px;
      width: 60%;
      font-size: 18px;
      background-color: #e75100;
      color: white;
      border: 0;
      border-radius: 88px;
      margin-top: -18px;
      transition: background-color 0.3s, transform 0.3s;
      cursor: pointer;
    }

    .pro-plan-sub-button:hover {
      background-color: #ff8400;
    }

    .pro-plan-sub-button:active {
      transform: scale(1.01);
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
        <a href="../php/naveen/logout.php" class="nav-login">logout</a>
      </nav>
      <div class="images">
        <a href="index.html"><img src="../Images/webLogo.png" alt="logo" />
        </a>
      </div>
    </header>

  </section>
  <h1 class="subcrib-header">Subcription Plans</h1>
  <div class="main-membership-container">

    <div class="goldPlan">


      <div class="gold-container">

        <div class="gold-head">

          <h1>GOLD</h1>
          <h3>(BASIC)</h3>
          <h2>$9.9</h2>
          <div class="gold-image">
            <img src="../Images/membership-banner1.png" alt="">
          </div>
        </div>

        <table border="0" class="gold-membership-tabel">
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3>Access to health tips</h3>
            </td>
          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3>Beginner workout guides</h3>
            </td>

          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3>Basic meal punitlanning advice</h3>
            </td>

          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3>Community forum access</h3>
            </td>

          </tr>

        </table>
        <input type="button" value="Choose Plan" class="gold-plan-sub-button">

      </div>



    </div>
    <div class="premiumPlan">
      <div class="premium-container">

        <div class="premium-head">

          <h1>PREMIUM</h1>
          <h3>(STANDARD)</h3>
          <h2>$19.9</h2>
          <div class="gold-image">
            <img src="../Images/membership banner2.png" alt="">
          </div>
        </div>
        <table border="0" class="gold-membership-tabel">
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3> Everything in Gold Plan</h3>
            </td>
          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3> Personalized workout plans</h3>
            </td>

          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3> Exclusive video tutorials</h3>
            </td>

          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3> Advanced nutrition guides</h3>
            </td>
          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3> Monthly Q&A sessions</h3>
            </td>
          </tr>
        </table>
        <input type="button" value="Choose Plan" class="premium-plan-sub-button">


      </div>

    </div>
    <div class="ProPlan">
      <div class="pro-container">

        <div class="pro-head">

          <h1>PRO</h1>
          <h3>(ADVANCED)</h3>
          <h2>$29.9</h2>
          <div class="gold-image">
            <img src="../Images/membership banner3.png" alt="">
          </div>
        </div>

        <table border="0" class="gold-membership-tabel">
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3>Everything in Premium Plan</h3>
            </td>
          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3>One-on-one coaching</h3>
            </td>

          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3>Live fitness webinars</h3>
            </td>

          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3>Custom meal & workout plans</h3>
            </td>
          </tr>
          <tr>
            <td><img src="../Images/checkmark.png" alt=""></td>
            <td>
              <h3>Priority support</h3>
            </td>
          </tr>
        </table>
        <input type="button" value="Choose Plan" class="pro-plan-sub-button">
      </div>
    </div>
  </div>




  <footer>

    <div class="footer-flexbox">
      <div class="footer-img">

      </div>


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
            <td>Empowering you with expert health and fitness tips to achieve a stronger, healthier life. Stay
              motivated, stay fit!</td>
            <td><a href="User_Feedback.html">Feedback</a></td>
            <td><a href="https://en.wikipedia.org/wiki/Gmail">Gmail</a></td>
            <td><a href="index.html">Home</a></td>

          </tr>
          <tr>
            <td>
              <a href="https://en.wikipedia.org/wiki/Gmail">
                <img src="../Images/footer-email .png" alt="email" class="footer-1">
              </a>
              <a href="https://en.wikipedia.org/wiki/Facebook">
                <img src="../Images/footer-facebook .png" alt="facebook" class="footer-2">
              </a>
              <a href="https://en.wikipedia.org/wiki/Mobile_phone">
                <img src="../Images/footer-mobile .png" alt="mobile" class="footer-3">
              </a>
              <a href="https://en.wikipedia.org/wiki/Twitter">
                <img src="../Images/footer-twiter-logo.png" alt="twitter" class="footer-4">
              </a>
              <a href="https://en.wikipedia.org/wiki/WhatsApp">
                <img src="../Images/footer-whatsapp.png" alt="whatsapp" class="footer-5">
              </a>
            </td>
            <td><a href="Contact_Us.html">Contact Us</a></td>
            <td><a href="https://en.wikipedia.org/wiki/Facebook">FaceBook</a></td>
            <td><a href="About_Us.html">About Us</a></td>
          </tr>
          <tr>
            <td> </td>
            <td><a href="About_Us.html">About Us</a></td>
            <td><a href="https://en.wikipedia.org/wiki/Mobile_phone">Mobile</a></td>
            <td><a href="">Contact Us</a></td>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td></td>
            <td><a href="https://en.wikipedia.org/wiki/Twitter">Instagram</a></td>
            <td><a href="login.html">Login</a></td>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td><a href="https://en.wikipedia.org/wiki/WhatsApp">whatsapp</a></td>
            <td><a href="register.html">Register</a></td>
          </tr>
        </table>
      </section>


      <section>
        <hr class="h1" />
        <div class="footer-second-part">
          <a href="https://en.wikipedia.org/wiki/Language_policy#:~:text=Language%20policy%20has%20been%20defined,xi).">Language
            Policy</a>
          <a href="https://en.wikipedia.org/wiki/Privacy_policy">Privacy Policy</a>
          <a href="https://en.wikipedia.org/wiki/Terms_of_service">Terms of Service</a>
          <a href="Contact_Us.html">Contact Us</a>
          <a href="https://en.wikipedia.org/wiki/HTTP_cookie">Cookies</a>

          <p>@ Group 5 mini project</p>
        </div>
      </section>
  </footer>
</body>

</html>