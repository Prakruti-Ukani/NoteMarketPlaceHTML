<?php
include "config.php";
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

    <!--rating star -->
    <link rel="stylesheet" href="css/rate/jsRapStar.css">
    
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
                                <div class="form-group search-icon">
                                    <img src="img/front/search-icon.png" style="position:relative;top: 30px;left: 10px;">
                                    <input type="text" placeholder="search notes here" class="form-control" style="padding-left: 35px;" name="search_note" id="search_note" onkeyup="searchByDropdown(1);">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <select id="type" class="form-control arrow-down" name="type" onchange="searchByDropdown(1);">
                                        <option disabled selected>Select Type</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM type WHERE isactive=1");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $typename = $row['name'];
                                            $typeid = $row['id'];
                                            echo "<option value='$typeid' >$typename</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <select id="category" class="form-control arrow-down" name="category" onchange="searchByDropdown(1);">
                                        <option disabled selected>Select category</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM category WHERE isactive=1");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $catname = $row['name'];
                                            $catid = $row['id'];
                                            echo "<option value='$catid'>$catname</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <select id="university" class="form-control arrow-down" name="university" onchange="searchByDropdown(1);">
                                        <option disabled selected>Select University</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT DISTINCT university FROM seller_note WHERE status=9");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $university = $row['university'];
                                            if(!empty($university) & $university!=' ')
                                            {
                                                echo "<option value='$university'>$university</option>";
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <select id="course" class="form-control arrow-down" name="course" onchange="searchByDropdown(1);">
                                        <option disabled selected>Select Course</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT DISTINCT course FROM seller_note WHERE status=9");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $course = $row['course'];
                                            if(!empty($course) & $course!=' ')
                                            {
                                                echo "<option value='$course'>$course</option>";    
                                            }
                                            
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <select id="country" class="form-control arrow-down" name="country" onchange="searchByDropdown(1);">
                                        <option disabled selected>Select country</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM country WHERE isactive=1");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $counname = $row['name'];
                                            $counid = $row['id'];
                                            echo "<option value='$counid'>$counname</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <select id="rate" class="form-control arrow-down" onchange="searchByDropdown(1);">
                                        <option selected disabled >Select rating</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
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

            <div id="fetchdata">
            </div>

        </div>
    </div>

    
    <!--display notes part end-->
    
    <!--footer-->
    <?php include "footer.php"; ?>
    <!--footer end-->



    <!--jquery-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.js"></script>

    <!--rating star-->
    <script src="js/rate/jsRapStar.js"></script>

    <!--bootstrap jquery-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- custom jquery -->
    <script src="js/script.js"></script>

    <script type="text/javascript">
        $(function() {
            searchByDropdown(1);
        });

        function searchByDropdown(page) {
            var search_txt = $("#search_note").val();
            var note_coun = $("#country").val();
            var note_course = $("#course").val();
            var note_uni = $("#university").val();
            var note_cat = $("#category").val();
            var note_type = $("#type").val();
            var note_rate=$("#rate").val();
            $.ajax({
                
                url: "search_note_data.php",
                type: "GET",
                data: {
                    search: search_txt,
                    selected_country: note_coun,
                    selected_category: note_cat,
                    selected_course: note_course,
                    selected_university: note_uni,
                    selected_type: note_type,
                    selected_rate:note_rate,
                    page: page 
                },
                success: function(data) {
                    $("#fetchdata").html(data);
                }
            });
    }
    </script>
</body>

</html>