<?php
/**
 * Template Name: Blog List
 */

get_header();
?>

<section class="section-blog-insights">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="section-blog-insights__title">
                    Welcome to the
                    <span class="text-highlight">
                        Remote Desktop <br class="d-none d-xl-block" />
                        Insights Blog</span>
                </h1>
                <p class="section-blog-insights__des">
                    Stay connected to the latest trends, tips, and technologies in the world of remote desktop
                    solutions.
                    <br class="d-none d-xl-block" />
                    Our blog is your go-to resource for enhancing productivity, ensuring secure remote access, and
                    <br class="d-none d-xl-block" />
                    simplifying IT management.
                </p>
                <div class="d-flex justify-content-center">
                    <div class="section-blog-insights__subscribe-input">
                        <input type="text" placeholder="Enter your email here" />
                        <button class="btn-highlight">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-blog-insight__bg-text d-none d-xl-block">
    <div class="container-fluid">
        <div class="section-blog-insights-list__bg-text-wrap">
            <h1 class="section-blog-insights-list__bg-text">Recent blog post</h1>
        </div>
    </div>
</section>

<section class="section-blog-insights-list">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            // Fetch the latest blog posts
            $latest_posts = get_posts([
                'numberposts' => 10,
                'post_status' => 'publish',
            ]);

            if (!empty($latest_posts)) {
                $latest_post = array_shift($latest_posts);
                setup_postdata($latest_post);

                $thumbnail = get_field('thumbnail_image', $latest_post->ID)['url'] ?? get_template_directory_uri() . '/images/default-thumbnail.jpg';
                $date = get_field('publication_date', $latest_post->ID) ?: get_the_date('jS F Y', $latest_post->ID);
                $excerpt = has_excerpt($latest_post->ID) ? get_the_excerpt($latest_post->ID) : wp_trim_words($latest_post->post_content, 30);
                ?>
                <div class="col-12 d-flex justify-content-center">
                    <div class="section-blog-insights-list__latest-blog-card">
                        <img src="<?php echo esc_url($thumbnail); ?>"
                            alt="<?php echo esc_attr(get_the_title($latest_post->ID)); ?>"
                            class="section-blog-insight-list__latest-blog-thumbnail" />
                        <div class="section-blog-insights-list__blogcard-first-row">
                            <p class="section-blog-insights-list__latest-blog-date"><?php echo esc_html($date); ?></p>
                            <a href="<?php echo esc_url(get_permalink($latest_post->ID)); ?>"
                                class="section-blog-insights-list__latest-blog-read-more">Read more</a>
                        </div>
                        <div class="section-blog-insights-list__blogcard-second-row">
                            <h3 class="section-blog-insights-list__latest-blog-title">
                                <?php echo esc_html(get_the_title($latest_post->ID)); ?></h3>
                            <p class="section-blog-insights-list__latest-blog-des"><?php echo esc_html($excerpt); ?></p>
                        </div>
                        <div class="section-blog-insights-list__blogcard-third-row">
                            <?php
                            $tags = wp_get_post_tags($latest_post->ID);
                            if (!empty($tags)) {
                                foreach ($tags as $tag) {
                                    ?>
                                    <div class="section-blog-insights-list__tag-wrap">
                                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                                            class="section-blog-insights-list__tag">
                                            <?php echo esc_html($tag->name); ?>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
            }
            ?>

            <div class="col-12">
                <h3 class="section-blog-insights-list__title-all">All blog posts</h3>
            </div>

            <?php
            // Set the current page number for pagination
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            // Exclude the latest post ID
            $latest_post_id = isset($latest_post->ID) ? $latest_post->ID : 0;

            // Query all posts except the latest one
            $all_posts_query = new WP_Query([
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'paged' => $paged,
                'post__not_in' => [$latest_post_id],
            ]);

            if ($all_posts_query->have_posts()) {
                while ($all_posts_query->have_posts()) {
                    $all_posts_query->the_post();

                    $thumbnail = get_field('thumbnail_image')['url'] ?? get_template_directory_uri() . '/images/default-thumbnail.jpg';
                    $date = get_field('publication_date') ?: get_the_date('jS F Y');
                    $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20);
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section-blog-insights-list__blog-card">
                            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                                class="section-blog-insight-list__blog-thumbnail" />
                            <p class="section-blog-insights-list__blog-date"><?php echo esc_html($date); ?></p>
                            <h3 class="section-blog-insights-list__blog-title"><?php the_title(); ?></h3>
                            <p class="section-blog-insights-list__blog-des"><?php echo esc_html($excerpt); ?></p>
                            <div class="section-blog-insights-list__blogcard-third-row all-list">
                                <?php
                                $tags = wp_get_post_tags(get_the_ID());
                                if (!empty($tags)) {
                                    foreach ($tags as $tag) {
                                        ?>
                                        <div class="section-blog-insights-list__tag-wrap">
                                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                                                class="section-blog-insights-list__tag">
                                                <?php echo esc_html($tag->name); ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="section-blog-insights-list__blog-read-more">Read more</a>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="col-12 d-flex justify-content-center section-blog-insights-list__pagination-wrap">
                    <?php
                    // Add pagination links
                    echo paginate_links([
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'format' => '?paged=%#%',
                        'current' => max(1, $paged),
                        'total' => $all_posts_query->max_num_pages,
                        'prev_text' => '« Prev',
                        'next_text' => 'Next »',
                    ]);
                    ?>
                </div>

                <?php
                wp_reset_postdata();
            } else {
                ?>
                <p>No posts found.</p>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<section class="section-blog-insights__tag">
    <img src="../wp-content/uploads/frame_1.png" alt="Frame 1" class="frame-1" />
    <div class="container">
        <div class="row">
            <h2 class="section-blog-insights__tag-title">Tags</h2>
            <div class="col-12">
                <div class="section-blog-insights-list__blogcard-third-row all-list justify-content-center">
                    <?php
                    // Display all tags
                    $tags = get_tags();
                    if ($tags) {
                        foreach ($tags as $tag) {
                            ?>
                            <div class="section-blog-insights-list__tag-wrap mt-2">
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                                    class="section-blog-insights-list__tag">
                                    <?php echo esc_html($tag->name); ?>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>