<?php
class Skytech_Testimonials_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Skytech Testimonials';
	}

	public function get_title() {
		return esc_html__( 'ST Testimonials', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'testimonials', 'carousel' ];
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
			'st_testi_client_image',
			[
				'label' => esc_html__( 'Client Image', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'st_testi_client_description',
			[
				'label' => esc_html__( 'Description', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam eveniet voluptate sed? Eius error doloremque aspernatur qui minima adipisci corporis.', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Type your description here', 'skytech-widget' ),
			]
		);

		$repeater->add_control(
			'st_testi_client_name',
			[
				'label' => esc_html__( 'Client Name', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Johncina', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Type your client name here', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'st_testi_client_designation',
			[
				'label' => esc_html__( 'Designation', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Wrestler', 'skytech-widget' ),
				'placeholder' => esc_html__( 'Client Designation', 'skytech-widget' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'st_testimonial_client_lists',
			[
				'label' => esc_html__( 'Client List', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'st_testi_client_name' => esc_html__( 'Johncina', 'skytech-widget' ),
						'st_testi_client_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'skytech-widget' ),
					],
					[
						'st_testi_client_name' => esc_html__( 'Rendy Orton', 'skytech-widget' ),
						'st_testi_client_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'skytech-widget' ),
					],
				],
				'title_field' => '{{{ st_testi_client_name }}}',
			]
		);

		$this->end_controls_section();

		//==== Testimonials Settings====
		$this->start_controls_section(
			'st_testimonials_settings',
			[
				'label' 		=> esc_html__( 'Settings', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'st_testimonial_item',
			[
				'label' => esc_html__( 'Item', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 3,
				'step' => 1,
				'default' => 3,
			]
		);

		$this->add_control(
			'st_testimonial_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'st_testimonial_dots',
			[
				'label' => esc_html__( 'Dots', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'st_testimonial_margin',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 500,
				'step' => 1,
				'default' => 30,
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

		$st_testimonial_client_lists = $settings['st_testimonial_client_lists'];
		$st_testimonial_item = $settings['st_testimonial_item'];
		$st_testimonial_autoplay = $settings['st_testimonial_autoplay'];
		$st_testimonial_dots = $settings['st_testimonial_dots'];
		$st_testimonial_margin = $settings['st_testimonial_margin'];

		if ($st_testimonial_autoplay == 'yes') {
			$st_testimonial_autoplay ='yes';
		}else {
			$st_testimonial_autoplay = 'false';
		}

		if ($st_testimonial_dots == 'yes') {
			$st_testimonial_dots ='yes';
		}else {
			$st_testimonial_dots = 'false';
		}
	?>

	<script>

		jQuery(document).ready(function ($) {
			/* Testimonials Itesm Slide
			============================*/
			$(".testimonials").owlCarousel({
				items: <?php echo $st_testimonial_item; ?>,
				autoplay: <?php echo $st_testimonial_autoplay; ?>,
				loop: true,
				margin: <?php echo $st_testimonial_margin; ?>,
				nav: false,
				dots: <?php echo $st_testimonial_dots; ?>,
				center: true,
				responsive: {
					0: {
						items: 1,
					},
					600: {
						items: 3,
					},
					1000: {
						items: 3,
					}
				}
			});
		});

	</script>

	<div class="testimonials owl-carousel">
		<?php 
			foreach($st_testimonial_client_lists as $client_list) {
		?>
			<div class="single-testimonial">
				<div class="testi-img">
					<img src="<?php echo $client_list['st_testi_client_image']['url'];?>" alt="<?php echo $client_list['st_testi_client_image'];?>" />
				</div>
				<p><?php echo $client_list['st_testi_client_description'];?></p>
				<h4><?php echo $client_list['st_testi_client_name'];?> <span><?php echo $client_list['st_testi_client_designation'];?></span></h4>
			</div>
		<?php
			}
		?>
	</div>
	
	<?php
	}
}
