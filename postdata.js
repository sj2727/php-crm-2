
$(document).ready(function () {
   $(".message").fadeOut(); 
$("#submit").click(function () { 
    $.ajax({
        type: "POST",
        url: "insup.php",
        contentType: false,
        cache: false,
        processData: false, 
        data: new FormData( document.getElementById("form") ),
        success: function (response) {
            var data = JSON.parse(response);
            if(data[0]=="success"){
            $(".message").html("Success");
            $(".message").css("border-left","4px solid green"); 
            $(".message").fadeIn( 1000 ).delay( 3000 ).fadeOut( 1000 ); 
            load();
            }else{
                $(".message").html('Error! Please Try again sometime'+data[1]);
                $(".message").css("border-left","4px solid red");
                $(".message").fadeIn( 1000 ).delay( 3000 ).fadeOut( 1000 ); 
            }
        }
    });
    
});


$(".loout").click(function () { 
	$.ajax({
		type: "GET",
		url: "asset/logout.php",
		success: function (response) {
			location.reload();
		}
	});

});


   function load() {
       var na = $("#name").val();
       var em = $("#email").val();
    let col = Array('S. No.','NAME', 'PHONE','COMPANY','JOB-TITLE','EMAIL','INDUSTRY','ADDRESS','CITY','ZIP-CODE','EMP-RANGE','TIMEZONE','CREATE_ON','ACTION');
       var op ='<thead><tr>';
        $.each(col, function( i, v ) {
            op +='<td>'+v+'</td>';
        });
       op+='</tr></thead>';
       '<tbody>';
    $.ajax({
        type: "POST",
        url: "agent.php",
        data: {name: na, email: em},
        success: function (response) {
            var i =0;
            var obj = JSON.parse(response); 
            if(obj[0]=='success'){
                sessionStorage.setItem('table',obj[2]);
             obj[1].forEach(val => {
             op +='<tr><td>'+ parseInt(i+1) +'</td>';
                $.each(val, function( index, value ) {
                    if(index != 'asset' && index != 'disposition' && index != 'agent_id' && index != 'date' && index != 'status' && index != 'id') {
                 op +='<td> '+ value +'</td>';
                    }
                });
                 op+='<td class="actions"> <button class="delete" id="'+val['id']+'"  data="'+val['name']+'">'+
                     '<i class="fa-solid fa-trash" ></i>'+
                     '</button>'+
                     '<button class="edit" id="'+val['id']+'">'+
                     '<i class="fa-solid fa-pen-to-square"></i>'+
                     '</button>'+
                     '</td> ';
             
             op +='</tr>';
             i++;
        });
        op +="</tbody>";
        $(".table table").html(op);
            }
        }
    });
   }
load();

$("#search").click(function () { 
   load();
});

$(".title-accorden").click(function () { 
   $(".fa-solid").toggleClass("fa-angle-up","fa-angle-down");
   $(".accorden").toggleClass("active");
   
});




$(".table table").on("click",".edit", function(){
    var op = '';
    $.ajax({
        type: "post",
        url: "agent.php",
        data: {id: this.id},
        success: function (response) {
            var obj = JSON.parse(response);
             obj[1].forEach(val => {
                $.each(val, function( index, value ) {
                   
                    if(index != 'asset' && index != 'disposition' && index != 'agent_id' && index != 'date' && index != 'status' && index != 'id') {
                    $('form input[name="'+index+'"]').val(value);
                    }
                });
                $("form").append('<input type="hidden" name="id" value="'+val["id"]+'" >');
             });
            $(".edit-table").html(op);
        }
    });
    
});


$("#form2").on("click",".update", function(){
    $.ajax({
        type: "POST",
        url: "insup.php",
        contentType: false,
        cache: false,
        processData: false, 
        data: new FormData( document.getElementById("form") ),
        success: function (response) {
            var obj = JSON.parse(response); 
            if(obj[0]=='success'){
                $(".message").html("Data Updated");
                $(".message").css("border-left","4px solid green"); 
                $(".message").fadeIn( 1000 ).delay( 3000 ).fadeOut( 1000 ); 
                load();
                }else{
                    $(".message").html('Error! Please Try again sometime'+obj[1]);
                    $(".message").css("border-left","4px solid red");
                    $(".message").fadeIn( 1000 ).delay( 3000 ).fadeOut( 1000 ); 
                }
    }
});
});


$("#form").on("click","#clear", function(){
    $("#form input").val("");
    $('#form select>option').attr('selected', false);
});

$(".table").on("click",".delete", function(){
    console.log($(this).attr("data")+" : "+sessionStorage.getItem('table'));
if (confirm("Are You Confirm to Delete "+$(this).attr("data")) == true) {
     $.ajax({
        type: "POST",
        url: "asset/php/delete.php",
        data: {table: sessionStorage.getItem('table'), id: this.id},
        success: function (response) {
            var obj = JSON.parse(response);
            if (obj[0] == 'success' ) {
                $(".message").html("Data Deleted Successfully");
                $(".message").css("border-left","4px solid green"); 
                $(".message").fadeIn( 1000 ).delay( 3000 ).fadeOut( 1000 ); 
                load();
                }else{
                    $(".message").html('Error! Please Try again sometime');
                    $(".message").css("border-left","4px solid red");
                    $(".message").fadeIn( 1000 ).delay( 3000 ).fadeOut( 1000 ); 
                }
        }
    });
  } else {
     $(".message").html('Cancel Deleting');
    $(".message").css("border-left","4px solid orange");
    $(".message").fadeIn( 1000 ).delay( 3000 ).fadeOut( 1000 );
  }
  
});





});
