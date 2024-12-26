<?php

/**
 *Template Name: Home
 *
 */

get_header();


$args = array(
    'post_type' => 'post',
    'posts_per_page' => 10, // Adjust number of posts per page as needed
);
$query = new WP_Query($args);

if ($query->have_posts()):
    while ($query->have_posts()):
        $query->the_post();
        // Get ACF fields
        $thumbnail_image = get_field('thumbnail_image');
        $publication_date = get_field('publication_date');
        ?>
        <article class="blog-post">
            <div class="blog-thumbnail">
                <?php if ($thumbnail_image): ?>
                    <img src="<?php echo esc_url($thumbnail_image); ?>" alt="<?php the_title(); ?>">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/default-thumbnail.jpg" alt="Default Thumbnail">
                <?php endif; ?>
            </div>
            <div class="blog-content">
                <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="blog-date">
                    <?php
                    if ($publication_date) {
                        echo esc_html($publication_date);
                    } else {
                        echo get_the_date('jS F Y'); // Default to post's published date
                    }
                    ?>
                </p>
                <p class="blog-excerpt"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
            </div>
        </article>
        <?php
    endwhile;
    wp_reset_postdata();
else:
    echo '<p>No posts found.</p>';
endif;
?>


<?php get_footer(); ?>