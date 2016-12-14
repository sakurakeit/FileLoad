<div class="container mregister">
    <div id="login">
        <h1>Registration</h1>

        <form action="" id="registerform" method="post" name="registerform">
            <p><label>Email:
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>

                        <div class="controls">
                            <input type="email" class="form-control" required="required" name="email" id="login-email">
                            <p class="help-block"></p>
                        </div>
                    </div>
                </label></p>
            <p><label>Pass:
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

                        <div class="controls">
                            <input type="password" class="form-control" required="required" name="password"
                                   id="login-password" pattern=".{5,}" title="Either 8 chars minimum">
                        </div>
                    </div>
                </label></p>
            <p class="submit"><input class="button" id="register" name="register" type="submit" value="Registry">
            </p>

            <p class="regtext">Sign in <a href="<?= Route::getBaseUrl(); ?>/main/login">Enter your email</a>!</p>
        </form>
    </div>
</div>