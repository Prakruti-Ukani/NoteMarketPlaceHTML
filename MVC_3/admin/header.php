<?php 
include "config.php";

if(!isset($_SESSION))
{
    session_start();
}  

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
                                    <a href="dashboard.php" class="nav-link">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a  class="nav-link" role="button"  data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Notes</a>
                                    <div class="dropdown-menu" aria-labelledby="notesLink">
                                            <a class="dropdown-item" href="under_review.php">Notes Under Review</a>
                                            <a class="dropdown-item" href="published_note.php">Published Notes</a>
                                            <a class="dropdown-item" href="download_notes.php">Downloaded Notes</a>
                                            <a class="dropdown-item" href="rejected_notes.php">Rejected Notes</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="member.php" class="nav-link">Members</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" role="button"  data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Reports</a>
                                    <div class="dropdown-menu" aria-labelledby="reportLink">
                                            <a class="dropdown-item" href="spam_report.php">Spam Reports</a>
                                    </div>
                                </li>
                                <?php
                                $role_id=(isset($_SESSION['role_id']))?$_SESSION['role_id']:" "; 
                                ?>
                                <li class="nav-item">
                                    <a  class="nav-link" role="button"  data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Setting</a>
                                    <div class="dropdown-menu" aria-labelledby="notesLink">
                                            <?php
                                            if($role_id==3)
                                            {
                                                echo '<a class="dropdown-item" href="manage_configuration.php">Manage System Configuration</a>
                                                <a class="dropdown-item" href="manage_admin.php">Manage Administrator</a>';
                                            }
                                            ?>
                                            <a class="dropdown-item" href="manage_catagory.php">Manage Catagory</a>
                                            <a class="dropdown-item" href="manage_type.php">Manage Type</a>
                                            <a class="dropdown-item" href="manage_country.php">Manage Countries</a>
                                    </div>
                                </li>
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
                                }
                                    ?>

                                <li class="nav-item">
                                    <div class="dropdown">
                                        <img src="<?php echo $profile_pic ?>" role="button"  data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                                        <div class="dropdown-menu" aria-labelledby="profileLink">
                                            <a class="dropdown-item" href="update_profile.php">Update Profile</a>
                                            <a class="dropdown-item" href="change_password.php">Change Password</a>
                                            <a class="dropdown-item" href="login.php">LogOut</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="modal" data-target="#confirm-logout">
                                        <button type="button" class="btn btn-outline-primary btn-login">LogOut</button>
                                    </a>
                                    
                                </li>
                                
                            </ul>
                        </div>
                        
                    </nav>  
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
    <div class="modal fade " id="confirm-logout" tabindex="-1" role="dialog" aria-labelledby="confirmLogoutLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmLogoutLabel">Are you sure want LogOut ? </h5>
          </div>
          <div class="modal-body">
            <form action=" " method="POST">
                
                  <a href="logout.php" class="btn btn-primary" type="submit">Yes</a>
                <button class="btn btn-primary" style="width: 60px;">No</button>
            </form>
          </div>

        </div>
      </div>
    </div>

