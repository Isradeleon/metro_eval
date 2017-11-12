<ul class="v-menu subdown">
    <?php foreach ($acciones as $departamento => $grupos): ?>
        <li class="menu-title"><strong>Depto. <?php echo $departamento ?></strong></li>

        <?php foreach ($grupos as $grupo => $permisos): ?>
            <li>
                <a href="#" class="dropdown-toggle"><strong><?php echo $grupo ?></strong></a>
                <ul class="d-menu" data-role="dropdown">
                    <li class="menu-title"><?php echo $grupo ?></li>
                    <?php foreach ($permisos as $permiso => $accion): ?>
                        <li>
                            <a href="#" class="dropdown-toggle"><i class="fa fa-arrow-right"></i> <?php echo $permiso ?></a>
                            <ul class="d-menu" data-role="dropdown">
                                <?php if ($accion[0] || $accion[1] || $accion[2]): ?>
                                    <?php if ($accion[0]): ?>
                                        <li><a style="padding-left: 60px;" href="#"><i class="fa fa-check"></i> Crear</a></li>
                                    <?php endif ?>
                                    <?php if ($accion[1]): ?>
                                        <li><a style="padding-left: 60px;" href="#"><i class="fa fa-close"></i> Eliminar</a></li>
                                    <?php endif ?>
                                    <?php if ($accion[2]): ?>
                                        <li><a style="padding-left: 60px;" href="#"><i class="fa fa-edit"></i> Modificar</a></li>
                                    <?php endif ?>
                                <?php else: ?>
                                    <li><a style="padding-left: 60px;" href="#">0 permisos</a></li>
                                <?php endif ?>
                            </ul>
                        </li>
                    <?php endforeach ?>
                </ul>
            </li>

        <?php endforeach ?>

    <?php endforeach ?>

    <li><a href="<?php echo base_url('logout') ?>"><i class="fa fa-sign-out"></i> <strong>Salir</strong></a></li>
</ul>