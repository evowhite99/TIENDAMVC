<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Vista de Ventas - Venta</h1>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Usuario: correo</th>
                    <th>Fecha</th>
                    <th>Descuento Total</th>
                    <th>Envio Total</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['ventas'] as $venta): ?>
                    <tr>
                        <td><?= $venta->email ?></td>
                        <td><?= $venta->sale_date ?></td>
                        <td>-<?= $venta->total_discount ?>€</td>
                        <td><?= $venta->total_send ?>€</td>
                        <td><?= $venta->total_amount ?>€</td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminVentas/show/<?= $venta->user_id ?>/<?= urlencode($venta->sale_date) ?>"
                               class="btn btn-success"
                            >Ver más</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>