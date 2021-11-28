<?php

/**
 * Generates Meta Boxes
 *
 * @param array $screen
 *
 * @param array $meta_fields
 *
 * @param string $meta_box_title
 *
 * @param string $meta_box_name
 *
 * @param string $textdomain
 *
 * @param string $context
 *
 * @param string $priority
 *
 */

// Meta Box Class: MetaBoxGenerator
// Get the field value: $metavalue = get_post_meta( $post_id, $field_id, true );
abstract class MetaBoxGenerator{
	public function __construct( $screen = array(), $meta_fields = array(), $meta_box_title = '', $meta_box_name =  '', $textdomain = 'textdomain', $context = 'normal', $priority = 'default' ) {
    $this->screen         = $screen;
    $this->meta_fields    = $meta_fields;
    $this->meta_box_title = $meta_box_title;
    $this->meta_box_name  = $meta_box_name;
    $this->textdomain     = $textdomain;
    $this->context        = $context;
    $this->priority       = $priority;

		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}

	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				$this->meta_box_title,
				__( $this->meta_box_name, $this->textdomain ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				$this->context,
				$this->priority
			);
		}
	}

	public function meta_box_callback( $post ) {
		wp_nonce_field( '{$this->meta_box_name}_data', '{$this->meta_box_name}_nonce' );
		$this->field_generator( $post );
	}

	private function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				if ( isset( $meta_field['default'] ) ) {
					$meta_value = $meta_field['default'];
				}
			}
			switch ( $meta_field['type'] ) {
                                case 'checkbox':
                                    $input = sprintf(
                                        '<input %s id=" %s" name="%s" type="checkbox" value="1">',
                                        $meta_value === '1' ? 'checked' : '',
                                        $meta_field['id'],
                                        $meta_field['id']
                                        );
                                    break;

                                case 'textarea':
                                    $input = sprintf(
                                        '<textarea class="textarea-field" style="" id="%s" name="%s" rows="5">%s</textarea>',
                                        $meta_field['id'],
                                        $meta_field['id'],
                                        $meta_value
                                    );
                                    break;

                                case 'media':
                                    $meta_field['returnvalue'] = isset( $meta_field['returnvalue'] ) ? $meta_field['returnvalue'] : 'url';
                                    $meta_url = '';
                                        if ($meta_value) {
                                            if ($meta_field['returnvalue'] == 'url') {
                                                $meta_url = $meta_value;
                                            } else {
                                                $meta_url = wp_get_attachment_url($meta_value);
                                            }
                                        }
                                    $input = sprintf(
                                        '<input style="display:none;" id="%s" name="%s" type="text" value="%s"  data-return="%s"><div id="preview%s" style="margin-right:10px;border:1px solid #e2e4e7;background-color:#fafafa;display:inline-block;width: 100px;height:100px;background-image:url(%s);background-size:cover;background-repeat:no-repeat;background-position:center;"></div><input style="width: 19%%;margin-right:5px;" class="button new-media" id="%s_button" name="%s_button" type="button" value="Select" /><input style="width: 19%%;" class="button remove-media" id="%s_buttonremove" name="%s_buttonremove" type="button" value="Clear" />',
                                        $meta_field['id'],
                                        $meta_field['id'],
                                        $meta_value,
                                        $meta_field['returnvalue'],
                                        $meta_field['id'],
                                        $meta_url,
                                        $meta_field['id'],
                                        $meta_field['id'],
                                        $meta_field['id'],
                                        $meta_field['id']
                                    );
                                    break;


				default:
                                    $input = sprintf(
                                        '<input %s id="%s" name="%s" type="%s" value="%s">',
                                        $meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
                                        $meta_field['id'],
                                        $meta_field['id'],
                                        $meta_field['type'],
                                        $meta_value
                                    );
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	private function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}

	private function save_fields( $post_id ) {
		if ( ! isset( $_POST['{$meta_box_name}_nonce'] ) )
			return $post_id;
		$nonce = $_POST['{$meta_box_name}_nonce'];
		if ( !wp_verify_nonce( $nonce, '{$meta_box_name}_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}
