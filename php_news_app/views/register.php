<?php 
    use app\core\Application;
    if (Application::$app->session->checkForFlash('error')) {
        echo '<div class="alert alert-danger" role="alert">
        ' . Application::$app->session->getFlash('error') . '
        </div>';
    }
?>
<h1>Create An Account</h1>
<form method="post" action="">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>First Name</label>
                <input name="users_fname" type="text" class="form-control" placeholder="Enter First Name">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Last Name</label>
                <input name="users_lname" type="text" class="form-control" placeholder="Enter Last Name">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Email address</label>
        <input name="users_email" type="email" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input name="users_password" type="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <label class="form-group">Confirm Password</label>
        <input name="confirmPassword" type="password" class="form-control" placeholder="Confirm Password">
    </div>
    <div class="my-2">
        <button type="submit" class="btn btn-primary">Create Account</button>
        <a href="/" class="btn btn-primary">Cancel</a>
    </div>
</form>
<small>Already Have An Account? Log In <a href="/login">Here!</a></small>