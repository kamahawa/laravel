function showRoute() {
    document.getElementById("route_map").submit();
}

function checkLocation()
{
    var i = 0;
    var j = 0;
    var result = "";
    $('.selected').find('td').each(function(){
        if(i < 2)
        {
            i++;
        }
        else
        {
            result += $(this).text()+"@";
            j++;
            if(j>1)
            {
                i = 0;
                j = 0;
            }
        }
    });
    $('#demo').val(result);

    if($('#demo').val() == "")
    {
        return false;
    }
    else
    {
        return true;
    }
}

$(document).ready(function() {
    $('#buttonget_get').click(function(){
        var showRoute = new Array();
        var i = 0;
        $.each($('.checkbox_route_left'), function( key, value ){
            if(this.checked)
            {
                $(this).parent().parent().css('display','none');
                showRoute[i++] = 1;
            }
            else
            {
                showRoute[i++] = 0;
            }
        });
        i = 0;
        $.each($('.checkbox_route_right'), function( key, value ){
            if(showRoute[i] == 1)
            {
                $(this).parent().parent().css('display','');
                $(this).parent().parent().addClass('selected');

            }
            i++;
        });
    });

    $('#buttonget_delete').click(function(){
        var showRoute = new Array();
        var i = 0;
        $.each($('.checkbox_route_right'), function( key, value ){
            if(this.checked)
            {
                $(this).parent().parent().css('display','none');
                $(this).parent().parent().removeClass('selected');
                showRoute[i++] = 1;
            }
            else
            {
                showRoute[i++] = 0;
            }
        });
        i = 0;
        $.each($('.checkbox_route_left'), function( key, value ){
            if(showRoute[i] == 1)
            {
                $(this).parent().parent().css('display','');
            }
            i++;
        });
    });

    $('#buttonget_getall').click(function(){
        var showRoute = new Array();
        var i = 0;
        $(".checkbox_route_left").parent().parent().css('display','none');
        $('.checkbox_route_right').parent().parent().css('display','');
        $('.checkbox_route_right').parent().parent().addClass('selected');

    });

    $('#buttonget_deleteall').click(function(){
        var showRoute = new Array();
        var i = 0;
        $('.checkbox_route_left').parent().parent().css('display','');
        $(".checkbox_route_right").parent().parent().css('display','none');
        $(".checkbox_route_right").parent().parent().removeClass('selected');

    });

});