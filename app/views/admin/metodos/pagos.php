<?php include_once(VIEWS . 'header.php') ?>
    <div class="card" id="container">
        <div class="card-header">
            <h1><?= $data['titulo'] ?></h1>
            <p>Por favor, elija la forma de pago</p>
            <td class="text-center">
                <a href="<?= ROOT ?>adminPay/create/"
                   class="btn btn-success"
                >Agregar método de pago</a>
            </td>
        </div>
        <table class="table text-center" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['payment'] as $method): ?>
                <tr>
                    <td><?= $method->id ?></td>
                    <td><?= $method->name ?></td>
                    <td><?= $method->code ?></td>



                    <td class="text-center">
                        <a href="<?= ROOT ?>adminPay/edit/<?= $method->id ?>"
                           class="btn btn-info"
                        >Editar</a>
                    </td>

                    <td class="text-center">
                        <a href="<?= ROOT ?>adminPay/delete/<?= $method->id ?>"
                           class="btn btn-danger"
                        >Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
<?php include_once(VIEWS . 'footer.php') ?>