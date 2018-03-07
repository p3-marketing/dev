<?php if ( is_active_sidebar( 'ssubsidiary' ) ) : // If the sidebar has widgets. ?>

	<aside <?php hybrid_attr( 'sidebar', 'ssubsidiary' ); ?>>

		<?php dynamic_sidebar( 'ssubsidiary' ); // Displays the subsidiary sidebar. ?>

	</aside><!-- #sidebar-ssubsidiary -->

<?php endif; // End widgets check. ?>