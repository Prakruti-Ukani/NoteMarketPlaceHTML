<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <!--title-->
        <title>Notes Marketplace</title>

        <!--favicon-->
        <link rel="shortcut icon" href="img/all/favicon.ico">

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
        <section id="member-details">
            <div class="content-box-md">
                <div class="container"> 
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="note-heading">
                              <h4>Member Details</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div>
                              <div class="row">
                                <div class="col-lg-2 col-md-12 col-sm-5 col-12">
                                  <div class="member-img">
                                    <img src="img/all/member.png">
                                  </div>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-7">
                                  <div id="member-left">
                                  <table width="100%">
                                    <tr>
                                      <td class="left">First Name:</td>
                                      <td class="right">Richard</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Last Name:</td>
                                      <td class="right">Brown</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Email</td>
                                      <td class="right">richardbrown77@gmail.com</td>
                                    </tr>
                                    <tr>
                                      <td class="left">DOB:</td>
                                      <td class="right">13-08-1990</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Phone Number:</td>
                                      <td class="right">3843984939</td>
                                    </tr>
                                    <tr>
                                      <td class="left">College/University</td>
                                      <td class="right">University of California</td>
                                    </tr>
                                    
                                  </table>
                                  </div>
                                  
                                </div>
                                <div class=" col-lg-5 col-md-5 col-sm-7 col-xs-7">
                                  <div id="member-right">
                                  <table width="100%">
                                    <tr>
                                      <td class="left">Address 1:</td>
                                      <td class="right">144-Diamond Height</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Address 2:</td>
                                      <td class="right">Star Colony</td>
                                    </tr>
                                    <tr>
                                      <td class="left">City:</td>
                                      <td class="right">New York</td>
                                    </tr>
                                    <tr>
                                      <td class="left">State</td>
                                      <td class="right">New York State</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Country</td>
                                      <td class="right">United State</td>
                                    </tr>
                                    <tr>
                                      <td class="left">Zip Code</td>
                                      <td class="right">11004-05</td>
                                    </tr>
                                    
                                  </table>
                                  </div>
                                  
                                </div>
                              </div>
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
        <section id="table-design">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-heading">
                                <h3>Notes</h3>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-format table-responsive">
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">STATUS</th>
                                      <th scope="col">DOWNLOADED NOTES</th>
                                      <th scope="col">TOTAL EARNINGS</th>
                                      <th scope="col">DATE ADDED</th>
                                      <th scope="col">PUBLISHED DATE</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td><a href="#">Software Development</a></td>
                                      <td>IT</td>
                                      <td>published</td>
                                      <td>22</td>
                                      <td>$177</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td><a href="#">Software Development</a></td>
                                      <td>IT</td>
                                      <td>published</td>
                                      <td>22</td>
                                      <td>$177</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>3</td>
                                      <td><a href="#">Software Development</a></td>
                                      <td>IT</td>
                                      <td>published</td>
                                      <td>22</td>
                                      <td>$177</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>4</td>
                                      <td><a href="#">Software Development</a></td>
                                      <td>IT</td>
                                      <td>published</td>
                                      <td>22</td>
                                      <td>$177</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>5</td>
                                      <td><a href="#">Software Development</a></td>
                                      <td>IT</td>
                                      <td>published</td>
                                      <td>22</td>
                                      <td>$177</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    
                                  </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

                </div>
       </section>
        
       <!--pagination-->
           <div class="page">
            <div class="container">
                <div class="row" style="padding-top: 40px;">
                    <div class="text-center col-md-12">
                         <div  id="pagination-list">
                              <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><img src="img/all/left-arrow.png"></a></li>
                                <li class="page-item  active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#"><img src="img/all/right-arrow.png"></a></li>
                              </ul>
                         </div>
                    </div>
                </div>
            </div>
           </div>
           <!--pagination end-->
        

        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        
        <!--jquery-->
        <script src="js/jquery.js"></script>

        <!--popper js-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!--custom js-->
        <script src="js/script.js"></script>
        
    </body>
</html> 
















