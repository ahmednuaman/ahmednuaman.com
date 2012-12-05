<?php if (!defined('ENV')) { die('*sneaky sneaky*'); } ?>
            </div>
            <div id="footer" class="row">
                <div id="twitter-feed" class="span1">
                    <a href="http://twitter.com/ahmednuaman" class="sprite banner banner-twitter"></a>
                    <ul>
                        <li>
                            Loading Ahmed's tweets...
                        </li>
                    </ul>
                </div>
                <div id="blog-feed" class="span1">
                    <div class="sprite banner banner-blog"></div>
                    <ul>
                        <li>
                            Loading Ahmed's blog feed...
                        </li>
                    </ul>
                </div>
                <div id="github-feed" class="span1">
                    <a href="http://github.com/ahmednuaman" class="sprite banner banner-github"></a>
                    <ul>
                        <li>
                            Loading Ahmed's github feed...
                        </li>
                    </ul>
                </div>
                <div id="instagram-feed" class="span1">
                    <a href="http://instagram.com/ahmednuaman" class="sprite banner banner-instagram"></a>
                    <div></div>
                </div>
            </div>
        </div>
        <div id="contact" class="fixed">
            <div id="contain-details" class="relative centre">
                <h3>Contact me</h3>
                <div class="span2">
                    <span class="sprite icon icon-phone"></span> 07811 184 436<br />
                    <span class="sprite icon icon-pin"></span> London <span class="amp">&amp;</span> Kent, UK
                </div>
                <div class="span2">
                    <span class="sprite icon icon-twitter"></span> <a href="http://twitter.com/ahmednuaman" title="Ahmed's twitter feed">@ahmednuaman</a><br />
                    <span class="sprite icon icon-email"></span> <a href="mailto:ahmed@nuaman.co.uk?subject=<?php echo urlencode('Enquiry from the site...'); ?>" title="Email Ahmed">ahmed@nuaman.co.uk</a>
                </div>
            </div>
            <a href="#contact" class="sprite banner banner-contact"></a>
        </div>
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