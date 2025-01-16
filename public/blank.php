<section class="sec-type-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="t1">Contact <span>Us</span></h1>
                <p class="sub-content">
                    Would you like to speak with someone from our team? We're keen to hear how we can help your
                    business.Our
                    Customer Support <br class="d-none d-lg-block" />
                    Team operates round-the-clock and will extend their fullest support to you always.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="sec-type-71">
    <div class="container">
        <div class="row justify-content-center gap-4">
            <div class="col-12 col-lg-3">
                <div class="row side-navigation-section">
                    <div class="navigation-item-container col-5 col-lg-12 active" data-target="general-message-form">
                        <div class="item-content-wrap">
                            <div class="navigation-item-icon-message">
                                <img src="/wp-content/uploads/cu-1.png" alt="" />
                            </div>
                            <div class="navigation-item active">General Message</div>
                        </div>
                        <div class="navigation-item-side-arrow-icon">

                        </div>
                    </div>
                    <div class="navigation-item-container col-5 col-lg-12" data-target="job-vacancy-form">
                        <div class="item-content-wrap">
                            <div class="navigation-item-icon-bag">
                                <img src="/wp-content/uploads/cu-2.png" alt="" />
                            </div>
                            <div class="navigation-item">job Vacancy</div>
                        </div>
                        <div class="navigation-item-side-arrow-icon">

                        </div>
                    </div>
                    <div class="navigation-item-container col-5 col-lg-12" data-target="startup-collaboration-form">
                        <div class="item-content-wrap" onclick="openStartupCollaborationModal()">
                            <div class="navigation-item-icon-roket">
                                <img src="/wp-content/uploads/cu-3.png" alt="" />
                            </div>
                            <div class="navigation-item">Startup Collaboration</div>
                        </div>
                        <div class="navigation-item-side-arrow-icon">

                        </div>
                    </div>
                    <div class="navigation-item-container col-5 col-lg-12" data-target="partner-form">
                        <div class="item-content-wrap">
                            <div class="navigation-item-icon-partner">
                                <img src="/wp-content/uploads/cu-4.png" alt="" />
                            </div>
                            <div class="navigation-item">Partner</div>
                        </div>
                        <div class="navigation-item-side-arrow-icon">

                        </div>
                    </div>
                    <div class="navigation-item-container col-5 col-lg-12" data-target="migration-form">
                        <div class="item-content-wrap">
                            <div class="navigation-item-icon-partner">
                                <img src="/wp-content/uploads/cu-m.png" alt="" />
                            </div>
                            <div class="navigation-item">Migration Services</div>
                        </div>
                        <div class="navigation-item-side-arrow-icon">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div class="form-section">
                    <div class="general-message-form">
                        <div class="form">
                            <div class="row">
                                <div class="form-titile">
                                    <h2>General <span>Message</span></h2>
                                    <p>Send us a message with your general inquiries, feedback, or suggestions.</p>
                                </div>
                            </div>
                            <div class="row">
                                <?php echo do_shortcode('[contact-form-7 id="ae658af" title="General Message"]'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="job-vacancy-form">
                        <div class="form">
                            <div class="row">
                                <div class="form-titile">
                                    <h2>Join <span>Our Team</span></h2>
                                    <!--<p>Interested in a career with us? Submit your application and resume here.</p>-->
                                    <p>We are no longer accepting applications here. Please visit <a
                                            style="text-decoration:none;font-weight:700"
                                            href="https://codimite.flywheelstaging.com/careers/" target="_blank">our
                                            careers page</a> to apply for job vacancies.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <!-- <?php echo do_shortcode('[contact-form-7 id="ce2112e" title="Job Vacancy"]'); ?> -->
                                    <a href="https://codimite.flywheelstaging.com/careers/" target="_blank"
                                        style="display: inline-block; padding: 10px 20px; background-color: #0b5cff; color: #fff; text-decoration: none; font-weight: 700; border-radius: 12px; text-align: center;width: auto; ">
                                        Visit Careers Page
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="startup-collaboration-form">
                        <div class="form">
                            <div class="row">
                                <div class="form-titile">
                                    <h2>Startup <span>Collaboration</span></h2>
                                    <p>Send us a message with your general inquiries, feedback, or suggestions.</p>
                                </div>
                            </div>
                            <div class="row">
                                <?php echo do_shortcode('[contact-form-7 id="475d6f0" title="Startup Colloboration"]'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="partner-form">
                        <div class="form">
                            <div class="row">
                                <div class="form-titile">
                                    <h2>Partner <span>With US</span></h2>
                                    <p>Send us a message with your general inquiries, feedback, or suggestions.</p>
                                </div>
                            </div>
                            <div class="row">
                                <?php echo do_shortcode('[contact-form-7 id="16d4bb2" title="Partner with Us"]'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="migration-form">
                        <div class="form">
                            <div class="row">
                                <div class="form-titile">
                                    <h2>Migration <span>Services</span></h2>
                                    <p>Send us a message with your general inquiries, feedback, or suggestions.</p>
                                </div>
                            </div>
                            <div class="row">
                                <?php echo do_shortcode('[contact-form-7 id="4988ac5" title="Migration Services"]'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navigationItems = document.querySelectorAll(".navigation-item-container");
            const forms = document.querySelectorAll(".form-section > div");
            const initialActiveNavItem = document.querySelector(".navigation-item-container.active");
            if (initialActiveNavItem) {
                const initialTarget = initialActiveNavItem.getAttribute("data-target");
                document.querySelector("." + initialTarget).classList.add("active");
                updateImageSrc(initialActiveNavItem, true);
                toggleArrowIcon(initialActiveNavItem, true);
            }
            navigationItems.forEach((item) => {
                item.addEventListener("click", function () {
                    const target = this.getAttribute("data-target");
                    navigationItems.forEach((nav) => {
                        nav.classList.remove("active");
                        nav.querySelector(".navigation-item").classList.remove("active");
                        updateImageSrc(nav, false);
                        toggleArrowIcon(nav, false);
                    });
                    this.classList.add("active");
                    this.querySelector(".navigation-item").classList.add("active");
                    forms.forEach((form) => form.classList.remove("active"));
                    document.querySelector("." + target).classList.add("active");
                    updateImageSrc(this, true);
                    toggleArrowIcon(this, true);
                });
            });

            function updateImageSrc(navItem, isActive = false) {
                const img = navItem.querySelector("img");
                const src = img.getAttribute("src");
                const newSrc = isActive ? src.replace(".png", "-active.png") : src.replace("-active.png", ".png");
                img.setAttribute("src", newSrc);
            }

            function toggleArrowIcon(navItem, isActive) {
                const arrowIcon = navItem.querySelector(".navigation-item-side-arrow-icon");
                if (isActive) {
                    arrowIcon.classList.add("active");
                } else {
                    arrowIcon.classList.remove("active");
                }
            }
        });
    </script>
</section>