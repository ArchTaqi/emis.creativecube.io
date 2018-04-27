$( document ).ready(function() {

$("#crud-submitt").click(function(e){
        
  
        alert('You are missing title or description.')

});

/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var title = $("#create-item").find("input[name='title']").val();
    var description = $("#create-item").find("textarea[name='description']").val();


    if(title != '' && description != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{title:title, description:description}
        }).done(function(data){
            $("#create-item").find("input[name='title']").val('');
            $("#create-item").find("textarea[name='description']").val('');
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        });
    }else{
        alert('You are missing title or description.')
    }


});

$(".crud-submitt").click(function(e){
        
  
        alert('You are missing title or description.')

});

/* Updated new Item */
$(".crud-submit-edit").click(function(e){


    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var title = $("#edit-item").find("input[name='title']").val();


    var description = $("#edit-item").find("textarea[name='description']").val();
    var id = $("#edit-item").find(".edit-id").val();


    if(title != '' && description != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{title:title, description:description,id:id}
        }).done(function(data){
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
        });
    }else{
        alert('You are missing title or description.')
    }


});
});