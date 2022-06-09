<header>
    <nav id="navBar" class="navbar-white">
        <a href="index.php"><img src="images/logo.png" class="logo"></a>
        <ul class="nav-links">
        </ul>
        <div class="topright">
            <?php
                if(isset($_SESSION['userid']) || isset($_SESSION['partnerid'])){
            ?>
                <div class="user-wrapper">
                    <?php if(isset($_SESSION['partnerlogin']) == true){ ?>
                            <a href="profile.php">
                    <?php
                        }elseif(isset($_SESSION['userlogin']) == true){ ?>
                            <a href="profile_tenant.php">
                    <?php
                        } 
                    ?>
                        <img src="images/user.png" width="30px" height="30px" alt="">
                    </a>
                    <div>
                        <h4><?php echo htmlspecialchars($_SESSION["username"]);?></h4>
                        <small>Worker bee</small>
                    </div>
                 </div>
            <?php
                }else{
            ?>
                <button id="show-login">Sign In</button>
            <?php
                }
            ?>
        </div>
    </nav>
</header>