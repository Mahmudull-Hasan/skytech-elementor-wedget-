<?php
class Skytech_Gallery_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'st_gallery';
	}

	public function get_title() {
		return esc_html__( 'ST Gallery', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'gallery' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'st_gallery_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Image Title' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'st_gallery_main_image',
			[
				'label' => esc_html__( 'Gallery Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'st_gallery_popup_image',
			[
				'label' => esc_html__( 'Popup Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'st_gallery_images',
			[
				'label' => esc_html__( 'Gallery Images', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'st_gallery_title' => esc_html__( 'Image Title 1', 'textdomain' ),
					],
					[
						'st_gallery_title' => esc_html__( 'Image Title 2', 'textdomain' ),
					],
				],
				'title_field' => '{{{ st_gallery_title }}}',
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

		$st_gallery_images = $settings['st_gallery_images'];
	?>
		<div class="row">
			<?php foreach( $st_gallery_images as $st_gallery_image ) {
				?>
					<div class="col-xl-4">
						<div class="single-gallery">
							<img src="<?php echo $st_gallery_image['st_gallery_main_image']['url']?>" alt="">
							<div class="gallery-hover">
								<div class="gallery-content">
									<h3><a href="<?php echo $st_gallery_image['st_gallery_popup_image']['url']?>" class="gallery"><i class="fa fa-plus"></i><?php echo $st_gallery_image['st_gallery_title']?></a></h3>
								</div>
							</div>
						</div>
					</div>
			<?php
				}
			?>
		</div>
		
	<?php
	}
}
