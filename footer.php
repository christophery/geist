   <!-- {{!-- The footer at the very bottom of the screen --}} -->
        <footer class="site-footer outer">
            <div class="site-footer-content inner">
                <section class="copyright"><a href="">{{@site.title}}</a> &copy; {{date format="YYYY"}}</section>
                <nav class="site-footer-nav">
                    <a href="">Latest Posts</a>
                    <a href="https://ghost.org" target="_blank" rel="noopener">Ghost</a>
                </nav>
            </div>
        </footer>

    </div>

    <script>
        var images = document.querySelectorAll('.kg-gallery-image img');
        images.forEach(function (image) {
            var container = image.closest('.kg-gallery-image');
            var width = image.attributes.width.value;
            var height = image.attributes.height.value;
            var ratio = width / height;
            container.style.flex = ratio + ' 1 0%';
        })
    </script>

    <?php wp_footer(); ?>

</body>
</html>