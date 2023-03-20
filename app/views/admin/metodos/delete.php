<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Eliminación de un método de pago</h1>
        </div>
        <div class="card-body">
            <form action="<?= ROOT ?>adminPay/delete/<?= $data['payment'] ?>" method="POST">
                <div class="form-group text-left">
                    <input type="submit" value="Eliminar" class="btn btn-danger">
                    <a href="<?= ROOT ?>adminPay" class="btn btn-info">Regresar</a>
                    <p>Una vez borrado, la información no será recuperable</p>
                </div>
            </form>
        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>