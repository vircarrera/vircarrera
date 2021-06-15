<!-- Este filto se hace usando las categorías. Su resultado se controla en category.php -->

<?php
$terms = get_terms('category');
if (!empty($terms) && !is_wp_error($terms)) :
?>

  <div class="b-filter entries">
    <ul>
      <?php foreach ($terms as $term) :
        $term_link = get_term_link($term);
      ?>
        <li>
          <a class="filter__link e-tag <?php echo $term->slug; ?>" href="<?php echo $term_link; ?>" data-filter=".<?php echo $term->slug; ?>">
            <?php echo $term->name; ?>
          </a>
        </li>
      <?php endforeach; ?>

    </ul>
    </div>


<?php endif; ?>

