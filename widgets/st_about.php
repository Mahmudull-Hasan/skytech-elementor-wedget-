<?php
class Skytech_About_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'About Us';
	}

	public function get_title() {
		return esc_html__( 'About', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-site-identity';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'about', 'heading' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		//Title
		$this->add_control(
			'st_about_title',
			[
				'label' => esc_html__( 'Title', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Welcome to skytech', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		//Description
		$this->add_control(
			'st_about_description',
			[
				'label' => esc_html__( 'Lorem Ipsum is simply dummy text', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Type your description here', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'st_about_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Us' , 'skytech-widget' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'st_about_btn_url',
			[
				'label' => esc_html__( 'Button URL', 'skytech-widget' ),
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


		//<====== About features content start ===========>
		$this->start_controls_section(
			'about_features',
			[
				'label' 		=> esc_html__( 'Features', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		//repeater
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'features_icon',
			[
				'label' => esc_html__( 'Features Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				]
			]
		);

		$repeater->add_control(
			'about_features_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'about_features_description',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Our Mission' , 'textdomain' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'about_features_list',
			[
				'label' => esc_html__( 'Features List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'about_features_title' => esc_html__( 'Our Mission', 'textdomain' ),
						'about_features_description' => esc_html__( 'Lorem Ipsum is simply dummy text', 'textdomain' ),
					],
				],
				'title_field' => '{{{ about_features_title }}}',
			]
		);

		$this->end_controls_section();
		//<====== About features content end ===========>

		//<=====Style tab section ======>
		$this->start_controls_section(
			'about_style_section',
			[
				'label' => esc_html__( 'About Content', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		// Title Typography Start
		$this->add_control(
			'about_title_style',
			[
				'label' => esc_html__( 'Title', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_about_title_typography',
				'selector' => '{{WRAPPER}} .page-title h4',
			]
		);	

		$this->add_control(
			'about_title_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-title h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'about_title_border_color',
			[
				'label' => esc_html__( 'Border Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-title h4:before' => 'background-color: {{VALUE}}',
				],
				'default' => '#635CDB',
				'separator' => 'after',
			]
		);
		// Title Typography End


		//Description Typography Start
		$this->add_control(
			'about_desc_title_style',
			[
				'label' => esc_html__( 'Descriptioin', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_about_desc_typography',
				'selector' => '{{WRAPPER}} .about p',
			]
		);

		$this->add_control(
			'about_desc_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about p' => 'color: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);
		//Description Typography End


		//button Typography Start
		$this->add_control(
			'about_btn_style',
			[
				'label' => esc_html__( 'Button', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_about_btn_typography',
				'selector' => '{{WRAPPER}} .about a',
			]
		);

		$this->add_control(
			'about_btn_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'about_btn_bg_color',
			[
				'label' => esc_html__( 'Background', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about a' => 'background-color: {{VALUE}}',
				],
			]
		);
		//Button Typography End

		
		$this->end_controls_section();


		
		//======== Features sectioin start====
		$this->start_controls_section(
			'features_style_section',
			[
				'label' => esc_html__( 'Features Content', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//Feautes Icon Typography Start
		$this->add_control(
			'features_icon_style',
			[
				'label' => esc_html__( 'Icon', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_features_icon_typography',
				'selector' => '{{WRAPPER}} .single_about i',
			]
		);

		$this->add_control(
			'features_icon_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_about i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'features_icon_bg_color',
			[
				'label' => esc_html__( 'Background', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_about i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .single_about i',
				
				
			]
		);
		//Features Icon Typography End

		//Feautes title Typography Start
		$this->add_control(
			'about_features_title_style',
			[
				'label' => esc_html__( 'Title', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_features_title_typography',
				'selector' => '{{WRAPPER}} .single_about h4',
			]
		);

		$this->add_control(
			'features_title_color',
			[
				'label' => esc_html__( 'Title Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_about h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'features_title_border_color',
			[
				'label' => esc_html__( 'Border Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_about h4:before' => 'background-color: {{VALUE}}',
				],
				'separator' => 'after'
			]
		);
		//Features title Typography End


		//Feautes description Typography Start
		$this->add_control(
			'features_desc_style',
			[
				'label' => esc_html__( 'Description', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_features_desc_typography',
				'selector' => '{{WRAPPER}} .single_about p',
			]
		);

		$this->add_control(
			'features_decs_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_about p' => 'color: {{VALUE}}',
				],
			]
		);
		//Features description Typography End


		$this->end_controls_section();

		//<=====Style tab end ======>

	}


	protected function render() {
		$settings = $this->get_settings_for_display();

		$st_about_title 		= $settings['st_about_title'];
		$st_about_description 	= $settings['st_about_description'];
		$st_about_btn_text 		= $settings['st_about_btn_text'];
		$st_about_btn_url 		= $settings['st_about_btn_url'];
		$about_features_list 	= $settings['about_features_list'];


	?>
		<div class="row">
			<div class="col-md-7">
				<div class="about">
					<div class="page-title">
					<h4><?php echo $st_about_title; ?></h4>
					</div>
					<p><?php echo $st_about_description ; ?></p>
					<a href="<?php echo $st_about_btn_url['url']; ?>" class="box-btn"><?php echo $st_about_btn_text; ?><i class="fa fa-angle-double-right"></i></a>
				</div>
			</div>
			<div class="col-md-5">
				<?php 
					foreach($about_features_list as $feature) {
				?>
					<div class="single_about">
						<i class="<?php echo $feature['features_icon']['value'];?>"></i>
						<h4><?php echo $feature['about_features_title'];?></h4>
						<p> <?php echo $feature['about_features_description']; ?></p>
					</div>
				<?php
					}
				?>

			</div>
		</div>
		
	<?php
	}
}
