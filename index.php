<?php get_header(); ?>

    <div class="content blog">

        <h1 class="e-title serif"><?php wp_title('', true, 'right') ?></h1>

        <p>La coherencia comunicativa de una marca se alcanza utilizando diferentes herramientas. Aunque terminara especializándome en web, empecé utilizando otras que terminaron quedando atrás. Estos filtros podrán ayudarte a encontrar lo que buscas:
            <br>
            <br>
        </p>

        <div class="c-aside --entries">
            <h5 class="c-subtitle e-subtitle-4">
                Disciplinas:
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
            </div>
        </div>

        <div class="c-content c-entries">
    
            <?php
                $args = array(
                'post_type'              => array('post'),
                'post_status'            => array('publish'),
                'posts_per_page'         => 10,
                'mid_size'               => 1,
                'prev_next'              => true,
                'prev_text'              => __( '<i class="iconos ico-flecha-izq"></i>' ),
                'next_text'              => __( '<i class="iconos ico-flecha-der"></i>' ),
                'paged'                  => $paged,
                );
                $posts = new WP_Query($args);
                if ($posts->have_posts()) :
                ?>

                    <?php while ($posts->have_posts()) :
                        $posts->the_post();
                    ?>
                        <?php
                        /* variables para cada imagen */
                        $full = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $large = get_the_post_thumbnail_url(get_the_ID(),'large');
                        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
                        $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');
                        ?>

                        <?php get_template_part( 'blocks/card' ); ?>
                        
                    <?php endwhile; ?>
                
            
                <div class="b-pager">
                    <div class="wrapper">
                        <div class="e-numbers"><?php echo paginate_links($args); ?></div>
                    </div>
                </div>

                <?php endif;?>

        </div>
       
    </div>

<?php get_footer(); ?>