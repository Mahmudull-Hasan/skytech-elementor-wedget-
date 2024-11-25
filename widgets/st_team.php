<?php
class Skytech_Team_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Team Widget';
	}

	public function get_title() {
		return esc_html__( 'ST Team', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'team' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'st_content_section',
			[
				'label' 		=> esc_html__( 'Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Image
		$this->add_control(
			'st_team_image',
			[
				'label' => esc_html__( 'Choose Image', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		//Title
		$this->add_control(
			'st_team_name',
			[
				'label' => esc_html__( 'Name', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Hasan Mahmud', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Type your name here', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		//Description
		$this->add_control(
			'st_team_designation',
			[
				'label' => esc_html__( 'Designation', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web developer', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Designation', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'show_team_social_icon',
			[
				'label' => esc_html__( 'Show Icon', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'skytech-widget' ),
				'label_off' => esc_html__( 'Hide', 'skytech-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$repeater = new \Elementor\Repeater();

		//Title
		$repeater->add_control(
			'st_team_icon_name',
			[
				'label' => esc_html__( 'Name', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Facebook', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Type your name here', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'st_team_social_icon',
			[
				'label' => esc_html__( 'Icon', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				]
			]
		);

		$repeater->add_control(
			'st_team_social_url',
			[
				'label' => esc_html__( 'URL', 'skytech-widget' ),
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



		$this->add_control(
			'st_icon_lists',
			[
				'label' => esc_html__( 'Social Icons', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ st_team_icon_name }}}',
				'condition' => [
					'show_team_social_icon' => 'yes',
				],
			]
		);

		$this->end_controls_section();


		//Style tab section
		$this->start_controls_section(
			'st_team_style_section',
			[
				'label' => esc_html__( 'Content', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		// Team Name Typography Start
		$this->add_control(
			'st_team_name_style',
			[
				'label' => esc_html__( 'Name', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_team_name_typography',
				'selector' => '{{WRAPPER}} .single-team h4',
			]
		);	

		$this->add_control(
			'st_team_name_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team h4' => 'color: {{VALUE}}',
				],
			]
		);
		// Team Name Typography End


		//Team Designation Typography Start
		$this->add_control(
			'st_team_designation_style',
			[
				'label' => esc_html__( 'Designation', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_team_designation_typography',
				'selector' => '{{WRAPPER}} .single-team h4 span',
			]
		);

		$this->add_control(
			'st_designation_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team h4 span' => 'color: {{VALUE}}',
				],
			]
		);
		//Team Designation Typography End

		$this->end_controls_section();

		//team socials tab section
		$this->start_controls_section(
			'st_team_social_style_section',
			[
				'label' => esc_html__( 'Social Icons', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'st_team_social_icon_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-hover ul li a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'st_team_social_icon_bg_color',
			[
				'label' => esc_html__( 'Background', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-hover ul li a' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'st_team_social_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .team-hover ul li a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'label' => esc_html__( 'Border', 'skytech-widget' ),
				'name' => 'border',
				'selector' => '{{WRAPPER}} .team-hover ul li a',
			]
		);

		$this->add_control(
			'st_team_social_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%',],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .team-hover ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'st_team_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%',],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .team-hover ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();

		$st_team_image = $settings['st_team_image'];
		$st_team_name = $settings['st_team_name'];
		$st_team_designation = $settings['st_team_designation'];
		$st_icon_lists = $settings['st_icon_lists'];
	?>
		<div class="single-team">
			<img src="<?php echo $st_team_image['url']; ?>" alt="<?php echo $st_team_image; ?>">
			<div class="team-hover">
				<div class="team-content">
					<h4><?php echo $st_team_name; ?> <span><?php echo $st_team_designation; ?></span></h4>
					<ul>
						<?php if($st_icon_lists) {
						?>
							<?php 
								foreach($st_icon_lists as $social_list ) {
							?>
								<li><a href="<?php echo $social_list['st_team_social_url']['url'] ?>"><i class="<?php echo $social_list['st_team_social_icon']['value'] ?>"></i></a></li>
							<?php
								}
							?>
						<?php
						}
						?>
						
					</ul>
				</div>
			</div>
		</div>
		
	<?php
	}
}
