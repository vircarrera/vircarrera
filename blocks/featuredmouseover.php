<div class="experimento">
<?php 
$entriesimage = get_field('seleccion_de_fotos');
if ($entriesimage) :  
    foreach ($entriesimage as $post): 
?>
        <?php setup_postdata($post); ?>
        <?php
            /* variables para cada imagen */
            $full = get_the_post_thumbnail_url(get_the_ID(),'full');
            $large = get_the_post_thumbnail_url(get_the_ID(),'large');
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
            $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');
        ?>
        
        <div class="b-featured__container">
            
                <figure class="b-featured__container">
                    <img src="<?php echo esc_url($thumbnail); ?>" alt="">
                </figure>
            
        </div>

    <?php 
        wp_reset_postdata();
    endforeach; 
endif;  
?>
</div>