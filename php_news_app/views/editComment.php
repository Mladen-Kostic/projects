<?php
    use app\core\Application;

    $user = Application::$app->user;

    if (!$user) {
    Application::$app->response->redirect("/");
    }

    $current_user_id = $user['id'] ?? false;
    $current_user_status = $user['status'] ?? false;

    $request = Application::$app->request->getBody();

    $comment_users_id = $request['users_id'];
    $comments_id = $request['comments_id'];
    $article_id = $request['article_id'];

    if ($current_user_id !== $comment_users_id) {
        Application::$app->response->redirect("/article?id=" . $article_id);
    }
?>
<h1>Edit Comment</h1>
<!-- Example:
    ["comments_id"]=> string(1) "1" 
    ["article_id"]=> string(2) "28" 
    ["users_id"]=> string(1) "2" 
    ["comments_body"]=> string(12) "Test comment" -->
<form method="post" action="editComment">
    <input name="comments_id" type="hidden" value="<?= $comments_id ?>">
    <input name="article_id" type="hidden" value="<?= $article_id ?>">
  <div class="mb-3">
    <textarea name="comments_body" class="form-control"><?= $request['comments_body'] ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Apply</button>
  <a href="/article?id=<?= $article_id ?>" class="btn btn-primary">Cancel</a>
</form>
