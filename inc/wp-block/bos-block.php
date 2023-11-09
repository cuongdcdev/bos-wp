<?php
// Enqueue block assets
function bos_wpenqueue_assets(){
    // Enqueue block editor JavaScript`
    wp_enqueue_script(
        'bos-wp-editor-script',
        plugins_url('bos-wp.js', __FILE__),
        array('wp-blocks', 'wp-element')
    );

    // Enqueue block editor CSS
    wp_enqueue_style(
        'bos-wp-editor-style',
        plugins_url('bos-wp.css', __FILE__),
        array('wp-edit-blocks')
    );

    // Enqueue block frontend CSS
    wp_enqueue_style(
        'bos-wp-frontend-style',
        plugins_url('bos-wp-frontend.css', __FILE__),
        array()
    );
}
add_action('enqueue_block_editor_assets', 'bos_wpenqueue_assets');

// Register the block
function bos_wpregister_block()
{
    register_block_type(
        'bos-wp-plugin/bos-wp',
        array(
            'editor_script' => 'bos-wp-editor-script',
            'editor_style' => 'bos-wp-editor-style',
            'style' => 'bos-wp-frontend-style',
            'render_callback' => 'bos_wprender_callback'
        )
    );
}
add_action('init', 'bos_wpregister_block');

// Block rendering callback
function bos_wprender_callback($attrs){
    $propsObject = [];
    
    if(sizeof($attrs["props"]) > 0 ) foreach ($attrs["props"] as $v) {
        if( isset( $v['key'] ) && isset( $v['value'] ) ) $propsObject[ $v['key'] ] = $v['value'];
    }

    // var_dump($propsObject); die;
    
    
    ob_start();
    ?>
    <div class="bos-wp-placeholder" data-src="<?= htmlentities($attrs["src"]) ?>"
        data-props="<?= htmlentities(json_encode($propsObject)) ?>"></div>
    <?php
    return ob_get_clean();
}
;