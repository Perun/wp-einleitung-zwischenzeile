<?php
/*
Plugin Name: Einleitung-Zwischenzeile
Plugin URI: 
Description: Hiermit wird eine Einleitung, Dachzeile, Zwischenzeile vor dem eigentlichen Artikel ausgegeben.
Version: 0.1
Author: Vladimir Simovic
Author URI: http://www.perun.net
GitHub Plugin URI: Perun/wp-einleitung-zwischenzeile
GitHub Plugin URI: https://github.com/Perun/wp-einleitung-zwischenzeile
*/

add_filter( 'the_content', 'einleitung_vor_inhalt' );

function einleitung_vor_inhalt($content) {
    if (is_single()) {
        global $post;
        $einleitung_zwischenzeile = get_post_meta($post->ID, 'einleitung', true);
            if ($einleitung_zwischenzeile) {
                $einleitung = "<p class=\"einleitung\">" . $einleitung_zwischenzeile . "</p>\n";
                $einleitung .= $content;
                return $einleitung;
                } else {
                    return $content;
                }
        }
}
?>
