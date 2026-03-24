<?php
/**
 * Template Part: NDIS Support Section
 *
 * @package NeedsCare
 */
?>

<section class="ndis-support-section section section-bg-light" id="ndis-support">
    <div class="container">
        <div class="ndis-support-layout">
            <div class="ndis-support-content">
                <h4 class="section-subtitle">NDIS REGISTERED PROVIDER</h4>
                <h2 class="section-title">Proudly Supporting Individuals Under the NDIS</h2>
                <p>Needs Care proudly supports individuals under the NDIS (National Disability Insurance Scheme). Our services are designed to help participants achieve their personal goals and improve independence while receiving the support they need.</p>
                <p>We work closely with participants and families to create personalised support plans tailored to their needs.</p>
                
                <div class="ndis-features" style="margin: 30px 0; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                    <div class="ndis-feature-item" style="display: flex; align-items: center; gap: 12px;">
                        <i class="fa-solid fa-circle-check" style="color: var(--primary-green); font-size: 1.2rem;"></i>
                        <span style="font-weight: 600;">Personalised Goal Achievement</span>
                    </div>
                    <div class="ndis-feature-item" style="display: flex; align-items: center; gap: 12px;">
                        <i class="fa-solid fa-circle-check" style="color: var(--primary-green); font-size: 1.2rem;"></i>
                        <span style="font-weight: 600;">Family-Centred Planning</span>
                    </div>
                    <div class="ndis-feature-item" style="display: flex; align-items: center; gap: 12px;">
                        <i class="fa-solid fa-circle-check" style="color: var(--primary-green); font-size: 1.2rem;"></i>
                        <span style="font-weight: 600;">Independence Focused</span>
                    </div>
                </div>

                <div class="hero-buttons">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">
                        Discuss Your Plan <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="ndis-support-visual">
                <!-- Decorative NDIS Logo/Badge area -->
                <div class="ndis-big-badge" style="background: var(--white); border-radius: 20px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed var(--primary-green);">
                    <div class="logo-icon" style="font-size: 5rem; margin-bottom: 20px;">&#x2624;</div>
                    <h3 style="text-align: center; color: var(--primary-green);">Registered NDIS Provider</h3>
                    <p style="text-align: center; font-size: 0.9rem; margin-top: 10px;">Committed to the NDIS Code of Conduct and Quality Standards.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.ndis-support-layout {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 60px;
    align-items: center;
}
@media (max-width: 991px) {
    .ndis-support-layout {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}
</style>
