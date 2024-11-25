<?php
class Skytech_Slider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Slider';
	}

	public function get_title() {
		return esc_html__( 'ST Slider', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Slider', 'carousel' ];
	}

    //Slider Content Section 
    protected function register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Slider Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'st_slider_image',
			[
				'label' => esc_html__( 'Choose Image', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'st_slider_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Sub title' , 'skytech-widget' ),
				'label_block' => true,
                'show_label' => false,
			]
		);

		$repeater->add_control(
			'st_slider_title',
			[
				'label' => esc_html__( 'Title', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Title' , 'skytech-widget' ),
				'show_label' => false,
                'label_block' => true,
			]
		);

		$repeater->add_control(
			'st_slider_description',
			[
				'label' => esc_html__( 'Description', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Description' , 'skytech-widget' ),
				'show_label' => false,
			]
		);

        $repeater->add_control(
			'st_slider_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Us' , 'skytech-widget' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'st_slider_btn_url',
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

		$this->add_control(
			'sliders',
			[
				'label' => esc_html__( 'Slider List', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'st_slider_subtitle' => esc_html__( 'Subtitle 1', 'skytech-widget' ),
						'st_slider_title' => esc_html__( 'Title 1', 'skytech-widget' ),
						'st_slider_description' => esc_html__( 'Description 1', 'skytech-widget' ),
						'st_slider_btn_text' => esc_html__( 'Contact Us', 'skytech-widget' ),
					],
					[
						'st_slider_subtitle' => esc_html__( 'Subtitle 2', 'skytech-widget' ),
						'st_slider_title' => esc_html__( 'Title 2', 'skytech-widget' ),
						'st_slider_description' => esc_html__( 'Description One 2', 'skytech-widget' ),
						'st_slider_btn_text' => esc_html__( 'Get in touch', 'skytech-widget' ),
					],
				],
				'title_field' => '{{{ st_slider_title }}}',
			]
		);

        $this->end_controls_section();

		// Slider settings start
		//========================
		$this->start_controls_section(
			'slider_setting_section',
			[
				'label' 		=> esc_html__( 'Slider Settings', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slide_item',
			[
				'label' => esc_html__( 'Item', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 4,
				'step' => 1,
				'default' => 1,
			]
		);

		$this->add_control(
			'slide_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'skytech-widget' ),
				'label_off' => esc_html__( 'No', 'skytech-widget' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->end_controls_section();
		//========================
		// Slider settings end
		
		//<========Style tab section start=======>
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'skytech-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// <===========Subtitle Typography Start ============>
		$this->add_control(
			'slider_sub_title_style',
			[
				'label' => esc_html__( 'Subtitle', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_slider_subtitle_typography',
				'selector' => '{{WRAPPER}} .slide-table h4',
			]
		);	

		$this->add_control(
			'slider_sub_title_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-table h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'slider_sub_title_border_color',
			[
				'label' => esc_html__( 'Border Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-table h4:before' => 'background-color: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);
		//<============== Subtitle Typography End ===========>


		// <===========Title Typography Start ============>
		$this->add_control(
			'slider_title_style',
			[
				'label' => esc_html__( 'Title', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_slider_title_typography',
				'selector' => '{{WRAPPER}} .slide-table h2',
			]
		);	

		$this->add_control(
			'slider_title_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-table h2' => 'color: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);
		//<============== Title Typography End ===========>


		// <===========Description Typography Start ============>
		$this->add_control(
			'slider_description_style',
			[
				'label' => esc_html__( 'Description', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_slider_description_typography',
				'selector' => '{{WRAPPER}} .slide-table p',
			]
		);	

		$this->add_control(
			'slider_description_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-table h2' => 'color: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);
		//<============== Description Typography End ===========>



		// <===========Button Typography Start ============>
		$this->add_control(
			'slider_button_style',
			[
				'label' => esc_html__( 'Button', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'st_slider_btn_typography',
				'selector' => '{{WRAPPER}} .slide-table p',
			]
		);	

		$this->add_control(
			'slider_button_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-table a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'slider_button_bg_color',
			[
				'label' => esc_html__( 'Background', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-table a' => 'background-color: {{VALUE}}',
				],
				'default'  => '#635CDB',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .slide-table a',
				
			]
		);
		//<============== Button Typography End ===========>


		// <===========Slider bullet Start ============>

		$this->add_control(
			'slider_pagination_style',
			[
				'label' => esc_html__( 'Pagination', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->add_control(

			'slider_bullet_color',
			[
				'label' => esc_html__( 'Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider .owl-dots div' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'slider_bullet_active_color',
			[
				'label' => esc_html__( 'Active Color', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider .owl-dots div.active' => 'background-color: {{VALUE}}',
				],
			]
		);

		// <===========Slider bullet end ============>

		$this->end_controls_section();
		//<========Style tab section end=======>
    }



    protected function render() {
		$settings = $this->get_settings_for_display();
		$sliders = $settings['sliders']; 
		$slide_item = $settings['slide_item']; 
		$slide_autoplay = $settings['slide_autoplay'];
		if ($slide_autoplay == 'true') {
			$slide_autoplay = 'true';
		}else {
			$slide_autoplay = 'false';
		}
	?>
    
		<script>
			jQuery(document).ready(function ($) {
				/* Slider Item Slide
				============================*/
				$(".slider").owlCarousel({
					items: <?php echo $slide_item;?>,
					autoplay: <?php echo $slide_autoplay; ?>,
					loop: true,
					nav: false,
					dots: true,
					smartSpeed: 500
				});

			});
		</script>

		<!-- Slider Area Start -->
        <div class="slider owl-carousel">

            <?php
                foreach($sliders as $slider) {
            ?>
				<div class="single-slide" style="background-image:url('<?php echo $slider['st_slider_image'] ['url'] ?>">
					<div class="container">
						<div class="row">
							<div class="col-xl-12">
								<div class="slide-table">
								<div class="slide-tablecell">
									<h4><?php echo $slider['st_slider_subtitle'] ?></h4>
									<h2><?php echo $slider['st_slider_title'] ?></h2>
									<p><?php echo $slider['st_slider_description'] ?></p>
									<a href="<?php echo $slider['st_slider_btn_url']['url'] ?>" class="box-btn"><?php echo $slider['st_slider_btn_text'] ?> <i class="fa fa-angle-double-right"></i></a>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            <?php
                }
            ?>
        </div>
      <!-- Slider Area End -->
		
	<?php
	}

}