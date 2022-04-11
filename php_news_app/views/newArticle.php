<?php
  use app\core\Application;
  
  $user = Application::$app->user;
  if (!$user || ($user['users_status'] !== 'admin')) {
    Application::$app->response->redirect("/");
  }

  if (Application::$app->session->checkForFlash('error')) {
      echo '<div class="alert alert-danger" role="alert">
      ' . Application::$app->session->getFlash('error') . '
      </div>';
  }
?>
<h1>Create New Article</h1>
<form method="post" action='' enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">News Title</label>
    <input name="news_title" type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Category</label>
    <input name="category" type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">News Image</label>
    <input name="news_image" type="file" class="form-control" accept=".jpg, .jpeg, .png">
  </div>
  <div class="mb-3">
    <label class="form-label">News Body</label>
    <textarea name="news_body" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
  <a href="/" class="btn btn-primary">Cancel</a>
</form>