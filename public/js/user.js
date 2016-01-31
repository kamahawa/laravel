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
                txtUserName: "required",
                txtUserNameKana: "required",
                txtUserPhone:{
                    required:true,
                    number:true
                },
                txtPassword: "required",
                manageid:"required",
                txtEmail:{
                    required:true,
                    email:true
                },
                txtPcmail:{
                    required:true,
                    email:true
                }
            },
            messages: 
            {
                txtUserName: "Can Not Be Empty",
                txtUserNameKana: "Can Not Be Empty",
                txtUserPhone:{
                    required:"Can Not Be Empty",
                    number:"Must Be Number"
                },
                txtPassword: "Can Not Be Empty",
                manageid: "Can Not Be Empty",
                txtEmail:{
                    required:"Can Not Be Empty",
                    email:"Invalid Email"
                },
                txtPcmail:{
                    required:"Can Not Be Empty",
                    email:"Invalid Email"
                }
            }
         });
    });