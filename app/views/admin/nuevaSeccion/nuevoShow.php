<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Vista de Usuarios - Users</h1>
        </div>

        <div class="card-body">
            <table class="table text-center" width="100%">
                <thead>
                <th>Id</th>
                <th>¿Es administrador?</th>
                <th>Nombre completo</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Provincia</th>
                <th>Codigo postal</th>
                <th>Pais</th>

                </thead>
                <tbody>
                <tr>
                    <td class="text-center"><?= $data['user']->id ?></td>
                    <td class="text-center"><?= $data['user']->is_admin ? 'Sí' : 'No' ?></td>
                    <td class="text-center"><?= $data['user']->first_name . ' ' . $data['user']->last_name_1 . ' ' . $data['user']->last_name_2 ?></td>
                    <td class="text-center"><?= $data['user']->email ?></td>
                    <td class="text-center"><?= $data['user']->address ?></td>
                    <td class="text-center"><?= $data['user']->city ?></td>
                    <td class="text-center"><?= $data['user']->state ?></td>
                    <td class="text-center"><?= $data['user']->zipcode ?></td>
                    <td class="text-center"><?= $data['user']->country ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <td class="text-center">
            <a href="<?= ROOT ?>adminNuevo"
               class="btn btn-danger"
            >Volver</a>
        </td>
        <div class="card-body">

        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>