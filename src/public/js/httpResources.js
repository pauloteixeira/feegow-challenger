function get( endpoint, successHandler = null, failHandler = null ) {
    $.ajax({
        type: "GET",
        url: endpoint,
        beforeSend: function(){
            $('.loader').show()
        },
        complete: function(){
            $('.loader').hide();
        },
        success: function(data){
           if( successHandler instanceof Function ) successHandler( data );
        },
        error: function(xhr, status, error) {
            $('.loader').hide();
            if( failHandler instanceof Function ) failHandler( xhr.responseText );
          }
    });
}

function post( endpoint, params, successHandler = null, failHandler = null ) {
    $.ajax({
        type: "POST",
        url:  endpoint,
        data: params,
        beforeSend: function(){
            $('.loader').show()
        },
        complete: function(){
            $('.loader').hide();
        },
        success: function(data){
           if( successHandler instanceof Function ) successHandler( data );
        },
        error: function(xhr, status, error) {
            $('.loader').hide();
            if( failHandler instanceof Function ) failHandler( JSON.parse(xhr.responseText) );
          }
    });
}