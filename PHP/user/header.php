<?php 
session_start();
?>
        <div class="navigation-wrap  start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                    
                        <a class="navbar-brand"><img src="img/home/logo.png" alt="logo"></a>    
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                
                                <li class="nav-item">
                                    <a href="search.php" class="nav-link">Search Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="add_note.php" class="nav-link">Sell Your Notes</a>
                                </li>
                                <?php if(isset($_SESSION['login']))
                                {?>
                                    <li class="nav-item">
                                    <a href="buyer_request.php" class="nav-link">Buyer requests</a>
                                </li>
                                <?php } ?>
                                <li class="nav-item">
                                    <a href="faq.php" class="nav-link">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact_us.php" class="nav-link">Contact Us</a>
                                </li>
                                <?php if(isset($_SESSION['login']))
                                {?>
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <img src="img/front/reviewer-1.png" role="button"  data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                                            <div class="dropdown-menu" aria-labelledby="profileLink">
                                                <a class="dropdown-item" href="profile.php">My Profile</a>
                                                <a class="dropdown-item" href="my_downloads.php">My Downloads</a>
                                                <a class="dropdown-item" href="sold_notes.php">My Sold Notes</a>
                                                <a class="dropdown-item" href="Rejected_notes.php">My Rejected Notes</a>
                                                <a class="dropdown-item" href="change_password.php">Change Password</a>
                                                <a class="dropdown-item" href="logout.php">LogOut</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                <?php if(isset($_SESSION['login']))
                                {?>
                                    <li class="nav-item">
                                        <a href="logout.php">
                                            <button type="button" class="btn btn-outline-primary btn-login" >LogOut</button>
                                        </a>
                                    </li>
                                <?php }else{ ?>
                                    <li class="nav-item">
                                        <a href="login.php">
                                            <button type="button" class="btn btn-outline-primary btn-login" >LogIn</button>
                                        </a>
                                    </li>
                                <?php } ?>
                                
                            </ul>
                        </div>
                        
                    </nav>  
                </div>
            </div>
        </div>
    </div>