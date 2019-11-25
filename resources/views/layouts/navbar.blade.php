<!-- BEGIN NAVBAR-->
<div id="header-nav-offset"></div>
<nav id="header-nav" class="navbar navbar--header">
    <div class="container">
        <div class="navbar__row js-navbar-row"><a href="<?= url("/$locale") ?>" class="navbar__brand">
                <img class="navbar__brand-logo" src="<?= asset('frontend-assets/img/thoe-logo-web-gold.png') ?>" /></a>
            <div id="navbar-collapse-1" class="navbar__wrap">
                <ul class="navbar__nav">
                    <li class="navbar__item js-dropdown active"><a href="<?= url("/$locale/{$header_menu[0]['link']}") ?>" class="navbar__link"><?= $header_menu[0]['title_' . $locale] ?></a>
                    </li>
                    <li class="navbar__item js-dropdown"><a href="<?= url("/$locale/{$header_menu[1]['link']}") ?>" class="navbar__link"><?= $header_menu[1]['title_' . $locale] ?>
                            <svg class="navbar__arrow">
                            <use xlink:href="#icon-arrow-right"></use>
                            </svg></a>
                        <div role="menu" class="js-dropdown-menu navbar__dropdown navbar__dropdown--colls-1">
                            <button class="navbar__back js-navbar-submenu-back">
                                <svg class="navbar__arrow">
                                <use xlink:href="#icon-arrow-left"></use>
                                </svg>Back
                            </button>
                            <div class="navbar__submenu">
                                <h5 class="navbar__subtitle">Islands</h5>
                                <ul class="navbar__subnav">
                                    <?php
                                    foreach ($header_menu[1]['submenus']as $k => $menu) {
                                        $hasnest = !empty($header_menu[1]['submenus'][$k]['nest']) ? 1 : 0;
                                        ?>
                                        <li class="navbar__subitem navbar__subitem-dropdown js-dropdown">
                                            <a href="<?= url("/$locale/projects/{$menu['link']}") ?>" class="navbar__sublink js-navbar-sublink"><?= $menu['title_' . $locale] ?>
                                                <?= $hasnest ? ' <svg class="navbar__arrow">
                                            <use xlink:href="#icon-arrow-right"></use>
                                                </svg>' : '' ?></a>
                                            <?php if ($hasnest) { ?>
                                                <div class="navbar__submenu navbar__submenu--level">
                                                    <button class="navbar__back js-navbar-submenu-back">
                                                        <svg class="navbar__arrow">
                                                        <use xlink:href="#icon-arrow-left"></use>
                                                        </svg>Back
                                                    </button>
                                                    <ul class="navbar__subnav">
                                                        <?php foreach ($header_menu[1]['submenus'][$k]['nest'] as $nest) { ?>
                                                            <li class="navbar__subitem"><a href="<?= url("/$locale/projects/{$menu['link']}/{$nest['link']}") ?>" class="navbar__sublink js-navbar-sub-sublink">
                                                                    <?= $nest['title_' . $locale] ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="navbar__item"><a href="<?= url("/$locale/{$header_menu[2]['link']}") ?>" class="navbar__link"><?= $header_menu[2]['title_' . $locale] ?></a></li>
                    <li class="navbar__item"><a href="<?= url("/$locale/{$header_menu[3]['link']}") ?>" class="navbar__link"><?= $header_menu[3]['title_' . $locale] ?></a></li>
                    <li class="navbar__item js-dropdown"><a hre="<?= url("/$locale/{$header_menu[4]['link']}") ?>" class="navbar__link"><?= $header_menu[4]['title_' . $locale] ?>
                            <svg class="navbar__arrow">
                            <use xlink:href="#icon-arrow-right"></use>
                            </svg></a>
                        <div role="menu" class="js-dropdown-menu navbar__dropdown navbar__dropdown--colls-1">
                            <button class="navbar__back js-navbar-submenu-back">
                                <svg class="navbar__arrow">
                                <use xlink:href="#icon-arrow-left"></use>
                                </svg>Back
                            </button>
                            <div class="navbar__submenu">
                                <ul class="navbar__subnav">
                                    <?php foreach ($header_menu[4]['submenus']as $menu) { ?>
                                        <li class="navbar__subitem">
                                            <a href="<?= url("/$locale/{$menu['link']}") ?>" class="navbar__sublink js-navbar-sublink"><?= $menu['title_' . $locale] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="navbar__item js-dropdown"><a href="<?= url("/$locale/{$header_menu[5]['link']}") ?>" class="navbar__link"><?= $header_menu[5]['title_' . $locale] ?>
                            <svg class="navbar__arrow">
                            <use xlink:href="#icon-arrow-right"></use>
                            </svg></a>
                        <div role="menu" class="js-dropdown-menu navbar__dropdown navbar__dropdown--colls-1">
                            <button class="navbar__back js-navbar-submenu-back">
                                <svg class="navbar__arrow">
                                <use xlink:href="#icon-arrow-left"></use>
                                </svg>Back
                            </button>
                            <div class="navbar__submenu">
                                <ul class="navbar__subnav">
                                    <?php foreach ($header_menu[5]['submenus']as $menu) { ?>
                                        <li class="navbar__subitem">
                                            <a href="<?= url("/$locale/{$menu['link']}") ?>" class="navbar__sublink js-navbar-sublink"><?= $menu['title_' . $locale] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="navbar__item"><a href="<?= url("/$locale/{$header_menu[6]['link']}") ?>" class="navbar__link"><?= $header_menu[6]['title_' . $locale] ?></a></li>
                </ul>
                <!-- end of block  navbar__nav-->
            </div>
        </div>
    </div>
</nav>
<!-- END NAVBAR-->