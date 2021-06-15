<?php get_header(); ?>

<!-- PÁGINA QUE MUESTRA LOS RESULTADOS DE LA BÚSQUEDA -->

<div class="c-search">
    <h1 class="e-title c-title">
        Has buscado:
        <?php
        $allsearch = new WP_Query("s=$s&showposts=-1");
        $key = wp_specialchars($s, 1);
        $count = $allsearch->post_count;
        _e('<span> "');
        echo $key;
        _e('</span>');
        _e('". Hemos encontrado ');
        _e('<span> ');
        echo $count;
        _e(' proyectos.</span>');
        wp_reset_query();
        ?>
    </h1>

    <div class="c-content c-entries">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <?php
                /* variables para cada imagen */
                $full = get_the_post_thumbnail_url(get_the_ID(),'full');
                $large = get_the_post_thumbnail_url(get_the_ID(),'large');
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
                $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');
                ?>

                <div class="b-card --search">

                    <?php 
                        $color = get_field('color');
                    ?>
                    <a class="card__title <?php echo $color; ?> " href="<?php the_permalink(); ?>">
                        <h3 class="c-title serif"><?php the_title(); ?></h3>
                        <figure class="imgdestacada">
                            <img src="<?php echo esc_url($thumbnail); ?>" alt="">
                        </figure>
                    </a>

                    <div class="card__description e-text">
                        <?php the_excerpt(); ?> 
                    </div>

                    <?php $favorite = get_field('favorite'); ?>
                    <div class="card__extra <?php if($favorite): echo ' favorite'; endif;?>">

                    <?php 
                        $the_post_id = get_the_ID();
                        $article_terms = wp_get_post_terms( $the_post_id, ['category']);  
                        if( empty( $article_terms) || ! is_array($article_terms) ) {
                            return;
                        }
                    ?>
                        <ul class="card_tags">
                            <?php foreach ( $article_terms as $key => $article_term ) : ?>
                                <li class="e-tag <?php echo esc_html( $article_term->slug); ?>">
                                    <a href="<?php echo esc_url( get_term_link( $article_term)); ?>">
                                        <?php echo esc_html( $article_term->name); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="card__link">
                            <?php $enlaceExterior = get_field('enlace_exterior'); ?>
                            <a class="cta cta-button" href="<?php if($enlaceExterior) : echo $enlaceExterior; else : the_permalink(); endif; ?>" <?php if($enlaceExterior) : echo "target=_blank"; endif;?>>
                            Más detalles</a>
                        </div>
                    </div>
                </div>

        <?php endwhile;?>

        <div class="b-pager">
            <div class="wrapper">
                <div class="e-numbers"><?php echo paginate_links($args); ?></div>
            </div>
        </div>
        <?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>
