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
                                <h3>Manage System Configuration</h3>
                            </div>
                        </div>
                    </div>
                
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>Support emails address *</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                    <label>Supprt phone number *</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter phone number" required>
                            </div>
                            <div class="form-group">
                                    <label>Email Address(es)(for various events system will send notifications to these users)*</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your EmailId" required>
                            </div>
                            <div class="form-group">
                                    <label>Facebook URL </label>
                                    <input type="text" class="form-control" id="furl" placeholder="Enter facebook url" >
                            </div>
                            <div class="form-group">
                                    <label>Twitter URL </label>
                                    <input type="text" class="form-control" id="turl" placeholder="Enter twitter url" >
                            </div>
                            <div class="form-group">
                                    <label>LinkedIn URL </label>
                                    <input type="text" class="form-control" id="lurl" placeholder="Enter linkedin url" >
                            </div>
                           <div class="form-group">
                                    <label>Default image of notes (if seller do not upload) </label>
                                    <div class="picture-upload">
                                        <label for="file-input">
                                            <img src="img/all/upload-file.png">
                                        </label>
                                        <input id="file-input" type="file">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label>Default profile picture (if seller do not upload) </label>
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
















