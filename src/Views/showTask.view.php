<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
    <div class="card-body">
        <p><?= $tasks->getTitle(); ?></p>
    </div>
    <a href="/modifier?id=<?=$task->getId()?>" class="btn btn-primary">Modifier</a>
<?php
require_once(__DIR__ . "/partials/footer.view.php");
?>