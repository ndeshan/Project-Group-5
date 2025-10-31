<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="keywords" content="HTML, Helth & Fitness, Fitness, Health, Wellness, yoga, Gym" />
  <meta name="author" content="Group-5 project" />

  <title>Blog & Articles</title>
  <link rel="icon" href="../Images/webLogo.png" type="icon" />
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="../stylesheet/style-3.css">
  <style>
    .search-container {
      text-align: center;
      margin: 20px 0;
    }
    #searchBox {
      padding: 8px;
      width: 300px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
  </style>
</head>

<body>
  <section class="section-0">
    <header class="header">
      <nav class="navbar">
        <a href="index.html" class="nav-home">Home</a>
        <a href="Gym_membership_And_Fitness_Articles.html" class="nav-diet">Membership</a>
        <a href="Blog_and_Articles.php" class="nav-fitness">Blogs</a>
        <a href="About_Us.html" class="nav-about">About</a>
        <a href="Contact_Us.html" class="nav-contact">Contact</a>
        <a href="login.html" class="nav-login">Login</a>
      </nav>
      <div class="images">
        <a href="index.html"><img src="../Images/webLogo.png" alt="logo" /></a>
      </div>
    </header>
    <div id="blog_coverimage">
      <img src="../Images/cover.png" alt="blog_cover">
      <div id="blog_cover_text">Our Blog</div>
    </div>

    <?php
   
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $searchLower = strtolower($search);
    ?>

    
    <div class="search-container">
      <form method="GET">
        <input type="text" id="searchBox" name="search" placeholder="Search articles..." 
               value="<?php echo ($search); ?>">
        <button type="submit" style="display:none;"></button> 
      </form>
    </div>

    <section id="blog-container">
     
      <?php
      $title1 = "How to Exercise at Home";
      $preview1 = "Who needs a gym membership? You can work out from the comfort of your home...";
      $show1 = empty($search) || strpos(strtolower($title1), $searchLower) !== false || strpos(strtolower($preview1), $searchLower) !== false;
      if ($show1):
      ?>
      <div id="article">
        <img src="../Images/art1.jpg" alt="Exercise">
        <div id="article_topic">
          <b><?php echo htmlspecialchars($title1); ?></b><br>
          📅 April 5, 2025 &nbsp;&nbsp;&nbsp; ✍️ Adam Zampa
        </div>
        <div id="article_content">
          <input type="checkbox" id="ch1">
          <div class="preview">
            <?php echo htmlspecialchars($preview1); ?>
          </div>
          <div class="article_hidden">
            <p>Choose a location. Designate and declutter a spot in your home for your workouts. Don't automatically
              pick your basement or garage. If it's not an appealing space, you won't want to spend a lot of time there.
            </p>
            <p>Look for an area near where you often sit. An empty corner or a spot near your TV, for instance, could be
              perfect. Seeing your exercise place may inspire you to get up and move. You don't want it to be out of
              sight, out of mind.</p>
            <p>Buy the necessities. You don't need a lot of fancy gear. For under $100, you can buy some basics, such as
              an exercise mat, stability ball, resistance bands, and a few dumbbells.</p>
            <p>Add some comforts. Make a playlist with songs you love. Download an audiobook you're excited about. Queue
              up a great show on your streaming platform.</p>
          </div>
          <label for="ch1" class="readmore">Read More</label>
          <label for="ch1" class="readless">Read Less</label>
        </div>
      </div>
      <?php endif; ?>

      
      <?php
      $title2 = "Exercise for a Healthy Heart";
      $preview2 = "Your heart is a muscle, and it gets stronger and healthier if you lead an active life...";
      $show2 = empty($search) || strpos(strtolower($title2), $searchLower) !== false || strpos(strtolower($preview2), $searchLower) !== false;
      if ($show2):
      ?>
      <div id="article">
        <img src="../Images/art2.webp" alt="heart">
        <div id="article_topic">
          <b><?php echo htmlspecialchars($title2); ?></b><br>
          📅 April 2, 2025 &nbsp;&nbsp;&nbsp; ✍️ Tyler Wheeler
        </div>
        <div id="article_content">
          <input type="checkbox" id="ch2">
          <div class="preview">
            <?php echo htmlspecialchars($preview2); ?>
          </div>
          <div class="article_hidden2">
            <p>First, think about what you'd like to do and how fit you are.

              What sounds like fun? Would you rather work out on your own, with a trainer, or in a class? Do you want to
              exercise at home or at a gym?

              If you want to do something that's harder than what you can do right now, no problem. You can set a goal
              and build up to it.

              For example, if you want to run, you might start by walking and then add bursts of jogging into your
              walks. Gradually start running for longer than you walk.

              Don't forget to check in with your doctor. They'll make sure you're ready for whatever activity you have
              in mind and let you know about any limits on what you can do.</p>

            <p>How Much Should You Exercise and How Often?
              Aim for at least 150 minutes a week of moderate-intensity activity (such as brisk walking). That amounts
              to about 30 minutes a day at least 5 days a week. If you're just getting started, you can slowly build up
              to that.

              In time, you can make your workouts longer or more challenging. Do that gradually, so your body can
              adjust.

              When you work out, keep your pace low for a few minutes at the start and end of your workout. That way,
              you warm up and cool down each time.

              You don't have to do the same exact thing every time. It's more fun if you change it up.</p>
          </div>
          <label for="ch2" class="readmore2">Read More</label>
          <label for="ch2" class="readless2">Read Less</label>
        </div>
      </div>
      <?php endif; ?>

     
      <?php
      $title3 = "Yoga and Cholesterol";
      $preview3 = "If you have high cholesterol, one of the lifestyle changes you might consider...";
      $show3 = empty($search) || strpos(strtolower($title3), $searchLower) !== false || strpos(strtolower($preview3), $searchLower) !== false;
      if ($show3):
      ?>
      <div id="article">
        <img src="../Images/art3.jpg" alt="Yoga">
        <div id="article_topic">
          <b><?php echo htmlspecialchars($title3); ?></b><br>
          📅 April 3, 2025 &nbsp;&nbsp;&nbsp; ✍️ Alexandra
        </div>
        <div id="article_content">
          <input type="checkbox" id="ch3">
          <div class="preview">
            <?php echo htmlspecialchars($preview3); ?>
          </div>
          <div class="article_hidden3">
            <p>On a biological level, exercise improves the things that affect cholesterol. “The idea here is that yoga
              can be sort of like aerobics and resistance exercise. Those types of exercises have a very established
              benefit to cholesterol,” says Bethany Barone Gibbs, PhD, an associate professor at the University of
              Pittsburgh, who studies the effects of healthy lifestyle behaviors on cardiometabolic disease</p>

            <p>Yoga isn't this magic pill that you take, and then you get all these benefits,” says Sally Sherman, PhD,
              an assistant professor at the University of Pittsburgh, who researches the effects of yoga on health. But
              she notes that it leads indirectly to desirable effects. For example, “We know that yoga improves sleep.
              And (that) can really act as a pathway for so many other health benefits.” Many of these benefits, she
              says, actually show up as things like lowered cholesterol</p>
          </div>
          <label for="ch3" class="readmore3">Read More</label>
          <label for="ch3" class="readless3">Read Less</label>
        </div>
      </div>
      <?php endif; ?>
    </section>

    <section id="blog-container">
      
      <?php
      $title4 = "Depression";
      $preview4 = "Depression, also known as major depressive disorder, is a mood disorder...";
      $show4 = empty($search) || strpos(strtolower($title4), $searchLower) !== false || strpos(strtolower($preview4), $searchLower) !== false;
      if ($show4):
      ?>
      <div id="article">
        <img src="../Images/art4.jpg" alt="Depression">
        <div id="article_topic">
          <b><?php echo htmlspecialchars($title4); ?></b><br>
          📅 April 12, 2025 &nbsp;&nbsp;&nbsp; ✍️ Harry Brook
        </div>
        <div id="article_content">
          <input type="checkbox" id="ch4">
          <div class="preview">
            <?php echo htmlspecialchars($preview4); ?>
          </div>
          <div class="article_hidden4">
            <p>Most people feel sad or depressed at times. It’s a normal reaction to loss or life's challenges. But when
              intense sadness -- including feeling helpless, hopeless, and worthless -- lasts for many days to weeks and
              keeps you from living your life, it may be something more than sadness. You could have clinical
              depression, a treatable medical condition</p>

            <p>There’s no cure for depression. Your symptoms may go away over time, but the condition won’t.

              But with care and treatment, you can reach remission and enjoy a long, healthy life.</p>

            <p>A lot of teens feel unhappy or moody. When the sadness lasts for more than 2 weeks and a teen has other
              symptoms of depression, there may be a problem. Watch for withdrawal from friends and family, a drop in
              their performance at school, or use of alcohol or drugs. Talk to your doctor and find out if your teen may
              be depressed. There is effective treatment that can help teens move beyond depression as they grow older.
            </p>
          </div>
          <label for="ch4" class="readmore4">Read More</label>
          <label for="ch4" class="readless4">Read Less</label>
        </div>
      </div>
      <?php endif; ?>

     
      <?php
      $title5 = "High-Protein Diet for Weight Loss";
      $preview5 = "Going on a high-protein diet may help you tame your hunger, which could help you lose weight.";
      $show5 = empty($search) || strpos(strtolower($title5), $searchLower) !== false || strpos(strtolower($preview5), $searchLower) !== false;
      if ($show5):
      ?>
      <div id="article">
        <img src="../Images/art5.jpg" alt="Healthy Food">
        <div id="article_topic">
          <b><?php echo htmlspecialchars($title5); ?></b><br>
          📅 April 2, 2025 &nbsp;&nbsp;&nbsp; ✍️ Kathleen
        </div>
        <div id="article_content">
          <input type="checkbox" id="ch5">
          <div class="preview">
            <?php echo htmlspecialchars($preview5); ?>
          </div>
          <div class="article_hidden5">
            <p>Going on a high-protein diet may help you tame your hunger, which could help you lose weight.

              You can try it by adding some extra protein to your meals. Give yourself a week, boosting protein
              gradually.

              Remember, calories still count. You'll want to make good choices when you pick your protein</p>

            <p>Choose protein sources that are nutrient-rich and lower in saturated fat and calories, such as:
            <ul>
              <li>Lean meats</li>
              <li>Seafood</li>
              <li>Beans</li>
              <li>Soy</li>
            </ul><br>It's a good idea to change up your protein foods. For instance, you could have salmon or other fish
            that's rich in omega-3s, beans or lentils that give you fiber as well as protein, walnuts on your salad, or
            almonds on your oatmeal</p>
          </div>
          <label for="ch5" class="readmore5">Read More</label>
          <label for="ch5" class="readless5">Read Less</label>
        </div>
      </div>
      <?php endif; ?>

      
      <?php
      $title6 = "How to Sleep Better";
      $preview6 = "From having occasional difficulty sleeping to insomnia, there is a lot you can do...";
      $show6 = empty($search) || strpos(strtolower($title6), $searchLower) !== false || strpos(strtolower($preview6), $searchLower) !== false;
      if ($show6):
      ?>
      <div id="article">
        <img src="../Images/art6.jpg" alt="Healthy Food">
        <div id="article_topic">
          <b><?php echo htmlspecialchars($title6); ?></b><br>
          📅 April 13, 2025 &nbsp;&nbsp;&nbsp; ✍️ Michael
        </div>
        <div id="article_content">
          <input type="checkbox" id="ch6">
          <div class="preview">
            <?php echo htmlspecialchars($preview6); ?>
          </div>
          <div class="article_hidden6">
            <p>We all have a day-night cycle of about 24 hours called the circadian rhythm. It greatly influences when
              we sleep and the quantity and the quality of our sleep. The more stable and consistent our circadian
              rhythm is, the better our sleep. This cycle may be altered by the timing of various factors, including
              naps, bedtime, exercise, and especially exposure to light</p>

            <p>Good sleep hygiene can have a tremendous impact upon getting better sleep. You should wake-up feeling
              refreshed and alert, and you should generally not feel sleepy during the day. If this is not the case,
              poor sleep hygiene may be the culprit, but it is very important to consider that you may have an
              unrecognized sleep disorder. Many, many sleep disorders go unrecognized for years, leading to unnecessary
              suffering, poor quality of life, accidents, and great expense. Since it is clear how critical sound sleep
              is to your health and well-being, if you are not sleeping well, see your doctor or a sleep specialist.</p>
          </div>
          <label for="ch6" class="readmore6">Read More</label>
          <label for="ch6" class="readless6">Read Less</label>
        </div>
      </div>
      <?php endif; ?>
    </section>

    <script src="../scripts/script-3.js"></script>
    <footer>
      <div class="footer-flexbox">
        <div class="footer-img"></div>
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
            <a href="https://en.wikipedia.org/wiki/Language_policy">Language Policy</a>
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