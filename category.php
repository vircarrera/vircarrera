<?php get_header(); ?>

<div class="content cat">

    <div class="title__wrapper">
    <h1 class="e-title">
            <?php single_cat_title(); ?>
        </h1>

        <p> Estudié Publicidad y Realaciones Públicas en la UMA. Tuve que reinventarme contínuamente para llegar hasta aquí, de ahí a que los proyectos que vas a ver sean tan variados. Quizá estos filtros puedan ayudarte a encontrar lo que buscas:
            <br>
            <br>
        </p>
    </div>
    <div class="c-aside --entries">
    <h5 class="c-subtitle e-subtitle-4">
            Categorías:
        </h5>
        <div class="e-content">
            <!-- Este filto se hace usando las categorías. Su resultado se controla en category.php -->
            <?php
                $tax = 'category';
                $terms = get_terms($tax, array(
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                    'hide_empty' => 0,
                    'parent'   	 => 0
                ));
            ?>
            <div class="b-filter entries">
                <ul>
                <?php foreach ($terms as $term) :
                    $term_link = get_term_link($term);
                ?>
                    <li>
                    <a class="filter__link e-tag <?php echo $term->slug; ?>" href="<?php echo $term_link; ?>" data-filter=".<?php echo $term->slug; ?>">
                        <?php echo $term->name; ?>
                    </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <ul>
                <li class="e-filters">
                    <a class="cta cta-back" href="<?php echo get_site_url(); ?>/proyectos"><i class="iconos ico-flecha-izq"></i> Volver a todas</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="c-content c-entries results__category"> 
    
        <?php while (have_posts()) : the_post(); ?>

            <div class="b-card">
                <?php $color = get_field('color'); ?>
                <?php
                    /* variables para cada imagen */
                    $full = get_the_post_thumbnail_url(get_the_ID(),'full');
                    $large = get_the_post_thumbnail_url(get_the_ID(),'large');
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
                    $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');
                ?>

                <div class="card__title <?php echo $color; ?>">
                    <h3 class="c-title serif">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <figure class="imgdestacada">
                            <img src="<?php echo esc_url($thumbnail); ?>" alt="">
                        </figure>
                    </h3>
                </div>

                <div class="card__description e-text">
                    <?php the_excerpt() ?> 
                </div>

                <?php $favorite = get_field('favorite'); ?>
                <div class="card__extra <?php if($favorite): echo ' favorite'; endif; ?>">
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
                        <a class="cta cta-button" href="<?php the_permalink(); ?>">Más detalles</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

    </div><!-- resultados -->

</div>



<?php get_footer(); ?>
