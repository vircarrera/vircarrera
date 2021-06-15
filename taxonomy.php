<?php get_header();
  $i = 0;
  $currentTerm = get_queried_object();
  $currentTitle = $currentTerm->name;
?>
<div class="content tax">

    <div class="title__wrapper">
        <?php if($currentTitle) : ?>
            <h1 class="e-title">
                <?php echo $currentTitle; ?>
            </h1>
        <?php endif; ?>
    </div>

    <input type="checkbox" id="checkfilter">
    <div class="c-aside --courses" data-aos="fade-right">
        <h5 class="c-subtitle e-subtitle-4">
            <label for="checkfilter" class="e-checkfilter__label">
                <img src="<?php bloginfo( 'template_url' ); ?>/img/content/mas.svg"></img>
            </label>
            Filtros de Búsqueda
        </h5>
        <div class="e-content">
            <?php get_template_part( 'blocks/block-filter-cursos' ); ?><!-- filtro cursos -->
        </div>
        <div>
            <a class="cta cta-link" href="<?php echo get_site_url(); ?>/cursos"><i class="iconos ico-flecha-izq"></i> Volver a todos los cursos</a>
        </div>
    </div>

    <div class="c-content page-content">
        <section class="taxonomias">
            <div class="b-work__header">
                
                <div class="e-content">
                    <?php the_archive_description(); ?>
                </div>          
            </div>

            <div class="b-courses">
                <?php 
                    while (have_posts()) : the_post();
                ?>
                    <div class="b-card --course" data-aos="fade-up">                        
                        <a href="<?php the_permalink(); ?>">
                            <figure class="figure">
                                <?php 
                                    /* variables para cada imagen */
                                    $full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                    $large = get_the_post_thumbnail_url(get_the_ID(),'large');
                                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); 
                                    $medium = get_the_post_thumbnail_url(get_the_ID(),'medium'); 
                                ?>
                                <source media="(min-width: 1200px)" srcset="<?php echo esc_url($full); ?>">
                                <source media="(min-width: 768px)" srcset="<?php echo esc_url($large); ?>"> 
                                <img src="<?php echo esc_url($medium); ?>" alt="">
                            </figure>
                        </a>
                        <div class="e-content">
                            <div class="e-wrapper">
                                <a href="<?php the_permalink(); ?>" >
                                    <h3 class="e-subtitle-3"><?php the_title(); ?></h3>
                                </a>
                                <h4 class="e-card-subtitle-4">
                                    <span>Por </span>
                                    <?php $docenteListado = get_field('docente_para_listado'); 
                                    if ($docenteListado) :
                                    ?>
                                    <a class="cta cta-link" href="<?php echo $docenteListado['url'];?>"><?php echo $docenteListado['title'];?></a>
                                    <?php endif; ?>
                                </h4>
                                <p class="e-card-text"> 
                                    <?php $claim = get_field('claim');
                                    if ($claim) : ?>
                                    <span><?php echo $claim; ?></span>
                                    <?php endif;?> 
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                            <div class="e-card-price">
                                <?php 
                                if( have_rows('precio') ): //parent group field
                                    while( have_rows('precio') ): the_row(); 
                                ?>  
                                    <div class="discount-old">
                                        <?php 
                                        if( have_rows('precio_en_euros') ): //child group field
                                            while( have_rows('precio_en_euros') ): the_row(); 
                                            // vars
                                            $porcentajedescuento = get_sub_field('porcentaje_descuento');
                                        ?>
                                        <span class="descuento"><?php echo $porcentajedescuento; ?></span>   
                                        <?php 
                                            endwhile;
                                        endif; 
                                        ?>                                        
                                    
                                        <?php 
                                        if( have_rows('precio_en_euros') ): //child group field
                                            while( have_rows('precio_en_euros') ): the_row(); 
                                            // vars
                                            $precioantesrebaja = get_sub_field('precio_antes_de_la_rebaja');
                                        ?>
                                            <span class="euro-price-old"><?php echo $precioantesrebaja; ?></span>   
                                        <?php 
                                            endwhile;
                                        endif; ?>
                                        <?php 
                                        if( have_rows('precio_en_usd') ): //child group field
                                            while( have_rows('precio_en_usd') ): the_row(); 
                                            // vars
                                            $precioantesrebaja = get_sub_field('precio_antes_de_la_rebaja');
                                        ?>
                                            <span class="usd-price-old"><?php echo $precioantesrebaja; ?></span>   
                                        <?php 
                                            endwhile;
                                        endif; ?>
                                    </div>
                                    <a class="cta cta-button price-new" href="<?php the_permalink(); ?>" >
                                        <?php 
                                        if( have_rows('precio_en_euros') ): //child group field
                                            while( have_rows('precio_en_euros') ): the_row(); 
                                            // vars
                                            $precioactual = get_sub_field('precio_actual');
                                        ?>
                                            <span class="euro-price-new"><?php echo $precioactual; ?></span> 
                                        <?php 
                                            endwhile;
                                        endif; ?>
                                        <?php 
                                        if( have_rows('precio_en_usd') ): //child group field
                                            while( have_rows('precio_en_usd') ): the_row(); 
                                            // vars
                                            $precioactual = get_sub_field('precio_actual');
                                        ?>
                                            <span class="usd-price-new"><?php echo $precioactual; ?></span>   
                                        <?php 
                                            endwhile;
                                        endif; ?>
                                    </a>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </div> <!-- termina e-price -->
                        </div>  <!-- cierra e-content -->
                    </div>  <!-- cierra b-card --course -->
                
                <?php endwhile; ?>
            </div>
        </section>  
    </div>
</div>
<?php get_footer(); ?>
