
//sending params to method @sendAjax in WelcomeController



jQuery(function($) {
    $('#loading-btn').on(ace.click_event, function () {
        var form = $('form');
        var url = form[2].action;
        var formData = $(form).serializeArray();
        var btn = $(this);

        btn.button('loading');

        $.post(url, formData).done(function (data) {


            var htmlString;

            $.each(data.output, function($key, $val){
                htmlString += '<li class="L'+$key+'">'+$val+'</li>';
            });

            $('.linenums').html('<ol class="linenums">'+htmlString.replace('error ->  ','')+'</ol>');
            btn.button('reset');

        }).fail(function(xhr, status, error){

            $('.linenums').html('<ol class="linenums" style="color: wheat;">'+xhr.responseText+'</ol>');

            $.gritter.add({
                title: 'This is a warning notification',
                text: '<h3>'+xhr.responseJSON.message+'</h3> <br/> You can see more information in console',
                class_name: 'gritter-error' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
            });

            setTimeout(function(){
                btn.button('reset')
            }, 2000);
        });

    });

    $('#id-button-borders').attr('checked' , 'checked').on('click', function(){
        $('#default-buttons .btn').toggleClass('no-border');
    });

    // prefiew button
    $('#preview-btn').on(ace.click_event, function(){

        var form = $('form');
        var url = form[2].action;
        var formData = $(form).serializeArray();
        var btn = $(this);
        var preview = {name:"preview", value:true};

        //add preview param
        formData.push(preview);

        // btn loading
        btn.button('loading');

        $.post(url, formData).done(function (data) {

            var htmlString;

            //check response... if we have an array, split it to strings, and put  to console block.
            if (Array.isArray(data.output)){
                //add param to a comsole
                $.each(data.output, function($key, $val){
                    htmlString += '<li class="L'+$key+'">'+$val+'</li>';
                });
                // add response to the console
                $('.linenums').html('<ol class="linenums">'+htmlString.replace('error ->  ','')+'</ol>');
                //add a preview image

                btn.button('reset');
                $('#preview-image').html(' <img id="preview-image-src" width="100%" height="600px" alt="150x150" src="'+data.image+'">');

                $('#preview-image').attr('href',data.image);

            }else{
                $('.linenums').html('<ol class="linenums" style="color: wheat;">'+data+'</ol>');

                $.gritter.add({
                    title: 'This is a warning notification',
                    text: '<h3>Something went wrong.</h3> <br/> You can see more information in console',
                    class_name: 'gritter-error' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
                });

                btn.button('reset');
            }

        }).fail(function(xhr, status, error){ // if post request is fail

            $('.linenums').html('<ol class="linenums" style="color: wheat;">'+xhr.responseText+'</ol>');

            $.gritter.add({
                title: 'This is a warning notification',
                text: '<h3>'+xhr.responseJSON.message+'</h3> <br/> You can see more information in console',
                class_name: 'gritter-error' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
            });

            setTimeout(function(){
                btn.button('reset')
            }, 2000);
        });

    });




    // multi button
    $('#multi-btn').on(ace.click_event, function(){

        var form = $('form');
        var url = form[2].action+"Multi";
        var formData = $(form).serializeArray();
        var btn = $(this);
        var preview = {name:"multi", value:true};

        //add preview param
        formData.push(preview);

        // btn loading
        btn.button('loading');

        $.post(url, formData).done(function (data) {

            var htmlString;

            //check response... if we have an array, split it to strings, and put  to console block.
            if (Array.isArray(data.output)){
                //add param to a comsole
                $.each(data.output, function($key, $val){
                    htmlString += '<li class="L'+$key+'">'+$val+'</li>';
                });
                // add response to the console
                $('.linenums').html('<ol class="linenums">'+htmlString.replace('error ->  ','')+'</ol>');
                //add a preview image

                btn.button('reset');
                $('#preview-image').html(' <img id="preview-image-src" width="100%" height="600px" alt="150x150" src="'+data.image+'">');

                $('#preview-image').attr('href',data.image);

            }else{
                $('.linenums').html('<ol class="linenums" style="color: wheat;">'+data+'</ol>');

                $.gritter.add({
                    title: 'This is a warning notification',
                    text: '<h3>Something went wrong.</h3> <br/> You can see more information in console',
                    class_name: 'gritter-error' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
                });

                btn.button('reset');
            }

        }).fail(function(xhr, status, error){ // if post request is fail

            $('.linenums').html('<ol class="linenums" style="color: wheat;">'+xhr.responseText+'</ol>');

            $.gritter.add({
                title: 'This is a warning notification',
                text: '<h3>'+xhr.responseJSON.message+'</h3> <br/> You can see more information in console',
                class_name: 'gritter-error' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
            });

            setTimeout(function(){
                btn.button('reset')
            }, 2000);
        });

    });

});



/*$('#sidebar-toggle-icon').click(function(){
    var form = $('form');
    var url = form[2].action;
    var formData = $(form).serializeArray();

    $.post(url, formData).done(function (data) {


        var htmlString;
        $.each(data.output, function($key, $val){
          htmlString += '<li class="L'+$key+'">'+$val+'</li>';
        });
        $('.linenums').html('<ol class="linenums">'+htmlString+'</ol>');
    });
});*/

