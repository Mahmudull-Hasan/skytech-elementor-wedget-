<?php
class Skytech_Blog_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Skytech Blog';
	}

	public function get_title() {
		return esc_html__( 'ST Blog', 'skytech-widget' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'skytech-widget-category' ];
	}

	public function get_keywords() {
		return [ 'blog', 'post' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' 		=> esc_html__( 'Column', 'skytech-widget' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		//===== Select Column ======
		$this->add_control(
			'select_blog_column',
			[
				'label' => esc_html__( 'Select Column', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'column_three',
				'options' => [
					'column_two' 	=> esc_html__( '2 Column', 'skytech-widget' ),
					'column_three' 	=> esc_html__( '3 Column', 'skytech-widget' ),
					'column_four'  	=> esc_html__( '4 Column', 'skytech-widget' ),
				]
			]
		);

		//===== Select order ======
		$this->add_control(
			'select_blog_order',
			[
				'label' => esc_html__( 'Order', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' 	=> esc_html__( 'DESC', 'skytech-widget' ),
					'ASC' 	=> esc_html__( 'ASC', 'skytech-widget' ),
				]
			]
		);

		//===== Select order ======
		$this->add_control(
			'select_blog_orderby',
			[
				'label' => esc_html__( 'Orderby', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'title',
				'options' => [
					'name' 		=> esc_html__( 'Name', 'skytech-widget' ),
					'author' 	=> esc_html__( 'Author', 'skytech-widget' ),
					'title' 	=> esc_html__( 'Title', 'skytech-widget' ),
					'date' 		=> esc_html__( 'Date', 'skytech-widget' ),
					'rand' 		=> esc_html__( 'Random', 'skytech-widget' ),
				]
			]
		);

		//===== Blog per page ======
		$this->add_control(
			'st_blog_per_page',
			[
				'label' => esc_html__( 'Blog per page', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'st_post_date_show',
			[
				'label' => esc_html__( 'Show Date?', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'skytech-widget' ),
				'label_off' => esc_html__( 'Hide', 'skytech-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'st_post_author_show',
			[
				'label' => esc_html__( 'Show Author?', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'skytech-widget' ),
				'label_off' => esc_html__( 'Hide', 'skytech-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'st_post_excerpt_show',
			[
				'label' => esc_html__( 'Show Excerpt?', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'skytech-widget' ),
				'label_off' => esc_html__( 'Hide', 'skytech-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'st_post_btn_show',
			[
				'label' => esc_html__( 'Show Button?', 'skytech-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'skytech-widget' ),
				'label_off' => esc_html__( 'Hide', 'skytech-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
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

		$select_blog_column = $settings['select_blog_column'];
		$st_blog_per_page = $settings['st_blog_per_page'];
		$select_blog_order = $settings['select_blog_order'];
		$select_blog_orderby = $settings['select_blog_orderby'];

		$st_post_date_show = $settings['st_post_date_show'];
		$st_post_author_show = $settings['st_post_author_show'];
		$st_post_excerpt_show = $settings['st_post_excerpt_show'];
		$st_post_btn_show = $settings['st_post_btn_show'];

		if($select_blog_column == 'column_two') {
			$select_blog_column = 'col-lg-6';
		}elseif ($select_blog_column == 'column_four'){
			$select_blog_column = 'col-lg-3';
		}else {
			$select_blog_column = 'col-lg-4';
		}

	?>
		<div class="row">
			<?php
				$args = [
					'post_type' => 'post',
					'posts_per_page' => $st_blog_per_page,
					'order' => $select_blog_order,
					'orderby' => $select_blog_orderby,
				];

				$query = new WP_Query($args);
				while($query->have_posts()) {
					$query->the_post();
				?>
					<div class="<?php echo $select_blog_column;?>">
						<div class="single-blog">
							<img src="<?php the_post_thumbnail_url(); ?> " alt="">
							<div class="post-content">
							<div class="post-title">
								<h4><a href="<?php the_permalink(  ); ?>"><?php the_title(); ?></a></h4>
							</div>
							<div class="pots-meta">
								<ul>
									<?php 
										if($st_post_date_show == 'yes') {
									?>
										<li><?php the_date(); ?></li>
									<?php
										}
									?>

									<?php 
										if($st_post_author_show == 'yes') {
									?>
										<li><?php the_author();?></li>
									<?php
										}
									?>
									
									
								</ul>
							</div>

								<?php 
									if($st_post_excerpt_show == 'yes') {
								?>
									<p><?php the_excerpt(); ?> </p>
								<?php
									}
								?>

								<?php 
									if($st_post_btn_show == 'yes') {
								?>
									<a href="<?php the_permalink();?>" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
									
								<?php
									}
								?>
								
							</div>
						</div>
					</div>
				<?php
				}
				wp_reset_postdata(  );
			?>

        </div>
		
	<?php
	}
}
