<?php

get_header();
?>

<section class="section-blog-insights">
    <div class="container">
        <h1>Tag: <?php single_tag_title(); ?></h1>
        <div class="row">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post();
                    // Check for custom field thumbnail, fallback to featured image or default
                    $thumbnail = get_field('thumbnail_image')['url'] ?? (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/images/default-thumbnail.jpg');
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section-blog-insights-list__blog-card tagcard">
                            <?php if ($thumbnail): ?>
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                                    class="section-blog-insight-list__blog-thumbnail" />
                            <?php endif; ?>
                            <p class="section-blog-insights-list__blog-date"><?php echo get_the_date(); ?></p>
                            <h3 class="section-blog-insights-list__blog-title"><?php the_title(); ?></h3>
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