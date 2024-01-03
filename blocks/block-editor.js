/**
 * Configuration supplémentaire pour le bloc éditeur Redbot Companion.
 */

( function( editor, blocks, i18n, element ) {
    var el = element.createElement;
    var __ = i18n.__;

    // Enregistre les composants additionnels pour le bloc.
    var InspectorControls = editor.InspectorControls;
    var TextControl = components.TextControl;

    // Enregistre le composant pour la barre d'outils du bloc.
    var Toolbar = blocks.Toolbar;
    var IconButton = components.IconButton;

    // Ajoute des styles spécifiques pour le bloc.
    var blockStyle = {
        backgroundColor: '#f3f3f3',
        padding: '20px',
        border: '1px solid #ddd',
    };

    // Enregistre le bloc "Trois Colonnes de Pages".
    blocks.registerBlockType( 'redbot-companion/trois-colonnes-pages', {
        title: __( 'Trois Colonnes de Pages', 'redbot-companion' ),
        icon: 'layout',
        category: 'mise_en_page',
        attributes: {
            selectedPage1: {
                type: 'object',
            },
            selectedPage2: {
                type: 'object',
            },
            selectedPage3: {
                type: 'object',
            },
        },
        edit: redbotCompanionEditBlockTroisColonnesPages,
        save: redbotCompanionSaveBlockTroisColonnesPages,
    } );
} )(
    window.wp.editor,
    window.wp.blocks,
    window.wp.i18n,
    window.wp.element
);
