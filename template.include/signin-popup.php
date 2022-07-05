<div class="popup-bg" role="alert">
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="tab-wrapper">
            <header>Sign In</header>
            <input type="radio" name="slider" checked id="lessor">
            <input type="radio" name="slider" id="tenant">

            <nav class = "tab-nav">
                <label for="lessor" class="lessor"><i class="fas fa-home"></i>Lessor</label>
                <label for="tenant" class="tenant"><i class="fas fa-blog"></i>Tenant</label>
                <div class="slider"></div>
            </nav>

            <section>
                <div class="content content-1">
                    <div class="form">
                        <h2>Lessor</h2>
                        <form action="include/signin-lessor-inc.php" method="post">
                            <div class="form-element">
                                <label>Username</label>
                                <input type="text" name="username" placeholder="Enter username" class="form-control">
                                
                            </div>
                            <div class="form-element">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter password" class="form-control">
                                
                            </div>
                            <div class="form-element">
                                <input type="checkbox" id="remember-me-partner">
                                <label for="remember-me-partner">Remember me</label>
                            </div>
                            <div class="form-element">
                                <input type="submit" name="submit" class="btn btn-primary" value="Sign in">
                            </div>
                            <div class="form-element">
                                <a href="forgot-password.php">Forgot password</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="content content-2">
                    <div class="form">
                        <h2>Tenant</h2>
                        <form action="include/signin-tenant-inc.php" method="post">
                            <div class="form-element">
                                <label>Username</label>
                                <input type="text" name="username" placeholder="Enter username" class="form-control">
                            </div>
                            <div class="form-element">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter password" class="form-control">
                            </div>
                            <div class="form-element">
                                <input type="checkbox" id="remember-me-user">
                                <label for="remember-me-user">Remember me</label>
                            </div>
                            <div class="form-element">
                                <input type="submit" name="submit" class="btn btn-primary" value="Sign in">
                            </div>
                            <div class="form-element">
                                <a href="forgot-password.php">Forgot password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <?php if (isset($_SESSION['signin']) == true): ?>
            <div class="error-handling">
                    <?php if($_SESSION['flash'] == "emptyinput"){ ?>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Please fill out all the fields</p>
                    <?php }elseif($_SESSION['flash'] == "usernotfound"){ ?>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Username or email not found.</p>
                    <?php }else{ ?>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Wrong password</p>
                    <?php } ?>
                    <script>
                        document.querySelector(".popup").classList.add("active");
                        document.querySelector(".popup-bg").classList.add("active");
                    </script>
            </div>
            <?php endif;  unset($_SESSION['flash']); unset($_SESSION['signin']);?>
        </div>
    </div>
</div>