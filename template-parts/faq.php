<?php
/**
 * Template Part: FAQ Section
 *
 * Reads from Custom Post Type (FAQ).
 * @package NeedsCare
 */

$args = array(
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

$query = new WP_Query( $args );

$faqs = array();

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $faqs[] = array(
            'question' => get_the_title(),
            'answer'   => get_the_content(),
        );
    }
    wp_reset_postdata();
} else {
    // Fallback to static defaults if no FAQs are found in the DB
    $faqs = array(
        array(
            'question' => 'Do I need to make an appointment?',
            'answer'   => 'Yes, appointments are required. Kindly contact our office to discuss your needs and schedule a convenient time for your consultation.',
        ),
        array(
            'question' => 'Can you help establish my goals?',
            'answer'   => 'Absolutely! We\'re passionate about helping our clients set and achieve their NDIS goals. Give us a call, and let\'s work together to turn your goals into reality.',
        ),
        array(
            'question' => 'What do I need to bring when I come to meet?',
            'answer'   => 'Kindly bring your NDIS documentation with you. During our meeting, we\'ll explore services customized to meet your specific needs.',
        ),
    );
}
?>

<section class="faq section">
    <div class="container">
        <div class="text-center">
            <h4 class="section-subtitle">FAQ'S</h4>
            <h2 class="section-title">FREQUENTLY ASKED QUESTIONS</h2>
        </div>

        <div class="faq-list mt-50">
            <?php foreach ( $faqs as $index => $faq ) : ?>
                <div class="faq-item reveal-on-scroll" data-faq-index="<?php echo esc_attr( $index ); ?>">
                    <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-<?php echo esc_attr( $index ); ?>">
                        <span><?php echo esc_html( $faq['question'] ); ?></span>
                        <span class="faq-toggle">&#43;</span>
                    </button>
                    <div class="faq-answer" id="faq-answer-<?php echo esc_attr( $index ); ?>" role="region">
                        <p><?php echo wp_kses_post( $faq['answer'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-50">
            <a href="<?php echo esc_url( home_url( '/frequently-asked-questions/' ) ); ?>" class="btn btn-outline">Read More</a>
        </div>
    </div>
</section>
