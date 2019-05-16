$("form").each(function() {
   /* console.log('dfgd');*/
    $(this).validate({
        submitHandler: function(form) {
            var formval = form;
            var url = $(form).attr("action");
            
            // Create an FormData object
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: "multipart/form-data",
                // url: "crud/Add_userInfo",
                url: url,
                dataType:'json',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000, 
                
          success: function(response) {
              if(response.status == 'error') { 
              $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  console.log(response);
              } else if(response.status == 'success'){
                  $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  console.log(response);
                window.setTimeout(function() {
                    window.location = response.curl;
                }, 3000);
              }              
          },
          error: function(response) {
            console.error();
          }
            });
        }
    });
});
