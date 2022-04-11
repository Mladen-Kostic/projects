<?php
    use app\core\Application;

    $user = Application::$app->user;
    $current_user_id = $user['id'] ?? false;
    $current_user_status = $user['users_status'] ?? false;
    $current_article_id = $_GET['id'];
?>

<?php 
    if (Application::$app->session->checkForFlash('success')) {
        echo '<div class="alert alert-success" role="alert">
        ' . Application::$app->session->getFlash('success') . '
        </div>';
    }
    if (Application::$app->session->checkForFlash('error')) {
        echo '<div class="alert alert-danger" role="alert">
        ' . Application::$app->session->getFlash('error') . '
        </div>';
    }
?>

<h2 class="mb-4"><?= $params['article']['news_title']; ?></h2>
<?php if ($user && $user['users_status'] === 'admin'): ?>
    <div class="mb-2">
        <a class="btn btn-danger" href="/delete?id=<?= $current_article_id ?>">Delete Article</a>
        <a class="btn btn-info" href="/update?id=<?= $current_article_id ?>">Update Article</a>
    </div>
<?php endif; ?>
<a class="btn btn-info" href="javascript:history.go(-1)" style="position: absolute; top-left: 10px">Back</a>
<img height="600" src="data:image/jpeg;base64,<?php echo base64_encode($params['article']['news_image']); ?>">
<div class="container-fluid my-4">
    <p style="font-size: 20px; font-weight: 600;"><?= $params['article']['news_body']; ?></p>
</div>
<?php if ($user): ?>
    <div class="my-5">
        <h3>Add Your Comment</h3>
        <form action="/addComment" method="post">
            <input name="users_id" type="hidden" value="<?= $current_user_id ?>">
            <input name="news_id" type="hidden" value="<?= $current_article_id ?>">
            <div class="mb-3">
                <textarea name="comments_body" class="form-control" placeholder="Write your coment here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    </div>
<?php endif; ?>
<small>COMMENTS</small>
<hr>
<?php if (!empty($params['comments'])): ?>

<?php foreach ($params['comments'] as $comment): ?>
    <div style="margin-left: 100px">
        <div>
            <h4 style="display: inline; margin-right: 4px"><?php echo ucfirst($comment['users_fname']) . ' ' 
                . ucfirst($comment['users_lname']); ?></h4>
            <small><?= date('d.m.Y g:i', strtotime($comment['datetime_posted'])) ?></small>
        </div>
        <div class="mt-4">
            <p><?= $comment['comments_body'] ?></p>
        </div>
        <div>
            <?php if ($comment['users_id'] === $current_user_id || $current_user_status === 'admin'): ?>
                <form method="post" action="/deleteCommentRender" style="float: left; margin-right: 8px">
                    <input name="comments_id" type="hidden" value="<?= $comment['id'] ?>">
                    <input name="users_id" type="hidden" value="<?= $comment['users_id'] ?>">
                    <input name="article_id" type="hidden" value="<?= $current_article_id ?>">
                    <input type="submit" class="btn btn-danger" value="Remove Comment">
                </form>
            <?php endif; ?>
            <?php if ($comment['users_id'] === $current_user_id ): ?>
                <form method="post" action="/editCommentRender" style="float: left">
                    <input name="comments_id" type="hidden" value="<?= $comment['id'] ?>">
                    <input name="article_id" type="hidden" value="<?= $current_article_id ?>">
                    <input name="users_id" type="hidden" value="<?= $comment['users_id'] ?>">
                    <input name="comments_body" type="hidden" value="<?= $comment['comments_body'] ?>">
                    <input type="submit" class="btn btn-info" value="Edit Comment">
                </form>
            <?php endif; ?>
        </div>
    </div><br><br>
    <hr style="clear: left; margin-top: 4px">
<?php endforeach; ?>

<?php else: ?>
    <div style="margin-left: 100px">
        <h3>No comments</h3>
    </div>
<?php endif; ?>