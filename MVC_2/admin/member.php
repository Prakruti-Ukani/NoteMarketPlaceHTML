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
        
        <section id="table-design">
            <div class ="content-box-md">
                <div class="container">
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-8">
                            <div class="heading">
                                <h3>Members</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form class="dashboard-search">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group  search-icon">
                                            <img src="img/all/search-icon.png">
                                            <input type="text" class="form-control" id="search-notes" placeholder="Search" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 search-btn">
                                         <button>Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-format table-responsive">
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">FIRST NAME</th>
                                      <th scope="col">LAST NAME</th>
                                      <th scope="col">EMAIL</th>
                                      <th scope="col">JOINING DATE</th>
                                      <th scope="col">UNDER REVIEW NOTES</th>
                                      <th scope="col">PUBLISHED NOTES</th>
                                      <th scope="col">DOWNLOADED NOTES</th>
                                      <th scope="col">TOTAL EXPENSES</th>
                                      <th scope="col">TOTAL EARNINGS</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Khyati</td>
                                      <td>patel</td>
                                      <td>khyatipatel@gmail.com</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>19</td>
                                      <td>10</td>
                                      <td>22</td>
                                      <td>$220</td>
                                      <td>$177</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Deactive</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    <tr>
                                      <td>1</td>
                                      <td>Khyati</td>
                                      <td>patel</td>
                                      <td>khyatipatel@gmail.com</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>19</td>
                                      <td>10</td>
                                      <td>22</td>
                                      <td>$220</td>
                                      <td>$177</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Deactive</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>1</td>
                                      <td>Khyati</td>
                                      <td>patel</td>
                                      <td>khyatipatel@gmail.com</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>19</td>
                                      <td>10</td>
                                      <td>22</td>
                                      <td>$220</td>
                                      <td>$177</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Deactive</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>1</td>
                                      <td>Khyati</td>
                                      <td>patel</td>
                                      <td>khyatipatel@gmail.com</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>19</td>
                                      <td>10</td>
                                      <td>22</td>
                                      <td>$220</td>
                                      <td>$177</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Deactive</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>1</td>
                                      <td>Khyati</td>
                                      <td>patel</td>
                                      <td>khyatipatel@gmail.com</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>19</td>
                                      <td>10</td>
                                      <td>22</td>
                                      <td>$220</td>
                                      <td>$177</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Deactive</a>
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
                 
            </div>
        </section>
            <!--pagination-->
           <div class="page">
            <div class="container">
                <div class="row">
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



       
    </body>
</html> 
















