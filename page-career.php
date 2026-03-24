<?php
/**
 * Template Name: Career Page
 *
 * @package NeedsCare
 */

get_header(); ?>

<main class="main-content" id="main-content" role="main">

<?php if ( needscare_is_elementor_page() ) : ?>

    <div class="elementor-page-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>

<?php else : ?>

    <?php get_template_part( 'template-parts/hero-page' ); ?>


    <section class="section">
        <div class="container">
            <div class="about-grid">
                <div class="about-text" style="order: 1;">
                    <h4 class="section-subtitle">JOIN OUR TEAM</h4>
                    <h2 class="section-title">BUILD A REWARDING CAREER IN CARE</h2>
                    <p>At NeedsCare, we're always looking for passionate, dedicated individuals who want to make a real difference. Whether you're an experienced care professional or just starting your journey in the healthcare sector, we'd love to hear from you.</p>
                    <p>We offer a supportive work environment, ongoing training and development, and the opportunity to positively impact lives every single day.</p>

                    <ul class="about-features">
                        <li><span class="icon">&#10003;</span> Flexible Working Hours</li>
                        <li><span class="icon">&#10003;</span> Ongoing Training &amp; Development</li>
                        <li><span class="icon">&#10003;</span> Supportive Team Environment</li>
                        <li><span class="icon">&#10003;</span> Competitive Pay Rates</li>
                        <li><span class="icon">&#10003;</span> Career Growth Opportunities</li>
                    </ul>
                </div>

                <div class="about-images" style="order: 2;">
                    <div class="img-main" style="background-image: url('https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=2669&auto=format&fit=crop');"></div>
                    <div class="img-sub-1" style="background-image: url('https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=2670&auto=format&fit=crop');"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="section section-bg-light">
        <div class="container">
            <div class="form-container">
                <h3>Apply Now</h3>
                <p>Submit your application below. Upload your CV and tell us a bit about yourself.</p>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

</main>

<?php get_footer(); ?>
