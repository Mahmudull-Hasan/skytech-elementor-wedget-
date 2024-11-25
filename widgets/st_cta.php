<?php
class Skytech_CTA_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'st_cta';
	}

	public function get_title() {
		return esc_html__( 'ST CTA', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-ehp-cta';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'cta', 'heading' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// CTA Title
		$this->add_control(
			'st_cta_title',
			[
				'label' => esc_html__( 'Title', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Who we are?', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Type your Title here', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		//CTA Description
		$this->add_control(
			'st_cta_description',
			[
				'label' => esc_html__( 'Description', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'the can be used on larger scale projectss as well as small scale projectss', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Type your Description here', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		//Description
		$this->add_control(
			'st_cta_button_text',
			[
				'label' => esc_html__( 'Button Text', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact us', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'st_cta_btn_url',
			[
				'label' => esc_html__( 'Button Url', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		//Style tab section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style Section', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		// Subtitle Typography Start
		$this->add_control(
			'sub_title_style',
			[
				'label' => esc_html__( 'Subtitle', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_subtitle_typography',
				'selector' => '{{WRAPPER}} .section-title h3 span',
			]
		);	

		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Subtitle Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h3 span' => 'color: {{VALUE}}',
				],
			]
		);
		// Subtitle Typography End


		//title Typography Start
		$this->add_control(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_title_typography',
				'selector' => '{{WRAPPER}} .section-title h3',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h3' => 'color: {{VALUE}}',
				],
			]
		);
		//title Typography End


		//Description Typography Start
		$this->add_control(
			'description_style',
			[
				'label' => esc_html__( 'Description', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_description_typography',
				'selector' => '{{WRAPPER}} .section-title p',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Description Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
				],
			]
		);
		//Description Typography End


		//Border Style Start
		$this->add_control(
			'border_style',
			[
				'label' => esc_html__( 'Border', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title:before, .section-title:after' => 'background-color: {{VALUE}}',
				],
				'default' => '#635CDB'			]
		);
		//Border Style End
		
		$this->end_controls_section();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();

		$st_cta_title = $settings['st_cta_title'];
		$st_cta_description = $settings['st_cta_description'];
		$st_cta_button_text = $settings['st_cta_button_text'];
		$st_cta_btn_url = $settings['st_cta_btn_url'];
	?>
		<div class="row">
         <div class="col-md-6">
            <h4><?php echo $st_cta_title; ?> <span><?php echo $st_cta_description; ?></span></h4>
         </div>
         <div class="col-md-6 text-center">
            <a href="<?php echo $st_cta_btn_url['url']; ?>" class="box-btn"><?php echo $st_cta_button_text; ?><i class="fa fa-angle-double-right"></i></a>
         </div>
      </div>
		
	<?php
	}
}
