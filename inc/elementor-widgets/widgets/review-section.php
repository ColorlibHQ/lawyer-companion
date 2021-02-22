<?php
namespace Lawyerelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Lawyer Review Contents section widget.
 *
 * @since 1.0
 */
class Lawyer_Review_Contents extends Widget_Base {

	public function get_name() {
		return 'lawyer-review-contents';
	}

	public function get_title() {
		return __( 'Review Contents', 'lawyer-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'lawyer-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Review contents  ------------------------------
		$this->start_controls_section(
			'reviews_content',
			[
				'label' => __( 'Testimonial Contents', 'lawyer-companion' ),
			]
        );

        $this->add_control(
            'sec_bg',
            [
                'label' => esc_html__( 'Section Bg Image', 'lawyer-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => Utils::get_placeholder_image_src()
                ],
            ]
        );
		$this->add_control(
            'reviews', [
                'label' => __( 'Create New', 'lawyer-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ reviewer_name }}}',
                'fields' => [
                    [
                        'name' => 'review_txt',
                        'label' => __( 'Review Text', 'lawyer-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered alteration in some form, by injected humour, or <br> randomised words which don\'t look even slightly believable.'
                    ],
                    [
                        'name' => 'client_img',
                        'label' => __( 'Client Image', 'lawyer-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                    [
                        'name' => 'reviewer_name',
                        'label' => __( 'Client Name', 'lawyer-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '- Millan Mirza', 'lawyer-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'review_txt'            => 'There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered alteration in some form, by injected humour, or <br> randomised words which don\'t look even slightly believable.',
                        'client_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'reviewer_name'         => __( '- Hasan Fardous', 'lawyer-companion' ),
                    ],
                    [
                        'review_txt'            => 'There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered alteration in some form, by injected humour, or <br> randomised words which don\'t look even slightly believable.',
                        'client_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'reviewer_name'         => __( '- Fardous Rubel', 'lawyer-companion' ),
                    ],
                    [
                        'review_txt'            => 'There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered alteration in some form, by injected humour, or <br> randomised words which don\'t look even slightly believable.',
                        'client_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'reviewer_name'         => __( '- Millan Mirza', 'lawyer-companion' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Review Section', 'lawyer-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_overlay_col', [
                'label' => __( 'Section Overlay Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testmonial.overlay2::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_text_col', [
                'label' => __( 'Review Text Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_name_col', [
                'label' => __( 'Reviewer Name Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 
    $settings       = $this->get_settings();
    $sec_bg         = !empty( $settings['sec_bg']['url'] ) ? $settings['sec_bg']['url'] : '';
    $reviews        = !empty( $settings['reviews'] ) ? $settings['reviews'] : '';
    ?>

    <!-- testmonial_area_start  -->
    <div class="testmonial_area overlay2" <?php echo lawyer_inline_bg_img( esc_url( $sec_bg ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <?php
                        if( is_array( $reviews ) && count( $reviews ) > 0 ){
                            foreach ( $reviews as $review ) {
                                $reviewer_name = !empty( $review['reviewer_name'] ) ? $review['reviewer_name'] : '';
                                $client_img = !empty( $review['client_img']['id'] ) ? wp_get_attachment_image( $review['client_img']['id'], 'lawyer_testimonial_author_thumb_35x35', '', array( 'alt' => $reviewer_name. ' image' ) ) : '';
                                $review_txt    = !empty( $review['review_txt'] ) ? $review['review_txt'] : '';
                                ?>
                                <div class="single_testmonial text-center">
                                    <i class="flaticon-straight-quotes"></i>
                                    <?php 
                                        if ( $review_txt ) { 
                                            echo '<p>'.wp_kses_post( nl2br( $review_txt ) ).'</p>';
                                        }
                                    ?>
                                    <div class="author_info d-flex justify-content-center align-items-center">
                                        <?php 
                                            if ( $client_img ) { 
                                                echo '<div class="thumb">';
                                                    echo $client_img;
                                                echo '</div>';
                                            }
                                            if ( $reviewer_name ) { 
                                                echo '<span>'.esc_html($reviewer_name).'</span>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // testmonial_active
            $('.testmonial_active').owlCarousel({
            loop:true,
            margin:30,
            items:1,
            autoplay:true,
            navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                767:{
                    items:1,
                    nav:false
                },
                992:{
                    items:1
                },
                1200:{
                    items:1
                },
                1500:{
                    items:1
                }
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
