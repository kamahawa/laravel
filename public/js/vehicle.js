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
                txtBusName: "required",
                driverid: "required",
                routeid: "required",
                txtStatus:{
                    required:false
                }
            },
            messages: 
            {
                txtBusName: "Can Not Be Empty",
                driverid: "Can Not Be Empty",
                routeid: "Can Not Be Empty"
            }
         });
        });