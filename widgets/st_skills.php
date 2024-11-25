<?php
class Skytech_Skills_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'st_skill_widget';
	}

	public function get_title() {
		return esc_html__( 'ST Skills ', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-counter-circle';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'progress', 'skill' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// FAQ heading
		$this->add_control(
			'st_skill_heading',
			[
				'label' 		=> esc_html__( 'Heading', 'skytech-widget' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'Our Skill', 'skytech-widget' ),
				'placeholder' 	=> esc_html__( 'Type your heading here', 'skytech-widget' ),
				'label_block' 	=> true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'st_skill_title',
			[
				'label' 		=> esc_html__( 'Title', 'textdomain' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'List Title' , 'textdomain' ),
				'label_block' 	=> false,
			]
		);

		$repeater->add_control(
			'st_skill_number',
			[
				'label' 		=> esc_html__( 'Number', 'textdomain' ),
				'type' 			=> \Elementor\Controls_Manager::NUMBER,
				'default' 		=> 90,
				'max' 			=> 100,
				'show_label' 	=> true,
			]
		);

		$this->add_control(
			'st_skill_items',
			[
				'label' 	=> esc_html__( 'Skill Items', 'textdomain' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'st_skill_title' 	=> esc_html__( 'HTML', 'textdomain' ),
						'st_skill_number' 	=> esc_html__( '90', 'textdomain' ),
					],
					[
						'st_skill_title' 	=> esc_html__( 'CSS3', 'textdomain' ),
						'st_skill_number' 	=> esc_html__( '75', 'textdomain' ),
					],
				],
				'title_field' => '{{{ st_skill_title }}}',
			]
		);


		$this->end_controls_section();

		//Style tab section
		$this->start_controls_section(
			'style_section',
			[
				'label' 	=> esc_html__( 'Heading', 'skytech-widget' ),
				'tab' 		=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 'st_skill_heading_typography',
				'selector' 	=> '{{WRAPPER}} .skills .page-title h4',
			]
		);	

		$this->add_control(
			'sub_skill_heading_color',
			[
				'label' 	=> esc_html__( 'Color', 'skytech-widget' ),
				'type' 		=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skills .page-title h4' => 'color: {{VALUE}}',
				],
				'default' 	=> '#ffffff',
			]
		);

		$this->add_control(
			'st_skill_heading_border_color',
			[
				'label' 	=> esc_html__( 'Border', 'skytech-widget' ),
				'type' 		=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skills .page-title h4:before' => 'background-color: {{VALUE}}',
				],
			]
		);
		// Heading Typography End

		$this->end_controls_section();


		//Skills Progress Typography Start

		$this->start_controls_section(
			'st_skill_progress_style',
			[
				'label' 	=> esc_html__( 'Progress', 'skytech-widget' ),
				'tab' 		=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'st_skill_title_style',
			[
				'label' 	=> esc_html__( 'Title', 'skytech-widget' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 'st_skill_title_typography',
				'selector' 	=> '{{WRAPPER}} .single-skill h4',
			]
		);

		$this->add_control(
			'st_skill_title_color',
			[
				'label' 	=> esc_html__( 'Color', 'skytech-widget' ),
				'type' 		=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-skill h4' => 'color: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);
		//title Typography End


		//Description Typography Start
		$this->add_control(
			'st_skill_progress_style',
			[
				'label' 	=> esc_html__( 'Progress Bar', 'skytech-widget' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'st_skill_progress_color',
			[
				'label' 	=> esc_html__( 'Progress Color', 'skytech-widget' ),
				'type' 		=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-skill .progress-bar' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' 	=> esc_html__( 'Number Typography', 'skytech-widget' ),
				'name' 		=> 'st_skill_number_typography',
				'selector' 	=> '{{WRAPPER}} .single-skill .progress-bar',
			]
		);

		$this->add_control(
			'st_skill_number_color',
			[
				'label' 	=> esc_html__( 'Number Color', 'skytech-widget' ),
				'type' 		=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-skill .progress-bar' => 'color: {{VALUE}}',
				],
			]
		);

		
		//Description Typography End


		//Border Style Start
		$this->add_control(
			'border_style',
			[
				'label' 	=> esc_html__( 'Border', 'skytech-widget' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->end_controls_tab();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();

		$st_skill_heading 	= $settings['st_skill_heading'];
		$st_skill_items 	= $settings['st_skill_items'];
	?>
		<div class="skills">
			<div class="page-title">
				<h4><?php echo $st_skill_heading; ?></h4>
			</div>
			<div class="single-skill">
				<?php 
					foreach( $st_skill_items as $st_skill_item) {
				?>
					<h4> <?php echo $st_skill_item['st_skill_title']; ?></h4>
					<div class="progress-bar" role="progressbar" style="width: <?php echo $st_skill_item['st_skill_number'];?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $st_skill_item['st_skill_number'];?>%
					</div>
				<?php
					}
				?>
				
			</div>
		</div>
	<?php
	}
}
