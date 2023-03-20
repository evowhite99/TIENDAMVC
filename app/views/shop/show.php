<?php include_once dirname(__DIR__) . ROOT . 'header.php'?>
<h2 class="text-center"><?= $data['subtitle'] ?></h2>
<img src="<?= ROOT ?>img/<?= $data['data']->image ?>" class="rounded float-right" alt="">
<h4>Precio:</h4>
<p><?= number_format($data['data']->price, 2) ?>€</p>
<?php if ($data['data']->type == 1): ?>
    <h4>Descripción:</h4>
    <?= html_entity_decode($data['data']->description) ?>
    <h4>A quien va dirigido:</h4>
    <p><?= $data['data']->people ?></p>
    <h4>Objetivos:</h4>
    <p><?= $data['data']->objetives ?></p>
    <h4>¿Qué es necesario conocer?</h4>
    <p><?= $data['data']->necesites ?></p>
<?php elseif ($data['data']->type == 2): ?>
    <h4>Autor:</h4>
    <p><?= $data['data']->author ?></p>
    <h4>Editorial:</h4>
    <p><?= $data['data']->publisher ?></p>
    <h4>Número de páginas:</h4>
    <p><?= $data['data']->pages ?></p>
    <h4>Resumen:</h4>
    <?= html_entity_decode($data['data']->description) ?>
<?php endif; ?>
<a href="<?= ROOT . (!empty($data['back']) ? $data['back'] : 'shop') ?>" class="btn btn-success">Volver al listado de <?=$data['txtBtn'] ?></a>
<?php if(isset($data['user_id'])) : ?>
<a href="<?= ROOT ?>cart/addproduct/<?= $data['data']->id ?>/<?= $data['user_id'] ?>" class="btn btn-primary">Comprar</a>
<?php else :?>
    <a href="<?= ROOT ?>login" class="btn btn-primary">Comprar</a>
<?php endif; ?>
<!--relacionados-->
<h3 class="text-center mt-5">Productos relacionados</h3>
<div class="row">
    <?php foreach ($data['data']->related_products as $related_product): ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="<?= ROOT ?>img/<?= $related_product->image ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $related_product->name ?></h5>
                    <p class="card-text">Precio: <?= number_format($related_product->price, 2) ?>€</p>
                    <a href="<?= ROOT ?>shop/show/<?= $related_product->id ?>" class="btn btn-primary">Ver detalles</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include_once dirname(__DIR__) . ROOT . 'footer.php'?>



