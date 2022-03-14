<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

// Gutenberg custom stylesheet
add_theme_support('editor-styles');
add_editor_style( 'style.css' );
add_editor_style( 'editor-style.css' );

// Add shortcode for reply via mail link
add_shortcode( 'mailto_title', 'mailto_title' );

function mailto_title( $atts ) {
    return esc_attr( get_the_title( get_the_ID() ) );
}

// Add reply link to RSS feed
add_filter( "the_content_feed", "feed_comment_via_email" );

function feed_comment_via_email($content)
{
   $content .= "<p><a href=\"mailto: " . get_the_author_meta('user_email') . "?subject=RE: '" . get_the_title() . "'&body=Post link: " . get_permalink() . "\">Reply via email</a></p>";
   return $content;
}
