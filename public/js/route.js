      $(document).ready(function() {
        var table = $('#example').DataTable();
        $("#button").click(function(){
              $("#myform").removeAttr('hidden');
            });
        $("#button").click(function(){
              $("#button").attr('type','hidden');
            });
        
        $("#myform").validate({
            rules: 
            {
                txtRouteName: "required",
                txtRouteNameKana: "required"
            },
            messages: 
            {
                txtRouteName: "Can Not Be Empty",
                txtRouteNameKana: "Can Not Be Empty"
            }
         });
    });