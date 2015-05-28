<div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Sign In</p>

        <div class="panel-body">
            <form action="/login/loginPost" id="form" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control span12" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-controlspan12 form-control" required>
                </div>
                <input type="submit" class="btn btn-primary pull-right" value="Sign In">
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<Script>
    $('#form').validator();
</Script>