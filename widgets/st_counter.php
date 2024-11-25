<?php
class Skytech_Counter_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'counter';
	}

	public function get_title() {
		return esc_html__( 'ST Counter', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'counter' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Content', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		//===== Select Column ======
		$this->add_control(
			'select_counter_column',
			[
				'label' => esc_html__( 'Select Column', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'column_four',
				'options' => [
					'column_two' 	=> esc_html__( '2 Column', 'textdomain' ),
					'column_three' 	=> esc_html__( '3 Column', 'textdomain' ),
					'column_four'  	=> esc_html__( '4 Column', 'textdomain' ),
				]
			]
		);


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'st_counter_icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				]
			]
		);

		$repeater->add_control(
			'st_counter_number',
			[
				'label' => esc_html__( 'Number', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 9999999,
				'step' => 1,
				'default' => 100,
			]
		);

		$repeater->add_control(
			'st_counter_text',
			[
				'label' => esc_html__( 'Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Happy Clients', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'st_counter_items',
			[
				'label' => esc_html__( 'Counter Items', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'st_counter_text' => esc_html__( 'Happy Clients', 'textdomain' ),
					],
					[
						'st_counter_text' => esc_html__( 'Awords', 'textdomain' ),
					],
				],
				'title_field' => '{{{ st_counter_text }}}',
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
		
		$this->end_controls_section();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();

		$select_counter_column = $settings['select_counter_column'];
		$st_counter_items = $settings['st_counter_items'];

		if($select_counter_column == 'column_two') {
			$select_counter_column = 'col-md-6';
		}elseif ($select_counter_column == 'column_four'){
			$select_counter_column = 'col-md-3';
		}else {
			$select_counter_column = 'col-md-4';
		}
	?>
		<div class="row no-space">
			<?php 
				foreach($st_counter_items as $st_counter_item) {
			?>
				<div class="<?php echo $select_counter_column; ?>">
					<div class="single-counter">
						<h4><i class="<?php echo $st_counter_item['st_counter_icon']['value']; ?>"></i><span class="counter"><?php echo $st_counter_item['st_counter_number'];?></span><?php echo $st_counter_item['st_counter_text'];?></h4>
					</div>
            	</div>
			<?php
				}
			?>
		</div>
		
	<?php
	}
}
