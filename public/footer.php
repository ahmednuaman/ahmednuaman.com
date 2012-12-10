<?php if (!defined('ENV')) { die('*sneaky sneaky*'); } ?>
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
                    <a href="/blog/" class="sprite banner banner-blog"></a>
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
                    <a href="http://instagram.com/ahmednuaman" title="View Ahmed's instagrams" class="instagram-pic" style="background-image: url(http://distilleryimage7.s3.amazonaws.com/547e64303c9111e2b74c22000a9f1427_5.jpg);">
                        <span>View Ahmed's instagrams</span>
                    </a>
                </div>
            </div>
            <div id="footnote" class="row">
                <p>
                    &copy; Ahmed Nuaman, all of my code and stuff is available under a '<a href="http://creativecommons.org/licenses/by-sa/3.0/">Attribution-ShareAlike 3.0 Unported</a>' license, however my clients own their respective copyrights.
                </p>
            </div>
        </div>
        <div id="contact" class="fixed">
            <div id="contact-details" class="relative centre">
                <h3>Contact me</h3>
                <div class="span2">
                    <span class="sprite icon icon-phone">07811 184 436</span><br />
                    <span class="sprite icon icon-pin">London <span class="amp">&amp;</span> Kent, UK</span>
                </div>
                <div class="span2">
                    <span class="sprite icon icon-twitter">
                        <a href="http://twitter.com/ahmednuaman" title="Ahmed's twitter feed">
                            @ahmednuaman
                        </a>
                    </span><br />
                    <span class="sprite icon icon-email">
                        <a href="mailto:ahmed@nuaman.co.uk?subject=<?php echo urlencode('Enquiry from the site...'); ?>" title="Email Ahmed">
                            ahmed@nuaman.co.uk
                        </a>
                    </span>
                </div>
                <a href="#contact" class="sprite banner banner-contact"></a>
            </div>
        </div>
        <?php if (ENV === 'production'): ?>
            <script src="/<?php echo PATH_ASSETS; ?>js/packaged-min.js?<?php echo VERSION; ?>"></script>
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