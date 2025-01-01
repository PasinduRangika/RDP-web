<?php
/**
 * Template Name: blog
 */

get_header(); ?>

<main style="padding-top:300px">
    <div class="blog-container">
        <?php
        // Fetch the latest 10 posts
        $latest_posts = get_posts(array(
            'numberposts' => 10, // Adjust the number of posts as needed
            'post_status' => 'publish', // Ensure only published posts are retrieved
        ));

        if ($latest_posts):
            foreach ($latest_posts as $post):
                // Setup post data
                setup_postdata($post);

                // Get post details
                $link = get_permalink($post->ID);
                $title = $post->post_title;

                // Extract title parts
                $post_title_without_last_two_words = preg_replace('/\s\S+\s+\S+$/', '', $title);
                $last_two_words = preg_replace('/^.*\s(\S+\s+\S+)$/', '$1', $title);

                // Get thumbnail image (ACF field)
                $thumbnail_image = get_field('thumbnail_image', $post->ID);
                $thumbnail_url = $thumbnail_image['url'] ?? get_template_directory_uri() . '/images/default-thumbnail.jpg'; // Fallback if no thumbnail
        
                // Get publication date (ACF field or default)
                $publication_date = get_field('publication_date', $post->ID) ?: get_the_date('jS F Y', $post->ID);

                // Get excerpt
                $excerpt = has_excerpt($post->ID) ? get_the_excerpt($post->ID) : wp_trim_words($post->post_content, 33);

                ?>
                <article class="blog-post">
                    <div class="blog-thumbnail">
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>">
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-title">
                            <a href="<?php echo esc_url($link); ?>">
                                <?php echo esc_html($post_title_without_last_two_words); ?>
                                <span style="color: #009dff;"><?php echo esc_html($last_two_words); ?></span>
                            </a>
                        </h2>
                        <p class="blog-date"><?php echo esc_html($publication_date); ?></p>
                        <p class="blog-excerpt"><?php echo esc_html($excerpt); ?></p>
                        <a class="read-more" href="<?php echo esc_url($link); ?>">Read More</a>
                    </div>
                </article>
                <?php
            endforeach;
            wp_reset_postdata();
        else:
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div>
</main>


<?php
get_footer();