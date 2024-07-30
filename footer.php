
<footer class="footer">

    <div class="py-6h">

        <div class="container">

            <div class="footer-left">

                <div class="footer-logo">

                    <a href="/"><img src="<?php echo $tp_options['footer-logo']['url']; ?>" alt="logo"></a>

                </div>

                <p class="fs-9 text-sixth mt-2 mb-5">

                </p>


            </div>

            <div class="footer-right d-flex justify-content-end">

                <?php wp_nav_menu(array("theme_location" => "footer-menu"));?>

                <div class="footer-contact mt-3 mt-md-0">


                </div>

            </div>

        </div>

    </div>


</footer>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<?php wp_footer();?>

</body>

</html>

