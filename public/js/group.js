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
                txtGroupName: "required",
                txtGroupNameKana: "required"
            },
            messages: 
            {
                txtGroupName: "Can Not Be Empty",
                txtGroupNameKana: "Can Not Be Empty"
            }
         });
    });