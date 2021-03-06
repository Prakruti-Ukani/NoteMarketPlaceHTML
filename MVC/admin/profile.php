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
                                <h3>My Profile</h3>
                            </div>
                        </div>
                    </div>
                
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" id="fn" placeholder="Enter your first name" required>
                            </div>
                            <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control" id="ln" placeholder="Enter your last name" required>
                            </div>
                            <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your EmailId" required>
                            </div>
                            <div class="form-group">
                                    <label>Secondary Email </label>
                                    <input type="email" class="form-control" id="semail" placeholder="Enter your EmailId" required>
                            </div>
                            <div class="form-group">
                                    <label>Phone Number</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            
                                            <select id="phone" class="form-control filter arrow-down">
                                                <option selected>+91</option>
                                                <option></option>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="phone" placeholder="Enter your Phone number" required>
                                        </div>
                                    </div>
                            </div> 
                            <div class="form-group">
                                    <label>Upload Notes *</label>
                                    <div class="picture-upload">
                                        <label for="file-input">
                                            <img src="img/all/upload-file.png">
                                        </label>
                                        <input id="file-input" type="file">
                                    </div>
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
















