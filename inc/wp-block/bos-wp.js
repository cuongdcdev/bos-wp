
(function (blocks, element, components) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;

    registerBlockType('bos-wp-plugin/bos-wp', {
        title: 'NEAR BOS WP',
        // icon: '<svg width="29" height="20" viewBox="0 0 29 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.55396 17.509L2 9.99996L9.55396 2.49097" stroke="#3D7FFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19.536 2.49097L27 9.99996L19.536 17.509" stroke="#3D7FFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
        icon: 'superhero',
        category: 'common',
        attributes: {
            src: {
                type: 'string',
                default: ''
            },
            props: {
                type: 'array',
                default: []
            }
        },
        edit: function (props) {
            console.log("Props: "  , props);
            var src = props.attributes.src;
            var blockProps = props.attributes.props;

            function onChangeSrc(event) {
                props.setAttributes({ src: event.target.value });
            }

            function onChangeProps(event, index, type) {
                var updatedProps = [...blockProps];
                // updatedProps[index] = event.target.value;
                
                if(!updatedProps[index] ){
                    updatedProps[index] = {
                        
                    };
                }
                if (type == 'key') {
                    updatedProps[index].key = event.target.value;
                    console.log("new key: " + event.target.value);
                }
                if (type == 'value') {
                    updatedProps[index].value = event.target.value;
                    console.log("new value: " + event.target.value);
                }
                console.log("new updated props: " , updatedProps[index] , props , "type: " , type );

                props.setAttributes({ props: updatedProps });
            }

            function onAddField() {
                var updatedProps = [...blockProps, ''];
                props.setAttributes({ props: updatedProps });
            }

            function onRemoveField(index) {
                var updatedProps = [...blockProps];
                updatedProps.splice(index, 1);
                props.setAttributes({ props: updatedProps });
            }

            let editForm = el(
                "div",
                {
                    class: "bos-wp-wrapper"
                },
                el('h3' , {
                    class: 'bos-wp-widget-heading',
                },'NEAR #BOS <> WordPress'),
                el('input', {
                    type: 'text',
                    class: 'bos-wp-widget-source',
                    placeholder: 'Widget source, example: mob.near/widget/Homepage',
                    value: src,
                    onChange: onChangeSrc
                }),
                el('div', {
                    class: 'bos-wp-props-wrapper'
                },
                    blockProps.map((prop, index) =>
                        el("div", { key: index, class: 'bos-wp-props-field' },

                            el('input', {
                                class: 'bos-wp-props-key',
                                type: 'text',
                                placeholder: 'Key',
                                value: prop.key,
                                onChange: function (event) {
                                    onChangeProps(event, index, "key");
                                }
                            }),

                            el('input', {
                                class: 'bos-wp-props-value',
                                type: 'text',
                                placeholder: 'Value',
                                value: prop.value,
                                onChange: function (event) {
                                    onChangeProps(event, index, "value");
                                }
                            }),

                            el('span', {
                                className: 'btn-wp-remove dashicons dashicons-remove',
                                onClick: function () {
                                    onRemoveField(index);
                                }
                            }, '')
                        )
                    )),
                el('button', {
                    className: 'button button-primary',
                    onClick: onAddField
                }, '+ Widget Config')
            )

            return (editForm);
        }
    });
})(
    window.wp.blocks,
    window.wp.element,
    window.wp.components
);