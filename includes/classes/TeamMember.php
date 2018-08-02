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
					'editor'
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
}
