
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <?php foreach($list_menu as $s_list_menu): ?>
                    <?php if($s_list_menu->menu_parent == 0 && $s_list_menu->menu_active == 1): ?>
                        <?php if($s_list_menu->menu_has_child == 1): ?>
                             <li>
                                <a href="<?php echo base_url_admin().$s_list_menu->menu_path; ?>"><i class="fa <?php echo $s_list_menu->menu_icon; ?> fa-fw"></i> <?php echo $s_list_menu->menu_name; ?><span class="fa <?php if($s_list_menu->menu_has_child ==1){echo 'arrow'; } ?> "></span></a>
                                <ul class="nav nav-second-level">
                                    <?php foreach($list_menu as $sub_list_menu): ?>
                                        <?php if($sub_list_menu->menu_parent == $s_list_menu->menu_id && $sub_list_menu->menu_active == 1): ?>
                                            <li>
                                                <a href="<?php echo base_url_admin().$sub_list_menu->menu_path; ?>"><?php echo $sub_list_menu->menu_name; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                         <?php else: ?>
                            <li>
                                <a href="<?php echo base_url_admin().$s_list_menu->menu_path; ?>"><i class="fa <?php echo $s_list_menu->menu_icon; ?> fa-fw"></i> <?php echo $s_list_menu->menu_name; ?></a>
                            </li>
                         <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
