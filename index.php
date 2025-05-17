<?php 
get_header();

?>
 <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    ?>
                    <main><?php the_content(); ?></main>
                
                    <?php
                endwhile;
            else :
                echo '<p>No posts found.</p>';
            endif;
            ?>

<?php
get_footer();
