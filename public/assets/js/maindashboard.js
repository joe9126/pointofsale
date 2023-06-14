    $body = $("body");
    
    $(document).ajaxStart(function(){
      $("#loader").show();
  });
  
  $(document).ajaxComplete(function(){
       $("#loader").hide();
  });
  
  $(document).on({
      ajaxStart:function(){$body.addClass("loading");},
      ajaxStop: function(){$body.addClass("loading");}
  });    


$(".userprofileicon").hover(
  function(){
  $(".userprofileaction").css("display","block");
}
);

$(".userprofileaction").focusout(function(){
  $(".userprofileaction").css("display","none");
});

$("#productlink").on('click',function(event){
  event.preventDefault();
  $(".overlay").css("display","block");
  $(".menucontainer").css("display","block");
  
});

  $( function() {
    $( ".draggable" ).draggable();
  } );

$(document).ready(function(){
    if(window.location.pathname == '/users'){
      $.ajax({
        url:"getusers",
        type:"get",
        dataType:"json",
        success:function(data){
          console.log(data);

          var i=1;
             $("#userstable").DataTable({
                processing: true,
                dom:'Bfrtip',
                buttons:[
                         {
                            extend: 'excelHtml5',
                            title: 'Product Register'
                        },
                            {
                             extend: 'csvHtml5',
                            title: 'Product Register'
                            },
                            {
                             extend: 'copyHtml5',
                             title: 'Product Register'
                            },
                         {
                             extend: 'pdfHtml5',
                             title: 'Product Register'
                            }
                   // 'copy','csv','excel','pdf','print'
                 ],
                data: data,
                 createdRow: function(row,data,index){
                     $(row).attr('id',data.id).find('td').eq(1).attr('class','td-idno');
                     $(row).attr('id',data.id).find('td').eq(2).attr('class','td-name');
                     $(row).attr('id',data.id).find('td').eq(3).attr('class','td-email');
                     $(row).attr('id',data.id).find('td').eq(4).attr('class','td-phone');
                     $(row).attr('id',data.id).find('td').eq(5).attr('class','td-role');
                     $(row).attr('id',data.id).find('td').eq(6).attr('class','td-status');
                                               
                 },

                 columns:[
                 
                     {mRender:function(){
                             return i++;
                         }},
                    {data:"id"},
                    {data:"name"},
                    {data:"email"},
                    {data:"phone"},
                    {data:"role"},
                    {mRender:function(data,type,row){
                             var status = row.status;
                             if(status === 1){
                              status = '<i class="fa fa-circle" aria-hidden="true" style="color:green; font-size:10px;"></i></td>';
                             }else{
                              status = '<i class="fa fa-circle" aria-hidden="true" style="color:red; font-size:10px;"></i></td>'
                             }
                           //  return moment(createddate).format("ddd Do MMM,YYYY");
                           return status;
                         }},
                   
                 ],
                 pageLength:10,
                 bLengthChange:false,
                 bAutoWidth:false,
                 autowidth:false,
                 bDestroy: true
             });
          
          
      }});
    }
  });

 


$(document).on("click","table#userstable >tbody >tr",function(e){
     $(".overlay").css("display","block");
     $(".newusercontainer").css("display","block");
      $("#cardtitle").text('Manage User');
          $("#idnumber").focus();

      const userid = $(this).closest('tr').find('td.td-idno').text();
      $("#id").val(userid);

      const name = $(this).closest('tr').find('td.td-name').text();
      $("#name").val(name);

      const email = $(this).closest('tr').find('td.td-email').text();
      $("#email").val(email);

       const phone = $(this).closest('tr').find('td.td-phone').text();
      $("#phone").val(phone);

       const role = $(this).closest('tr').find('td.td-role').text();
      $("#role").val(role);

      const status = $(this).closest('tr').find('td.td-status').text();
      $("#status").val(status);

      
});

$("#adduserbtn").on('click', function(){
   $(".overlay").css("display","block");
     $(".newusercontainer").css("display","block");
      $("#cardtitle").text('Add New User');
      $("#id").val('Auto');
});
$("#canceluserformbtn").on('click', function(){
       $(".overlay").hide();
         $(".newusercontainer").hide();
          $('#userform')[0].reset();
          $('#userform').parsley().reset();
});


//*8*** SUBMIT USER REGISTRATOIN FORM

$("#userform").parsley();

$("#userform").on("submit", function(event){
  event.preventDefault();

  if($(this).parsley().isValid()){
    $.ajax({
      url:"submituser",
      type:"post",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function()
                {
                    $('#submituserformbtn').attr('disabled', 'disabled');
                    $('#submituserformbtn').text('Submitting...');
                },
      success:function(data){
           $(".statusmsg").css("display","block").fadeOut(4000);
                    if(data.response>0){
                        $(".statusmsg").removeClass("alert-danger");
                        $(".statusmsg").addClass("alert-success");
                        $("#errormsq").html(data.msg);
                        $('#userform')[0].reset();
                        $('#userform').parsley().reset();
                         getStock();
                    }else{
                        $("#errormsq").text(data.msg);
                        $('#submituserformbtn').attr('disabled', false);
                        $('#submituserformbtn').html('<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp;Save');
                    }
      }
    });
  }
});