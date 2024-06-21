<?php
/**
 * Plugin main file.
 * @package   KaliLinuxCode\Hide Comments Section
 * @copyright 2024 KaliLinuxCode
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @link      KaliLinuxCode.Com
 * @wordpress-plugin
 * Plugin Name:       Hide Comments Section By KaliLinuxCode
 * Plugin URI:        KaliLinuxCode.Com
 * Description:       Hide Comments Section plugin will restrict unauthenticated users to comments on the site
 * Version:           1
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            KaliLinuxCode
 * License:           Apache License 2.0
 * License URI:       https://www.apache.org/licenses/LICENSE-2.0
*/

// Hook to hide comments section
function hide_comments_section() {
    if ( is_single() ) {
        // Add custom CSS to hide comments section
        echo '<style>
        .comments-area, #comments, .comment-list, #respond {
            display: none !important;
        }
        </style>';
    }
}
add_action('wp_head', 'hide_comments_section');

// Disable comments and pings
function disable_comments_and_pings( $open, $post_id ) {
    return false;
}
add_filter('comments_open', 'disable_comments_and_pings', 20, 2);
add_filter('pings_open', 'disable_comments_and_pings', 20, 2);

// Hide existing comments
function hide_existing_comments( $comments ) {
    return [];
}
add_filter('comments_array', 'hide_existing_comments', 10, 2);
