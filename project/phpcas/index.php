<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"
    defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"
    defer></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <script src="./index.js" defer></script>
  <link rel="stylesheet" href="./index.css">

  <title>Index</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <img src="../images/rpilogo.png" alt="logo" id="headerlogo">
      <form class="d-flex">
        <?php
            include_once("./CAS-1.4.0/CAS.php");
            phpCAS::client(CAS_VERSION_2_0, 'cas.auth.rpi.edu', 443, '/cas');
            phpCAS::setNoCasServerValidation();

            if (phpCAS::isAuthenticated()) {
              //  echo "User: " . phpCAS::getUser();
              header('Location: ../mainpage.php');
              //  echo "<a href='../logout.php'>Logout</a>";
            } else {
              echo "<a href='../login.php' class='buttons'>Login</a>";
            }
            ?>
        <button class="buttons" onclick="window.location.href='../lab1/index.html'">About Us</button>
      </form>
    </div>
  </nav>


  <section>
    <div class="container">
      <div class="row">
        <div class="col">
          <a href="#"><img src="../images/logo.png" alt="logo" class="logo"> </a>
        </div>
        <div class="col">
          <img src="../images/rpilogo.png" alt="logo" class="logo">
        </div>
      </div>
      <div class="row">
        <p class="text-center">
          <i>Having trouble with WEB DEVLOPMENT, DATA STRUCTURES, FOUNDUATION OF COMPUTER SCIENCE, COMPUTER
            ORGANIZATONS:</i>
          <br>
          Sign up today and get help from your fellows today!
        </p>

      </div>
      <div class="row align-items-center justify-content-center">
        <button class="buttons" onclick="window.location.href='#aboutus'">About Us</button>
        <?php
                //log in button does not work properly
                if (phpCAS::isAuthenticated()) {
                  echo "User: " . phpCAS::getUser();
                  echo "<a href='logout.php'>Logout</a>";
                } else {
                  echo "<a href='login.php' class='buttons'>Login</a>";
                }
                ?>
        <button class="buttons" onclick="window.location.href='#whyus'">Why Us</button>
      </div>
      <p class="text-center text-danger"><i>* This is a site for us RPI students so please signup with RCS. =)</i></p>
    </div>

  </section>

  <section id="whyus">
    <div class="container reveal">
      <h2>Why Us!</h2>
      <div class="text-container">
        <p class="intro bg-light">
          Our team plans to develop a blogging platform for CS and ITWS students at RPI. Our website aims to provide
          users with a resource-rich community hub. Any coding question is acceptable; it is not just limited to
          assignments for the lecture, labs, and exams. Users will be able to connect with people who have similar
          interests to them on this platform and make new acquaintances they might not have otherwise made in their
          lectures or lab. We want to create connections between all of our users so they can develop an interest in
          learning.<br>
        </p>
      </div>

    </div>
    </div>
  </section>

  <section>
    <div class="container reveal">
      <h2>Studies</h2>
      <div class="text-container">

        <div class="text-box">
          <img src="../images/data1.png" alt="data1" class="data">
        </div>
        <div class="text-box">
          <img src="../images/data2.png" alt="data2" class="data">
        </div>
        <div class="text-box">
          <img src="../images/data3.png" alt="data3" class="data">
        </div>

      </div>
      <div class="text-container">
        Studies have shown that more people are willing to help people in discord other than submitty form. After
        interviewing them they have said that they would love to help others and meet new friends but submitty fourms
        seems to be too formal and sometime may let others feel stupid and wont to able to fully express themselves.
      </div>
    </div>
  </section>

  <section id="aboutus">
    <div class="container reveal">
      <h2>About Us</h2>
      <div class="text-container">
        <div class="text-box">
          <h3><img src="../images/wendy.jpg" alt="wendy" class="profile"></h3>
          <div class="h-card vcard text-center">
            <div class="adr">
              <span class="p-name">Wendy Yang</span>
              <div class="p-org">Rensselaer Polytechnic Institute</div>
              <div class="p-street-address">1999 Burdett Ave </div>
              <span class="p-locality">Troy</span>,
              <span class="p-region">NY</span>,
              <span class="p-postal-code">12180</span>
              <span class="p-country-name">USA</span>
            </div>
            <span class="p-phone">(917)-743-0138</span>
            <div class="yang-other">
              <span class="u-email">wendyyang905@gmail.com</span>
            </div>
          </div>
        </div>
        <div class="text-box">
          <h3><img src="../images/Mishacropped.jpeg" alt="misha" class="profile"></h3>
          <div class="h-card vcard text-center">
            <span class="p-name">Misha Scokalo</span>
            <div class="p-org">Rensselaer Polytechnic Institute</div>
            <a class="u-email" href="mailto:mishascokalo@gmail.com">
              mishascokalo@gmail.com
            </a>
            <div class="adr">
              <div class="p-street-address">999 Snow drive</div>
              <span class="p-locality">Santa's workshop</span>,
              <span class="p-region">North Pole</span>,
              <span class="p-postal-code">00001</span>
              <span class="p-country-name">The Arctic</span>
            </div>
          </div>
        </div>
        <div class="text-box">
          <h3><img src="../images/Kazuki.jpeg" alt="kazuki" class="profile"></h3>
          <div class="h-card vcard text-center">
            <span class="p-name">Kazuki Neo</span>
            <div class="p-org">Rensselaer Polytechnic Institute</div>
            <a class="u-email" href="mailto:kazneo213@gmail.com">
              kazneo213@gmail.com
            </a>
            <div class="adr">
              <div class="p-street-address">Metropolitan Ave</div>
              <span class="p-locality">Brooklyn</span>,
              <span class="p-region">NY</span>,
              <span class="p-postal-code">11211</span>
              <span class="p-country-name">USA</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <button class="buttons" onclick="window.location.href='../lab1/index.html'">Explore Team Profile</button>
  </footer>


</body>

</html>