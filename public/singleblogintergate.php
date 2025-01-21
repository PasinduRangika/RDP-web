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

if (have_posts()):
    while (have_posts()):
        the_post();

        // Get ACF fields
        $thumbnail_image = get_field('thumbnail_image');
        $publication_date = get_field('publication_date');
        $author_name = get_field('author_name');
        $author_job_title = get_field('author_job_title');
        //$tags = wp_get_post_tags(get_the_ID());
        $read_time = get_field('read_time');

        // Function to wrap last two words of a string in a span tag
        function wrap_last_two_words($text)
        {
            $words = explode(' ', $text);
            if (count($words) > 1) {
                $last_two_words = array_slice($words, -2);
                $remaining_words = array_slice($words, 0, -2);
                return implode(' ', $remaining_words) . ' <span class="text-highlight">' . implode(' ', $last_two_words) . '</span>';
            }
            return $text;
        }
        ?>

        <section class="section-single-blog">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <h1 class="section-single-blog__title">
                            <?php echo wp_kses_post(wrap_last_two_words(get_the_title())); ?>
                        </h1>
                    </div>
                    <div class="col-12">
                        <div class="section-single-blog__thumbnail">
                            <img src="<?php echo esc_url($thumbnail_image ? $thumbnail_image['url'] : get_template_directory_uri() . '/images/default-thumbnail.jpg'); ?>"
                                alt="<?php the_title(); ?>" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="section-single-blog__tag-wrap-row">
                            <?php
                            // Fetch tags for the current post
                            $tags = get_the_terms(get_the_ID(), 'post_tag');

                            // Check if tags exist and there are no errors
                            if (!empty($tags) && !is_wp_error($tags)):
                                foreach ($tags as $tag): ?>
                                    <div class="section-single-blog__tag-wrap">
                                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                                            class="section-single-blog__tag text-decoration-none">
                                            <?php echo esc_html($tag->name); ?>
                                        </a>
                                    </div>
                                <?php endforeach;
                            else: ?>
                                <div> </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <h3 class="section-single-blog__content--blog-title">
                            <?php the_title(); ?>
                        </h3>
                        <div class="section-single-blog__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <p class="section-single-blog__read-time"><?php echo esc_html($read_time ? $read_time : 'N/A'); ?> min read
                    </p>
                    <div class="section-single-blog__details">
                        <div class="section-single-blog__owner">
                            <p class="section-single-blog__owner--name">
                                <?php echo esc_html($author_name ? $author_name : get_the_author()); ?>
                            </p>
                            <p class="section-single-blog__owner--job-title"><?php echo esc_html($author_job_title); ?></p>
                        </div>
                        <div class="section-single-blog__share position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none"
                                id="share-icon">
                                <path
                                    d="M19.7628 4.01286C20.0909 3.68479 20.536 3.50049 21 3.50049C21.464 3.50049 21.9091 3.68479 22.2372 4.01286L27.4872 9.26287C27.806 9.59292 27.9824 10.035 27.9784 10.4938C27.9744 10.9527 27.7904 11.3916 27.4659 11.716C27.1415 12.0405 26.7025 12.2246 26.2437 12.2285C25.7849 12.2325 25.3428 12.0561 25.0128 11.7374L22.75 9.47461V26.2501C22.75 26.7142 22.5656 27.1594 22.2374 27.4876C21.9092 27.8157 21.4641 28.0001 21 28.0001C20.5359 28.0001 20.0908 27.8157 19.7626 27.4876C19.4344 27.1594 19.25 26.7142 19.25 26.2501V9.47461L16.9872 11.7374C16.6572 12.0561 16.2151 12.2325 15.7563 12.2285C15.2975 12.2246 14.8585 12.0405 14.5341 11.716C14.2096 11.3916 14.0256 10.9527 14.0216 10.4938C14.0176 10.035 14.194 9.59292 14.5128 9.26287L19.7628 4.01286ZM7 19.2501C7 18.3219 7.36875 17.4316 8.02513 16.7752C8.6815 16.1189 9.57174 15.7501 10.5 15.7501H14C14.4641 15.7501 14.9092 15.9345 15.2374 16.2627C15.5656 16.5909 15.75 17.036 15.75 17.5001C15.75 17.9642 15.5656 18.4094 15.2374 18.7376C14.9092 19.0657 14.4641 19.2501 14 19.2501H10.5V35.0001H31.5V19.2501H28C27.5359 19.2501 27.0908 19.0657 26.7626 18.7376C26.4344 18.4094 26.25 17.9642 26.25 17.5001C26.25 17.036 26.4344 16.5909 26.7626 16.2627C27.0908 15.9345 27.5359 15.7501 28 15.7501H31.5C32.4283 15.7501 33.3185 16.1189 33.9749 16.7752C34.6313 17.4316 35 18.3219 35 19.2501V35.0001C35 35.9284 34.6313 36.8186 33.9749 37.475C33.3185 38.1314 32.4283 38.5001 31.5 38.5001H10.5C9.57174 38.5001 8.6815 38.1314 8.02513 37.475C7.36875 36.8186 7 35.9284 7 35.0001V19.2501Z"
                                    fill="#016FEF" />
                            </svg>
                            <div class="share-tooltip" id="share-tooltip">
                                <button class="btn btn-outline-primary btn-sm" id="facebook-share">
                                    <i class="bi bi-facebook"></i> Facebook
                                </button>
                                <button class="btn btn-outline-primary btn-sm" id="linkedin-share">
                                    <i class="bi bi-linkedin"></i> LinkedIn
                                </button>
                                <button class="btn btn-outline-secondary btn-sm" id="copy-link">
                                    <i class="bi bi-clipboard"></i> Copy URL
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="section-single-blog__controls">
                        <?php
                        // Previous Post Button
                        $prev_post = get_previous_post();
                        if ($prev_post):
                            ?>
                            <a href="<?php echo get_permalink($prev_post->ID); ?>" class="section-single-blog__control-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="15" viewBox="0 0 10 15" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.25834 7.24226L7.45947 0.968041L9.02775 2.51805L3.60162 8.00813L9.0917 13.4343L7.54169 15.0025L1.26747 8.8014C1.05954 8.59584 0.941775 8.3161 0.940062 8.02372C0.938349 7.73134 1.05283 7.45025 1.25834 7.24226Z"
                                        fill="#016FEF" />
                                </svg>
                                Previous Page
                            </a>
                        <?php endif; ?>

                        <?php
                        // Next Post Button
                        $next_post = get_next_post();
                        if ($next_post):
                            ?>
                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="section-single-blog__control-btn active">
                                Next Page
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.2369 8.77962L1.99911 15.0174L0.439941 13.4582L5.89814 8.00004L0.439941 2.54184L1.99911 0.982666L8.2369 7.22045C8.44361 7.42723 8.55974 7.70765 8.55974 8.00004C8.55974 8.29242 8.44361 8.57284 8.2369 8.77962Z"
                                        fill="white" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row section-single-blog__blog-list">
                    <div class="col-12">
                        <h2 class="section-single-blog__blog-list">Recent Blog Posts</h2>
                    </div>
                    <?php
                    // Exclude the current post ID
                    $current_post_id = get_the_ID();

                    // Query the 3 most recent posts excluding the current post
                    $recent_posts_query = new WP_Query([
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                        'post__not_in' => [$current_post_id],
                    ]);

                    if ($recent_posts_query->have_posts()):
                        while ($recent_posts_query->have_posts()):
                            $recent_posts_query->the_post();

                            // Get ACF field or fallback thumbnail
                            $thumbnail = get_field('thumbnail_image')['url'] ?? get_template_directory_uri() . '/images/default-thumbnail.jpg';
                            $date = get_field('publication_date') ?: get_the_date('jS F Y');
                            $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20);
                            ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="section-blog-insights-list__blog-card">
                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                                        class="section-blog-insight-list__blog-thumbnail" />
                                    <p class="section-blog-insights-list__blog-date text-start"><?php echo esc_html($date); ?></p>
                                    <h3 class="section-blog-insights-list__blog-title text-start"><?php the_title(); ?></h3>
                                    <p class="section-blog-insights-list__blog-des text-start"><?php echo esc_html($excerpt); ?></p>
                                    <div class="d-flex justify-content-start">
                                        <a href="<?php the_permalink(); ?>" class="section-blog-insights-list__blog-read-more">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata(); // Reset post data after custom query
                    else:
                        ?>
                        <div class="col-12">
                            <p>No recent blog posts available.</p>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
            <script>
                const shareIcon = document.getElementById('share-icon');
                const shareTooltip = document.getElementById('share-tooltip');
                const currentURL = window.location.href;

                shareIcon.addEventListener('click', () => {
                    shareTooltip.style.display =
                        shareTooltip.style.display === 'block' ? 'none' : 'block';
                });

                // Facebook share
                document.getElementById('facebook-share').addEventListener('click', () => {
                    window.open(
                        `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentURL)}`,
                        '_blank'
                    );
                });

                // LinkedIn share
                document.getElementById('linkedin-share').addEventListener('click', () => {
                    window.open(
                        `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(
                            currentURL
                        )}`,
                        '_blank'
                    );
                });

                // Copy URL
                document.getElementById('copy-link').addEventListener('click', () => {
                    navigator.clipboard.writeText(currentURL).then(() => {
                        alert('URL copied to clipboard!');
                    });
                });

                // Hide tooltip when clicking outside
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('.section-single-blog__share')) {
                        shareTooltip.style.display = 'none';
                    }
                });
            </script>
        </section>

        <?php
    endwhile;
endif;

get_footer();