<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();

// Start the loop
if (have_posts()):
    while (have_posts()):
        the_post();

        // Get ACF fields
        $thumbnail_image = get_field('thumbnail_image');
        $publication_date = get_field('publication_date');
        $content = get_the_content();
        ?>

        <article class="single-blog-post">
            <div class="single-blog-thumbnail">
                <?php if ($thumbnail_image): ?>
                    <img src="<?php echo esc_url($thumbnail_image['url']); ?>" alt="<?php the_title(); ?>">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/default-thumbnail.jpg" alt="Default Thumbnail">
                <?php endif; ?>
            </div>
            <div class="single-blog-content">
                <h1 class="single-blog-title"><?php the_title(); ?></h1>
                <p class="single-blog-date">
                    <?php
                    echo $publication_date ? esc_html($publication_date) : get_the_date('jS F Y');
                    ?>
                </p>
                <div class="single-blog-text">
                    <?php
                    // Display the full content
                    echo wp_kses_post($content);
                    ?>
                </div>
                <a class="back-to-blog" href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Back to
                    Blog</a>
            </div>
        </article>

        <?php
    endwhile;
else:
    echo '<p>No post found.</p>';
endif;

get_footer();
?>