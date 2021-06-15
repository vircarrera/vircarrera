<div class="b-card" data-aos="fade-up">
            
    <?php $color = get_field('color'); ?>
    <?php $enlaceExterior = get_field('enlace_exterior'); ?>
    <a class="card__title <?php echo $color; ?> noise" href="<?php if($enlaceExterior) : echo $enlaceExterior; else : the_permalink(); endif; ?>" <?php if($enlaceExterior) : echo "target=_blank"; endif;?>>
        <h3 class="c-title serif"><?php the_title(); ?></h3>
    </a>

    <div class="card__description e-text">
        <?php the_excerpt(); ?> 
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
            <?php $enlaceExterior = get_field('enlace_exterior'); ?>
            <a class="cta cta-button" href="<?php if($enlaceExterior) : echo $enlaceExterior; else : the_permalink(); endif; ?>" <?php if($enlaceExterior) : echo "target=_blank"; endif;?>>
            Más detalles</a>
        </div>
    </div>
</div>