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
            <!-- Display tags -->
            <section class="section-blog-insights__tag">
                <img src="./wp-content/uploads/frame_1.png" alt="" class="frame-1" />
                <div class="container">
                    <div class="row">
                        <h2 class="section-blog-insights__tag-title">Tags</h2>
                        <div class="col-12">
                            <div class="section-blog-insights-list__blogcard-third-row all-list justify-content-center">
                                <?php
                                // Display all tags
                                $tags = get_tags();
                                if ($tags):
                                    foreach ($tags as $tag): ?>
                                        <div class="section-blog-insights-list__tag-wrap mt-2">
                                            <p class="section-blog-insights-list__tag"
                                                data-tag-id="<?php echo esc_attr($tag->term_id); ?>">
                                                <?php echo esc_html($tag->name); ?>
                                            </p>
                                        </div>
                                    <?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="col-12">
                <h3 class="section-blog-insights-list__title-all">All blog posts</h3>
            </div>

            <div class="row" id="blog-posts-list">
                <?php
                // Fetch all posts initially
                $args = [
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    'paged' => 1,
                ];
                $query = new WP_Query($args);

                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                        $thumbnail = get_field('thumbnail_image')['url'] ?? get_template_directory_uri() . '/images/default-thumbnail.jpg';
                        $date = get_field('publication_date') ?: get_the_date('jS F Y');
                        $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20);
                        ?>
                        <div class="col-12 col-md-6 col-lg-4 post-card"
                            data-tags="<?php echo esc_attr(implode(',', wp_get_post_tags(get_the_ID(), ['fields' => 'ids']))); ?>">
                            <div class="section-blog-insights-list__blog-card">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                                    class="section-blog-insight-list__blog-thumbnail" />
                                <p class="section-blog-insights-list__blog-date"><?php echo esc_html($date); ?></p>
                                <h3 class="section-blog-insights-list__blog-title"><?php the_title(); ?></h3>
                                <p class="section-blog-insights-list__blog-des"><?php echo esc_html($excerpt); ?></p>
                                <div class="section-blog-insights-list__blogcard-third-row all-list">
                                    <?php
                                    $tags = wp_get_post_tags(get_the_ID());
                                    if (!empty($tags)):
                                        foreach ($tags as $tag): ?>
                                            <div class="section-blog-insights-list__tag-wrap">
                                                <p class="section-blog-insights-list__tag"><?php echo esc_html($tag->name); ?></p>
                                            </div>
                                        <?php endforeach; endif; ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="section-blog-insights-list__blog-read-more">Read
                                    more</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p>No posts found.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add click event on tags
        const tags = document.querySelectorAll('.section-blog-insights-list__tag');
        tags.forEach(tag => {
            tag.addEventListener('click', function () {
                const tagId = this.getAttribute('data-tag-id');
                filterPostsByTag(tagId);
            });
        });

        // Function to filter posts by tag
        function filterPostsByTag(tagId) {
            const posts = document.querySelectorAll('.post-card');
            posts.forEach(post => {
                const postTags = post.getAttribute('data-tags').split(',');
                if (postTags.includes(tagId)) {
                    post.style.display = 'block';
                } else {
                    post.style.display = 'none';
                }
            });
        }
    });
</script>

<?php get_footer(); ?>