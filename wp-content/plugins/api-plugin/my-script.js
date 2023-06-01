jQuery.ajax({
    method: 'POST',
    url: myScriptVars.root + 'my-plugin/v1/test-form',
    data: { foo: 'bar', baz: 1, _wpnonce: myScriptVars.nonce },
    dataType: 'json',
    success: function ( data ) {
        console.log( data );
    },
});