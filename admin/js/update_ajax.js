jQuery(document).ready(function($){

  
//*
$("#tbUser").on('click', '.selected', function () {
    //console.log($(this).id);
    var id=this.id;
    console.log(id);
    
    var button_selected = this.classList;
    console.log(button_selected[0]);

    $(this).closest('tr').remove();

            // ajax
        $.ajax({
            url: "update_ajax.php",
            type: "POST",
            //data: "{'button_selected':'" + button_selected+ "', 'id':'" + id+ "', 'data3':'" + id+ "'}",
            data: 'id='+id+'&button_selected='+button_selected[0],
            success: function(data) {
                //$('#output').html(data);
                 //$( "#2").remove(); 
            },  
        });
});

});