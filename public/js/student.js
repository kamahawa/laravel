     $(document).ready(function() {
          var table = $('#example').DataTable();
        $("#button").click(function(){
            $("#myform").removeAttr('hidden');
          });
        $(document).ready(function(){
        $("#button").click(function(){
          $("#button").attr('type','hidden');
        });
      });
      
      $("#myform").validate({
            rules: 
            {
                txtStudentName: "required",
                txtStudentNameKana: "required",
                groupid: "required",
                routeid: "required",
                txtAddress: "required",
                txtEmailGuard:{
                    required:true,
                    email:true
                },
                txtPassword: "required",
                txtLatitude:{
                    required:true,
                    number:true
                },
                txtLongitude:{
                    required:true,
                    number:true
                }
            },
            messages: 
            {
                txtStudentName: "Can Not Be Empty",
                txtStudentNameKana: "Can Not Be Empty",
                groupid: "Can Not Be Empty",
                routeid: "Can Not Be Empty",
                txtAddress: "Can Not Be Empty",
                txtEmailGuard:{
                    required:"Can Not Be Empty",
                    email:"Invalid Email"
                },
                txtPassword: "Can Not Be Empty",
                txtLatitude:{
                    required:"Can Not Be Empty",
                    number:"Must Be Number"
                },
                txtLongitude:{
                    required:"Can Not Be Empty",
                    number:"Must Be Number"
                }
            }
         });
  });