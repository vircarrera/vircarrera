    <section id="destacados" class="b-featured-blog-post">    
        <div class="container w-1310 card__container">
            <div class="degradado"></div>
            <h2 class="c-subtitle cta cta-carita serif">Y esto es lo que hago</h2>
            <?php get_template_part( 'blocks/selection-entries' ); ?>
        </div>
        <?php 
            $link_entradas = get_field('link_entradas');
            $url_entradas = $link_entradas['url'];
            $letras_entradas = $link_entradas['title'];
            if($link_entradas) : 
        ?>
            <p class="cta-intro">
                <span>También puedes</span>
                <a href="<?php echo $url_entradas; ?>" class="cta cta-button"><?php echo $letras_entradas; ?></a></p>
        <?php endif; ?>
    </section><!-- termina b-featured-blog-post-->