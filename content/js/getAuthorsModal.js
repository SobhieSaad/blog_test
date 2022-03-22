function showAuthorsModal(){
 
    jQuery.ajax({
        type: "POST",
        url: 'GetAuthorsController.php',
        dataType: 'json',
        data: {functionname: 'getAll'},
    
        success: function (obj, textstatus) {
                      if( !('error' in obj) ) {
                          yourVariable = obj.result;
                      }
                      else {
                          console.log(obj.error);
                      }
                }
    });
}