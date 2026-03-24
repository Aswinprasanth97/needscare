<?php
/**
 * Template Part: Differentiator / Parallax Section
 *
 * @package NeedsCare
 */
?>

<section class="differentiator section">
    <div class="diff-bg-shapes">
        <div class="diff-shape diff-shape-1"></div>
        <div class="diff-shape diff-shape-2"></div>
        <div class="diff-shape diff-shape-3"></div>
    </div>

    <div class="container">
        <div class="diff-layout">
            <!-- Left: Text Content -->
            <div class="diff-text-col">
                <h4 class="section-subtitle" style="color: rgba(255,255,255,0.7);">WHY CHOOSE US</h4>
                <h2 class="diff-title">Why Choose <span class="diff-highlight">Needs Care</span></h2>
                <p class="diff-desc">Our nurses and support workers are dedicated to providing safe, compassionate, and professional care tailored to individual needs.</p>

                <div class="diff-stats">
                    <div class="diff-stat">
                        <span class="diff-stat-number">100%</span>
                        <span class="diff-stat-label">Personalised</span>
                    </div>
                    <div class="diff-stat">
                        <span class="diff-stat-number">24/7</span>
                        <span class="diff-stat-label">Support</span>
                    </div>
                    <div class="diff-stat">
                        <span class="diff-stat-number">Top</span>
                        <span class="diff-stat-label">Expert Team</span>
                    </div>
                </div>

                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn diff-cta-btn">GET SUPPORT TODAY</a>
            </div>

            <!-- Right: Pillar Cards -->
            <div class="diff-cards-col">
                <div class="diff-card">
                    <div class="diff-card-icon" aria-hidden="true"><i class="fa-solid fa-user-doctor"></i></div>
                    <div class="diff-card-body">
                        <h4>Expert Team</h4>
                        <p>Our qualified nurses and experienced support workers provide professional and compassionate care.</p>
                    </div>
                </div>
                <div class="diff-card">
                    <div class="diff-card-icon" aria-hidden="true"><i class="fa-solid fa-hand-holding-heart"></i></div>
                    <div class="diff-card-body">
                        <h4>Personalised Care</h4>
                        <p>We create care plans tailored to each individual’s needs, preferences, and lifestyle.</p>
                    </div>
                </div>
                <div class="diff-card">
                    <div class="diff-card-icon" aria-hidden="true"><i class="fa-solid fa-clock-rotate-left"></i></div>
                    <div class="diff-card-body">
                        <h4>24/7 Support</h4>
                        <p>We provide reliable support services to ensure help is available whenever you need it.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
