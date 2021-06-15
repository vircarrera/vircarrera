<?php
    $related = get_posts( array( 
        'category__in' => wp_get_post_categories($post->ID), 
        'numberposts' => 3, 
        'post__not_in' => array($post->ID) ) 
    );
    if( $related ) {
?>
    <div class="b-related container w-1310">
        <div class="degradado"></div>
        <?php                        
            foreach( $related as $post ) {
                setup_postdata($post); 
                    get_template_part( 'blocks/card' );
            } 
        ?>
    </div>
<?php
    }
    wp_reset_postdata(); 
?>