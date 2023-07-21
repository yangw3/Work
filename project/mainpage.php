<?php
session_start();
$_SESSION['page'] = "mainpage.php";
?>
<?php
include "connect.php";
// $stmt = $db->prepare('SELECT * FROM `posts` ORDER BY `date` DESC LIMIT 10');
$stmt = $db->prepare('SELECT * FROM `posts` ORDER BY `date` DESC');
$stmt->execute();
$results = $stmt->fetchAll();

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Any other includes -->
  <link rel="stylesheet" href="./mainpage.css">
  <?php 
    // Template head for most pages
    include('allHead.php');
  ?>
  
</head>

<body>
  <div class="navbar position-top sticky-top">
    <a href="#"> <img src="./images/logo.png" alt="SegFault Logo" class="headerlogo"></a>

    <div class="user-action">
      <div class="profile" onclick="menutoggle();">
        <h3 id="rcsid">
          <?php
          session_start();
          if ($_SESSION['userid'] == NULL) {
            echo "null";
          } else {
            echo $_SESSION['userid'];
          }
          ?>
        </h3>
      </div>
      <div class="menu">
        <ul>
          <li><img src="./images/mail.png" alt="mail" class="usericon"><a href="#">&nbsp;&nbsp;&nbsp; Inbox</a></li>
          <br>
          <li><img src="./images/user.png" alt="image" class="usericon"><a href="blog.php?search=<?php session_start();
          echo $_SESSION['userid'] ?>">&nbsp;&nbsp;&nbsp; View
              Profile</a>
          </li>
          <br>
          <li><img src="./images/logout.png" alt="logout" class="usericon"><a href="./logout.php">&nbsp;&nbsp;&nbsp;
              Logout</a></li>
        </ul>
      </div>
    </div>
  </div>

  <br>
  <p class="text-center">Join us in a community full of love and passion about coding!</p>


  <div class="container-md ">
    <div class="row no-gutters  col-lg">
      <div class="col-1">
        <br>
        <button type="button" class="btn icon-btn add-btn text-center" data-toggle="modal" data-target="#exampleModal">

          <span class="btn-txt">Feedback</span>
        </button>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">What is segfault?</button> -->


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Seg-fault appericate your feed back tell us what we can do to provide you with a better experience.
                  Please click on the link below </p>
                <a href="https://docs.google.com/forms/d/1Ia6012Q8GISFgGChHvdxb6UvIn7h7ETLhSsfVw5oHuM/edit">Link
                  here!</a>
              </div>

            </div>
          </div>
        </div>

        <br>
        <div class="sidenav sticky-right">
          <h2 class="text-center">Tags</h2>
          <hr>
          <a href="search.php?search=c%2B%2B">C++</a>
          <a href="search.php?search=python">Python</a>
          <a href="search.php?search=mips">Mips</a>
          <a href="search.php?search=javascript">Javascript</a>
          <a href="search.php?search=webdev">Web development</a>
        </div>

        <div class="sidenav search">
          <h2 class="text-center">Looking for your Friend's Post?</h2>
          <p class="text-center">Search here!</p>
          <form action="blog.php" method="get">
            <input type="text" name="search" placeholder="Search.." required>
            <input type="submit" value="Search">
          </form>
        </div>

      </div>


      <div class="column2 col-9">
        <div id="formToggle">
          <button id="formToggleBtn" onclick="toggleForm()">Post</button>
        </div>
        <div class="post">
          <div id="formArea">
            <br>
            <form action="addPostData.php" method="post">
              <label for="postTitle">
                <h2>Title: </h2>
              </label>
              <input type="text" id="postTitle" class="singletextbox" name="Title" required><br>
              <label for="postBody">
                <h3>Body:</h3>
              </label>
              <p>Be specific in your question, Include all the information that you think others need to answer your
                question</p>
              <textarea id="postBody" name="Body" required></textarea>
              <label for="postTag">
                <h3>Tags: </h3>
              </label>
              <p>Choose the tags that best fit your question</p>

              <input type="checkbox" id="c++" value="c++" name="check_list[]"> <label for="c++"> C++ </label><br>
              <input type="checkbox" id="python" value="python" name="check_list[]"> <label for="python"> Python
              </label><br>
              <input type="checkbox" id="mips" value="mips" name="check_list[]"> <label for="mips"> Mips </label><br>
              <input type="checkbox" id="javascript" value="javascript" name="check_list[]"><label for="javascript">
                Javascript </label><br>
              <input type="checkbox" id="webdev" value="webdev" name="check_list[]"> <label for="webdev"> Web
                development</label><br><br>
              <button id="postBtn" onclick="makePost()" type="submit">Post</button>
            </form>

          </div>


        </div>
        <div id="postArea">
          <?php
          if (count($results) > 0) {
            foreach ($results as $r) {
              // echo ($r["postId"]);
              $sql = $db->prepare('SELECT `comment`, `rcsid` from `comments` WHERE postId = ' . $r['postId']);
              $sql->execute();
              $output = $sql->fetchAll();
              echo ('<div class=\'actualpost\'>');
              echo ($r['rcsid']);
              echo ('<h2 class=\'entryTitle\'>');
              echo ('#' . $r['postId'] . '  ' . $r['title']);
              echo ('</h2><p class=\'postDate\'>');
              echo ($r['date']);
              echo ('</p><p class=\'entryBody\'>');
              echo ($r['body']);
              echo ('</p>');
              //comments starts here 
          
              echo ("<div  class='btn-group' role='group' aria-label='Basic example'><button class='postbtn' id='showComment");
              echo ($r["postId"] . "'");
              echo ("' type='button' data-toggle='modal' data-target='.bd-example-modal-lg' onclick=\"showHide(" . $r['postId'] . ")\">".count($output)." Comments</button>");
              echo (" <button class='postbtn' id='hideComment" . $r['postId'] . "' style='display:none'");
              echo ("' type='button' data-toggle='modal' data-target='.bd-example-modal-lg' onclick=\"showHide(" . $r['postId'] . ")\">Hide Comments</button> ");
              echo ("</div>");
              echo ('<div class=\'delReport\'>');
              if( $_SESSION['userid'] === $r['rcsid'] ){
                echo ("<button> <a href='deletePost.php?postId=".$r['postId']."' style='text-decoration:none; color:inherit;'>Delete</a></button>");           
              }
              echo ("<button type='button' class='postbtn' data-toggle='modal' data-target='#reportform' id='report'><span class='text'>Report</span> </button>");
              echo ("</div>");

              //report form starts here
              echo ("<div class='modal fade' id='reportform' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
                aria-hidden='true'>");
                echo ("<div class='modal-dialog' role='document'>");
                  echo ("<div class='modal-content'>");
                  echo("<div class='modal-header'>");
                  echo ("<h2 class='modal-title text-danger' id='reportlabel'>Report</h2>");
                  echo ("<button type='button' class='close' data-dismiss='modal' aria-label='Close'>");
                  echo("<span aria-hidden='true'>&times;</span>");
                  echo("</button>"); 
                  echo ("</div>");
                  echo ("<div class='modal-body'>");
                  echo ("<p>");
                  echo("Since this is platform provide for students at RPI all rules and regulations will still apply this includes and are not limited to discrimination, harassment, academic integrity and etc. For more information visit <a href='https://rpi.app.box.com/s/d4ndpn3f7qdwxh9jaz5n1hkkr0mnd25e'>Rensselaer Handbook of Student Rights and Responsibilities</a>");
                  echo ("</p>");
                  echo("<hr>");
                  echo("<form action='addReportData.php?postid=".$r['postId']."' method='post'>");
                  echo("<label for='reason'>Reason for report: </label>");
                  echo("<select name='reason' id='reason'>");
                  echo("<option selected>Choose...</option>");
                  echo("<option value='Discrimination'>Discrimination</option>");
                  echo("<option value='Harassment'>Harassment</option>");
                  echo("<option value='Academic Integrity'>Volation of Academic Integrity</option>");
                  echo("<option value='Academic Fraud'>Academic Fraud</option>");
                  echo("<option value='spam'>Spam</option>");
                  echo("<option value='Other'>Others</option>");
                  echo("</select>");
                  echo("<br>");
                  echo("<br>");
                  echo( "<button type='submit' class='buttons'>Submit</button>");
                  echo("</form>");
                  echo("
                    </div>
                  </div>
                </div>
              </div>");
              //report form ends here
              
              echo ('<div class="actualComment" id="' . $r["postId"] . '">');
              echo ('<hr>');
              echo ('<div>');
              // $postid = $r['postId'];
              echo ('<form action="addComments.php?postid=' . $r['postId'] . '" method="post">');
              echo ('<input type="text" name="comment" placeholder="Comment here" required></input><input type="submit" value="Post">');
              echo ('</form>');
              // comment output
              echo ('</div>');
              if (count($output) > 0) {
                foreach ($output as $o) {
                  echo ('<br><p><b>' . $o['rcsid'] . '</b> : ' . $o['comment'] . '</p>');
                }
              } else {
                echo ('<p>No Comments</>');
              }
              echo ('</div></div>');

            }
          }
          ?>
        </div>
      </div>


      <div class="col-1 ">
        <div class="sidebar ">
          <h2>Other Resources </h2>
          <hr>
          <h4>ALAC</h4>
          <p>
            Academy Hall, Suite 4226 <br>
            Mon-Fri: 9am - 4:30pm
          </p>
          <h4>Student Living <br>and Learning</h4>
          <!-- <p>Mon-Fri: 8am - 5pm</p> -->
          <p>
            Commons West <br>
            Mon-Fri: 8am - 5pm
          </p>
          <h4>Registrar's Office</h4>
          <p>
            Academy Hall, Suite 2600<br>
            Monday-Wednesday, Friday: 8:30am - 4:30pm<br>
            Thursday 9am - 4:30pm
          </p>
          <h4>For more information visit Submitty or LMS</h4>
          <br>
        </div>
      </div>

    </div>
  </div>





  <br>
</body>

</html>