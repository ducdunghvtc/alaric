<?php

    /*

    Template Name: Home

    */

    get_header();

?>


<main class="main">
    <section class="section bg-primary" id="gioithieu">
        <img class="intro-image d-block ml-auto mr-auto" src="<?php get_stylesheet_directory_uri(); ?>wp-content/themes/alaric/common/images/cat-banner-logo.svg" alt="">
        <h1 class="text-uppercase text-light fs-32 fs-lg-100 font-utmbebas fw-bold text-center">tập đoàn truyền thông</h1>
        <img class="intro-image2 d-none d-md-block ml-auto mr-auto" src="<?php get_stylesheet_directory_uri(); ?>wp-content/themes/alaric/common/images/hang-dau.svg" alt="">
        <img class="intro-image2 d-block d-md-none ml-auto mr-auto" src="<?php get_stylesheet_directory_uri(); ?>wp-content/themes/alaric/common/images/hang-dau-mb.svg" alt="">
        <p class="text-uppercase text-light d-block d-md-none fs-84 fs-lg-100 lh-100 font-utmbebas fw-bold text-center">Việt Nam</p>
        <div class="d-flex align-items-center justify-content-center">
            <a href="mailto:info@cattiensa.com" class="mt-2 mr-1h bd-radius-30 btn-mail bg-light text-primary text-uppercase fw-bold">liên hệ hợp tác: info@cattiensa.com</a>
            <p class="d-none d-md-block text-uppercase text-light fs-84 fs-lg-100 lh-100 font-utmbebas fw-bold text-center">Việt Nam</p>
        </div>

        <div class="swiper">
        <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                ...
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </section>
    <section class="section" id="tuyendung">
        đây là section 2
    </section>
    <section class="section" id="chuongtrinh">
        đây là section 3
    </section>
    <section class="section">
        đây là section 4
    </section>
    <section class="section">
        đây là section 4
    </section>
    <section class="section">
        đây là section 4
    </section>

</main>


        

<?php

    get_footer();

?>

