<div class="panel panel-default sidebar-menu ">
    <div class="panel-heading">
        <small
            class="panel-title list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">PRODUCTS
            CATEGORIES</small>
    </div>
    <div class="panel-body">
        <ul class="nav list-group-item  align-items-start">
            <?php

            include_once("functions/functions.php");
            getPCats();
            ?>
        </ul>
    </div>
</div>