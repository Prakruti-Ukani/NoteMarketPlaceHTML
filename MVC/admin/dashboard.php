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
        
        <section id="dashboard">
            <div class ="content-box-md" style="margin-bottom: -50px;">
                <div class="container">
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-8">
                            <div class="heading" style="margin-bottom: 20px;">
                                <h3>Dashboard</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 text-center col-sm-12 col-12 col-md-4">
                          <div class="dashboard-box">
                            <h3>20</h3>
                            <p>Number of notes in review for publish</p>
                          </div>
                        </div>
                        <div class="col-lg-4 text-center col-sm-12 col-12 col-md-4">
                          <div class="dashboard-box">
                            <h3>12</h3>
                            <p>Number of new notes downloaded<br>(Last 7 days)</p>
                          </div>
                        </div>
                        <div class="col-lg-4 text-center col-sm-12 col-12 col-md-4">
                          <div class="dashboard-box">
                            <h3>102</h3>
                            <p>Number of new registration(Last 7 days)</p>
                          </div>
                        </div>
                      </div>
                </div>
                 
            </div>
        </section>
        <section id="table-design">
            <div class ="content-box-md">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                            <div class="sub-heading">
                                <h3>Published Notes</h3>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-12">
                            <form class="dashboard-search">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                                        <div class="form-group  search-icon">
                                            <img src="img/all/search-icon.png">
                                            <input type="text" class="form-control" id="search-notes" placeholder="Search" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 search-btn col-12">
                                         <button>Search</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                         <div class="form-group">
                                            <select id="month" class="form-control filter arrow-down select-name">
                                                    <option selected>Select name</option>
                                                    <option>..</option>
                                                    <option>..</option>
                                                    <option>..</option>
                                            </select>
                                        </div>
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
                                      <th scope="col">TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">ATTACHMENT SIZE</th>
                                      <th scope="col">SELL TYPE</th>
                                      <th scope="col">PRICE</th>
                                      <th scope="col">PUBLISHER</th>
                                      <th scope="col">PUBLISHED DATE</th>
                                      <th scope="col">NUMBER OF DOWNLOADS</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>10 KB</td>
                                      <td>Free</td>
                                      <td>$0</td>
                                      <td>Pritesh Panchal</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>10 KB</td>
                                      <td>Free</td>
                                      <td>$0</td>
                                      <td>Pritesh Panchal</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>3</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>10 KB</td>
                                      <td>Free</td>
                                      <td>$0</td>
                                      <td>Pritesh Panchal</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>4</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>10 KB</td>
                                      <td>Free</td>
                                      <td>$0</td>
                                      <td>Pritesh Panchal</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                          </div>
                                        </div>
                                      </td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>5</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>10 KB</td>
                                      <td>Free</td>
                                      <td>$0</td>
                                      <td>Pritesh Panchal</td>
                                      <td>09-10-2020, 10:10</td>
                                      <td>10</td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
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
















