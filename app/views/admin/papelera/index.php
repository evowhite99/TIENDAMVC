<?php include_once(VIEWS . 'header.php')?>
    <table class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Papelera</h1>
        </div>
        <table class="table text-center" width="100%">
            <thead>
            <th>Nombre</th>
            <th>Restaurar</th>


            </thead>
            <div class="card-body">
                <h4 class="text-center"></h4>
                <?php foreach ($data['product'] as $product): ?>
                    <tr>
                        <td class="font-weight-700"> <?= $product->name ?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminPapelera/restoreProduct/<?= $product->id ?>"
                               class="btn btn-success"
                            >Recuperar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </div>

            <div class="card-body">
                <h4 class="text-center"></h4>
                <?php foreach ($data['users'] as $user): ?>
                    <tr>
                        <td class="font-weight-700"> <?= $user->name ?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminPapelera/restoreUsers/<?= $user->id ?>"
                               class="btn btn-success"
                            >Recuperar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </div>
        </table>
    </table>

    <div class="card-footer">

    </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>