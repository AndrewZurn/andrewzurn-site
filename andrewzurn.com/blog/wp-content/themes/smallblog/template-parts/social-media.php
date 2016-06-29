<?php
/**
 * The template used for social media buttons on the footer.
 *
 * @package smallblog
 */

$ods_googplus = array(
    'name' => 'Google Plus',
    'icon' => 'googleplus',
    'url'  => get_theme_mod( 'ods_googleplus_url', '#' ),
);

$ods_pinterest = array(
    'name' => 'Pinterest',
    'icon' => 'pinterest',
    'url'  => get_theme_mod( 'ods_pinterest_url', '#' ),
);

$ods_path = array(
    'name' => 'Path',
    'icon' => 'path',
    'url'  => get_theme_mod( 'ods_path_url', '#' ),
);

$ods_instagram = array(
    'name' => 'Instagram',
    'icon' => 'instagram',
    'url'  => get_theme_mod( 'ods_instagram_url', '#' ),
);

$ods_youtube = array(
    'name' => 'Youtube',
    'icon' => 'youtube',
    'url'  => get_theme_mod( 'ods_youtube_url', '#' ),
);

$ods_xing = array(
    'name' => 'Xing',
    'icon' => 'xing',
    'url'  => get_theme_mod( 'ods_xing_url', '#' ),
);

$ods_facebook = array(
    'name' => 'Facebook',
    'icon' => 'facebook',
    'url'  => get_theme_mod( 'ods_facebook_url', '#' ),
);

$ods_twitter = array(
    'name' => 'Twitter',
    'icon' => 'twitter',
    'url'  => get_theme_mod( 'ods_twitter_url', '#' ),
);

$ods_linkedin = array(
    'name' => 'Linkedin',
    'icon' => 'linkedin',
    'url'  => get_theme_mod( 'ods_linkedin_url', '#' ),
);

$ods_social_media = array( $ods_facebook, $ods_twitter, $ods_googplus, $ods_instagram, $ods_path, $ods_youtube, $ods_xing, $ods_pinterest, $ods_linkedin );
?>
<div class="social-media">
    <?php foreach ( $ods_social_media as $item ) : ?>
        <?php if ( $item[ 'url' ] ) : ?>
            <a href="<?php echo esc_url( $item[ 'url' ] ); ?>" title="<?php echo $item[ 'name' ]; ?>" target="_blank">
                <span class="icon-<?php echo $item[ 'icon' ]; ?>"></span>
                <span class="screen-reader-text"><?php echo $item[ 'name' ]; ?></span>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>
</div>