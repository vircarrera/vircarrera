<section class="b-contact" id="contacto">
    <div class="container w-1310">
        <h2 class="c-title c-title--hero serif">¿Quieres hablar?</h2>
        <div class="escrito" data-aos="fade-up">
            <p>Mándame un mensaje a través de este formulario, invítame a conversar, o dime si te ha gustado alguno de los proyectos, me hará feliz saberlo.</p>
            <br>
        </div>
        <?php
            $formulario = get_field('formulario');
            if($formulario) :
        ?>
            <div class="formulario">
                <?php echo $formulario; ?>
            </div>
        <?php endif; ?>
    </div>
</section>     