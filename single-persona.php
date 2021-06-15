<?php /* Template Name: Personas */ ?>

<?php get_header(); ?>

<!-- empieza el LOOP -->
    <?php if (have_posts()) : while (have_posts()) : the_post();
        /* variables para cada imagen */
        $full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        $large = get_the_post_thumbnail_url(get_the_ID(),'large');
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); 
        $medium = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
    ?>

    <div class="content persona">
            
        <div class="c-persona-bg"> 
            <div class="w-1310">
                <div class="flex">

                    <div class="b-person-card" data-aos="fade-right">
                        <div class="e-frame">
                            <picture class="frame">
                                <source media="(min-width: 992px)" srcset="<?php echo esc_url($large); ?>">
                                <img src="<?php echo esc_url($medium); ?>" alt="">
                            </picture>
                        </div>
                        <div class="e-content">

                            <h1 class="c-title e-title"><?php the_title(); ?></h1>

                            <?php if( have_rows('ficha_de_la_persona') ): //parent group field
                                while( have_rows('ficha_de_la_persona') ): the_row(); 
                                // vars
                                $ocupation = get_sub_field('ocupacion');
                                $web = get_sub_field('pagina_web');
                                $linkedin = get_sub_field('linkedin');
                                $mail = get_sub_field('mail');
                                ?>
                                
                                <?php if ($ocupation) : ?>
                                    <h3 class="c-subtitle e-subtitle-3"><?php echo $ocupation ?></h3>
                                <?php endif; ?>
                                <hr>
                                <?php if ($web) : ?>
                                    <a class="cta cta-link" href="<?php echo $web['url']; ?>"><?php echo $web['title']; ?></a>
                                <?php endif; ?>
                                <div class="wrapper">
                                    <?php if ($linkedin) : ?>
                                        <a href="<?php echo $linkedin ?>"><i class="iconos ico-linkedin"></i></a>
                                    <?php endif; ?>

                                    <?php if ($mail) : ?>
                                        <a href="mailto:<?php echo $mail ?>"><i class="iconos ico-email"></i></a>
                                    <?php endif; ?>
                                </div>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div> <!-- cierra e-content-->
                    
                    </div> <!-- cierra b-card-->
                
                    <div class="b-content">
                        <?php if( have_rows('datos_de_la_persona') ): //parent group field
                            while( have_rows('datos_de_la_persona') ): the_row(); 
                            // vars
                            $name = get_sub_field('primer_nombre');
                            $bibliography = get_sub_field('bibliografia');
                            $image1= get_sub_field('imagen_de_la_bibliografia_1');
                            $image2= get_sub_field('imagen_de_la_bibliografia_2');
                            $image3= get_sub_field('imagen_de_la_bibliografia_3');
                            $interviews= get_sub_field('entrevistas');
                            $researchs= get_sub_field('investigaciones');
                            $articles= get_sub_field('articulos_escritos');
                            $courses= get_sub_field('cursos_impartidos');
                        ?>  

                            <?php if ($name) : ?>
                                <h2 class="e-subtitle-2">Sobre <?php echo $name ?> </h2>
                            <?php endif; ?>
                            
                            <div data-aos="fade-up" class="e-intro"><?php the_content(); ?></div>

                            <?php if ($bibliography) : ?>
                                <div class="b-bibliography">
                                    <div class="bibliography-wrapper">
                                        <h2 class="e-subtitle-2">Bibliografía</h2>
                                        <div  data-aos="fade-up" class="text"><?php echo $bibliography; ?></div>
                                    </div>
                                    <div class="b-bibliography-images">
                                        <div class="image-1" data-aos="fade-up" data-aos-delay="300">
                                            <?php        
                                            if( $image1 ):
                                                // Image variables.
                                                $url = $image1['url'];
                                                $title = $image1['title'];
                                                $alt = $image1['alt'];
                                                // Thumbnail size attributes.
                                                $size = 'thumbnail';
                                                $thumb = $image1['sizes'][ $size ];

                                            ?>

                                                <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
                                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>">
                                                </a>

                                            <?php endif; ?>
                                        </div>

                                        <div class="image-2" data-aos="fade-up" data-aos-delay="450">
                                            <?php        
                                                if( $image2 ):
                                                    // Image variables.
                                                    $url = $image2['url'];
                                                    $title = $image2['title'];
                                                    $alt = $image2['alt'];
                                                    // Thumbnail size attributes.
                                                    $size = 'thumbnail';
                                                    $thumb = $image2['sizes'][ $size ];

                                            ?>

                                                    <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
                                                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>">
                                                    </a>

                                                <?php endif; ?>
                                        </div>

                                        <div class="image-3" data-aos="fade-up" data-aos-delay="600">
                                            <?php        
                                                if( $image3 ):
                                                    // Image variables.
                                                    $url = $image3['url'];
                                                    $title = $image3['title'];
                                                    $alt = $image3['alt'];
                                                    // Thumbnail size attributes.
                                                    $size = 'thumbnail';
                                                    $thumb = $image3['sizes'][ $size ];
                                                ?>

                                                    <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
                                                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>">
                                                    </a>

                                            <?php endif; ?>
                                        </div>
                                    
                                    
                                    </div> <!-- termina b-bibliography-images -->
                                </div><!-- termina b-bibliography -->
                            <?php endif; ?>

                            <?php if ($interviews) : ?>
                                <div class="b-interviews">
                                    <h2 class="e-subtitle-2">Entrevistas</h2>
                                    <div class="text" data-aos="fade-up"><?php echo $interviews; ?></div>
                                </div>
                            <?php endif; ?>

                        <?php endwhile; endif; ?>

                    </div> <!-- cierra c-content-->

                    <?php get_template_part( 'blocks/block-persona-related-researchs' ); ?><!-- INVESTIGACIONES DE LA PERSONA -->
                </div>
            </div>
        </div>  

        <div class="w-1310">
            <?php get_template_part( 'blocks/block-persona-related-courses' ); ?><!-- CURSOS IMPARTIDOS POR LA PERSONA -->
                
            <?php get_template_part( 'blocks/block-persona-related-articles' ); ?><!--  ARTÍCULOS ESCRITOS POR LA PERSONA -->   
            
        </div>
    </div> <!-- cierra content persona -->

<?php endwhile; endif; ?>
<!-- termina el LOOP -->
<?php get_footer(); ?>