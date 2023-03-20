<?php include_once(VIEWS . 'header.php')?>
<div class="card p-4 bg-light">
    <div class="card-header">
        <h1 class="text-center"><?= $data['subtitle'] ?></h1>
    </div>
    <div class="card-body">
        <?php foreach ($data['data'] as $key => $value): ?>
            <?php if($key%4 == 0): ?>
                <div class="row">
            <?php endif; ?>
            <div class="card pt-2 col-sm-3">
                <img src="../img/<?= $value->image ?>" class="img-responsive"
                     style="width: 100%" alt="<?= $value->name ?>">

                <p><?= $value->name ?></p>
                <div class="text-center">
                    <a href="<?= ROOT ?>adminProduct/update/<?= $value->id ?>"
                       class="btn btn-info"
                    >Editar</a>
                </div>

                <div class="text-center">
                    <a href="<?= ROOT ?>adminProduct/delete/<?= $value->id ?>"
                       class="btn btn-danger"
                    >Borrar</a>
                </div>
            </div>
            <?php if($key%4 == 3): ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>