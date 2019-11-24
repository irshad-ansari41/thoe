<!-- BEGIN HEADER-->
<header class="header header--brand">
    <div class="container">
        <div class="header__row"><a href="index.html" class="header__logo">
                <img src="<?= asset('frontend-assets/img/thoe-logo-web.png') ?>" /></a>

            <div class="header__contacts"><a href="tel:<?= $setting['contact_phone'] ?>" class="header__phone">
                    <svg class="header__phone-icon">
                    <use xlink:href="#icon-phone"></use>
                    </svg><span class="header__span"><?= $setting['contact_phone'] ?></span></a></div>
            <div class="header__contacts"><a href="tel:<?= $setting['contact_phone'] ?>" class="header__phone">
                    <svg class="header__phone-icon">
                    <use xlink:href="#icon-mail"></use>
                    </svg><span class="header__span">Register Interest</span></a></div>
            <!-- end of block .header__contacts-->
            <div class="header__social">
                <div class="social social--header social--circles">
                    <a href="<?= $setting['facebook_link'] ?>" class="social__item"><i class="fa fa-facebook"></i></a>
                    <a href="<?= $setting['instagram_link'] ?>" class="social__item"><i class="fa fa-instagram"></i></a>
                    <a href="<?= $setting['twitter_link'] ?>" class="social__item"><i class="fa fa-twitter"></i></a>
                    <a href="<?= $setting['youtube_link'] ?>" class="social__item"><i class="fa fa-youtube-play"></i></a></div>
            </div>
            <div class="auth auth--header">
                <ul class="auth__nav">
                    <li class="dropdown auth__nav-item">
                        <div class="dropdown__menu auth__dropdown--restore">
                            <!-- BEGIN AUTH RESTORE-->
                            <h5 class="auth__title">Reset password</h5>
                            <form action="#" class="form form--flex form--auth form--restore js-restore-form js-parsley">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="restore-email-dropdown" class="control-label">Enter your User Name or Email</label>
                                        <input type="email" name="email" id="restore-email-dropdown" required class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="form__submit">Reset password</button>
                                </div>
                                <div class="row">
                                    <div class="form__options">Back to
                                        <button type="button" class="js-user-login">Agent Login</button>or
                                        <button type="button" class="js-user-register">Registration</button>
                                    </div>
                                    <!-- end of block .auth__links-->
                                </div>
                            </form>
                            <!-- end of block .auth__form-->
                            <!-- END AUTH RESTORE-->
                        </div>
                    </li>
                    <li class="dropdown auth__nav-item">
                        <button data-toggle="dropdown" type="button" class="dropdown-toggle js-auth-nav-btn auth__nav-btn">
                            <svg class="auth__icon-user">
                            <use xlink:href="#icon-user"></use>
                            </svg><span class="header__span"> Agent Login</span>
                        </button>
                        <div class="dropdown__menu auth__dropdown--login">
                            <!-- BEGIN AUTH LOGIN-->
                            <h5 class="auth__title">Agent Login</h5>
                            <form action="#" class="form form--flex form--auth js-login-form js-parsley">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="login-username-dropdown" class="control-label">Username</label>
                                        <input type="text" name="username" id="login-username-dropdown" required data-parsley-trigger="keyup" data-parsley-minlength="6" data-parsley-validation-threshold="5" data-parsley-minlength-message="Login should be at least 6 chars" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="login-password-dropdown" class="control-label">Password</label>
                                        <input type="password" name="password" id="login-password-dropdown" required class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form__options form__options--forgot">
                                        <button type="button" class="js-user-restore">Forgot password ?</button>
                                    </div>
                                    <button type="submit" class="form__submit">Sign in</button>
                                </div>
                                <div class="form__remember">
                                    <input type="checkbox" id="remember-in-dropdown" class="in-checkbox">
                                    <label for="remember-in-dropdown" class="in-label">Remember me</label>
                                </div>
                                <div class="row">
                                    <div class="form__options">Not registered?
                                        <button type="button" class="js-user-register">Get an account</button>
                                    </div>
                                </div>
                            </form>
                            <!-- end of block .auth__form-->
                            <!-- END AUTH LOGIN-->
                        </div>
                    </li>

                </ul>
                <!-- end of block .auth header-->
            </div>
            <button type="button" class="header__navbar-toggle js-navbar-toggle">
                <svg class="header__navbar-show">
                <use xlink:href="#icon-menu"></use>
                </svg>
                <svg class="header__navbar-hide">
                <use xlink:href="#icon-menu-close"></use>
                </svg>
            </button>
            <!-- end of block .header__navbar-toggle-->
        </div>
    </div>
</header>
<!-- END HEADER-->