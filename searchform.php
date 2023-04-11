<?php
/**
 * Template for displaying the standard search forms
 *
 * @package trex
 * @since trex 1.0
 * @version 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text">Search for:</span>
        <input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:" />
    </label>
    <input type="submit" class="search-submit" value="Search" />
</form>