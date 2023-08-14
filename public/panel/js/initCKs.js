
function initCK() {

    DecoupledEditor
        .create( document.querySelector( '#description_en' ) , {
            alignment: {
                options: [ 'left', 'right', 'justify', 'center' ]
            }
        }).then(function (editor) {
        const toolbarContainer = document.querySelector( '#toolbar-container_en' );
        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        editor.execute( 'alignment', { value: 'justify' } );

        editor.plugins.get( 'FileRepository' ).createUploadAdapter = function( loader ) {
            return new MyUploadAdapter( loader );
        };

    });

    DecoupledEditor
        .create( document.querySelector( '#description_fa' ) , {
            alignment: {
                options: [ 'left', 'right', 'justify', 'center' ]
            }
        }).then(function (editor) {
        const toolbarContainer = document.querySelector( '#toolbar-container_fa' );
        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        editor.execute( 'alignment', { value: 'justify' } );

        editor.plugins.get( 'FileRepository' ).createUploadAdapter = function( loader ) {
            return new MyUploadAdapter( loader );
        };

    });

    DecoupledEditor
        .create( document.querySelector( '#description_gr' ) , {
            alignment: {
                options: [ 'left', 'right', 'justify', 'center' ]
            }
        }).then(function (editor) {
        const toolbarContainer = document.querySelector( '#toolbar-container_gr' );
        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        editor.execute( 'alignment', { value: 'justify' } );

        editor.plugins.get( 'FileRepository' ).createUploadAdapter = function( loader ) {
            return new MyUploadAdapter( loader );
        };

    });

    DecoupledEditor
        .create( document.querySelector( '#description_ar' ) , {
            alignment: {
                options: [ 'left', 'right', 'justify', 'center' ]
            }
        }).then(function (editor) {
        const toolbarContainer = document.querySelector( '#toolbar-container_ar' );
        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        editor.execute( 'alignment', { value: 'justify' } );

        editor.plugins.get( 'FileRepository' ).createUploadAdapter = function( loader ) {
            return new MyUploadAdapter( loader );
        };

    });
}
