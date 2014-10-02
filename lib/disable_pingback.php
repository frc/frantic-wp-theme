<?php
add_filter( 'xmlrpc_methods', function( $methods ) {
	unset( $methods['pingback.ping'] );
	unset( $methods['pingback.extensions.getPingbacks'] );
	return $methods;
} );
?>