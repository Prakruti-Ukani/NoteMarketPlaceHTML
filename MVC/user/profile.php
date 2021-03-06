T<!DOCTYPE html>
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
                                <h3>User Profile</h3>
                            </div>
                        </div>
                    </div>
                </div>
            
        </section>
        <section id="details">
            <div class ="container">
                
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Basic Profile Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" id="fn" placeholder="Enter your First name" required>
                            </div>
                            <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email address" required>
                            </div>
                            <div class="form-group">
                                    <label>Gender</label>
                                    <select id="gender" class="form-control filter arrow-down">
                                            <option selected>Select Your Gender</option>
                                            <option>Female</option>
                                            <option>Male</option>
                                            <option>Other</option>
                                    </select>
                            </div>
                            <div class="form-group ">
                                    <label>Profile Picture</label>
                                    <div class="picture-upload">
                                        <label for="file-input">
                                            <img src="img/profile/upload.png">
                                        </label>
                                        <input id="file-input" type="file">
                                    </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control" id="ln" placeholder="Enter your Last name" required>
                            </div>
                            <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" required>
                                    
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

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Address Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Address line 1 *</label>
                                    <input type="text" class="form-control" id="add1" placeholder="Enter your address" required>
                            </div>
                            <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter your city" required>
                            </div>
                            <div class="form-group">
                                    <label>Zipcode</label>
                                    <input type="text" class="form-control" id="zipcode" placeholder="Enter your zipcode" required>
                            </div>
                            

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Address line 2 </label>
                                    <input type="text" class="form-control" id="add2" placeholder="Enter your address" required>
                            </div>
                            <div class="form-group">
                                    <label>State *</label>
                                    <input type="text" class="form-control" id="state" placeholder="Enter your state" required>
                            </div>
                            <div class="form-group">
                                    <label>Country *</label>
                                    <input type="text" class="form-control" id="country" placeholder="Enter your country" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>University and College Information</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>University</label>
                                    <input type="text" class="form-control" id="university" placeholder="Enter your university" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>College</label>
                                    <input type="text" class="form-control" id="college" placeholder="Enter your college" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" >SUBMIT</button>
                </form>
            </div>
        </section>

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
















