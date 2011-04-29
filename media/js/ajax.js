var ajax  = {};
ajax.appendSecretIsRunning  = false;
ajax.appendSecretOffset     = 0;

ajax.appendSecrets  = function(){
  var scrollHeight  = $(document).height() - $(window).height();
  if($(window).scrollTop()===scrollHeight){
    if(ajax.appendSecretIsRunning == false){
      var data        = {};
      data['method']  = 'get_secrets';
      data['offset']  = ajax.appendSecretOffset;

      ajax.appendSecretIsRunning  = true;

      $.ajax({
        url       : AJAX_URL,
        data      : data,
        dataType  : 'json',
        type      : 'post',
        beforeSend: function(){
          console.log("cargando");
        },
        success   : function(response){
          for(i in response){
            $("#appendHere").append("<p>"+response[i].secret+"</p>");
          }
          ajax.appendSecretIsRunning = false;
          ajax.appendSecretOffset    = ajax.appendSecretOffset+10;
        }
      });
    }
  }
};