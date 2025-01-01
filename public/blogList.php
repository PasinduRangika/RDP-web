<?php

/**
 *Template Name: Blog List
 *
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
            <div class="col-12 d-flex justify-content-center">
                <div class="section-blog-insights-list__latest-blog-card">
                    <img src="./wp-content/uploads/blog_1.png" alt=""
                        class="section-blog-insight-list__latest-blog-thumbnail" />
                    <div class="section-blog-insights-list__blogcard-first-row">
                        <p class="section-blog-insights-list__latest-blog-date">12th December 2024</p>
                        <a class="section-blog-insights-list__latest-blog-read-more">Read more</a>
                    </div>
                    <div class="section-blog-insights-list__blogcard-second-row">
                        <h3 class="section-blog-insights-list__latest-blog-title">
                            5 Ways Remote Desktop Access Can Boost Your Productivity
                        </h3>
                        <p class="section-blog-insights-list__latest-blog-des">
                            Discover how secure and seamless remote access can help you work efficiently from anywhere,
                            saving
                            time and effort...
                        </p>
                    </div>
                    <div class="section-blog-insights-list__blogcard-third-row">
                        <div class="section-blog-insights-list__tag-wrap">
                            <p class="section-blog-insights-list__tag">Guide</p>
                        </div>
                        <div class="section-blog-insights-list__tag-wrap">
                            <p class="section-blog-insights-list__tag">Network Disconnect</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="section-blog-insights-list__title-all">All blog posts</h3>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="section-blog-insights-list__blog-card">
                    <img src="./wp-content/uploads/blog_2.png" alt=""
                        class="section-blog-insight-list__blog-thumbnail" />
                    <p class="section-blog-insights-list__blog-date">12th December 2024</p>
                    <h3 class="section-blog-insights-list__blog-title">
                        5 Ways Remote Desktop Access Can Boost Your Productivity
                    </h3>
                    <p class="section-blog-insights-list__blog-des">
                        Discover how secure and seamless remote access can help you work efficiently from anywhere,
                        saving time
                        and effort...
                    </p>
                    <div class="section-blog-insights-list__blogcard-third-row all-list">
                        <div class="section-blog-insights-list__tag-wrap">
                            <p class="section-blog-insights-list__tag">Guide</p>
                        </div>
                        <div class="section-blog-insights-list__tag-wrap">
                            <p class="section-blog-insights-list__tag">Network Disconnect</p>
                        </div>
                    </div>
                    <p class="section-blog-insights-list__blog-read-more">Read more</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center section-blog-insights-list__pagination-wrap">
                <div class="section-blog-insights-list__pagination-number-wrap active">
                    <p class="section-blog-insights-list__pagination-number active">1</p>
                </div>
                <div class="section-blog-insights-list__pagination-number-wrap">
                    <p class="section-blog-insights-list__pagination-number">2</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-blog-insights__tag">
    <img src="./wp-content/uploads/frame_1.png" alt="" class="frame-1" />
    <div class="container">
        <div class="row">
            <h2 class="section-blog-insights__tag-title">Tags</h2>
            <div class="col-12">
                <div class="section-blog-insights-list__blogcard-third-row all-list justify-content-center">
                    <div class="section-blog-insights-list__tag-wrap mt-2">
                        <p class="section-blog-insights-list__tag">Guide</p>
                    </div>
                    <div class="section-blog-insights-list__tag-wrap mt-2">
                        <p class="section-blog-insights-list__tag">Network Disconnect</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();