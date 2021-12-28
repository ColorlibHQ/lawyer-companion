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
 * Lawyer elementor lawyers section widget.
 *
 * @since 1.0
 */
class Lawyer_Lawyers extends Widget_Base {

	public function get_name() {
		return 'lawyer-lawyers';
	}

	public function get_title() {
		return __( 'Lawyers', 'lawyer-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'lawyer-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  lawyers content ------------------------------
		$this->start_controls_section(
			'lawyers_content',
			[
				'label' => __( 'Lawyers content', 'lawyer-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Lawyers', 'lawyer-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'lawyer-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Many variations of passages of Lorem Ipsum available, but the majority have <br> suffered alteration in some.',
            ]
        );

        $this->add_control(
            'lawyers_settings_seperator',
            [
                'label' => esc_html__( 'Lawyers', 'lawyer-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'lawyers', [
                'label' => __( 'Create New', 'lawyer-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ member_name }}}',
                'fields' => [
                    [
                        'name' => 'member_img',
                        'label' => __( 'Member Image', 'lawyer-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __( 'Member Name', 'lawyer-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Henry Miller', 'lawyer-companion' ),
                    ],
                    [
                        'name' => 'speacialist_at',
                        'label' => __( 'Speacialist At', 'lawyer-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Family Lawyer', 'lawyer-companion' ),
                    ],
                    [
                        'name' => 'fb_url',
                        'label' => __( 'Facebook URL', 'lawyer-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ]
                    ],
                    [
                        'name' => 'tw_url',
                        'label' => __( 'Twitter URL', 'lawyer-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ]
                    ],
                    [
                        'name' => 'ins_url',
                        'label' => __( 'Instagram URL', 'lawyer-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ]
                    ],
                ],
                'default'   => [
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Henry Miller', 'lawyer-companion' ),
                        'speacialist_at'  => __( 'Family Lawyer', 'lawyer-companion' ),
                        'fb_url'     => [
                            'url' => '#'
                        ],
                        'tw_url'     => [
                            'url' => '#'
                        ],
                        'ins_url'     => [
                            'url' => '#'
                        ],
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Jon Anderson', 'lawyer-companion' ),
                        'speacialist_at'  => __( 'Consumer Lawyer', 'lawyer-companion' ),
                        'fb_url'     => [
                            'url' => '#'
                        ],
                        'tw_url'     => [
                            'url' => '#'
                        ],
                        'ins_url'     => [
                            'url' => '#'
                        ],
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Jaky Nadan', 'lawyer-companion' ),
                        'speacialist_at'  => __( 'Criminal Lawyer', 'lawyer-companion' ),
                        'fb_url'     => [
                            'url' => '#'
                        ],
                        'tw_url'     => [
                            'url' => '#'
                        ],
                        'ins_url'     => [
                            'url' => '#'
                        ],
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'lawyer-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Section Title Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_loyers .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_loyers .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'lawyer-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_name_col', [
                'label' => __( 'Member Name Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_loyers .single_loyers h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'member_desig_color', [
                'label' => __( 'Member Designation Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_loyers .single_loyers span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_social_styles_seperator',
            [
                'label' => esc_html__( 'Social Icon Styles', 'lawyer-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'icon_bg_color', [
                'label' => __( 'Icon Bg Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_loyers .single_loyers .social_links ul li a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_color', [
                'label' => __( 'Icon Color', 'lawyer-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_loyers .single_loyers .social_links ul li a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .our_loyers .single_loyers .social_links ul li a:hover' => 'background: {{VALUE}}; color: #fff',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $lawyers   = !empty( $settings['lawyers'] ) ? $settings['lawyers'] : '';
    ?>
    
    <!-- our_loyers-start  -->
    <div class="our_loyers">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-60">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                            if ( $sub_title ) { 
                                echo '<p>'.wp_kses_post( nl2br( $sub_title ) ).'</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $lawyers ) && count( $lawyers ) > 0 ) {
                    foreach( $lawyers as $member ) {
                        $member_name        = ( !empty( $member['member_name'] ) ) ? $member['member_name'] : '';
                        $member_img         = !empty( $member['member_img']['id'] ) ? wp_get_attachment_image( $member['member_img']['id'], 'lawyer_about_thumb_280x280', '', array( 'alt' => $member_name. ' image' ) ) : '';
                        $speacialist_at = ( !empty( $member['speacialist_at'] ) ) ? $member['speacialist_at'] : '';
                        $fb_url = ( !empty( $member['fb_url']['url'] ) ) ? $member['fb_url']['url'] : '';
                        $tw_url = ( !empty( $member['tw_url']['url'] ) ) ? $member['tw_url']['url'] : '';
                        $ins_url = ( !empty( $member['ins_url']['url'] ) ) ? $member['ins_url']['url'] : '';
                        ?>
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="single_loyers text-center">
                                <?php 
                                    if ( $member_img ) { 
                                        echo '<div class="thumb">';
                                            echo $member_img;
                                        echo '</div>';
                                    }
                                    if ( $member_name ) { 
                                        echo '<h3>'.esc_html( $member_name ).'</h3>';
                                    }
                                    if ( $speacialist_at ) { 
                                        echo '<span>'.esc_html( $speacialist_at ).'</span>';
                                    }
                                    if ( $fb_url || $tw_url || $ins_url ) { 
                                        echo '<div class="social_links"><ul>';
                                            if ( $fb_url ) {
                                                echo '<li><a href="'.esc_url( $fb_url ).'"> <i class="fa fa-facebook"></i> </a></li>';
                                            }
                                            if ( $tw_url ) {
                                                echo '<li><a href="'.esc_url( $tw_url ).'"> <i class="fa fa-twitter"></i> </a></li>';
                                            }
                                            if ( $ins_url ) {
                                                echo '<li><a href="'.esc_url( $ins_url ).'"> <i class="fa fa-instagram"></i> </a></li>';
                                            }
                                        echo '</ul></div>';
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
    <?php
    }
}