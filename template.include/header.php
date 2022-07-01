<header>
    <nav id="navBar" class="navbar-white">
        <a href="index.php"><img src="images/logo.png" class="logo"></a>
        <ul class="nav-links">
            <form action="listing.php" method="post" class="sm-search-bar">
                <input class="sm-search-input" type="search" name="search-term" pattern=".*\S.*" required>
                <button class="sm-search-btn" type="submit" name="submit">
                    <span>Search</span>
                </button>
            </form>
        </ul>
        <div class="topright">
            <?php
                if(isset($_SESSION['userid']) || isset($_SESSION['partnerid']) || isset($_SESSION['adminid'])){
            ?>
                <div class="user-wrapper">
                    <?php if(isset($_SESSION['partnerlogin']) == true){ ?>
                            <a href="dashboard-partner-dashboard.php">
                                <button class="btn-dashboard">Dashboard</button>
                            </a>
                    <?php
                        }elseif(isset($_SESSION['userlogin']) == true){ ?>
                            <a href="profile_tenant.php">
                                <button class="btn-dashboard">Dashboard</button>
                            </a>
                    <?php
                        }elseif(isset($_SESSION['adminlogin']) == true){ ?>
                            <a href="admin-dashboard.php">
                                <button class="btn-dashboard">Dashboard</button>
                            </a>
                    <?php
                        } 
                    ?> 
                    <div class="dropdown-menu">
                        <img src="images/user.png" width="30px" height="30px" alt="">
                        <div class="dropdown-content">
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                    <div>
                        <h4><?php echo htmlspecialchars($_SESSION["username"]);?></h4>
                        <small>User</small>
                    </div>
                 </div>
            <?php
                }else{
            ?>
                <button class="btn-login" id="show-login">Sign In</button>
            <?php
                }
            ?>
        </div>
    </nav>
</header>