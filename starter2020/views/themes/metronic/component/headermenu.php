<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
        <?php if ($this->ion_auth->logged_in()): ?>
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Dashboard</span></a>
            </li>
            <?php  if($this->ion_auth->in_group(1)): ?>
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Kelola Master</span></a>
                <div class="kt-menu__submenu  kt-menu__submenu--fixed kt-menu__submenu--left" style="width:1000px">
                    <div class="kt-menu__subnav">
                        <ul class="kt-menu__content">
                            <li class="kt-menu__item ">
                                <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Balai</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                <ul class="kt-menu__inner">
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('balai') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-map"></i><span class="kt-menu__link-text">Master Balai</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('jenis_balai') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">Master Jenis Balai</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('daerah_irigasi') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">Master Daerah Irigasi</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('di_lumajang') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">Daerah Irigasi Lumajang</span></a></li> 
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('di_jember') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">Daerah Irigasi Jember</span></a></li>
                                </ul>
                            </li>
                            <li class="kt-menu__item ">
                                <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Saluran Irigasi</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                <ul class="kt-menu__inner">
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('saluran_irigasi') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-1"></i><span class="kt-menu__link-text">Master Saluran</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('jenis_saluran') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-2"></i><span class="kt-menu__link-text">Master Jenis Saluran</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('ruas_irigasi') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-2"></i><span class="kt-menu__link-text">Ruas Irigasi</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b07') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-2"></i><span class="kt-menu__link-text">B-O7</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b08') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">B-O8</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b09') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">B-O9</span></a></li>
                                </ul>
                            </li>
                            <li class="kt-menu__item ">
                                <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blangko Pelaporan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                <ul class="kt-menu__inner">
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b0') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">B-O10</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b0') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-1"></i><span class="kt-menu__link-text">B-O11</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b0') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-1"></i><span class="kt-menu__link-text">B-O12</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <?php endif; ?>
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Blangko Operasi</span></a>
                <div class="kt-menu__submenu  kt-menu__submenu--fixed kt-menu__submenu--left" style="width:1000px">
                    <div class="kt-menu__subnav">
                        <ul class="kt-menu__content">
                            <li class="kt-menu__item ">
                                <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blangko Perencanaan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                <ul class="kt-menu__inner">
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('fafa') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-map"></i><span class="kt-menu__link-text">B-O1</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('fafa') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">B-O2</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b03') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">B-O3</span></a></li>
                                </ul>
                            </li>
                            <li class="kt-menu__item ">
                                <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blangko Pelaksanaan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                <ul class="kt-menu__inner">
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b04') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-1"></i><span class="kt-menu__link-text">B-O4</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b05') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-2"></i><span class="kt-menu__link-text">B-O5</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b06') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-2"></i><span class="kt-menu__link-text">B-O6</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b07') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-2"></i><span class="kt-menu__link-text">B-O7</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b08') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">B-O8</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b09') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">B-O9</span></a></li>
                                </ul>
                            </li>
                            <li class="kt-menu__item ">
                                <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blangko Pelaporan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                <ul class="kt-menu__inner">
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b0') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">B-O10</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b0') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-1"></i><span class="kt-menu__link-text">B-O11</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url('blangko/b0') ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-1"></i><span class="kt-menu__link-text">B-O12</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
        <?php endif; ?>
    </div>
</div>