<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

 $uber_url = esc_url( get_permalink( get_page_by_path( 'uber' ) ) );

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer class="iledysile-footer" role="contentinfo">
		<div class="footer__navigation">
			<span class="footer__trademark">
				ÎLE D'YSILE
			</span>
			<nav class="footer__links">
				<ul class="footer__links-list">
					<li class="menu-item">
						<a href="/privacy" class="menu-item__link">
							<span class="menu-item__link-text">DATENSCHUTZ</span>
						</a>
					</li>
					<li class="menu-item">
						<a href="/terms" class="menu-item__link">
							<span class="menu-item__link-text">AGB</span>
						</a>
					</li> 
					<li class="menu-item">
						<a href="<?php echo $uber_url; ?>" class="menu-item__link">
							<span class="menu-item__link-text">ÜBER</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</footer>

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
