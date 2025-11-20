<!DOCTYPE HTML>
<html lang="hu">

<head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title', 'Forma-1'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>" />
    <noscript>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/noscript.css')); ?>" />
    </noscript>

    <style>
        #footer {
            padding: 1.5em 0;
            margin-bottom: 0;
        }

        html,
        body {
            height: 100%;
        }

        #page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #page-wrapper>header {
            flex: 0 0 auto;
        }

        #page-wrapper>article {
            flex: 1 0 auto;
        }

        #page-wrapper>footer {
            flex: 0 0 auto;
        }

        #header nav>ul {
            display: flex;
            align-items: center;
        }

        #header nav ul li.header-logout-item {
            display: flex;
            align-items: center;
            margin-left: 1.5em;
        }


        .header-logout-form {
            margin: 0;
            display: inline-block;
        }

        .header-logout-button {
            display: inline-block;
            padding: 0.3em 0.85em;
            line-height: 1.4;
            font-size: 0.8rem;
            border-radius: 4px;
            border: 1px solid rgba(0, 0, 0, 0.15);
            background: rgba(0, 0, 0, 0.03);
            color: #555;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }

        .header-logout-button:hover {
            background: rgba(0, 0, 0, 0.08);
            border-color: rgba(0, 0, 0, 0.25);
            color: #333;
        }

        .home-page .header-logout-button {
            background: rgba(0, 0, 0, 0.35);
            border-color: rgba(0, 0, 0, 0.55);
            color: #f5f5f5;
        }

        .home-page .header-logout-button:hover {
            background: rgba(0, 0, 0, 0.5);
            border-color: rgba(0, 0, 0, 0.8);
            color: #ffffff;
        }
    </style>

    <?php echo $__env->yieldContent('head'); ?>
</head>

<body class="no-sidebar is-preload <?php echo e(request()->routeIs('home') ? 'home-page' : ''); ?>">
    <div id="page-wrapper">
        <header id="header" class="<?php echo e(request()->routeIs('home') ? 'alt' : ''); ?>">
            <h1 id="logo"><a href="<?php echo e(route('home')); ?>">Forma-1</a></h1>
            <nav id="nav">
                <ul>
                    <li class="<?php echo e(request()->routeIs('home') ? 'current' : ''); ?>">
                        <a href="<?php echo e(route('home')); ?>">Főoldal</a>
                    </li>
                    <li class="submenu">
                        <a href="#">Egyéb</a>
                        <ul>
                            <li class="<?php echo e(request()->routeIs('races.*') ? 'current' : ''); ?>">
                                <a href="<?php echo e(route('races.index')); ?>">Versenyek</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('pilots.*') ? 'current' : ''); ?>">
                                <a href="<?php echo e(route('pilots.index')); ?>">Pilóták</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('diagram.*') ? 'current' : ''); ?>">
                                <a href="<?php echo e(route('diagram.index')); ?>">Diagram</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('contact.*') ? 'current' : ''); ?>">
                                <a href="<?php echo e(route('contact.form')); ?>">Kapcsolat</a>
                            </li>
                            <?php if(auth()->guard()->check()): ?>
                            <?php if(in_array(auth()->user()->role, ['user', 'admin'])): ?>
                            <li class="<?php echo e(request()->routeIs('messages.*') ? 'current' : ''); ?>">
                                <a href="<?php echo e(route('messages.index')); ?>">Üzenetek</a>
                            </li>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->role === 'admin'): ?>
                            <li class="<?php echo e(request()->routeIs('admin.*') ? 'current' : ''); ?>">
                                <a href="<?php echo e(route('admin.index')); ?>">Admin</a>
                            </li>
                            <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                    <?php if(in_array(auth()->user()->role, ['user', 'admin'])): ?>
                    <li class="header-logout-item">
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="header-logout-form">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="header-logout-button">
                                Kijelentkezés (<?php echo e(auth()->user()->name); ?>)
                            </button>
                        </form>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('login')); ?>" class="button small">Bejelentkezés</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('register')); ?>" class="button primary small">Regisztráció</a>
                    </li>
                    <?php endif; ?>
                    <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('login')); ?>" class="button small">Bejelentkezés</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('register')); ?>" class="button primary small">Regisztráció</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>


        <?php if (! empty(trim($__env->yieldContent('fullpage')))): ?>
        <?php echo $__env->yieldContent('fullpage'); ?>
        <?php else: ?>
        <article id="main">
            <header class="special container">
                <?php echo $__env->yieldContent('header'); ?>
            </header>

            <section class="wrapper <?php echo $__env->yieldContent('wrapper_class', 'style4 container'); ?>">
                <div class="<?php echo $__env->yieldContent('inner_class', 'content'); ?>">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </section>
        </article>
        <?php endif; ?>

        <footer id="footer">
            <ul class="icons">
                <li>
                    <a href="#" class="icon brands circle fa-twitter">
                        <span class="label">Twitter</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon brands circle fa-facebook-f">
                        <span class="label">Facebook</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon brands circle fa-google-plus-g">
                        <span class="label">Google+</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon brands circle fa-github">
                        <span class="label">Github</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon brands circle fa-dribbble">
                        <span class="label">Dribbble</span>
                    </a>
                </li>
            </ul>

            <ul class="copyright">
                <li>&copy; <?php echo e(date('Y')); ?> Forma-1</li>
                <li>
                    Design:
                    <a href="http://html5up.net" target="_blank" rel="noopener">HTML5 UP</a>
                </li>
            </ul>
        </footer>

    </div> 

    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.dropotron.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.scrolly.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.scrollex.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/browser.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/breakpoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/util.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html><?php /**PATH C:\forma1\resources\views/layouts/app.blade.php ENDPATH**/ ?>