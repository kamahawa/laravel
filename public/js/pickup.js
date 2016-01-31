$(document).ready(function() {
          var table = $('#example').DataTable();
      } );
      function getlocation()
      {
          // Lấy hai thẻ HTML
        var div = document.getElementByTagName('div');
        var p = document.getElementById("get");
         
        // Gán nội dung ô input vào thẻ div
        p.innerHTML = div.value;
      }
      //function get_location(){
        //var html = document.getElementById("location");
        //var test = document.getElementById("test");
        //test.innerHTML = html.innerHTML;}
        function change_background()
        {
            document.getElementById("test").style.background = 'red';
        }