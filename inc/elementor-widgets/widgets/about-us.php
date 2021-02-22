<?php
namespace Lawyerelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Lawyer elementor about us section widget.
 *
 * @since 1.0
 */
class Lawyer_About_Us extends Widget_Base {

	public function get_name() {
		return 'lawyer-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'lawyer-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'lawyer-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'left_content',
            [
                'label' => __( 'Left Content', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'lawyer_img',
            [
                'label' => esc_html__( 'Lawyer Image', 'lawyer-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'big_title',
            [
                'label' => esc_html__( 'Big Title', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Finest And Strongest Law <br>Firm Win The World',
            ]
        );
        $this->add_control(
            'about_text',
            [
                'label' => esc_html__( 'About Text', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'There are many variations of passages of Lorem Ipsum <br> available, but the majority have suffered alteration in <br> some form, by injected humour, or randomised words <br> which don\'t look even slightly believable.',
            ]
        );
        $this->add_control(
            'signature_img',
            [
                'label' => esc_html__( 'Signature Image', 'lawyer-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        
        $this->end_controls_section(); // End left content

        // Right Content
        $this->start_controls_section(
            'right_content',
            [
                'label' => __( 'Right Content', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'success_rate',
            [
                'label' => esc_html__( 'Success Rate', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '93%', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'success_rate_label',
            [
                'label' => esc_html__( 'Success Rate Label', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Success Case', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'right_title',
            [
                'label' => esc_html__( 'Big Title', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'About Lawyer Justice', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'about_text_right',
            [
                'label' => esc_html__( 'About Text', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'There are many variations of passages of Lorem Ipsum <br> available, but the majority have suffered alteration in <br> some form, by injected humour, or randomised words <br> which don\'t look even slightly believable.',
            ]
        );

        // Statistics
        $this->add_control(
            'statistics_separator',
            [
                'label' => esc_html__( 'Statistics', 'lawyer-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'total_case',
            [
                'label' => esc_html__( 'Total Case Value', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '879', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'total_case_label',
            [
                'label' => esc_html__( 'Total Case Label', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Total Cases', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'case_won',
            [
                'label' => esc_html__( 'Case Won Value', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '787', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'case_won_label',
            [
                'label' => esc_html__( 'Case Won Label', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Case Won', 'lawyer-companion' ),
            ]
        );
        
        $this->end_controls_section(); // End left content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'about_sec_style', [
                'label' => __( 'About Section Styles', 'lawyer-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_lawyer_area .welcome_lawyer_info h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_lawyer_area .welcome_lawyer_info h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_text_col', [
                'label' => __( 'Sec Text Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_lawyer_area .welcome_lawyer_info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .welcome_lawyer_area .welcome_lawyer_info ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'list_circle_col', [
                'label' => __( 'List Item Icon Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_lawyer_area .welcome_lawyer_info ul li::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'lawyer-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text & Border Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_lawyer_area .welcome_lawyer_info .boxed-btn3-white-2' => 'color: {{VALUE}} !important; border-color: {{VALUE}}',
                    '{{WRAPPER}} .welcome_lawyer_area .welcome_lawyer_info .boxed-btn3-white-2:hover' => 'background: {{VALUE}} !important; border-color: transparent',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_col', [
                'label' => __( 'Button Hover Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_lawyer_area .welcome_lawyer_info .boxed-btn3-white-2:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

    }


	protected function render() {
    $settings           = $this->get_settings();      
    $lawyer_img         = !empty( $settings['lawyer_img']['id'] ) ? wp_get_attachment_image( $settings['lawyer_img']['id'], 'lawyer_about_thumb_280x280', '', array( 'alt' => 'lawyer image' ) ) : '';
    $big_title          = !empty( $settings['big_title'] ) ? $settings['big_title'] : '';
    $about_text         = !empty( $settings['about_text'] ) ? $settings['about_text'] : '';
    $about_text         = !empty( $settings['about_text'] ) ? $settings['about_text'] : '';
    $signature_img      = !empty( $settings['signature_img']['id'] ) ? wp_get_attachment_image( $settings['signature_img']['id'], 'lawyer_about_signature_thumb_199x66', '', array( 'alt' => 'signature image' ) ) : '';
    $success_rate       = !empty( $settings['success_rate'] ) ? $settings['success_rate'] : '';
    $success_rate_label = !empty( $settings['success_rate_label'] ) ? $settings['success_rate_label'] : '';
    $right_title        = !empty( $settings['right_title'] ) ? $settings['right_title'] : '';
    $about_text_right   = !empty( $settings['about_text_right'] ) ? $settings['about_text_right'] : '';
    $total_case         = !empty( $settings['total_case'] ) ? $settings['total_case'] : '';
    $total_case_label   = !empty( $settings['total_case_label'] ) ? $settings['total_case_label'] : '';
    $case_won           = !empty( $settings['case_won'] ) ? $settings['case_won'] : '';
    $case_won_label     = !empty( $settings['case_won_label'] ) ? $settings['case_won_label'] : '';
    ?>

    <!-- about_area _start  -->
    <div class="about_area">
        <div class="opacity_icon d-none d-lg-block">
            <i class="flaticon-balance"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="single_about_info text-center">
                        <div class="about_thumb">
                            <?php 
                                if ( $lawyer_img ) { 
                                    echo $lawyer_img;
                                }
                            ?>
                        </div>
                        <?php
                            if ( $big_title ) { 
                                echo '<h3>'.wp_kses_post(nl2br($big_title)).'</h3>';
                            }
                            if ( $about_text ) { 
                                echo '<p>'.wp_kses_post(nl2br($about_text)).'</p>';
                            }
                        ?>
                        <div class="signature">
                            <?php 
                                if ( $signature_img ) { 
                                    echo $signature_img;
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="single_about_info text-center">
                        <div class="about_thumb">
                            <div class="image_hover">
                                <div class="hover_inner">
                                    <?php
                                        if ( $success_rate ) { 
                                            echo '<h2>'.esc_html($success_rate).'</h2>';
                                        }
                                        if ( $success_rate_label ) { 
                                            echo '<span>'.esc_html($success_rate_label).'</span>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            if ( $right_title ) { 
                                echo '<h3>'.esc_html($right_title).'</h3>';
                            }
                            if ( $about_text_right ) { 
                                echo '<p>'.wp_kses_post(nl2br($about_text_right)).'</p>';
                            }
                        ?>
                        <div class="total_cases">
                            <div class="single_cases">
                                <?php
                                    if ( $total_case ) { 
                                        echo '<h4>'.esc_html($total_case).'</h4>';
                                    }
                                    if ( $total_case_label ) { 
                                        echo '<p>'.esc_html($total_case_label).'</p>';
                                    }
                                ?>
                            </div>
                            <div class="single_cases">
                                <?php
                                    if ( $case_won ) { 
                                        echo '<h4>'.esc_html($case_won).'</h4>';
                                    }
                                    if ( $case_won_label ) { 
                                        echo '<p>'.esc_html($case_won_label).'</p>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area _end -->
    <?php
    }
}