</div><!-- .container -->

</div> <!-- acaba white noise -->

<footer class="c-footer noise noise-footer">
    <div class="simbolo-footer"></div>
    <div class="container w-1310">
        <div class="b-menutop">
            <?php 
                wp_nav_menu( array( 
                    'theme_location' => 'menutop', 
                    'container' => 'false', 
                    'menu_class'=>'e-menu__cabecera') 
                ); 
            ?>
        </div>
        <div class="b-menulegal">
            <?php 
                wp_nav_menu( array( 
                    'theme_location' => 'menulegal', 
                    'container' => 'false', 
                    'menu_class'=>'e-menu__redes') 
                ); 
            ?>
        </div>
        <div class="b-menuredes">
            <?php 
                wp_nav_menu( array( 
                    'theme_location' => 'menuredes', 
                    'container' => 'false', 
                    'menu_class'=>'e-menu__redes') 
                ); 
            ?>
        </div>
        <?php if ( function_exists( 'display_copyright' ) ) display_copyright(); ?>
    </div>
        
</footer>

<?php wp_footer(); ?>

</body>
</html>
