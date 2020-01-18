<?php do_action( 'root_before_footer' ); ?>

    <footer class="site-footer content-block" itemscope itemtype="http://schema.org/WPFooter">
        <div class="site-footer-inner">

            <div class="footer-info">
                <?php
                $footer_copyright = raten_get_option( 'footer_copyright' );
                $footer_copyright = str_replace('%year%', date('Y'), $footer_copyright);
                echo $footer_copyright;
                ?>
                <br>
                <?php
                $footer_text = raten_get_option( 'footer_text' );
                if ( ! empty( $footer_text ) ) echo ''. $footer_text .'';
                ?>
            </div>   

            <div class="footer-counters">
                <?php echo raten_get_option( 'footer_counters' ) ?>
            </div>

        </div>
    </footer>


    <?php if (false) { ?>
        <button type="button" class="scrolltop js-scrolltop"></button>
    <?php } ?>

<?php do_action( 'root_after_footer' ); ?>