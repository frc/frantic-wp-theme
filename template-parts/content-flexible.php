<?php
/**
 * Content template for loading ACF's Flexible Content templates
 *
 * @link http://www.advancedcustomfields.com/resources/flexible-content/
 *
 * @package _frc
 */

if ( have_rows( 'flexible-content' ) ) :

	while ( have_rows( 'flexible-content' ) ) : the_row();

	/**
	 * General content
	 */
	/*
		if ( get_row_layout() === 'flexible-editor' ) :

			get_template_part( 'acf/flexible', 'editor' );

		endif;
	*/

	/**
	 * Another template
	 */
	/*
		if ( get_row_layout() === 'flexible-template' ) :

			get_template_part( 'acf/flexible', 'template' );

		endif;
	*/

	endwhile;

endif;