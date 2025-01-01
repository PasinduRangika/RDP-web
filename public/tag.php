<?php

/**
 * Template Name: Tag
 */

get_header();
?>

<section class="section-tag-archive">
    <div class="container">
        <h1>Tag: <?php single_tag_title(); ?></h1>
        <div class="row">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section-blog-insights-list__blog-card">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>"
                                    class="section-blog-insight-list__blog-thumbnail" />
                            <?php endif; ?>
                            <h3 class="section-blog-insights-list__blog-title"><?php the_title(); ?></h3>
                            <p class="section-blog-insights-list__blog-date"><?php the_date(); ?></p>
                            <p class="section-blog-insights-list__blog-des"><?php echo wp_trim_words(get_the_content(), 20); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="section-blog-insights-list__blog-read-more">Read more</a>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="col-12 d-flex justify-content-center">
                    <?php
                    // Pagination for tag archive
                    the_posts_pagination();
                    ?>
                </div>
            <?php else: ?>
                <p>No posts found for this tag.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>