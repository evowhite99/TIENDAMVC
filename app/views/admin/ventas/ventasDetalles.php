<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Ventas - Mostrar detalles</h1>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Descuento</th>
                    <th>Envío</th>
                    <th>Precio</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['salesDetails'] as $detail): ?>
                    <tr>
                        <td><?= $detail->name ?></td>
                        <td><?= $detail->quantity ?></td>
                        <td>-<?= $detail->discount ?>€</td>
                        <td><?= $detail->send ?>€</td>
                        <td><?= $detail->price ?>€</td>
                    </tr>
                <?php endforeach; ?>
                <h1 class="text-center bg-primary"> TOTAL:<?= $detail->total ?>€</h1>

                </tbody>
            </table>
            <div class="text-center">
                <a href="<?= ROOT ?>adminVentas"
                   class="btn btn-danger"
                >Volver</a>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>