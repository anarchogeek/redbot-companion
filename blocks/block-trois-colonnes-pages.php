<?php
/**
 * Bloc personnalisé "Trois Colonnes de Pages" pour le plugin Redbot Companion.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function redbot_companion_edit_block_trois_colonnes_pages( $props ) {
    // Récupère les attributs du bloc.
    $attributes = $props['attributes'];

    ?>
    <div class="wp-block-columns">
        <?php
        foreach ( range( 1, 3 ) as $index ) :
            $selectedPage = $attributes["selectedPage{$index}"];
            ?>
            <div class="wp-block-column" style="flex-basis: 33.33%;">
                <?php
                // Appelle la fonction PageSelector.
                PageSelector(
                    array(
                        'selectedPage' => $selectedPage,
                        'onSelect'     => function( $page ) use ( $index, $attributes ) {
                            // Copie les attributs existants.
                            $newAttributes = $attributes;
                            // Met à jour seulement l'attribut spécifique.
                            $newAttributes["selectedPage{$index}"] = $page;
                            // Applique les nouveaux attributs.
                            setAttributes( $newAttributes );
                        },
                    )
                );
                ?>
                <?php if ( $selectedPage ) : ?>
                    <div>
                        <h2><?php echo esc_html( $selectedPage->title->rendered ); ?></h2>
                        <?php if ( $selectedPage->featured_media ) : ?>
                            <img
                                src="<?php echo esc_url( $selectedPage->featured_media->source_url ); ?>"
                                alt="<?php echo esc_attr( $selectedPage->title->rendered ); ?>"
                            />
                        <?php endif; ?>
                        <p><?php echo wp_kses_post( $selectedPage->excerpt->rendered ); ?></p>
                        <a href="<?php echo esc_url( $selectedPage->link ); ?>">En savoir plus</a>
                    </div>
                <?php endif; ?>
            </div>
            <?php
        endforeach;
        ?>
    </div>
    <?php
}

function PageSelector( $props ) {
    $selectedPage = $props['selectedPage'];
    $onSelect     = $props['onSelect'];

    ?>
    <div>
        <button
            class="components-button is-primary"
            onclick="openPageSelector(<?php echo json_encode( $props ); ?>)"
        >
            <?php echo $selectedPage ? esc_html( $selectedPage->title->rendered ) : 'Sélectionner une page'; ?>
        </button>
    </div>
    <?php
}

function redbot_companion_save_block_trois_colonnes_pages( $props ) {
    // ... autres logiques de sauvegarde ...
    return '<!-- Le contenu sauvegardé va ici -->';
}
