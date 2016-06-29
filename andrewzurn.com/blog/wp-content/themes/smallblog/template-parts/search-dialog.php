<?php
/**
 * The template used for search dialog.
 *
 * @package smallblog
 */
?>

<div id="search-dialog" class="search-dialog">
    <div class="cont">
        <div class="form">
            <div class="fieldset">
                <span class="search-dialog-title"><?php _e( 'Search Anything', 'smallblog' ) ?></span>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
    <a class="cl" href="#" title="<?php _e( 'Close', 'smallblog' ); ?>">
        <span class="icon-close"></span>
        <span class="screen-reader-text"><?php _e( 'Close', 'smallblog' ); ?></span>
    </a>
</div>
