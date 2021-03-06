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
        <section id="top-title">
            
                <div class="container"> 
                    <div class="row">
                        <div class="col-md-12">
                            <div id="title-text" class="text-center">
                                <h3>Search Notes</h3>
                            </div>
                        </div>
                    </div>
                </div>
            
        </section>
        <div id="search">
            <div class="content-box-md">
                <div class="container">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading">
                                    <h3>Search and Filter notes</h3>
                                </div>
                            </div>
                        </div>
                        <div id="search-field">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <select id="search-notes" class="form-control arrow-down">
                                            <option selected>Search notes here</option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <select id="type" class="form-control arrow-down">
                                            <option selected>Select type</option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <select id="type" class="form-control arrow-down">
                                            <option selected>Select Catagory</option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <select id="university" class="form-control arrow-down">
                                            <option selected>Select University</option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <select id="course" class="form-control arrow-down">
                                            <option selected>Select Course</option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <select id="country" class="form-control arrow-down">
                                            <option selected>Select Country</option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                       
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <select id="rate" class="form-control arrow-down">
                                            <option selected>Select rating</option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>

        <!--display notes part-->
        <div id="display-notes">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h3>Total 18 notes</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-12">
                        <a href="note_details.php">
                            <div class="notes-img">
                                <img src="img/search/1.jpg">
                            </div>
                        </a>
                        <div class="notes-desc">
                            <div class="note-heading">
                                <h3>Computer Operating System - Final exam book with paper solution</h3>
                                <ul class="desc">
                                    <li><img src="img/front/university.png"><span>University of california,Us</span></li>
                                    <li><img src="img/front/pages.png"><span>201 pages</span></li>
                                    <li><img src="img/front/date.png"><span>Thu,Nov 20, 2020</span></li>
                                    <li><img src="img/front/flag.png"><span style="color: #df3434;">5 user marked this note as inappropriate</span></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="rate1">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <p>100 reviews</p>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md-4  col-sm-12 col-12">
                        <a href="note_details.php">
                            <div class="notes-img">
                                <img src="img/search/2.jpg">
                            </div>
                        </a>
                        <div class="notes-desc">
                            <div class="note-heading">
                                <h3>Computer Science</h3>
                                <ul class="desc">
                                    <li><img src="img/front/university.png"><span>University of california,Us</span></li>
                                    <li><img src="img/front/pages.png"><span>201 pages</span></li>
                                    <li><img src="img/front/date.png"><span>Thu,Nov 20, 2020</span></li>
                                    <li><img src="img/front/flag.png"><span style="color: #df3434;">5 user marked this note as inappropriate</span></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="rate2">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <p>100 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-12 col-12">
                        <a href="note_details.php">
                            <div class="notes-img">
                                <img src="img/search/3.jpg">
                            </div>
                        </a>
                        <div class="notes-desc">
                            <div class="note-heading">
                                <h3>Basic Computer Engineering Trch India Puublication series</h3>
                                <ul class="desc">
                                    <li><img src="img/front/university.png"><span>University of california,Us</span></li>
                                    <li><img src="img/front/pages.png"><span>201 pages</span></li>
                                    <li><img src="img/front/date.png"><span>Thu,Nov 20, 2020</span></li>
                                    <li><img src="img/front/flag.png"><span style="color: #df3434;">5 user marked this note as inappropriate</span></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="rate3">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <p>100 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-12 col-12">
                        <a href="note_details.php">
                            <div class="notes-img">
                                <img src="img/search/4.jpg">
                            </div>
                        </a>
                        <div class="notes-desc">
                            <div class="note-heading">
                                <h3>Computer Science Illuminated - Seventh Edition</h3>
                                <ul class="desc">
                                    <li><img src="img/front/university.png"><span>University of california,Us</span></li>
                                    <li><img src="img/front/pages.png"><span>201 pages</span></li>
                                    <li><img src="img/front/date.png"><span>Thu,Nov 20, 2020</span></li>
                                    <li><img src="img/front/flag.png"><span style="color: #df3434;">5 user marked this note as inappropriate</span></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="rate4">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <p>100 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-12 col-12">
                        <a href="note_details.php">
                            <div class="notes-img">
                                <img src="img/search/5.jpg">
                            </div>
                        </a>
                        <div class="notes-desc">
                            <div class="note-heading">
                                <h3>The Principles of Computer Hardware - oxford</h3>
                                <ul class="desc">
                                    <li><img src="img/front/university.png"><span>University of california,Us</span></li>
                                    <li><img src="img/front/pages.png"><span>201 pages</span></li>
                                    <li><img src="img/front/date.png"><span>Thu,Nov 20, 2020</span></li>
                                    <li><img src="img/front/flag.png"><span style="color: #df3434;">5 user marked this note as inappropriate</span></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="rate5">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <p>100 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-12 col-12">
                        <a href="note_details.php">
                            <div class="notes-img">
                                <img src="img/search/6.jpg">
                            </div>
                        </a>
                        <div class="notes-desc">
                            <div class="note-heading">
                                <h3>The Computer Book</h3>
                                <ul class="desc">
                                    <li><img src="img/front/university.png"><span>University of california,Us</span></li>
                                    <li><img src="img/front/pages.png"><span>201 pages</span></li>
                                    <li><img src="img/front/date.png"><span>Thu,Nov 20, 2020</span></li>
                                    <li><img src="img/front/flag.png"><span style="color: #df3434;">5 user marked this note as inappropriate</span></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="rate6">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <p>100 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-12 col-12">
                        <a href="note_details.php">
                            <div class="notes-img">
                                <img src="img/search/1.jpg">
                            </div>
                        </a>
                        <div class="notes-desc">
                            <div class="note-heading">
                                <h3>Computer Operating System - Final exam book with paper solution</h3>
                                <ul class="desc">
                                    <li><img src="img/front/university.png"><span>University of california,Us</span></li>
                                    <li><img src="img/front/pages.png"><span>201 pages</span></li>
                                    <li><img src="img/front/date.png"><span>Thu,Nov 20, 2020</span></li>
                                    <li><img src="img/front/flag.png"><span style="color: #df3434;">5 user marked this note as inappropriate</span></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="rate7">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <p>100 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4  col-sm-12 col-12">
                        <a href="note_details.php">
                            <div class="notes-img">
                                <img src="img/search/2.jpg">
                            </div>
                        </a>
                        <div class="notes-desc">
                            <div class="note-heading">
                                <h3>Computer Operating Science</h3>
                                <ul class="desc">
                                    <li><img src="img/front/university.png"><span>University of california,Us</span></li>
                                    <li><img src="img/front/pages.png"><span>201 pages</span></li>
                                    <li><img src="img/front/date.png"><span>Thu,Nov 20, 2020</span></li>
                                    <li><img src="img/front/flag.png"><span style="color: #df3434;">5 user marked this note as inappropriate</span></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="rate8">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <p>100 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-12 col-12">
                        <a href="note_details.php">
                            <div class="notes-img">
                                <img src="img/search/3.jpg">
                            </div>
                        </a>
                        <div class="notes-desc">
                            <div class="note-heading">
                                <h3>Basic Computer Engineering Tech India Publication Series</h3>
                                <ul class="desc">
                                    <li><img src="img/front/university.png"><span>University of california,Us</span></li>
                                    <li><img src="img/front/pages.png"><span>201 pages</span></li>
                                    <li><img src="img/front/date.png"><span>Thu,Nov 20, 2020</span></li>
                                    <li><img src="img/front/flag.png"><span style="color: #df3434;">5 user marked this note as inappropriate</span></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="rate9">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <p>100 reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--display notes part end-->
       <!--pagination-->
       <div>
        <div class="container">
            <div class="row">
                <div class="text-center col-md-12">
                     <nav  id="pagination-list">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><img src="img/front/left-arrow.png"></a></li>
                            <li class="page-item  active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#"><img src="img/front/right-arrow.png"></a></li>
                          </ul>
                     </nav>
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

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!-- custom jquery -->
        <script src="js/script.js"></script>
        
    </body>
</html> 
















