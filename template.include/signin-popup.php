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
                                <input type="submit" name="submit" class="btn btn-primary" value="Login">
                            </div>
                            <div class="form-element">
                                <a href="#">Forgot password</a>
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
                                <input type="submit" name="submit" class="btn btn-primary" value="Login">
                            </div>
                            <div class="form-element">
                                <a href="#">Forgot password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>