<?php if (isset($params['users_email'])) : ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $params['users_email'] ?>
  </div>
<?php elseif (isset($params['users_password'])): ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $params['users_password'] ?>
  </div>
<?php endif; ?>

<h1>Log In</h1>
<form method="post" action=''>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input name="users_email" type="email" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input name="users_password" type="password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Log In</button>
  <a href="/" class="btn btn-primary">Cancel</a>
</form>
<small>Need An Account? Register <a href="/register">here!</a></small>