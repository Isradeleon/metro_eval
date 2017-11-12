<ul class="v-menu subdown">
<?php foreach ($permisos as $permiso): ?>
	<li><a href="#"><?php echo $permiso['p_nombre'] ?></a></li>
<?php endforeach ?>
    <li><a href="<?php echo base_url('logout') ?>"><span class="mif-bubbles icon"></span> SALIR</a></li>
   <!--  <li class="menu-title">First Title</li>
    <li><a href="#"><span class="mif-home icon"></span> Home</a></li>
    <li class="divider"></li>
    <li class="menu-title">Second Title</li>
    <li><a href="#"><span class="mif-user icon"></span> Profile</a></li>
    <li><a href="#"><span class="mif-calendar icon"></span> Calendar</a></li>
    <li><a href="#"><span class="mif-image icon"></span> Photo</a></li>
    <li class="divider"></li>
    <li class="menu-title">Third Title</li>
    <li>
        <a href="#" class="dropdown-toggle"><span class="mif-my-location icon"></span> Location</a>
        <ul class="d-menu" data-role="dropdown">
            <li class="menu-title">Title for dropdown</li>
            <li><a href="#">Коллеги</a></li>
            <li><a href="#">Интересно</a></li>
            <li>
                <div class="item-block text-center">
                    <button class="square-button"><img class="icon" src="images/round.png"></button>
                    <button class="square-button"><img class="icon" src="images/location.png"></button>
                    <button class="square-button"><img class="icon" src="images/group.png"></button>
                </div>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Еще...</a>
                <ul  class="d-menu" data-role="dropdown">
                    <li><a href="#">Коллеги</a></li>
                    <li><a href="#">Интересно</a></li>
                    <li>
                        <div class="item-block text-center bg-grayLighter">
                            <button class="round-button"><img class="icon" src="images/round.png"></button>
                            <button class="round-button"><img class="icon" src="images/location.png"></button>
                            <button class="round-button"><img class="icon" src="images/group.png"></button>
                            <button class="round-button"><img class="icon" src="images/power.png"></button>
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>
            </li>
        </ul>
    </li> -->
</ul>