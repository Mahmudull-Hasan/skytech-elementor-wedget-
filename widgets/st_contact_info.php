<?php
class Skytech_Contact_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'st_contact';
	}

	public function get_title() {
		return esc_html__( 'ST Contact', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'contact' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Subtitle
		$this->add_control(
			'st_contact_icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				]
			]
		);

		//Title
		$this->add_control(
			'st_contact_title',
			[
				'label' => esc_html__( 'Title', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Address', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		//Description
		$this->add_control(
			'st_contact_text',
			[
				'label' => esc_html__( 'Description', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( '123, michighan, usa', 'skytech-widget' ),
				'placeholder' => esc_html__( '123, michighan, usa', 'skytech-widget' ),
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

		$st_contact_icon = $settings['st_contact_icon'];
		$st_contact_title = $settings['st_contact_title'];
		$st_contact_text = $settings['st_contact_text'];
	?>

		<div class="contact-address">
			<i class="<?php echo $st_contact_icon['value']; ?>"></i>
			<h4><?php echo $st_contact_title; ?> <span><?php echo $st_contact_text; ?></span></h4>
		</div>

	<?php
	}
}
