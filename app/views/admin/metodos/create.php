<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <h1>Crear nuevo método de pago</h1>
        <form action="<?= ROOT ?>adminPay/create" method="POST">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="code">Código:</label>
                <input type="text" name="code" id="code" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear método de pago</button>
        </form>

        <td class="text-center">
            <a href="<?= ROOT ?>adminPay"
               class="btn btn-danger"
            >Volver</a>
        </td>
    </div>
<?php include_once(VIEWS . 'footer.php')?>