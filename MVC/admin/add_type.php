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
       
        <section id="add_page">
           <div class="content-box-md">
            <div class ="container">
                <div class="row" style="padding-top: 60px;">
                        <div class="col-md-8">
                            <div class="heading" style="margin-bottom: 20px;">
                                <h3>Add Type</h3>
                            </div>
                        </div>
                    </div>
                
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>Type*</label>
                                    <input type="text" class="form-control" id="type" placeholder="Enter Type" required>
                            </div>
                            <div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control desc-text" id="desc" placeholder="Enter your description" required cols="0"></textarea>
                            </div>
                        </div>
                    </div>
                        
                    <button type="submit" >SUBMIT</button>
                </form>
            </div>
           </div>
        </section>

        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        



        <!--jquery-->
        <script src="js/jquery.js"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        
    </body>
</html> 
















