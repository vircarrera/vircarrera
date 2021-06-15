<div class="comentarios">
    <?php if ( have_comments() ) : ?><!-- tomar los comentarios -->

<!-- título del área de comentarios -->
    <h4 class="comentarios__titulo">
        <?php
            printf( _nx( '1 comentario en &ldquo;%2$s&rdquo;', '%1$s comentarios en &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title' ),
            number_format_i18n( get_comments_number() ), get_the_title() );
        ?>
    </h4>

<!-- lista de comentarios -->
    <ul class="comentarios__lista">
        <?php
            wp_list_comments( array(
                'style' => 'ul',
                'short_ping' => true,
                'avatar_size' => 56,
            ) );
        ?>
    </ul>
<!-- .commentarios-lista -->

    <?php endif; // have_comments() ?>

    <?php // si los comentarios están cerrados mostramos un mensaje
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>

    <p class="comentarios__no">
        <?php _e( 'Los comentarios están cerrados.'); ?>
    </p>

    <?php endif; ?>

<!-- LA LLAMADA AL FORMULARIO PUEDE VENIR CON UN ARRAY PARA ESPECIFICAR ALGUNAS COSAS -->

    <?php
        $comments_args = array(
        //Cambiar texto título
        'title_reply' => __('¿Ya te has matriculado? Dile a tus compañeros qué te ha parecido.'),
        //Cambiar etiqueta titulo
        'title_reply_before' => '<h4 class="comentarios__titulo-entrada">',
        'title_reply_after' => '</h4>',
        //Cambiar texto de botón
        'label_submit' => __('Publicar'),
        //Cambiar caca del html del boton
        'submit_button' =>  '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        //Clase del botón
        'class_submit' => 'cta cta-button',
        //Cambiar textarea
        'comment_field' => '<textarea class="comentarios__mensaje" name="comment" rows="8" aria-required="true" placeholder="' . __('Escribe tu opinión...') . '"></textarea>', //Borrar párrafo y label del textarea
        //Borrar las notas por defecto del formulario
        'comment_notes_before' => '',
        //Mensaje despúes
        'comment_notes_after' => ''
        );
        comment_form($comments_args);
    ?>
</div> <!-- .comentarios -->