<?php
/**
 * Ads widget.
 *
 * @package    greatwall_pro
 * @author     HappyThemes
 * @copyright  Copyright (c) 2017, HappyThemes
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

class greatwall_pro_Home_Featured_Content_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget_home_featured_content',
			'description' => esc_html__( 'Display featured content on homepage.', 'greatwall-pro' ),
			'customize_selective_refresh' => true
		);

		// Create the widget.
		parent::__construct(
			'happythemes-home-featured-content',                    // $this->id_base
			esc_html__( 'Home - Featured Content', 'greatwall-pro' ), // $this->name
			$widget_options                                         // $this->widget_options
		);

		$this->alt_option_name = 'widget_home_featured_content';

	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		// Set up default value
		$title       = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$description = ( ! empty( $instance['description'] ) ) ? $instance['description'] : '';
		$button_one_text     = ( ! empty( $instance['button_one_text'] ) ) ? $instance['button_one_text'] : '';
		$button_one_link     = ( ! empty( $instance['button_one_link'] ) ) ? $instance['button_one_link'] : '';
		$button_two_text     = ( ! empty( $instance['button_two_text'] ) ) ? $instance['button_two_text'] : '';
		$button_two_link     = ( ! empty( $instance['button_two_link'] ) ) ? $instance['button_two_link'] : '';

		// Output the theme's $before_widget wrapper.
		echo $args['before_widget'];

		echo '<div class="featured-content">';

		echo '<div class="content-wrap">';

		// If the title not empty, display it.
		if ( $title ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
		}
		
		// Display the description.
		if ( $description ) {
			echo '<div class="desc">' . $description . '</div>';
		}

		// Display the description.
		if ( $button_one_text || $button_two_text) { 

			echo '<div class="button-wrap">';

			if ( $button_one_text && $button_one_link ) {
				echo '<div class="button-one button-orange"><a href="'. $button_one_link .'">' . $button_one_text . '</a></div>';
			} else {
				echo '<div class="button-one button-orange">' . $button_one_text . '</div>';
			}

			if ( $button_two_text && $button_two_link ) {
				echo '<div class="button-two button-green"><a href="'. $button_two_link .'">' . $button_two_text . '</a></div>';
			} else {
				echo '<div class="button-two button-green">' . $button_two_text . '</div>';

			}

			echo '</div><!-- .button-wrap -->';

		}

		echo '</div><!-- .content-wrap -->';

		echo '</div><!-- .featured-content -->';
		// Close the theme's widget wrapper.
		echo $args['after_widget'];

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	public function update( $new_instance, $old_instance ) {
		$instance            = $old_instance;
		$instance['title']   = sanitize_text_field( $new_instance['title'] );

		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['description'] = $new_instance['description'];
		} else {
			$instance['description'] = wp_kses_post( $new_instance['description'] );
		}

		$instance['button_one_text']   = sanitize_text_field( $new_instance['button_one_text'] );

		$instance['button_one_link']   = sanitize_text_field( $new_instance['button_one_link'] );

		$instance['button_two_text']   = sanitize_text_field( $new_instance['button_two_text'] );

		$instance['button_two_link']   = sanitize_text_field( $new_instance['button_two_link'] );

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	public function form( $instance ) {
		$title   = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$description = isset( $instance['description'] ) ? esc_textarea( $instance['description'] ) : '';
		$button_one_text   = isset( $instance['button_one_text'] ) ? esc_attr( $instance['button_one_text'] ) : '';
		$button_one_link   = isset( $instance['button_one_link'] ) ? esc_attr( $instance['button_one_link'] ) : '';
		$button_two_text   = isset( $instance['button_two_text'] ) ? esc_attr( $instance['button_two_text'] ) : '';
		$button_two_link   = isset( $instance['button_two_link'] ) ? esc_attr( $instance['button_two_link'] ) : '';	
	?>	

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php esc_html_e( 'Title', 'greatwall-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>">
				<?php esc_html_e( 'Description', 'greatwall-pro' ); ?>
			</label>
			<textarea class="widefat" name="<?php echo $this->get_field_name( 'description' ); ?>" id="<?php echo $this->get_field_id( 'description' ); ?>" cols="30" rows="6"><?php echo $description; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_one_text' ); ?>">
				<?php esc_html_e( 'Button One Text', 'greatwall-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_one_text' ); ?>" name="<?php echo $this->get_field_name( 'button_one_text' ); ?>" value="<?php echo $button_one_text; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_one_link' ); ?>">
				<?php esc_html_e( 'Button One Link', 'greatwall-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_one_link' ); ?>" name="<?php echo $this->get_field_name( 'button_one_link' ); ?>" value="<?php echo $button_one_link; ?>" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'button_two_text' ); ?>">
				<?php esc_html_e( 'Button Two Text', 'greatwall-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_two_text' ); ?>" name="<?php echo $this->get_field_name( 'button_two_text' ); ?>" value="<?php echo $button_two_text; ?>" />
		</p>	

		<p>
			<label for="<?php echo $this->get_field_id( 'button_two_link' ); ?>">
				<?php esc_html_e( 'Button Two Link', 'greatwall-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_two_link' ); ?>" name="<?php echo $this->get_field_name( 'button_two_link' ); ?>" value="<?php echo $button_two_link; ?>" />
		</p>								

	<?php

	}

}