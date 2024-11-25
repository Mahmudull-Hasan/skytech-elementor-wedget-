<?php
class Skytech_Faq_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'st_faq_widget';
	}

	public function get_title() {
		return esc_html__( 'ST FAQ ', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-toggle';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'faq', 'accordion' ];
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
			'st_faq_heading',
			[
				'label' => esc_html__( 'Heading', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Frequiently ask questions', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Type your heading here', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'st_faq_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'st_faq_description',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'List Content' , 'textdomain' ),
				'show_label' => true,
			]
		);

		$this->add_control(
			'st_faq_lists',
			[
				'label' => esc_html__( 'FAQ Items', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'st_faq_title' => esc_html__( 'Faq one', 'textdomain' ),
						'st_faq_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'st_faq_title' => esc_html__( 'Faq two', 'textdomain' ),
						'st_faq_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
				'title_field' => '{{{ st_faq_title }}}',
			]
		);


		$this->end_controls_section();

		//Style tab section=======
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Heading', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		// Subtitle Typography Start
		$this->add_control(
			'st_faq_heading_style',
			[
				'label' => esc_html__( 'Heading', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_faq_heading_typography',
				'selector' => '{{WRAPPER}} .faq .page-title h4',
			]
		);	

		$this->add_control(
			'st_faq_heading_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq .page-title h4' => 'color: {{VALUE}}',
				],
				'default' => '#ffffff',
			]
		);
		// Subtitle Typography End

		$this->end_controls_section();

		
		//FAQ List Typography Start
		$this->start_controls_section(
			'st_faq_style_section',
			[
				'label' => esc_html__( 'FAQ', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'st_faq_title_style',
			[
				'label' => esc_html__( 'Title', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_faq_title_typography',
				'selector' => '{{WRAPPER}} .card-header h5 button',
			]
		);

		$this->add_control(
			'st_faq_title_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-header h5 button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'st_faq_title_bg_color',
			[
				'label' => esc_html__( 'Background', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-header' => 'background-color: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);
		//title Typography End


		//Description Typography Start
		$this->add_control(
			'st_faq_description_style',
			[
				'label' => esc_html__( 'Description', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_faq_description_typography',
				'selector' => '{{WRAPPER}} .card-body p',
			]
		);

		$this->add_control(
			'st_faq_description_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-body p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'st_faq_description_bg_color',
			[
				'label' => esc_html__( 'Background', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'background-color: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);
		//Description Typography End
		
		$this->end_controls_tab();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();

		$st_faq_heading = $settings['st_faq_heading'];
		$st_faq_lists 	= $settings['st_faq_lists'];
		// $st_description = $settings['st_description'];
	?>
		<div class="faq">
			<div class="page-title">
				<h4><?php echo $st_faq_heading; ?></h4>
			</div>

			<div class="accordion" id="accordionExample">

				<?php 
					$i = 0;
					foreach( $st_faq_lists as $st_faq_list ){
					$i++;
				?>
				<div class="card">
					<div class="card-header" id="heading<?php echo $i; ?>">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseOne">
								<?php echo $st_faq_list['st_faq_title'];?> 
							</button>
						</h5>
					</div>
					<div id="collapse<?php echo $i; ?>" class="collapse <?php if($i == 1){echo 'show';} ?> " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
						<div class="card-body">
							<?php echo $st_faq_list['st_faq_description'];?>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	<?php
	}
}
