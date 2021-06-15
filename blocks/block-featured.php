<section class="b-featured noise noise-featured"> 
    
    <div class="container w-800-600">
        <div class="simbolo">
        </div>
        <?php
            $titulo = get_field('titulo');
            $subtitulo = get_field('subtitulo');
            $ubicacion_1 = get_field('ubicacion_1');
            $ubicacion_2 = get_field('ubicacion_2');
        ?>
        <?php if($titulo) : ?>
        <h2 class="c-title c-title--jumbo serif" data-aos="fade-up">
            <?php echo $titulo; ?>
        </h2>
        <?php endif; if($subtitulo) : ?>
        <h2 class="c-subtitle" data-aos="fade-up" data-aos-delay="1500"><?php echo $subtitulo; ?></h2>
        <?php endif; ?>

        <?php get_template_part( 'blocks/curved-text' ); ?>
        
        <div class="e-location">
            <?php if($ubicacion_1) : ?>
            <p class="location one"><?php echo $ubicacion_1; ?></p>
            <?php endif; if($ubicacion_2) : ?>
            <h1 class="location two"><?php echo $ubicacion_2; ?></h1>
            <?php endif; ?>
        </div>
        <a href="#destacados" id="scrollbutton" class="arrow"></a>
    </div>
</section><!-- termina b-featured-->
