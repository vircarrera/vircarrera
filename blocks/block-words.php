<section class="b-words noise noise-words">
    
    <div class="container w-1310">
    <div class="simbolo"></div>
        <?php 
            $titulo_entrada = get_field('titulo_entrada');
            $subtitulo_entrada = get_field('subtitulo_entrada');
            $titulo_parrafo = get_field('titulo_parrafo');
            $parrafo = get_field('parrafo');
            $cara = get_field('cara');
        ?>
        <div class="e-heading">
            <?php if($titulo_entrada) : ?>
            <h2 class="c-title c-title--hero serif"><?php echo $titulo_entrada; ?></h2>
            <?php endif; //if($subtitulo_entrada) : ?>
            <!-- <h3 class="c-subtitle"><?php //echo $subtitulo_entrada; ?></h3> -->
            <!-- <?php //endif; ?> -->
        </div>
        <div class="e-content" data-aos="fade-up">

            <!-- <?php //if($parrafo) : ?> -->
            <p class="e-text"><?php the_content(); ?></p>
            <!-- <?php //endif; ?> -->
        </div>       
        <div class="e-imagen">
            <?php if($cara) : ?>
            <img alt="Virginia Domínguez Carrera" loading="lazy" class="cara" src="<?php echo $cara; ?>" alt="Virginia Dominguez Carrera">
            <div class="texto"></div>
            <ul class="e-redes">
                <?php 
                    $cv = get_field('cv'); 
                    $instagram = get_field('instagram'); 
                    $linkedin = get_field('linkedin'); 
                ?>
                <li><?php if ($linkedin) : ?><a href="<?php echo $linkedin?>" class="cta cta-button" target="_blank"><i class="iconos ico-linkedin"></i></a><?php endif; ?></li>
                <li><?php if ($cv) : ?><a class="cta cta-button cv" href="<?php echo $cv?>" target="_blank">CV</a><?php endif; ?></li>
                <li><?php if ($instagram) : ?><a href="<?php echo $instagram?>" class="cta cta-button" target="_blank"><i class="iconos ico-instagram"></i></a><?php endif; ?></li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>