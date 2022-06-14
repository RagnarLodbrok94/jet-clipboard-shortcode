<div class="jet-clipboard" data-jet-clipboard="<?php echo $atts['copy_text'] ?>">
	<?php if ( $atts['icon'] === '1' ): ?>
		<i class="jet-listing-dynamic-field__icon jet-clipboard-icon dashicons dashicons-admin-page" aria-hidden="true"></i>
	<?php endif; ?>
	<span class="jet-clipboard-content">
		<?php echo $atts['label'] ?>
	</span>
</div>