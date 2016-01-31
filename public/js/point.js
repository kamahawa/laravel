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
                txtPointName: "required",
                txtPointNameKana: "required"
            },
            messages: 
            {
                txtPointName: "Can Not Be Empty",
                txtPointNameKana: "Can Not Be Empty"
            }
         });
    });