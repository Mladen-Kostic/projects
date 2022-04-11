<?php
    use app\core\Application;

    $user = Application::$app->user;
    if (!$user || ($user['users_status'] !== 'admin')) {
        Application::$app->response->redirect("/");
    }

    use app\models\AdminDbFunctions;

    $admin = new AdminDbFunctions();

    $id = Application::$app->request->getBody()['id'] ?? false;
    $title = $admin->getArticleName($id);
?>
<h1>Are You Sure You Want To Delete Article"<?php echo $title ?>"?</h1>
<div class="mt-5">
    <form action="" method="post">
        <input name="id" type="hidden" value="<?= $id ? $id : '' ?>">
        <button class="btn btn-danger" type="submit">Yes, Delete</button>
        <a class="btn btn-info" href="javascript:history.go(-1)">Cancel</a>
    </form>
</div>