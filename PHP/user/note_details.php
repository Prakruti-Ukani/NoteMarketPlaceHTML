<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <!--title-->
        <title>Notes Marketplace</title>

        <!--favicon-->
        <link rel="shortcut icon" href="img/front/favicon.ico">

       <!--font-->
       <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

       <!--bootstrap css-->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">


       <!--custom css-->
        <link rel="stylesheet" href="css/custom_css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

    </head>
    <body>
        <!--navbar-->
        <?php include "header.php"; ?>
        <!--navbar end-->
        <section id="note-details">
            <div class="content-box-md">
                <div class="container"> 
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="note-heading">
                              <h4>Notes Details</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-12 col-12">
                            <div id="note-left">
                              <div class="row">
                                <div class="col-md-5 col-sm-5 col-12">
                                  <div class="notes-img">
                                    <img src="img/notes/1.jpg">
                                  </div>
                                </div>
                                 <div class="col-md-7 col-sm-7 col-xs-7">
                                  <h3>Computer Science</h3>
                                  <span>Science</span>
                                  <p class="left-para">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  quis.  </p>
                                  <?php if(isset($_SESSION['login']))
                                  {?>
                                      <button class="download-btn" type="submit" data-toggle="modal" data-target="#download-modal">DOWNLOAD / $15</button>
                                      
                                  <?php }else{ ?>
                                      <button class="download-btn" type="submit" onclick="window.location.href='login.php';">DOWNLOAD / $15</button>
                                      
                                  <?php } ?>
                                  <!-- Modal -->
                                    <div class="modal fade " id="download-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                          <div class="modal-img">
                                              <img src="img/notes/SUCCESS.png">
                                              
                                            </div>
                                            <div class="close-btn">
                                              <button type="button" data-dismiss="modal" ><img src="img/notes/close.png"></button>
                                            </div>
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thank you for purchasing</h5>
                                            
                                          </div>
                                          <div class="modal-body">
                                            <p><b>Dear smith,</b></p>
                                            <p>As this is paid notes you need to pay rahil shah offline. we will send him an email that you want to download this notes. He may contact you for the further process completion.</p>
                                            <p>In case you have urgency
                                            <br>Please contact us on +9127389370</p>
                                            <p>Once the receives the payment and acknowledge us. selected notes you can see over my downloads tab for download</p>
                                            <p>Have a good day</p>

                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div id="note-right">
                                  <table width="100%">
                                    <tr>
                                      <td class="left">Institution</td>
                                      <td class="right">University of California</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Country</td>
                                      <td class="right">United State</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Course name</td>
                                      <td class="right">Computer Engineering</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Course code</td>
                                      <td class="right">248705</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Professor</td>
                                      <td class="right">Mr. Richard Brown</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Number Of Pages</td>
                                      <td class="right">277</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Approved Date</td>
                                      <td class="right">November 25 2020</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Rating</td>
                                      <td class="right">
                                        <div class="stars">
                                          <img src="img/front/star.png">
                                          <img src="img/front/star.png">
                                          <img src="img/front/star.png">
                                          <img src="img/front/star.png">
                                          <img src="img/front/star-white.png">
                                            100 Reviews
                                        </div>

                                      </td>
                                    </tr>
                                  </table>
                               
                              <p>5 users marked this note as inappropriate</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="note-details-bottom">
            <div class="container"> 
                    <div class="row">
                        <div class="col-md-5">
                          <div class="note-bottom-left">
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="note-heading">
                                    <h4>Notes Preview</h4>
                                  </div>
                                  <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                                    <div class="responsive-wrapper 
                                       responsive-wrapper-padding-bottom-90pct"
                                       style="-webkit-overflow-scrolling: touch; overflow: auto;">
                                       <iframe src="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf" >
                                        <p style="font-size: 110%;"><em><strong>ERROR: </strong>  
                                  An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file <a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">with this link.</a></p>
                                      </iframe>
                                    </div>
                                  </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                          <div id="note-bottom-right">
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="note-heading">
                                    <h4>Customer Review</h4>
                                  </div>
                                  <div class="content">
                                    <!--content 1-->
                                    <div class="content-1">
                                      <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                          <img src="img/front/reviewer-1.png" class="profile-img">
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                          <h3>Richanrd Brown</h3>
                                          <div class="stars text-left">
                                            <img src="img/front/star.png">
                                            <img src="img/front/star.png">
                                            <img src="img/front/star.png">
                                            <img src="img/front/star.png">
                                            <img src="img/front/star-white.png"> 
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua. Ut enim.</p>
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <!--content 2-->
                                    <div class="content-2">
                                      <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                          <img src="img/front/reviewer-2.png" class="profile-img">
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                          <h3>Alice Ortiaz</h3>
                                          <div class="stars text-left">
                                            <img src="img/front/star.png">
                                            <img src="img/front/star.png">
                                            <img src="img/front/star.png">
                                            <img src="img/front/star.png">
                                            <img src="img/front/star-white.png">
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua. Ut enim.</p>
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <!--content 3-->
                                    <div class="content-3">
                                      <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                          <img src="img/front/reviewer-3.png" class="profile-img">
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                          <h3>Sara Passmore</h3>
                                          <div class="stars text-left">
                                              <img src="img/front/star.png">
                                              <img src="img/front/star.png">
                                              <img src="img/front/star.png">
                                              <img src="img/front/star.png">
                                              <img src="img/front/star-white.png">     
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua. Ut enim.</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                    
            </div>
        </section>
        
        

        
        <!--footer start-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        
        <!--jquery-->
        <script src="js/jquery.js"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!--custom js-->
        <script src="js/script.js"></script>
        
    </body>
</html> 
















