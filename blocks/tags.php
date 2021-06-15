
<?php 
    $the_post_id = get_the_ID();
    $article_terms = wp_get_post_terms( $the_post_id, ['category']);  
    if( empty( $article_terms) || ! is_array($article_terms) ) {
        return;
    }
?>
    <ul class="card_tags">
        <?php foreach ( $article_terms as $key => $article_term ) : ?>
            <li class="e-tag <?php echo esc_html( $article_term->slug); ?>">
                <a href="<?php echo esc_url( get_term_link( $article_term)); ?>">
                    <?php echo esc_html( $article_term->name); ?>
                </a>
            </li>
            <br>
        <?php endforeach; ?>                         
    </ul>
</div>    