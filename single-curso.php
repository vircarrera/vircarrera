<?php /* Template Name: Curso */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <input type="checkbox" id="checkindice" class="e-indice__check">
    
    <div class="b-featured">
        <div class="b-featured__content w-1310">
            <div class="b-featured__header">
                <div class="e-title-author">
                    <h1 class="c-title --course"><?php the_title(); ?></h1>
                    <div class="e-docente -course">
                        <?php $docentes = get_field('docente_que_lo_imparte');
                        foreach ($docentes as $post): 
                        ?>
                            <?php setup_postdata($post); ?>
                            <div class="autor">
                                <div class="imagennombreyocupacion">
                                    <h2 class="c-subtitle e-subtitle-3">Un curso de <a class="cta" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>,
                                        <?php if( have_rows('ficha_de_la_persona') ): //parent group field
                                            while( have_rows('ficha_de_la_persona') ): the_row(); 
                                            // vars
                                            $ocupacion = get_sub_field('ocupacion');
                                        ?>
                                        <span class="ocupacion">
                                            <?php echo $ocupacion; ?>
                                        </span>
                                        <?php 
                                            endwhile;
                                        endif; 
                            wp_reset_postdata(); 
                        endforeach; ?>
                                        <?php $supervisor = get_field('supervisor'); 
                                        if($supervisor) : ?>
                                            <span>. Supervisado por <a class="cta" href="<?php echo $supervisor['url'] ?>"> <?php echo $supervisor['title'] ?></a>.</span>
                                        <?php endif; ?>  
                                    </h2>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="e-price">
                    <?php 
                        if( have_rows('precio') ): //parent group field
                        while( have_rows('precio') ): the_row(); 
                    ?>  
                            
                            <input id="checkcross" type="checkbox" class="e-switchprice">
                            <span class="checkcross">
                                <label class="toggle-item e-switchprice__label" for="checkcross">
                                    <div class="tick"></div>
                                    <span class="euros">€</span>
                                    <span class="dollars">USD</span>
                                </label>
                            </span>
                        
                            <div class="e-europrice">
                                <?php if( have_rows('precio_en_euros') ): //child group field
                                    while( have_rows('precio_en_euros') ): the_row(); 
                                    // vars
                                    $precioactual = get_sub_field('precio_actual');
                                    $porcentajedescuento = get_sub_field('porcentaje_descuento');
                                    $precioantesrebaja = get_sub_field('precio_antes_de_la_rebaja');
                                ?>
                                        <span class="newprice"><?php echo $precioactual; ?></span>
                                        <span class="discount"><?php echo $porcentajedescuento; ?></span>
                                        <span class="oldprice"><?php echo $precioantesrebaja; ?></span>  
                                        <a href="#" class="cta cta-button">
                                            <span>Comprar en €</span>
                                            <?php 
                                                $priceeu = get_sub_field('priceeu');
                                                if($priceeu) :
                                            ?>
                                                <span class="e-script euro">
                                                    <?php echo $priceeu; ?>
                                                </span>
                                            <?php endif; ?>
                                        </a>
                                    <?php endwhile; ?>
                                <?php endif; ?> <!-- close child group field -->
                            </div>
                            <div class="e-usdprice">
                                <?php if( have_rows('precio_en_usd') ): //child group field
                                    while( have_rows('precio_en_usd') ): the_row(); 
                                    // vars
                                    $precioactual = get_sub_field('precio_actual');
                                    $porcentajedescuento = get_sub_field('porcentaje_descuento');
                                    $precioantesrebaja = get_sub_field('precio_antes_de_la_rebaja');
                                ?>
                                        <span class="newprice"><?php echo $precioactual; ?></span>
                                        <span class="discount"><?php echo $porcentajedescuento; ?></span>
                                        <span class="oldprice"><?php echo $precioantesrebaja; ?></span>
                                       
                                        <a href="#" class="cta cta-button">
                                            <span>Comprar en USD</span>
                                            <?php 
                                                $priceusd = get_sub_field('priceusd');
                                                if($priceusd) :
                                            ?>
                                                <span class="e-script usd">
                                                    <?php echo $priceusd; ?>
                                                </span>
                                            <?php endif; ?>
                                        </a>
                                    <?php endwhile; ?>
                                <?php endif; ?> <!-- close child group field -->
                            </div>

                        <?php endwhile; ?> 
                    <?php endif; ?> <!-- close parent group field -->
                </div>
            </div>
            <div class="b-featured__video">
                <?php 
                    if( have_rows('video_principal') ): //parent group field
                    while( have_rows('video_principal') ): the_row(); 
                    // vars
                    $linkArchive = get_sub_field('link_archive');
                    $link = get_sub_field('link');
                    $archive = get_sub_field('archive');
                    $poster= get_sub_field('poster');
                ?>
                    <div class="video-wrapper" data-aos="fade-up">
                        <?php 
                            if ($linkArchive): 
                                if ($link):
                                    echo $link; 
                                endif;
                            else:
                                if ($archive):
                        ?>
                                    <video poster="<?php if($poster): echo $poster; endif; ?>" src="<?php echo esc_url($archive); ?>" controls controlslist="nodownload" playinline></video>                                
                                <?php endif; 
                            endif; ?>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <?php get_template_part( 'blocks/block-course-indice' ); ?>
        </div>
    </div>

    <div class="c-content --course w-1310">
        
        <article class="b-article --course">
            <h2 class="e-claim" data-aos="fade-up">
                <?php 
                    $claim = get_field('claim');
                    if ($claim) :
                    echo $claim;
                    endif; 
                ?>
            </h2>
            <div class="b-content" data-aos="fade-up">
                <?php the_content(); ?>
                <?php get_template_part( 'blocks/block-course-videosaditional' ); ?>
            </div>
        </article>

        <aside class="c-aside --course" data-aos="fade-left">
            
            <?php get_template_part( 'blocks/curso-aside-b-data' ); ?>
            
            <hr>

            <?php $docents = get_field('docente_que_lo_imparte');
            foreach ($docents as $post): 
            ?>
            <?php setup_postdata($post); ?>
                <div class="b-docente --course">
                    <div class="e-wrapper">
                        <div class="frame-container">
                            <div class="frame">
                                <picture class="e-image">
                                    <?php 
                                        $full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                        $large = get_the_post_thumbnail_url(get_the_ID(),'large');
                                        $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); 
                                        $medium = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
                                    ?>
                                    <img src="<?php echo $thumbnail; ?>">
                                </picture>
                            </div>
                        </div>
                        <div class="name-ocupation">
                            <div class="e-name">
                                <?php the_title(); ?>
                            </div>
                            <?php if( have_rows('ficha_de_la_persona') ): //parent group field
                                while( have_rows('ficha_de_la_persona') ): the_row(); 
                                // vars
                                $ocupacion = get_sub_field('ocupacion');
                                $bio = get_sub_field('minibio');
                            ?>
                            <div class="e-ocupation">
                                <?php echo $ocupacion; ?>
                            </div>
                        </div>
                    </div>
                    <div class="e-bio">
                        <?php echo $bio; ?>
                    </div>
                    <?php 
                        endwhile;
                    endif; 
                        ?>
                    <a class="cta cta-link" href=" <?php the_permalink() ?>">Ver perfil completo</a>
                    
                </div>
            <?php
                wp_reset_postdata();
            endforeach;
            ?>
            <hr>
            <div class="b-issue">
                <p class="e-subtitle-4">¿Te podemos ayudar en algo?</p>
                <a class="cta cta-link" href="<?php echo get_site_url(); ?>/#contact" class="e-logo__positive">Contacta con nosotros</a>
            </div>
            <hr>
            <div class="b-tags">
                <p class="e-subtitle-4">Áreas</p>
                <?php the_tags( '<ul class="e-tags"><li>', '</li><li>', '</li></ul>' ); ?>
            </div>
        </aside>

        <div class="b-apreciations --course" data-aos="fade-up">
            <!-- LLAMADA A LOS COMENTARIOS -->
            <?php if ( comments_open() || get_comments_number() ) : 
            comments_template(); 
            endif; ?>
        </div>

        <div class="b-related --course">
            <!-- llamada al bloque cursos relacionados -->
            <?php get_template_part( 'blocks/courses-related-courses' ); ?>
        </div>
        
    </div>

<?php endwhile; endif; ?>
<!-- termina el LOOP -->

<?php get_footer(); ?>