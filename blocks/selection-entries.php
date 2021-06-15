<?php 
    $entries = get_field('seleccion_de_entradas');
    if ($entries) :  
        foreach ($entries as $post): 
            setup_postdata($post); 

                /* variables para cada imagen */
                $full = get_the_post_thumbnail_url(get_the_ID(),'full');
                $large = get_the_post_thumbnail_url(get_the_ID(),'large');
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
                $medium = get_the_post_thumbnail_url(get_the_ID(),'medium');
                
                get_template_part( 'blocks/card' ); 
                
            wp_reset_postdata();
        endforeach; 
    endif;  
?>
