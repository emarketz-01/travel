<?php 
class packageinformationMetabox {
	private $screen = array(
		'package',
	);
	private $meta_fields = array(
		array(
			'label' => 'Package Short Description',
			'id' => 'packageshortdes_45445',
			'type' => 'textarea',
		),
		/* array(
			'label' => 'Package Days and Nights',
			'id' => 'daynight_54321',
			'type' => 'text',
		), */
		array(
			'label' => 'Base Price INR',
			'id' => 'baseprice_89413',
			'type' => 'number',
		),
		array(
			'label' => 'Sales Price INR',
			'id' => 'offerprice_27518',
			'type' => 'number',
		),
		array(
			'label' => 'Offer Percentage (%)',
			'id' => 'offerpercentage_12345',
			'type' => 'number',
		),
		array(
			'label' => 'City',
			'id' => 'city_29191',
			'type' => 'text',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'packageinformation',
				__( 'Package Information', 'Package Information' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'advanced',
				'high'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'packageinformation_data', 'packageinformation_nonce' );
		echo 'Enter Here Package Information';
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'textarea':
					$input = sprintf(
						'<textarea style="width: 100%%" id="%s" name="%s" rows="5">%s</textarea>',
						$meta_field['id'],
						$meta_field['id'],
						$meta_value
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
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['packageinformation_nonce'] ) )
			return $post_id;
		$nonce = $_POST['packageinformation_nonce'];
		if ( !wp_verify_nonce( $nonce, 'packageinformation_data' ) )
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
if (class_exists('packageinformationMetabox')) {
	new packageinformationMetabox;
};

/*------- Package Day Night Metabox  -------*/
class packagedurationMetabox {
	private $screen = array(
		'package',
	);
	private $meta_fields = array(
		array(
			'label' => 'Days',
			'id' => 'days_24335',
			'type' => 'number',
		),
		array(
			'label' => 'Nights',
			'id' => 'nights_89476',
			'type' => 'number',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'packageduration',
				__( 'Package Duration in Days and Night Number', 'Package Duration ' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'packageduration_data', 'packageduration_nonce' );
		echo 'Package Duration';
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
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
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['packageduration_nonce'] ) )
			return $post_id;
		$nonce = $_POST['packageduration_nonce'];
		if ( !wp_verify_nonce( $nonce, 'packageduration_data' ) )
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
if (class_exists('packagedurationMetabox')) {
	new packagedurationMetabox;
};
/*------- Package Includes  -------*/
class packageexcludesandinMetabox {
	private $screen = array(
		'package',
	);
	private $meta_fields = array(
		array(
			'label' => 'Package Excludes',
			'id' => 'packageexcludes_33793',
			'type' => 'wysiwyg',
		),
		array(
			'label' => 'Package  Includes',
			'id' => 'packageincludes_56167',
			'type' => 'wysiwyg',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'packageexcludesandin',
				__( 'Package Excludes and  Includes', 'Package Excludes and  Includes' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'low'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'packageexcludesandin_data', 'packageexcludesandin_nonce' );
		echo 'Package Excludes and  Includes Description';
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'wysiwyg':
					ob_start();
					wp_editor($meta_value, $meta_field['id']);
					$input = ob_get_contents();
					ob_end_clean();
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
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['packageexcludesandin_nonce'] ) )
			return $post_id;
		$nonce = $_POST['packageexcludesandin_nonce'];
		if ( !wp_verify_nonce( $nonce, 'packageexcludesandin_data' ) )
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
if (class_exists('packageexcludesandinMetabox')) {
	new packageexcludesandinMetabox;
};


/*-------- Hotel ---*/
class hotelMetabox {
	private $screen = array(
		'package',
	);
	private $meta_fields = array(
		array(
			'label' => 'Hotel Name',
			'id' => 'hotelname_73146',
			'type' => 'text',
		),
		array(
			'label' => 'Hotel Short Description',
			'id' => 'hotelshortdescr_36979',
			'type' => 'textarea',
		),
		array(
			'label' => 'Hotel Content',
			'id' => 'hotelcontent_16111',
			'type' => 'wysiwyg',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'hotel',
				__( 'Hotel', 'Hotel' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'low'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'hotel_data', 'hotel_nonce' );
		echo 'Add Hotel Details';
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'textarea':
					$input = sprintf(
						'<textarea style="width: 100%%" id="%s" name="%s" rows="5">%s</textarea>',
						$meta_field['id'],
						$meta_field['id'],
						$meta_value
					);
					break;
				case 'wysiwyg':
					ob_start();
					wp_editor($meta_value, $meta_field['id']);
					$input = ob_get_contents();
					ob_end_clean();
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
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['hotel_nonce'] ) )
			return $post_id;
		$nonce = $_POST['hotel_nonce'];
		if ( !wp_verify_nonce( $nonce, 'hotel_data' ) )
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
if (class_exists('hotelMetabox')) {
	new hotelMetabox;
};

/*---set as featured image---*/
class featuredpackageMetabox {
	private $screen = array(
		'package',
	);
	private $meta_fields = array(
		array(
			'label' => 'Featured Package',
			'id' => 'featuredpackage_91178',
			'type' => 'checkbox',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'featuredpackage',
				__( 'Featured Package', 'Set as Feature Package' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'side',
				'high'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'featuredpackage_data', 'featuredpackage_nonce' );
		echo 'Set as Feature Package';
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'checkbox':
					$input = sprintf(
						'<input %s id=" % s" name="% s" type="checkbox" value="1">',
						$meta_value === '1' ? 'checked' : '',
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
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['featuredpackage_nonce'] ) )
			return $post_id;
		$nonce = $_POST['featuredpackage_nonce'];
		if ( !wp_verify_nonce( $nonce, 'featuredpackage_data' ) )
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
if (class_exists('featuredpackageMetabox')) {
	new featuredpackageMetabox;
};

/*------Hotel Image --*/
class hotelimageMetabox {
	private $screen = array(
		'package',
	);
	private $meta_fields = array(
		array(
			'label' => 'Hotel Image',
			'id' => 'hotelimage_93186',
			'type' => 'media',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'hotelimage',
				__( 'Hotel Image', 'Hotel Image' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'hotelimage_data', 'hotelimage_nonce' );
		echo 'Hotel Image';
		$this->field_generator( $post );
	}
	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.hotelimage-media').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id').replace('_button', '');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('input#'+id).val(attachment.url);
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
				}
			});
		</script><?php
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'media':
					$input = sprintf(
						'<input style="width: 80%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button hotelimage-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
						$meta_field['id'],
						$meta_field['id'],
						$meta_value,
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
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['hotelimage_nonce'] ) )
			return $post_id;
		$nonce = $_POST['hotelimage_nonce'];
		if ( !wp_verify_nonce( $nonce, 'hotelimage_data' ) )
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
if (class_exists('hotelimageMetabox')) {
	new hotelimageMetabox;
};

/*Events Metabox---*/
class eventsdateMetabox {
	private $screen = array(
		'event',
	);
	private $meta_fields = array(
		array(
			'label' => 'Event Date',
			'id' => 'eventdate_51318',
			'type' => 'date',
		),
		array(
			'label' => 'Event Time Hours',
			'id' => 'eventtimehours_97146',
			'type' => 'select',
			'options' => array(
				'1',
				'2',
				'3',
				'4',
				'5',
				'6',
				'7',
				'8',
				'9',
				'10',
				'11',
				'12',
			),
		),
		array(
			'label' => 'Event Time Minutes',
			'id' => 'eventtimeminute_67351',
			'type' => 'select',
			'options' => array(
				'1',
				'2',
				'3',
				'4',
				'5',
				'6',
				'7',
				'8',
				'9',
				'10',
				'11',
				'12',
				'13',
				'14',
				'15',
				'16',
				'17',
				'18',
				'19',
				'20',
				'21',
				'22',
				'23',
				'24',
				'25',
				'26',
				'27',
				'28',
				'29',
				'30',
				'31',
				'32',
				'33',
				'34',
				'35',
				'36',
				'37',
				'38',
				'39',
				'40',
				'41',
				'42',
				'43',
				'44',
				'45',
				'46',
				'47',
				'48',
				'49',
				'50',
				'51',
				'52',
				'53',
				'54',
				'55',
				'56',
				'57',
				'58',
				'59',
				'60',
			),
		),
		array(
			'label' => 'Event Day/Night',
			'id' => 'eventdaynight_86922',
			'type' => 'radio',
			'options' => array(
				'AM',
				'PM',
			),
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'eventsdate',
				__( 'Events Date', 'Event Date' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'eventsdate_data', 'eventsdate_nonce' );
		echo 'Event Date';
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'radio':
					$input = '<fieldset>';
					$input .= '<legend class="screen-reader-text">' . $meta_field['label'] . '</legend>';
					$i = 0;
					foreach ( $meta_field['options'] as $key => $value ) {
						$meta_field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<label><input %s id=" % s" name="% s" type="radio" value="% s"> %s</label>%s',
							$meta_value === $meta_field_value ? 'checked' : '',
							$meta_field['id'],
							$meta_field['id'],
							$meta_field_value,
							$value,
							$i < count( $meta_field['options'] ) - 1 ? '<br>' : ''
						);
						$i++;
					}
					$input .= '</fieldset>';
					break;
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$meta_field['id'],
						$meta_field['id']
					);
					foreach ( $meta_field['options'] as $key => $value ) {
						$meta_field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$meta_value === $meta_field_value ? 'selected' : '',
							$meta_field_value,
							$value
						);
					}
					$input .= '</select>';
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
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['eventsdate_nonce'] ) )
			return $post_id;
		$nonce = $_POST['eventsdate_nonce'];
		if ( !wp_verify_nonce( $nonce, 'eventsdate_data' ) )
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
if (class_exists('eventsdateMetabox')) {
	new eventsdateMetabox;
};

/*--Treking Metaboxs--*/
class trekkinginformationMetabox {
	private $screen = array(
		'trekking',
	);
	private $meta_fields = array(
		array(
			'label' => 'Trekking Days Number',
			'id' => 'trekkingdaysnum_68368',
			'type' => 'number',
		),
		array(
			'label' => 'Starting Price Per Person',
			'id' => 'startingpricepe_33466',
			'type' => 'text',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'trekkinginformation',
				__( 'Trekking Information', 'Trekking Information' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'trekkinginformation_data', 'trekkinginformation_nonce' );
		echo 'Trekking Information';
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
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
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['trekkinginformation_nonce'] ) )
			return $post_id;
		$nonce = $_POST['trekkinginformation_nonce'];
		if ( !wp_verify_nonce( $nonce, 'trekkinginformation_data' ) )
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
if (class_exists('trekkinginformationMetabox')) {
	new trekkinginformationMetabox;
};/*package Facilities Metabox*/class packagefacilitiesMetabox {	private $screen = array(		'package',	);	private $meta_fields = array(		array(			'label' => 'Hotel',			'id' => 'hotel_47518',			'type' => 'select',			'options' => array(				'Active',				'Deactive',			),		),		array(			'label' => 'Flight',			'id' => 'flight_37595',			'type' => 'select',			'options' => array(				'Active',				'Deactive',			),		),		array(			'label' => 'Meals',			'id' => 'meals_54177',			'type' => 'select',			'options' => array(				'Active',				'Deactive',			),		),		array(			'label' => 'Sightseeing',			'id' => 'sightseeing_38273',			'type' => 'select',			'options' => array(				'Active',				'Deactive',			),		),		array(			'label' => 'Car',			'id' => 'car_11313',			'type' => 'select',			'options' => array(				'Active',				'Deactive',			),		),	);	public function __construct() {		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );		add_action( 'save_post', array( $this, 'save_fields' ) );	}	public function add_meta_boxes() {		foreach ( $this->screen as $single_screen ) {			add_meta_box(				'packagefacilities',				__( 'Package Facilities', 'Package Facilities' ),				array( $this, 'meta_box_callback' ),				$single_screen,				'normal',				'default'			);		}	}	public function meta_box_callback( $post ) {		wp_nonce_field( 'packagefacilities_data', 'packagefacilities_nonce' );		echo 'Select Package Facilities (Activate/Deactivate)';		$this->field_generator( $post );	}	public function field_generator( $post ) {		$output = '';		foreach ( $this->meta_fields as $meta_field ) {			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );			if ( empty( $meta_value ) ) {				$meta_value = $meta_field['default']; }			switch ( $meta_field['type'] ) {				case 'select':					$input = sprintf(						'<select id="%s" name="%s">',						$meta_field['id'],						$meta_field['id']					);					foreach ( $meta_field['options'] as $key => $value ) {						$meta_field_value = !is_numeric( $key ) ? $key : $value;						$input .= sprintf(							'<option %s value="%s">%s</option>',							$meta_value === $meta_field_value ? 'selected' : '',							$meta_field_value,							$value						);					}					$input .= '</select>';					break;				default:					$input = sprintf(						'<input %s id="%s" name="%s" type="%s" value="%s">',						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',						$meta_field['id'],						$meta_field['id'],						$meta_field['type'],						$meta_value					);			}			$output .= $this->format_rows( $label, $input );		}		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';	}	public function format_rows( $label, $input ) {		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';	}	public function save_fields( $post_id ) {		if ( ! isset( $_POST['packagefacilities_nonce'] ) )			return $post_id;		$nonce = $_POST['packagefacilities_nonce'];		if ( !wp_verify_nonce( $nonce, 'packagefacilities_data' ) )			return $post_id;		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )			return $post_id;		foreach ( $this->meta_fields as $meta_field ) {			if ( isset( $_POST[ $meta_field['id'] ] ) ) {				switch ( $meta_field['type'] ) {					case 'email':						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );						break;					case 'text':						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );						break;				}				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );			} else if ( $meta_field['type'] === 'checkbox' ) {				update_post_meta( $post_id, $meta_field['id'], '0' );			}		}	}}if (class_exists('packagefacilitiesMetabox')) {	new packagefacilitiesMetabox;};
?>