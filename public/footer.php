        <?php if (ENV === 'production'): ?>
            <script src="/<?php echo PATH_ASSETS; ?>js/<?php echo PATH_DIST; ?>/packaged-min.js?<?php echo VERSION; ?>"></script>
        <?php else: ?>
            <?php get_assets('js', '<script src="%s?' . VERSION . '"></script>'); ?>
        <?php endif; ?>
        <script>
            var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>