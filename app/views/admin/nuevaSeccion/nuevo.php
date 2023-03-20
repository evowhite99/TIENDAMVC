<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Vista de Usuarios - Users</h1>
        </div>

        <div class="card-body">
            <table class="table text-center" width="100%">
                <thead>
                <th>Id</th>
                <th>Nombre completo</th>
                <th>Correo</th>
                <th>Ver más</th>
                <th>Editar</th>
                <th>Borrar</th>
                </thead>
                <tbody>
                <?php foreach ($data['users'] as $user): ?>
                    <tr>
                        <td class="text-center"><?= $user->id ?></td>
                        <td class="text-center"><?= $user->first_name . ' '. $user->last_name_1 . ' '. $user->last_name_2?></td>
                        <td class="text-center"><?= $user->email ?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminNuevo/show/<?= $user->id ?>"
                               class="btn btn-success"
                            >Ver más</a>
                        </td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminNuevo/edit/<?= $user->id ?>"
                               class="btn btn-info"
                            >Editar</a>
                        </td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminNuevo/delete/<?= $user->id ?>"
                               class="btn btn-danger"
                            >Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>