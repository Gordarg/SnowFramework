$.when(
    $.getScript( "js/jquery-ui.js" ),
    $.getScript( "js/sjfb-builder.js" ),
    $.Deferred(function( deferred ){
        $( deferred.resolve );
    })
).done(function(){
});