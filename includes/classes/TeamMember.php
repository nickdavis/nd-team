<?php
/**
 * Team Member
 *
 * @package     NickDavis\Team
 * @since       0.1.0
 * @author      Nick Davis
 * @link        http://nickdavis.co
 * @license     GNU General Public License 2.0+
 */

namespace NickDavis\Team;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class TeamMember {
	public function register() {
		add_action( 'init', [ $this, 'register_cpt' ], 11 );
	}

	public function register_cpt() {
		register_extended_post_type( 'nd-team',
			[
				'publicly_queryable' => false,
				'supports'           => [
					'title',
					'thumbnail'
				],
				'menu_icon'          => 'dashicons-businessman',
				'labels'             => [
					'menu_name' => 'Team',
				]
			],
			[
				// Overrides the base names used for labels.
				'singular' => 'Team Member',
				'plural'   => 'Team Members',
				'slug'     => 'team',
			]
		);
	}

	public function register_fields() {
		add_action( 'carbon_fields_register_fields', [
			$this,
			'register_details_fields'
		] );
	}

	/**
	 * Registers the expert member Position field with Carbon Fields.
	 *
	 * @see https://carbonfields.net/docs/containers-usage
	 * @see https://carbonfields.net/docs/fields-usage
	 *
	 * @since 0.1.0
	 */
	public function register_details_fields() {
		Container::make( 'post_meta', 'Details' )
		         ->where( 'post_type', '=', 'nd-team' )
		         ->set_context( 'carbon_fields_after_title' )
		         ->add_fields( array(
			         Field::make( 'text', 'nd_team_position', 'Position' )
			              ->set_help_text( 'e.g. Head of Brand' ),
			         Field::make( 'text', 'nd_team_department', 'Department' )
			              ->set_help_text( 'e.g. Marketing' )
		         ) );
	}
}
