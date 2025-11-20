

<?php $__env->startSection('title', 'Főoldal'); ?>

<?php $__env->startSection('fullpage'); ?>

<section id="banner">
    <div class="inner">
        <header>
            <h2>Forma-1</h2>
        </header>
        <p>
            Kövesd nyomon a <strong>Forma-1</strong> világát
            <br />
            futamokkal, pilótákkal és statisztikákkal.
            <br />
        </p>

        <footer>
            <ul class="buttons stacked">
                <li>
                    <a href="#main" class="button fit scrolly">Bővebb infó!</a>
                </li>
            </ul>
        </footer>
    </div>
</section>

<article id="main">
    <header class="special container">
        <span class="icon solid fa-chart-bar"></span>
        <h2>
            Villámgyors <strong>Forma-1</strong> statisztikák
            <br />
            futamokról, pilótákról, eredményekről.
        </h2>
        <p>
            Nézd meg a versenyek adatait, böngéssz a pilóták között,
            <br />
            keress diagramokat az eredményekről, vagy akár adj meg fiktív versenyeket,
            <br />
            <br />
            Mindezt egy helyen, kényelmesen.
        </p>
    </header>

    <section class="wrapper style2 container special-alt">
        <div class="row gtr-50">
            <div class="col-8 col-12-narrower">
                <header>
                    <h2>
                        A <strong>Forma-1</strong>-ben minden ezredmásodperc számít –
                        az oldalad is legyen ilyen gyors és áttekinthető.
                    </h2>
                </header>
                <p>
                    Az oldal a versenyek, pilóták és eredmények adatait gyűjti egybe,
                    hogy könnyen átlásd a szezon történéseit. Statisztikák, diagramok,
                    fiktív események és üzenetküldés az oldal készítőinek, hogy Te is és mi is naprakészek legyünk.
                </p>
                <footer>
                    <ul class="buttons">
                        <li>
                            <a href="<?php echo e(route('races.index')); ?>" class="button">Versenyek</a>
                        </li>
                    </ul>
                </footer>
            </div>
            <div class="col-4 col-12-narrower imp-narrower">
                <ul class="featured-icons">
                    <li>
                        <span class="icon fa-clock"><span class="label">Időmérők</span></span>
                    </li>
                    <li>
                        <span class="icon solid fa-tachometer-alt"><span class="label">Gyorsaság</span></span>
                    </li>
                    <li>
                        <span class="icon solid fa-user-friends"><span class="label">Pilóták</span></span>
                    </li>
                    <li>
                        <span class="icon solid fa-flag-checkered"><span class="label">Futamok</span></span>
                    </li>
                    <li>
                        <span class="icon solid fa-chart-bar"><span class="label">Diagramok</span></span>
                    </li>
                    <li>
                        <span class="icon solid fa-envelope"><span class="label">Üzenetek</span></span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="wrapper style1 container special">
        <div class="row">
            <div class="col-4 col-12-narrower">
                <section>
                    <span class="icon solid featured fa-bolt"></span>
                    <header>
                        <h3>Erő</h3>
                    </header>
                    <p>
                        Az erő a motorban és az adatokban is jelen van: futamok, eredmények,
                        statisztikák – mind elérhető egy helyen, átláthatóan.
                    </p>
                </section>
            </div>
            <div class="col-4 col-12-narrower">
                <section>
                    <span class="icon solid featured fa-stopwatch"></span>
                    <header>
                        <h3>Gyorsaság</h3>
                    </header>
                    <p>
                        A gyorsaság nem csak a pályán fontos: az alkalmazás is úgy van
                        felépítve, hogy gyorsan megtaláld, amit keresel.
                    </p>
                </section>
            </div>
            <div class="col-4 col-12-narrower">
                <section>
                    <span class="icon solid featured fa-eye"></span>
                    <header>
                        <h3>Áttekinthetőség</h3>
                    </header>
                    <p>
                        Letisztult dizájn, jól szervezett menük és diagramok
                        segítenek abban, hogy mindig képben legyél az aktuális szezonról.
                    </p>
                </section>
            </div>
        </div>
    </section>

    <section class="wrapper style3 container special track-grid">
        <header class="major">
            <h2>A Forma-1 ikonikusabb pályái:</h2>
        </header>

        <div class="row">
            <div class="col-6 col-12-narrower">
                <section>
                    <header>
                        <h3><strong>Circuit de Monaco</strong></h3>
                    </header>
                    <a href="<?php echo e(route('races.index')); ?>" class="image featured">
                        <img src="<?php echo e(asset('images/monaco_map.jpeg')); ?>" alt="" />
                    </a>
                    <p>
                        Városi pálya, elképesztően szűk, falak közt száguldanak, és maga a helyszín
                        (kikötő, jachtok, kaszinó) annyira látványos, hogy önmagában szimbóluma az F1-nek.
                    </p>
                </section>
            </div>
            <div class="col-6 col-12-narrower">
                <section>
                    <header>
                        <h3><strong>Autodromo Nazionale di Monza</strong></h3>
                    </header>
                    <a href="<?php echo e(route('races.index')); ?>" class="image featured">
                        <img src="<?php echo e(asset('images/monza_map.jpg')); ?>" alt="" />
                    </a>
                    <p>
                        A “sebesség temploma”: nagyon hosszú egyenesek, brutális végsebességek és a tifosi (Ferrari-szurkolók) hangulata.
                        Az F1 történelmének szinte teljes egésze során jelen volt.
                    </p>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-12-narrower">
                <section>
                    <header>
                        <h3><strong>Silverstone</strong></h3>
                    </header>
                    <a href="<?php echo e(route('races.index')); ?>" class="image featured">
                        <img src="<?php echo e(asset('images/silv_map.jpg')); ?>" alt="" />
                    </a>
                    <p>
                        Az 1950-es első hivatalos F1-világbajnoki futam helyszíne. Gyors, folyékony kanyarok (Maggotts–Becketts, Copse),
                        és az F1 “szülőhazájának” számító brit motorsport központi pályája
                    </p>
                </section>
            </div>
            <div class="col-6 col-12-narrower">
                <section>
                    <header>
                        <h3><strong>Spa-Francorchamps</strong></h3>
                    </header>
                    <a href="<?php echo e(route('races.index')); ?>" class="image featured">
                        <img src="<?php echo e(asset('images/spa_map.jpg')); ?>" alt="" />
                    </a>
                    <p>
                        Hosszú, hegyes-völgyes pálya az Ardennekben, legendás kanyarkombinációval (Eau Rouge–Raidillon).
                        A pilóták egyik kedvence, sok ikonikus esős versennyel.
                    </p>
                </section>
            </div>
        </div>
    </section>
</article>

<section id="cta">
    <header>
        <h2>Szeretnél <strong>mélyebben</strong> belelátni a Forma-1 világába?</h2>
        <p>Nézd meg a statisztikákat vagy írj nekünk üzenetet.</p>
    </header>
    <footer>
        <ul class="buttons">
            <li><a href="<?php echo e(route('diagram.index')); ?>" class="button primary">Tovább</a></li>
            <li><a href="<?php echo e(route('contact.form')); ?>" class="button">Üzenetet írok</a></li>
        </ul>
    </footer>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\forma1\resources\views/home.blade.php ENDPATH**/ ?>