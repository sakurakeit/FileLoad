<div class="container mlogin">
    <div id="login">
        <h1>Sign in</h1>

        <form action="" id="loginform" method="post" name="loginform">
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
            <p class="submit"><input id="save" class="button" name="login" type="submit" value="Log In"></p>

            <div class="form-group">
                <div class="col-md-12 control">
                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:100%; margin-top: 5%; ">
                        Don't have an account!
                        <a href="<?= Route::getBaseUrl(); ?>/main/register" class="noLink">
                        Sign Up Here
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
