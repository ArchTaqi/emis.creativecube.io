<?php
$user_id = $this->session->userdata('user_id');
$profile_info = $this->db->where('user_id', $user_id)->get('tbl_account_details')->row();
$user_info = $this->db->where('user_id', $user_id)->get('tbl_users')->row();
?>
<header class="topnavbar-wrapper">
    <!-- START Top Navbar-->
    <nav role="navigation" class="navbar topnavbar">
        <!-- START navbar header-->
        <?php $display = config_item('logo_or_icon'); ?>
        <div class="navbar-header">
            <?php if ($display == 'logo' || $display == 'logo_title') { ?>
                <a href="#/" class="navbar-brand">
                    <div class="brand-logo">
                        <img style="width: 100px;max-height: 42px;"
                             src="<?= base_url() . config_item('company_logo') ?>" alt="App Logo"
                             class="img-responsive">
                    </div>
                    <div class="brand-logo-collapsed">
                        <img style="width: 48px;height: 48px;border-radius: 50px"
                             src="<?= base_url() . config_item('company_logo') ?>" alt="App Logo"
                             class="img-responsive">
                    </div>
                </a>
            <?php }
            ?>
        </div>
        <!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
                <li>
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                    </a>
                    <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                    <a href="#" data-toggle-state="aside-toggled" data-no-persist="true"
                       class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                    </a>
                </li>
                <!-- END User avatar toggle-->
                <!-- START lock screen-->
                <li class="hidden-xs">
                    <a href="" class="text-center" style="vertical-align: middle;font-size: 20px;"><?php
                        if ($display == 'logo_title' || $display == 'icon_title') {
                            if (config_item('website_name') == '') {
                                echo config_item('company_name');
                            } else {
                                echo config_item('website_name');
                            }
                        }
                        ?></a>
                </li>
                <!-- END lock screen-->
            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right">
                <?php if (config_item('enable_languages') == 'TRUE') { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag"></i> <?= lang('languages') ?>
                        </a>
                        <ul class="dropdown-menu animated zoomIn">
                            <?php
                            $languages = $this->db->where('active', 1)->order_by('name', 'ASC')->get('tbl_languages')->result();
                            foreach ($languages as $lang) :
                                ?>
                                <li>
                                    <a href="<?= base_url() ?>admin/global_controller/set_language/<?= $lang->name ?>"
                                       title="<?= ucwords(str_replace("_", " ", $lang->name)) ?>">
                                        <img src="<?= base_url() ?>asset/images/flags/<?= $lang->icon ?>.gif"
                                             alt="<?= ucwords(str_replace("_", " ", $lang->name)) ?>"/> <?= ucwords(str_replace("_", " ", $lang->name)) ?>
                                    </a>
                                </li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </li>
                <?php } ?>
                <!-- START Alert menu-->
                <li class="dropdown dropdown-list notifications">
                    <?php $this->load->view('admin/components/notifications'); ?>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src="<?= base_url() . $profile_info->avatar ?>" class="img-xs user-image"
                             alt="User Image"/>
                        <span class="hidden-xs"><?= $profile_info->fullname ?></span>
                    </a>
                    <ul class="dropdown-menu animated zoomIn">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url() . $profile_info->avatar ?>" class="img-circle" alt="User Image"/>
                            <p>
                                <?= $profile_info->fullname ?>
                                <small><?= lang('last_login') . ':' ?>
                                    <?php
                                    if ($user_info->last_login == '0000-00-00 00:00:00') {
                                        $login_time = "-";
                                    } else {
                                        $login_time = strftime(config_item('date_format'), strtotime($user_info->last_login)) . ' ' . display_time($user_info->last_login);
                                    }
                                    echo $login_time;
                                    ?>
                                </small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="<?= base_url() ?>admin/settings/activities"><?= lang('activities') ?></a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="<?= base_url('admin/user/user_details/' . $user_id) ?>"><?= lang('my_details') ?></a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="<?= base_url() ?>locked/lock_screen"><?= lang('lock_screen') ?></a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url() ?>admin/settings/update_profile"
                                   class="btn btn-default btn-flat"><?= lang('update_profile') ?></a>
                            </div>
                            <form method="post" action="<?= base_url() ?>login/logout"
                                  class="form-horizontal">

                                <input type="hidden" name="clock_time" value="" id="time">
                                <div class="pull-right">
                                    <button type="submit"
                                            class="btn btn-default btn-flat"><?= lang('logout') ?></button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                        <em class="icon-notebook"></em>
                    </a>
                </li>
            </ul>
            <!-- END Right Navbar-->
        </div>
        <!-- END Nav wrapper-->
    </nav>
    <!-- END Top Navbar-->
</header>