<?php
namespace Lawyerelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Lawyer elementor hero section widget.
 *
 * @since 1.0
 */
class Lawyer_Hero extends Widget_Base {

	public function get_name() {
		return 'lawyer-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'lawyer-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'lawyer-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero slider content', 'lawyer-companion' ),
			]
        );

        $this->add_control(
            'style_type',
            [
                'label' => esc_html__( 'Select Style', 'lawyer-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default'   => 'style1',
                'options'   => [
                    'style1' => esc_html__( 'Style 1', 'lawyer-companion' ),
                    'style2' => esc_html__( 'Style 2', 'lawyer-companion' ),
                ]
            ]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'Bg Image', 'lawyer-companion' ),
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
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'High Quality Law <br>Advice and Support',
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Leading Polish Lawyer in your city', 'lawyer-companion' ),
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );
        $this->add_control(
            'lawyer_name',
            [
                'label' => esc_html__( 'Lawyer Name', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '- Robert', 'lawyer-companion' ),
                'condition' => [
                    'style_type' => 'style2'
                ]
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Learn More', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'lawyer-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
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
				'label' => __( 'Style Hero Section', 'lawyer-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Title Color', 'lawyer-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .slider_area_inner .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_col', [
				'label' => __( 'Text Color', 'lawyer-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .slider_area_inner .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'button_section_separator',
            [
                'label'     => __( 'Button Styles', 'lawyer-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
			'button_col', [
				'label' => __( 'Button Color', 'lawyer-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn4' => 'border-color: {{VALUE}}; color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'button_hover_col', [
				'label' => __( 'Button Hover Color', 'lawyer-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn4:hover' => 'border-color: transparent; background: {{VALUE}}; color: transparent',
				],
			]
        );

		$this->end_controls_section();
	}
    
	protected function render() {
    $settings   = $this->get_settings();
    $style_type    = !empty( $settings['style_type'] ) ? $settings['style_type'] : ''; 
    $bg_img    = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : ''; 
    $big_title    = !empty( $settings['big_title'] ) ? $settings['big_title'] : ''; 
    $sub_title    = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : ''; 
    $btn_text    = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : ''; 
    $btn_url    = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : ''; 
    if ( 'style1' == $style_type ) {
        ?>
        <!-- slider_area_start -->
        <div class="slider_area ">
            <div class="slider_area_inner d-flex align-items-center" <?php echo lawyer_inline_bg_img( esc_url( $bg_img ) ); ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="single_slider">
                                <div class="slider_text">
                                    <?php 
                                        if ( $big_title ) { 
                                            echo '<h3>'.wp_kses_post(nl2br($big_title)).'</h3>';
                                        }
                                        if ( $sub_title ) { 
                                            echo '<p>'.wp_kses_post(nl2br($sub_title)).'</p>';
                                        }
                                        if ( $btn_text ) { 
                                            echo '<a href="'.esc_url($btn_url).'" class="boxed-btn4">'.esc_html($btn_text).'</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider_area_end -->
        <?php
    } else {
        $lawyer_name = !empty( $settings['lawyer_name'] ) ? $settings['lawyer_name'] : '';
        ?>
        <!-- slider_area_start -->
        <div class="slider_area ">
            <div class="slider_area_inner slider_area_inner2 d-flex align-items-center" <?php echo lawyer_inline_bg_img( esc_url( $bg_img ) ); ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="single_slider">
                                <div class="slider_text">
                                    <?php 
                                        if ( $big_title ) { 
                                            echo '<h3>'.wp_kses_post(nl2br($big_title)).'</h3>';
                                        }
                                        if ( $lawyer_name ) { 
                                            echo '<p class="name">'.wp_kses_post(nl2br($lawyer_name)).'</p>';
                                        }
                                        if ( $btn_text ) { 
                                            echo '<a href="'.esc_url($btn_url).'" class="boxed-btn4">'.esc_html($btn_text).'</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider_area_end -->
        <?php
    }

    } 
}