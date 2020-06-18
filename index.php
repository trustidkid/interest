<?php session_start(); 
    require_once('functions/alert.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/img/piggy-icon.webp">
  <title>PiggyVest|Interest Calculator</title>
  <link rel='stylesheet' type="text/css" href='style.css'>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;1,400;1,500&display=swap"
    rel="stylesheet">
</head>

<body>

  <header class='container'>
    <div class="navbar ">
      <div class="nav-brand">
        <a href=''><img src="assets/img/piggy-png_1_.png" alt="Piggybank Logo"></a>
      </div>
      <div class="nav-menu">
        <ul class='nav-list'>
          <li class='nav-item'><a href=''>About</a></li>
          <li class='nav-item'><a href=''>Stories</a></li>
          <li class='nav-item'><a href=''>FAQ</a></li>
          <li class='nav-item'><a href=''>Blog</a></li>
          <li class='nav-item'><a href=''>Login</a></li>
          <li class='nav-item'><a href=''>Calculate Interest</a></li>
          <li class='nav-item'><a href='' id='create-account'>Create Account</a></li>
        </ul>
      </div>
      <div class="mobile-nav hamburger">
        <div class='nav-button'>
          <div class='first'></div>
          <div class='second'></div>
          <div class="third"></div>
        </div>
      </div>
    </div>

  </header>

  <section class='calculator container'>
    <div class='note'>
      <h1>Calculate Your Interest</h1>
      <p>Interest rate are subject to change at any time based on market condition</p>
      <img src='assets/img/piggyvest-story_v1.png' width="100%">
    </div>
    <h1 style='color:#083E9E'>Our Packages</h1>
    <div class='packages'>
      <div class="package" style="background-color: rgb(204, 240, 254);">
        <img src='assets/img/Vector.png' width="30">
        <p class="package-name" style="color: rgb(13, 96, 216);">Piggybank</p>
        <p class="package-info">Strict savings
          automatically. Daily, weekly or Monthly.</p>
        <p class='package-interest' style="color: rgb(13, 96, 216);">10% p.a</p>
      </div>
      <div class="package" style="background-color: rgb(255, 234, 245);">
        <img src='assets/img/Vector (1).png' width="30">
        <p class="package-name" style="color: rgb(231, 67, 156);">Flex Naira</p>
        <p class="package-info">Flexible savings for
          emergencies. Free transfers, withdrawals etc.</p>
        <p class='package-interest' style="color: rgb(231, 67, 156);">10% p.a</p>
      </div>
      <div class="package" style="background-color: rgb(231, 246, 255);">
        <img src='assets/img/Vector (2).png' width="30">
        <p class="package-name" style="color: rgb(34, 149, 242);">Safelock</p>
        <p class="package-info">Lock funds to avoid
          tempations. Upfront interest. </p>
        <p class='package-interest' style="color: rgb(34, 149, 242);">13% p.a</p>
        </a>
      </div>
      <div class="package" style="background-color: rgb(220, 255, 235);">
        <img src='assets/img/XMLID 992.png' width="30">
        <p class="package-name" style="color: rgb(39, 174, 96);">Targets</p>
        <p class="package-info">Reach your unique
          individual saving goals.</p>
        <p class='package-interest' style="color: rgb(39, 174, 96);">10% p.a</p>

        </a>
      </div>
      <div class="package" style="background-color: rgb(239, 244, 245);">
        <img src='assets/img/Vector (3).png' width="20">
        <p class="package-name" style="color: rgb(0, 0, 0);">Flex Dollar</p>
        <p class="package-info">Save &amp; grow your
          wealth in dollars. Interest in dollars</p>
        <p class='package-interest' style="color: rgb(0, 0, 0);">6% p.a</p>

        </a>
      </div>
    </div>
    <div class='interest-calculator'>
      <div class='form'>
        
        <form method='POST' action='api/v1/calcuteroi.php'>
        <div style='padding: 0px; height: 20px'> 
            <?php print_alert();?>
        </div><br>
          <div class='input-group'>
            <label for='capital'>Capital</label>
            <input type='number' name='capital' value="<? if(isset($_SESSION['capital']))  echo $_SESSION['capital']; else ''; ?>" id='capital' placeholder="&#8358;1200.00" required min=100>
            <p class='error' id='capital-error'></p>
          </div>
          <div class='input-group'>
            <label for='package'>Package</label>
            <select required id='package' name='package'>
              <option name='Piggybank' value='Select Package'>Select Package</option>
              <option name='Piggybank' value='piggybank'>Piggybank</option>
              <option name='Flex Naira' value='Flex Naira'>Flex Naira</option>
              <option name='Safelock' value='SafeLock'>SafeLock</option>
              <option name='Targets' value='Targets'>Targets</option>
              <option name='Flex Dollar' value='Flex Dollar'>Flex Dollar</option>
            </select>
            <p class='error' id='product-error'></p>
          </div>
          <div class='input-group'>
            <label for='month'>Month</label>
            <input type='number' id='month' value="<? if(isset($_SESSION['month'])) echo $_SESSION['month']; else ''; ?>" placeholder="Month" min="1" max="12">
            <p class='error' id='month-error'></p>
          </div>
          <!--<button type='button' id='calculate-btn'>Calcuate</button>-->
          <button type='submit' name="calculate" id='calculate-btn'>Calcuate</button>
        </form>
      </div>
      <div class='interest-output'>
        <div class="card">
          <div class='card-content'>
            <h1>Estimated Balance</h1>
            <p id='interest-output'></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <hr>
  <footer class='container'>
    <div class='footer'>
      <div class="about-piggy">
        <a href=''><img src="assets/img/piggy-png_1_.png" alt="Piggybank Logo"></a>
        <p>
          PiggyVest (formerly piggybank.ng) is the largest online savings & investing platform in Nigeria.
          For over 4 years, our customers have saved and invested billions of Naira that they would normally be
          tempted to spend.
        </p>
        <p>
          Office: Tesmot House, 3 Abdulrahman Okene Close, off Ligali Ayorinde Street, Victoria Island, Lagos.
          0700 933 933 933 (Mon-Fri from 9am-5pm) - contact@piggyvest.com
        </p>
        <p>
          © 2016 - 2020 PiggyTech Global Limited - RC 1405222
        </p>
      </div>
      <div class="footer-first-navbar">
        <ul>
          <h3>Quick Links</h3>
          <li>
            <a href="https://www.piggyvest.com/autosave">AutoSave™</a>
          </li>
          <li>
            <a href="https://www.piggyvest.com/link">PiggyLink</a>
          </li>
          <li>
            <a href="https://www.piggyvest.com/quicksave">Quick Save™</a>
          </li>
          </li>
          <li>
            <a href="https://www.piggyvest.com/safelock">SafeLock™</a>
          </li>
          <li>
            <a href="https://www.piggyvest.com/withdrawals">Withdrawals &amp; Breaking</a>
          </li>
          <li>
            <a href="https://www.piggyvest.com/salarysavingsteps">Salary Management</a>
          </li>
        </ul>

      </div>
      <div class="footer-second-navbar">
        <ul >
          <h3>COMPANY</h3>
          <li>
            <a href="https://www.piggyvest.com/about">About</a>
          </li>
          <li>
            <a href="https://www.piggyvest.com/faq">FAQs</a>
          </li>
          <li>
            <a href="https://www.piggyvest.com/terms">Terms of Use</a>
          </li>
          <li>
            <a href="https://www.piggyvest.com/privacy">Privacy Policy</a>
          </li>
          <li>
            <span class="icon">
              <a href="https://www.facebook.com/PiggybankNG" target="_blank"><img alt="Facebook"
                  src="https://www.piggyvest.com//images/social-media-icon-FB-80-min.png" width='40'></a>
            </span>

            <span class="icon">
              <a href="https://twitter.com/PiggybankNG" target="_blank"><img alt="Twitter"
                  src="https://www.piggyvest.com//images/social-media-icon-TWT-80-min.png" width='40'></a>
            </span>

            <span class="icon">
              <a href="https://instagram.com/PiggybankNG" target="_blank"><img alt="Instagram"
                  src="https://www.piggyvest.com//images/social-media-icon-instagram-80-min.png" width='40'></a>
            </span>
          </li>
        </ul>
      </div>
    </div>
    </main>

  </footer>
<script src='script.js'></script>
</body>

</html>