<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Blog_imageTextCard extends \Elementor\Widget_Base { 
  

  	/**
	 * Get widget name.
	 *
	 * Retrieve Card widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'card';
	}


	/**
	 * Get widget title.
	 *
	 * Retrieve list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'imageText Card', 'custom-elementor-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-call-to-action';
	}


	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'card', 'cta', 'image', 'text' ];
	}



	/**
	 * Register Card widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() { 
		// our control function code goes here.

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'custom-elementor-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'imageTextCard_content',
			[
				'label' => esc_html__( 'Text content', 'custom-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default content', 'custom-elementor-widget' ),
				'placeholder' => esc_html__( 'Type your content here', 'custom-elementor-widget' ),
			]
		);


		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'custom-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->add_control(
			'image_trigger',
			[
				'label' => esc_html__( 'image_trigger', 'custom-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'custom-elementor-widget' ),
				'label_off' => esc_html__( 'Hide', 'custom-elementor-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'flex_direction',
			[
				'label' => esc_html__( 'Image location', 'custom-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'row'  => esc_html__( 'Right', 'custom-elementor-widget' ),
					'row-reverse' => esc_html__( 'Left', 'custom-elementor-widget' ),
				],
			]
		);

		$this->add_control(
			'button_trigger',
			[
				'label' => esc_html__( 'Show Button', 'custom-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'custom-elementor-widget' ),
				'label_off' => esc_html__( 'Hide', 'custom-elementor-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


		$this->add_control(
			'button_label',
			[
				'label' => esc_html__( 'Button label', 'custom-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Click here', 'custom-elementor-widget' ),
				'placeholder' => esc_html__( 'Click here', 'custom-elementor-widget' ),
			]
		);

		$this->add_control(
			'button_href',
			[
				'label' => esc_html__( 'Button link', 'custom-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '', 'custom-elementor-widget' ),
				'placeholder' => esc_html__( '/something or #this', 'custom-elementor-widget' ),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Card widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() { 

		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();

		// get the individual values of the input
		$imageTextCard_content = $settings['imageTextCard_content'];
    $button_trigger = $settings['button_trigger'];
    $button_label = $settings['button_label'];
    $button_href = $settings['button_href'];
    $gallery = $settings['gallery'];
    $image_trigger = $settings['image_trigger'];
    $flex_direction = $settings['flex_direction'];

		?>

			<!-- Start rendering the output -->
			<div class="imageTextCard-container" style="display: flex; flex-direction: <?php echo esc_attr( $flex_direction ); ?>">
				<div class="imageTextCard-Content">
					<?php echo $imageTextCard_content; ?>
					<?php 
						if ('yes' === $button_trigger) {
							echo '<a id="imageCta-primaryButton" class="imageTextCard-Button" href="' . esc_attr( $button_href ) . '">' . esc_attr($button_label) . '</a>';
						}
					?>
					
				</div>
				<?php
					if('yes' === $image_trigger) {
						echo '<div class="imageTextCard-ImageContainer">' ;
					}
				?>
				<?php 
						foreach ( $gallery as $image ) {
							echo '<img class="imageTextCard-Image" src="' . esc_attr( $image['url'] ) . '" >';
						}
					?>
				<?php
					if('yes' === $image_trigger) {
						echo '</div>';
					}
				?>

			</div>
			<!-- End rendering the output -->

		<?php
		

	}						


}