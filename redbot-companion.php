<?php
/**
 * Plugin Name: Redbot Companion
 * Description: Un plugin companion pour Redbot avec différentes fonctionnalités.
 * Version: 0.1
 * Author: Ton Nom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Inclut le fichier pour enregistrer le bloc personnalisé.
require_once plugin_dir_path( __FILE__ ) . 'blocks/block-trois-colonnes-pages.php';

function redbot_companion_register_block_assets() {
    // Enregistre le script pour le bloc.
    wp_register_script(
        'redbot-companion-block-script',
        plugin_dir_url( __FILE__ ) . 'blocks/block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'blocks/block.js' ) // Ajoute un hash pour le cache.
    );

    // Enregistre le style pour le bloc.
    wp_register_style(
        'redbot-companion-block-style',
        plugin_dir_url( __FILE__ ) . 'blocks/style.css',
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'blocks/style.css' ) // Ajoute un hash pour le cache.
    );

    // Enregistre le script de configuration pour le bloc.
    wp_register_script(
        'redbot-companion-block-editor',
        plugin_dir_url( __FILE__ ) . 'blocks/block-editor.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'blocks/block-editor.js' ) // Ajoute un hash pour le cache.
    );

    // Enregistre les scripts et styles pour le bloc.
    register_block_type( 'redbot-companion/trois-colonnes-pages', array(
        'editor_script' => 'redbot-companion-block-script',
        'editor_style'  => 'redbot-companion-block-editor',
        'attributes'    => array(
            'selectedPage1' => array(
                'type' => 'object',
            ),
            'selectedPage2' => array(
                'type' => 'object',
            ),
            'selectedPage3' => array(
                'type' => 'object',
            ),
        ),
        'edit'          => 'redbot_companion_edit_block_trois_colonnes_pages',
        'save'          => 'redbot_companion_save_block_trois_colonnes_pages',
    ) );
    
}
add_action( 'init', 'redbot_companion_register_block_assets' );

// Ajoute d'autres fonctionnalités du plugin ici.
