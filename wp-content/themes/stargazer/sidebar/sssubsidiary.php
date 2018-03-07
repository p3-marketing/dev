<?php if ( is_active_sidebar( 'sssubsidiary' ) ) : // If the sidebar has widgets. ?>

	<aside <?php hybrid_attr( 'sidebar', 'sssubsidiary' );?>>

		<?php dynamic_sidebar( 'sssubsidiary' ); // Displays the subsidiary sidebar. ?>

	</aside><!-- #sidebar-sssubsidiary -->

<?php endif; // End widgets check. ?>