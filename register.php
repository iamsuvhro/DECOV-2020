<?php
//index.php

$error = '';
$name = '';
$email = '';
$roll = '';
$teamsize = '';
$pcode = '';
$tname = '';
$search = '';
$data = fopen('registration.csv', 'a');
function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 //----------------------------------------------------------------------------
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 //------------------------------------------------------------------------------
 if(empty($_POST["roll"]))
 {
  $error .= '<p><label class="text-danger">roll is required</label></p>';
 }
 else
 {
  $search = $roll;
  if($search == $data){
   echo 'Your roll number already registered';
    }
  else{
  $roll = clean_text($_POST["roll"]);
   }
 }
 if(empty($_POST["roll"]))
 {
  $error .= '<p><label class="text-danger">Roll is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["roll"]);
 }
//---------------------------------------------------------
 // new block
 if(empty($_POST["teamsize"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Team Size</label></p>';
 }
 else
 {
  $teamsize = clean_text($_POST["teamsize"]);
  if($teamsize > "5")
  {
   $error .= '<p><label class="text-danger">Max 5 members allowed</label></p>';
  }
 }
 //-------------------------------------------------------------------------------
  if(empty($_POST["tname"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Team Size</label></p>';
 }
 else
 {
  $tname = clean_text($_POST["tname"]);
 }
 //-------------------------------------------------------------------------------
 if(empty($_POST["pcode"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Problem Code</label></p>';
 }
 else
 {
  $pcode = clean_text($_POST["pcode"]);
 }
 //--------------------------------------------------------------------------------

 if($error == '')
 {
  $file_open = fopen("registration.csv", "a");
  $no_rows = count(file("registration.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'roll' => $roll,
   'teamsize' => $teamsize,
   'pcode' => $pcode,
   'tname' => $tname,
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thanks for your Registration We will send you a confirmation mail</label>';
  $name = '';
  $email = '';
  $roll = '';
  $teamsize = '';
  $pcode = '';
 }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="theme-color" content="#ffffff"/>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="favicon.png">
    <link rel="icon" href="favicon.png">
    <title>
       Registration | Decov 20
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/material-kit.css?v=2.0.2">
    <!-- Documentation extras -->
    <link href="assets/assets-custom/demo.css" rel="stylesheet" />
    <link href="assets/assets-custom/css/speakers/style.css" rel="stylesheet">
    <link href="assets/assets-custom/css/base.css" rel="stylesheet">
    <link href="assets/assets-custom/css/footer.css" rel="stylesheet">
    <link href="assets/assets-custom/css/termynal.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>

    <!-- iframe removal -->
</head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
<body class="landing-page" name="top" id="top">
    <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav" style="background-color: grey;" >
        <div class="container">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="navbar-translate">
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto pos">
                    <li class="dropdown nav-item">
                        <a href="index.html" data-page="index" class="nav-link">
                            <span><b>Home</b></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" data-page="speakers" class="nav-link">
                            <span><b id="header_text">Problem Statements</b></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" data-page="schedule" class="nav-link">
                            <span><b id="header_text">About Us</b></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" data-page="team" class="nav-link">
                            <span><b id="header_text">Rules & Regulations</b></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <p>&nbsp;</p>
                    <h1>Registration form</h1><br>
                    <img src="reg.jpg" height="70%" width="90%">
                </div>
                <style>
                    .magic{
                        color: white;
                        width: 100px;
                        height: 45px;
                    }
                </style>
                <div class="col-md-6" style="margin:0 auto; float:none;">
                    <form method="post">
                     <br />
                     <?php echo $error; ?>
                     <!-------------------------------------- Registration Form ----------------------------------------->
                     <div class="form-group">
                      <label>Enter Name (Team Leader) *</label>
                      <input type="text" name="name" placeholder="Enter Name" class="form-control magic" value="<?php echo $name; ?>" />
                     </div>
                     <div class="form-group">
                      <label>Email Address (Team Leader) *</label>
                      <input type="text" name="email" class="form-control magic" placeholder="Enter Email" value="<?php echo $email; ?>" />
                     </div>
                     <div class="form-group">
                      <label>Univesity Roll Number (Team Leader) *</label>
                      <input type="text" name="roll" class="form-control magic" placeholder="Enter roll" value="<?php echo $roll; ?>" />
                     </div>
                    <div class="form-group">
                      <label>Enter your Team Size</label>
                      <input type="text" name="teamsize" class="form-control magic" placeholder="Enter Size" value="<?php echo $teamsize; ?>" />
                     </div>
                    <div class="form-group">
                      <label>Enter your Problem Code</label>
                      <input type="text" name="pcode" class="form-control magic" placeholder="Enter Problem Code" value="<?php echo $pcode; ?>" />
                     </div>
                      <label>Enter Team Name</label>
                      <input type="text" name="tname" placeholder="coders..... " class="form-control magic" value="<?php echo $tname; ?>" />
                     </div>
                     <div class="form-group" align="center">
                      <center><input type="submit" name="submit" class="btn btn-info" value="Submit" /></center>
                     </div>
                    </form>
                    <!---------------------------------------- closed --------------------------------------------------->
             </div>
        <div id="footer">
        <br><br>
        <a href="#top" id="top-button" style="color:rgb(0,101,202); background:white;">
                <i class="material-icons" style="color:rgb(0,101,202); background:white; font-size: 30px;">
                        keyboard_arrow_up
                        </i>
        </a>
        <div class="container" style="padding-top: 20px;">

            <div class="row">
                <div class="col-lg-3">
                    <div class="share-social share">
                        <span><b>SHARE</b>
                            <a href="https://facebook.com/sharer/sharer.php" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a>&nbsp;</a>
                            <a href="#"
                                target="_blank"><i class="fa fa-twitter"></i></a>
                        </span>
                    </div><br>
                </div>
                <div class="col-lg-3">
                    <div class="share-social">
                        <span><b>FOLLOW US</b><a>&nbsp;</a>
                            <a href="https://www.facebook.com/TIGCodeTigers/" target="_blank"><i class="fa fa-facebook"></i></a><a>&nbsp;</a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a>&nbsp;</a>
                            <a href="https://www.linkedin.com/company/code-tigers/" target="_blank"><i class="fa fa-linkedin"
                                    aria-hidden="true"></i></a><a>&nbsp;</a>
                        </span>
                    </div>
                </div><br>
                <div class="col-lg-3">
                    <div class="share-social">
                        <span><a href="mailto:code.tigers.innovation@gmail.com"><b>EMAIL US</b></a></span>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 footer-details">
                    <span><b>ABOUT</b></span>
                    <p>
                        <a href="#" target="_blank">Code Tigers</a><br />
                        <a href="https://twitter.com/hashtag/Decove2020" target="_blank"><b>#Decove2020</b></a> &nbsp;
                        <a href="https://twitter.com/hashtag/Codetigers2020" target="_blank"><b>#Codetigers2020</b></a>
                    </p>
                </div>
            </div>
        </div>
        <hr />
        <div class="container" style="padding-bottom: 20px;">

            <div class="row">
                <div class="col-lg-3">
                    <img src="img.jpeg" height="75%" width="75%" alt="codetiger-logo"  />
                </div>
                <div class="col-lg-9 copyright" style="font-family: 'Open Sans', sans-serif;">
                    &copy; Copyright 2020 | Team Code Tigers <span class="hide-bar"> | </span><a id="dev-credits" href="#" data-toggle="modal" onclick="var term = new Termynal('#termynal', {lineDelay: 750}); $('#myModal').css('padding-right', '0px !important');" data-target="#myModal">Developers Credits</a>
                </div>
            </div>
        </div>
    </div>
    


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="margin: 0 !important; width: calc(100vw + 15px) !important;">
  <div class="modal-dialog" style="margin: 0 !important; max-width: calc(100vw + 15px) !important; height: 100vh !important;">
    <!-- Modal content-->
    <div class="modal-content" style="height: 100vh !important">
      <div class="modal-body">
        <div id="termynal" data-ty-startDelay="600" style="height: 83vh;">
            <span data-ty="input">credits-roll</span>
            <span data-ty>Credits</span>
            <span data-ty>Developers: </span>
            <span data-ty class="termynal-tab">[1] <a href="https://github.com/suvhradipghosh07" target="_blank">Suvhradip Ghosh</a></span>
            <span data-ty>Designer: </span>
            <span data-ty class="termynal-tab">[1] <a href="#" target="_blank">Sayan Mondal</a></span>
            <span data-ty>Special Thanks to: </span>
            <span data-ty class="termynal-tab">[1] <a href="#" target="_blank">GDG Kolkata</a></span>
            <span data-ty class="termynal-dash-divider">---------------------------------------------------</span>
            <span data-ty="input" style="word-break: break-all;">Fork us on: https://github.com/suvhradipghosh07</span>
            <span data-ty class="termynal-dash-divider">---------------------------------------------------</span>
            <span data-ty="input">Are you ready to decode</span>
            </span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="background:rgb(0,101,202);">Close</button>
      </div>
    </div>

  </div>
</div>


    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/bootstrap-material-design.js"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="assets/js/material-kit.js?v=2.0.2"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="assets/assets-custom/js/material-kit-demo.js"></script>
    <script src="assets/assets-custom/termynal.min.js"></script>
    <script src="assets/assets-custom/main.js"></script>
    <script>
        $('document').ready(function () {
            function getLinks(links) {
                var result = '';
                links.forEach(function (link) {
                    if (link.linkType === 'Twitter') {
                        result += '<li style="color:rgb(0,101,202);"><a id="social_link1" href="' +
                            link.url +
                            '" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
                    }
                    if (link.linkType == 'LinkedIn') {
                        result += '<li style="color:rgb(0,101,202);"><a id="social_link1" href="' +
                            link.url +
                            '" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>';
                    }
                    if (link.linkType == 'Blog') {
                        result += '<li style="color:rgb(0,101,202);"><a id="social_link1" href="' +
                            link.url +
                            '" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
                    }
                });
                return result;
            }

            function getTemplate(speaker) {
                var template =
                    '                                                                                                                                               \
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 parent-card">                                                                                  \
                    <div class="card" data-id="' +
                    speaker.id +
                    '">                                                                                                                          \
                        <div class="box">                                                                                                                       \
                            <div class="img">                                                                                                                   \
                                <img src="' +
                    speaker.profilePicture +
                    '" alt="">                                                                                 \
                            </div>                                                                                                                              \
                            <h2 style="font-weight:400;">' +
                    speaker.fullName +
                    '<br></h2>                                                                                                 \
                            <p class="description">' +
                    speaker.bio.split('.')[0] +
                    '.</p>                                                                                            \
                            <span class="speaker-social">                                                                                                       \
                                <ul>' +
                    getLinks(speaker.links) +
                    '</ul>                                                                                         \
                            </span>                                                                                                                             \
                        </div>                                                                                                                                  \
                    </div>                                                                                                                                      \
                </div>                                                                                                                                          \
                '
                return template;
            }

            var html = '';
            $.getJSON('https://sessionize.com/api/v2/2uq21o2i/view/speakers', function (speakers) {
                speakers.forEach(function (speaker) {
                    html += getTemplate(speaker);
                });
                $('#container-speakers').append(html);
            });

        });
    </script>
</body>

</html>