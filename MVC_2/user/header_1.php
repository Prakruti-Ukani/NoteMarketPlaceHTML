<?php 
include "config.php";

if(!isset($_SESSION))
{
    session_start();
}

?>

<header class="site-header">
            <div class="container">
            <nav class="header-wrapper navbar navbar-expand-lg">
                <div class="logo-wrapper">
                    <!--menu open open-->
                    

                    <a href="#" class="navbar-brad scroll-smooth">
                        <img src="img/login/top-logo.png" alt="logo">
                    </a>
                    
                </div>
                <button class="navbar-toggler menuimg" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                           <img src="img/front/blackmenu.png">
                            
                </button>
                <div class="navigation-wrapper collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="main-nav ">
                        <ul class="menu-navigation navbar-nav">
                            <li><a href="search.php" class="val_content">Search Notes</a></li>
                            <li><a href="dashboard.php" class="val_content">Sell Your Notes</a></li>
                            <?php if(isset($_SESSION['login']))
                                {?>
                                    <li><a href="buyer_request.php" class="val_content">Buyer Request</a></li>
                                <?php } ?>
                            <li><a href="faq.php" class="val_content">FAQ</a></li>
                            <li><a href="contact_us.php" class="val_content">Contact Us</a></li>

                            <?php if(isset($_SESSION['login']))
                                {
                                    $profile_pic="";
                                    $uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
                                    $fetch_userdata=mysqli_query($conn,"SELECT * FROM user_profile where user_id=$uid");
                                    foreach($fetch_userdata as $row)
                                    {
                                        $profile_pic=$row['profile_picture'];
                                    }
                                    if($profile_pic==NULL)
                                    {
                                        $profile_pic="../upload/member/default/default-user.png";
                                    }

                                    ?>

                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <img src="<?php echo $profile_pic; ?>" role="button"  data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                                            <div class="dropdown-menu" aria-labelledby="profileLink">
                                                <a class="dropdown-item" href="profile.php" style="color: black;">My Profile</a>
                                                <a class="dropdown-item" href="my_downloads.php" style="color: black;">My Downloads</a>
                                                <a class="dropdown-item" href="sold_notes.php" style="color: black;">My Sold Notes</a>
                                                <a class="dropdown-item" href="Rejected_notes.php" style="color: black;">My Rejected Notes</a>
                                                <a class="dropdown-item" href="change_password.php" style="color: black;">Change Password</a>
                                                <a class="dropdown-item" href="logout.php" style="color: black;">LogOut</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                <?php if(isset($_SESSION['login']))
                                { ?>
                                    <li>
                                        <a href="logout.php">
                                                <button type="button" class="btn btn-outline-primary btn-login">LogOut</button>                           
                                        </a>
                                    </li>
                                <?php }else{ ?>
                                    <li>
                                        <a href="login.php">
                                                <button type="button" class="btn btn-outline-primary btn-login">LogIn</button>                           
                                        </a>
                                    </li>
                                <?php } ?>




                        </ul>
                    </div>
                </div>
                
            </nav>
            </div>
        </header>