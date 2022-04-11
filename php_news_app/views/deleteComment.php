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

    if (!($current_user_id === $comment_users_id) && $current_user_status !== 'admin') {
        Application::$app->response->redirect("/article?id=" . $article_id);
    }
?>
<h1>Are You Sure You Want To Delete Comment?</h1>
<div class="mt-5">
    <form action="/deleteComment" method="post">
        <input name="comments_id" type="hidden" value="<?= $comments_id ? $comments_id : '' ?>">
        <input name="article_id" type="hidden" value="<?= $article_id ? $article_id : '' ?>">
        <button name="deleteComment" class="btn btn-danger" type="submit">Yes, Delete</button>
        <a class="btn btn-info" href="javascript:history.go(-1)">Cancel</a>
    </form>
</div>