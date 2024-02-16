<?php
/**
 * Template Name: Homepage advanced custom fields
 * Template Post Type: page
 */
get_header();
?>

<main>
    <section class="masthead" style="background-image: url('<?php echo esc_url(get_field('masthead_image')); ?>')">
        <div>
            <h1><?php echo wp_kses_post(get_field('row_title')); ?></h1>
        </div>
    </section>

    <section class="posts">
        <div class="container">
            <div class="row">

                <?php
                $args = array(
                    'posts_per_page' => 12, // Display 12 posts to ensure 4 per row
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>

                        <div class="col-md-3">
                            <div class="card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'No posts found.';
                endif;
                ?>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

