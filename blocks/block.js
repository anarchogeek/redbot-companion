/**
 * Bloc personnalisé pour le plugin Redbot Companion.
 */

(function (blocks, element, editor, components) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InnerBlocks = editor.InnerBlocks;

    registerBlockType('redbot-companion/trois-colonnes-pages', {
        title: 'Trois Colonnes de Pages',
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
    });

    function redbotCompanionEditBlockTroisColonnesPages(props) {
        // Logique d'édition ici
        return el(
            'div',
            { className: 'wp-block-columns' },
            [
                el(
                    'div',
                    { className: 'wp-block-column', style: { flexBasis: '33.33%' } },
                    el(InnerBlocks, { template: [['core/paragraph']] })
                ),
                el(
                    'div',
                    { className: 'wp-block-column', style: { flexBasis: '33.33%' } },
                    el(InnerBlocks, { template: [['core/paragraph']] })
                ),
                el(
                    'div',
                    { className: 'wp-block-column', style: { flexBasis: '33.33%' } },
                    el(InnerBlocks, { template: [['core/paragraph']] })
                )
            ]
        );
    }

    function redbotCompanionSaveBlockTroisColonnesPages(props) {
        // Logique de sauvegarde ici
        return el(
            'div',
            { className: 'wp-block-columns' },
            [
                el(
                    'div',
                    { className: 'wp-block-column', style: { flexBasis: '33.33%' } },
                    el(InnerBlocks.Content)
                ),
                el(
                    'div',
                    { className: 'wp-block-column', style: { flexBasis: '33.33%' } },
                    el(InnerBlocks.Content)
                ),
                el(
                    'div',
                    { className: 'wp-block-column', style: { flexBasis: '33.33%' } },
                    el(InnerBlocks.Content)
                )
            ]
        );
    }
})(
    window.wp.blocks,
    window.wp.element,
    window.wp.editor,
    window.wp.components
);
