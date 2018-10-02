<?php
/**
 * Template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="search-form js-searchform">
  <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  	<label for="s" class="search__assistive-text">What are you looking for?</label>
  	<input type="text" class="search__field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
  	<input type="submit" class="search__submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( '/ Search', 'twentyeleven' ); ?>" />
  </form>
</div>
