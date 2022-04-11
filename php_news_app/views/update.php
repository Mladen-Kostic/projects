<?php
    use app\core\Application;

    $user = Application::$app->user;
    if (!$user || ($user['users_status'] !== 'admin')) {
      Application::$app->response->redirect("/");
    }

    use app\models\AdminDbFunctions;

    if (Application::$app->request->isGet()) {
            $id = Application::$app->request->getBody()['id'];
            $article = AdminDbFunctions::fetchNews($id);
    }
?>

<h1>Update Article</h1>

<form action="" method="post">
    
    
</form>

<form method="post" action=''>
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input name="news_title" type="text" class="form-control" value="<?= $article['news_title'] ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Article Text</label>
    <textarea name="news_body" class="form-control"><?= $article['news_body'] ?></textarea>
  </div>
  <input name="id" type="hidden" value="<?= $id ?>">
  <button type="submit" class="btn btn-primary">Save Changes</button>
  <a href="/" class="btn btn-primary">Cancel</a>
</form>