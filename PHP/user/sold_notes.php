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
        
        <section id="table-design">
            <div class ="content-box-md">
                <div class="container">
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-8">
                            <div class="heading">
                                <h3>My Sold Notes</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group  search-icon">
                                            <img src="img/front/search-icon.png">
                                            <input type="text" class="form-control" id="search-notes" placeholder="   Search notes here" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2 search-btn">
                                         <button>Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-format table-responsive">
                            <table class="table" style="min-width: 900px;">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR NO.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">BUYER</th>
                                      <th scope="col">SELL TYPE</th>
                                      <th scope="col">PRICE</th>
                                      <th scope="col">DOWNLOAD DATE/TIME</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                   
                                    <tr>
                                      <td>4</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>5</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>6</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>7</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                   
                                    <tr>
                                      <td>8</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>9</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>10</td>
                                      <td>Data Science</td>
                                      <td>Science</td>
                                      <td>testing123@gmail.com</td>
                                      <td>Paid</td>
                                      <td>$250</td>
                                      <td>27 Nov 2020, 11:24:34</td>
                                      <td><img src="img/front/eye.png"></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Note</a>
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
                                <li class="page-item"><a class="page-link" href="#"><img src="img/front/left-arrow.png"></a></li>
                                <li class="page-item  active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#"><img src="img/front/right-arrow.png"></a></li>
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
















