

jQuery( document ).ready(function() {

  if(jQuery( ".wmshortcodeformidable" ).parent().parent().attr("class") == "wmshortcodediv"){
    jQuery(".wmshortcodeformidable").hide();
  }


});


function gettheformload(postid){


  var listofids = [];
  var urlnew = window.location.origin + '/wp-admin/admin-ajax.php';

                   var data = new FormData();

                 
                  data.append('postid', postid);
                  data.append('action', 'loadfrm');
                  

                  jQuery.ajax({
                      url:urlnew,
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      type: 'POST',
                      success: function(data) {

                        var responce = jQuery.parseJSON(data);
                       
                        
                        if(responce.message == "failed"){

                          alert("Your Form Load time not more then 12 hours. Please click on this button after 12 hours.");
                          console.log(responce.shortcodedetails);

                        }else{

                          jQuery(".wmshortcodediv button").hide();
                          jQuery(".wmshortcodeformidable").show();
                          
                          console.log(responce.shortcodedetails);

                        }


                       

                      }
                  });

         


}

