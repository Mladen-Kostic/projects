<?php 
    use app\core\Application;
    if (Application::$app->session->checkForFlash('success')) {
        echo '<div class="alert alert-success" role="alert">
        ' . Application::$app->session->getFlash('success') . '
        </div>';
    }
?>
<?php if (isset($params[0]['category'])) : ?>
    <h2>Category: <?= ucfirst($params[0]['category']) ?></h2>
<?php endif; ?>
<?php
    foreach ($params as $news) :
    /** '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>' */
?>
<div style="position: relative" class="my-4">
    <a href="/article?id=<?= $news['id']; ?>">
        <img height="600" src="data:image/jpeg;base64,<?php echo base64_encode($news['news_image']); ?>">
        <h2 style="color:white; position: absolute; bottom: 8px; left:16px; text-shadow: 2px 2px #000"><?= $news['news_title']; ?></h2>
    </a>
</div>
<?php endforeach; ?>
<script>
        // for home page category
    let categoriesAll = Array.from(document.querySelectorAll('#dropdownCategories>li>a'))
    let categoriesArr = [];
    for (let li of categoriesAll) {
        categoriesArr.push(li.id);
        li.addEventListener('click', displayCategory);
    }


    function displayCategory() {
        window.location ='?category=' + this.id;
    }
</script>