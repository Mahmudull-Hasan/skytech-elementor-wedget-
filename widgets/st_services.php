<?php
class Skytech_Service_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Services';
	}

	public function get_title() {
		return esc_html__( 'ST Service', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-single-post';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Service', 'icon box' ];
	}


	protected function register_controls() {

		//==== content tab =======
		$this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		//===== Select Column ======
		$this->add_control(
			'select_service_column',
			[
				'label' => esc_html__( 'Select Column', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'column_three',
				'options' => [
					'column_two' 	=> esc_html__( '2 Column', 'textdomain' ),
					'column_three' 	=> esc_html__( '3 Column', 'textdomain' ),
					'column_four'  	=> esc_html__( '4 Column', 'textdomain' ),
				]
			]
		);

		$this->end_controls_section();

		// Service Content Section
		$this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Services Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'select_media_type',
			[
				'label' => esc_html__( 'Select Media Type', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'st_service_icon' => [
						'title' => esc_html__( 'Icon', 'textdomain' ),
						'icon' => 'eicon-favorite',
					],
					'st_service_image' => [
						'title' => esc_html__( 'Image', 'textdomain' ),
						'icon' => 'eicon-image',
					],
					'st_service_number' => [
						'title' => esc_html__( 'Number', 'textdomain' ),
						'icon' => 'eicon-number-field',
					],
				],
				'default' => 'st_service_icon',
				'toggle' => true,
			]
		);

		$repeater->add_control(
			'st_service_icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'condition' => [
					'select_media_type' => 'st_service_icon',
				]
			]
		);

		$repeater->add_control(
			'st_service_image',
			[
				'label' => esc_html__( 'Service Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'select_media_type' => 'st_service_image',
				]
			]
		);

		$repeater->add_control(
			'st_service_number',
			[
				'label' => esc_html__( 'Service Number', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
				'condition' => [
					'select_media_type' => 'st_service_number',
				]
			]
		);

		$repeater->add_control(
			'st_service_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'st_service_content',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Content' , 'textdomain' ),
				'show_label' => true,
				'label_block' => true,
			]
		);

		$this->add_control(
			'st_service_items',
			[
				'label' => esc_html__( 'Services Items', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'st_service_title' => esc_html__( 'Service Title', 'textdomain' ),
						'st_service_content' => esc_html__( 'Service content', 'textdomain' ),
					],
					[
						'st_service_title' => esc_html__( 'Service Title', 'textdomain' ),
						'st_service_content' => esc_html__( 'Service content', 'textdomain' ),
					],
				],
				'title_field' => '{{{ st_service_title }}}',
			]
		);


		$this->end_controls_section();
		// Service Content Section end

		
		//Style tab section=======
		$this->start_controls_section(
			'st_service_heading_desc_section',
			[
				'label' => esc_html__( 'Content', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Service Title style
		$this->add_control(
			'st_title_part',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_service_title_typography',
				'selector' => '{{WRAPPER}} .single-service h4',
			]
		);

		$this->add_control(
			'st_service_title_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service h4' => 'color: {{VALUE}}',
				],
			]
		);

		// Service Description Style
		$this->add_control(
			'st_description_part',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_service_description_typography',
				'selector' => '{{WRAPPER}} .single-service p',
			]
		);

		$this->add_control(
			'st_service_description_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// Icon , Image and Number======
		$this->start_controls_section(
			'st_icon_img_nmbr_style_section',
			[
				'label' => esc_html__( 'Icon ', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'select_media_style_type',
			[
				'label' => esc_html__( 'Select Media Type', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'st_service_icon_style' => [
						'title' => esc_html__( 'Icon', 'textdomain' ),
						'icon' => 'eicon-favorite',
					],
					'st_service_image_style' => [
						'title' => esc_html__( 'Image', 'textdomain' ),
						'icon' => 'eicon-image',
					],
					'st_service_number_style' => [
						'title' => esc_html__( 'Number', 'textdomain' ),
						'icon' => 'eicon-number-field',
					],
				],
				'default' => 'st_service_icon',
				'toggle' => true,
				
			]
		);


		//======= Service Image Style=========
		$this->add_control(
			'st_service_image_width',
			[
				'label' => esc_html__( 'Width', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 50,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-service img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_image_style',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'st_service_image_height',
			[
				'label' => esc_html__( 'Height', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 50,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-service img' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_image_style',
				]
			]
		);

		$this->add_control(
			'st_service_image_border_radius',
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
					'{{WRAPPER}} .single-service img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_image_style',
				]
			]
		);

		// ========== Service Icon Style=====
		$this->add_control(
			'st_service_icon_size',
			[
				'label' => esc_html__( 'Size', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .single-service i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_icon_style',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'st_service_icon_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service i' => 'color: {{VALUE}}',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_icon_style',
				]
			]
		);

		$this->add_control(
			'st_service_icon_bg_color',
			[
				'label' => esc_html__( 'Background', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service i' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_icon_style',
				]
			]
		);

		$this->add_control(
			'st_service_icon_padding',
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
					'{{WRAPPER}} .single-service i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_icon_style',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'label' => 'Border',
				'name' => 'st_icon_border',
				'selector' => '{{WRAPPER}} .single-service i',
				'condition' => [
					'select_media_style_type' => 'st_service_icon_style',
				]
			],
			
		);

		$this->add_control(
			'st_service_icon_border_radius',
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
					'{{WRAPPER}} .single-service i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_icon_style',
				]
			]
		);

		// ========== Service Number Style=====
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'textdomain' ),
				'name' => 'st_service_number_typography',
				'selector' => '{{WRAPPER}} .single-service span',
				'condition' => [
					'select_media_style_type' => 'st_service_number_style',
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'st_service_number_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service span' => 'color: {{value}};',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_number_style',
				]
			]
		);

		$this->add_control(
			'st_service_number_background',
			[
				'label' => esc_html__( 'Background', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service span' => 'background: {{value}};',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_number_style',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'label' => 'Border',
				'name' => 'st_number_border',
				'selector' => '{{WRAPPER}} .single-service span',
				'condition' => [
					'select_media_style_type' => 'st_service_number_style',
				]
			],
			
		);

		$this->add_control(
			'st_service_number_border_radius',
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
					'{{WRAPPER}} .single-service span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'select_media_style_type' => 'st_service_number_style',
				]
			]
		);



		
		$this->end_controls_tab();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();

		$select_service_column = $settings['select_service_column'];
		$st_service_items = $settings['st_service_items'];

		if($select_service_column == 'column_two') {
			$select_service_column = 'col-lg-6';
		}elseif ($select_service_column == 'column_four'){
			$select_service_column = 'col-lg-3';
		}else {
			$select_service_column = 'col-lg-4';
		}
	?>
	<div class="row">
		<?php 
			foreach($st_service_items as $st_service_item) {
				?>
				<div class="<?php echo $select_service_column ;?>">
					<!-- Single Service -->
					<div class="single-service">
						<?php 
							if(!empty($st_service_item['st_service_icon']['value'])) {
						?>
							<i class="<?php echo $st_service_item['st_service_icon']['value'] ?>"></i>
						<?php
							}elseif(!empty($st_service_item['st_service_image'])){
						?>
							<img src="<?php echo $st_service_item['st_service_image']['url'];?>" alt="">
						<?php
							}elseif(!empty($st_service_item['st_service_number'])) {
						?>
							<span><?php echo $st_service_item['st_service_number'];?></span>
						<?php
							}else {
						?>
							<i class="<?php echo $st_service_item['st_service_icon']['value'] ?>"></i>
						<?php
							}
						?>
						<h4><?php echo $st_service_item['st_service_title'];?></h4>
						<p><?php echo $st_service_item['st_service_content'];?></p>
					</div>
				</div>

		<?php
			}
		?>
	</div>
	<?php
	}
}
