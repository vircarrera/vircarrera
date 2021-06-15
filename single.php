<?php get_header(); ?>

<!-- empieza el LOOP -->
<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
       
        <article class="content">
            <?php 
            /* variables para cada imagen */
                $full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                $large = get_the_post_thumbnail_url(get_the_ID(),'large');
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); 
                $medium = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
            ?>
            <picture class="e-photo">
                <source media="(min-width: 992px)" srcset="<?php echo esc_url($full); ?>">
                <img src="<?php echo esc_url($medium); ?>" alt="">
            </picture>

            <div class="b-article-intro">
                <h1 class="e-title serif"> <?php echo the_title();?> </h1>

                <p class="place-date-time">
                    <?php $place = get_field('place') ; if ($place) : ?><span class="e-place"><?php echo $place; ?>,  </span><?php endif; ?>
                    <span class="e-date"> <?php echo get_the_date();?> </span>
                    <?php $time = get_field('time') ; if ($time) : ?><span class="e-time"><?php echo $time; ?>' <i class="iconos ico-time"></i></span><?php endif; ?>
                </p>
                <hr>
            </div>

            <div class="c-content">            
                <div class="b-article">
                    <div class="e-text container w-1000"> <?php the_content(); ?></div>
                    </div>
                </div>
                <aside class="c-aside -blog" data-aos="fade-left">   
                    <div class="e-tags">
                        <h4 class="c-subtitle e-subtitle-4">Disciplinas</h4>
                        <?php get_template_part( 'blocks/tags' ); ?>
                    </div>    
                </aside>
            </div>

            <div class="container w-1310"><hr></div>    
            
            <span class="e-back"><a class="cta cta-button" href="<?php echo get_site_url(); ?>/proyectos"><i class="iconos ico-flecha-izq"></i> Volver a proyectos</a></span>
                
            <?php get_template_part( 'blocks/block-related' ); ?>
        </article>

    <?php endwhile;
endif; ?>
<!-- termina el LOOP -->

<?php get_footer(); ?>