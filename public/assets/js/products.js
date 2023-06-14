$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".overlay").click(function(){
	$(".overlay").css("display","none");
	$(".newproductcontainer").css("display","none");
	$(".menucontainer").css("display","none");
     $(".addproductstock").css("display","none");
      $(".newusercontainer").css("display","none");
});


$("#addproducts").on('click', function(){
	$(".overlay").css("display","block");
	$(".newproductcontainer").css("display","block");
     getAllproducts();
});

$("#saleprice").on('change paste keyup',function(){
	if($.isNumeric($("#costprice").val())&& $.isNumeric($("#saleprice").val())){
		$profit = $("#saleprice").val()- $("#costprice").val();
		$("#profit").val($profit);
	}
});



$("#productregisterlink").on('click',function(event){
    event.preventDefault();
      window.location.replace("/products");
    window.addEventListener('DOMContentLoaded',function(){
       // alert("product link");
         getAllproducts();
     });
});

$("#Cancelproductbtn").on('click',function(event){
    event.preventDefault();
      $(".overlay").css("display","none");
  $(".newproductcontainer").css("display","none");
  $('#newitemform')[0].reset();
  $('#newitemform').parsley().reset();
});


$(document).ready(function(){

	/* REGISTER NEW ITEM FORM  */
	$("#newitemform").parsley();
	$("#newitemform").on('submit',function(){
	event.preventDefault();

	if($('#newitemform').parsley().isValid())
        {
            $.ajax({
                url: 'addnewitem',
                method:"post",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function()
                {
                    $('#saveitemBtn').attr('disabled', 'disabled');
                    $('#saveitemBtn').html('Submitting...');
                },
                success:function(data)
                {
                   
                	$('#saveitemBtn').attr('disabled', false);
                	 $('#saveitemBtn').html('<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp;Save');
                	$(".statusmsg").css("display","block").fadeOut(4000);
                    if(data.response>0){
                        $(".statusmsg").removeClass("alert-danger");
                        $(".statusmsg").addClass("alert-success");
                        $("#errormsq").text(data.msg);
                        $('#newitemform')[0].reset();
                        $('#newitemform').parsley().reset();
                         getAllproducts();
                    }else{
                        $("#errormsq").text(data.msg);
                        $('#saveitemBtn').attr('disabled', false);
                        $('#saveitemBtn').html('<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp;Save');
                    }
                }
                 });
}
});
});


/*RETRIEVE PRODUCT REGISTRY */
function getAllproducts(){
    $.ajax({
        url:'showproducts',
        method:'get',
        dataType:'json',
        success:function(data){
             var i=1;
             $("#productstable").DataTable({
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
                     $(row).attr('id',data.id).find('td').eq(1).attr('class','td-check');
                     $(row).attr('id',data.id).find('td').eq(2).attr('class','td-itemid');
                     $(row).attr('id',data.id).find('td').eq(3).attr('class','td-itemname');
                     $(row).attr('id',data.id).find('td').eq(4).attr('class','td-category');
                     $(row).attr('id',data.id).find('td').eq(5).attr('class','td-costprice');
                     $(row).attr('id',data.id).find('td').eq(6).attr('class','td-saleprice');
                     $(row).attr('id',data.id).find('td').eq(7).attr('class','td-stockalarm');
                     $(row).attr('id',data.id).find('td').eq(8).attr('class','td-status');
                     $(row).attr('id',data.id).find('td').eq(9).attr('class','td-createdby');           
                     
                 },

                 columns:[
                 {mRender:function(){
                    $checkbox = "<span><input type='checkbox'/></span>"
                             return $checkbox;
                         }},
                     {mRender:function(){
                             return i++;
                         }},
                    {data:"id"},
                     {data:"productname"},
                     {data:"category"},
                     {mRender:function(data,type,row){
                             var costprice = parseFloat(row.costprice);
                           //  return moment(createddate).format("ddd Do MMM,YYYY");
                           return numeral(costprice).format("0,0.0");
                         }},
                      {mRender:function(data,type,row){
                             var saleprice = parseFloat(row.saleprice);
                             return numeral(saleprice).format("0,0.0");
                         }},
                     {mRender:function(data,type,row){
                             var stockalarm = parseFloat(row.stockalarm);
                             //return moment(estimateclosingddate).format("ddd Do MMM,YYYY");
                             return numeral(stockalarm).format("0,0")+" items";
                         }},
                      
                     {mRender:function(data,type,row){
                         var status = row.status;
                         if(status===1){
                             status = "<span>Active <i class='fa fa-unlock' aria-hidden='true' style='color:#1ec20e;font-size:11px;'></i></span>";

                         }else{
                            status = "<span>Locked <i class='fa fa-lock' aria-hidden='true' style='color:#f61409;font-size:11px;' ></i> </span>";
                         }
                         return status;
                         },

                     },
                      {data:"name"}
                 ],
                 pageLength:10,
                 bLengthChange:false,
                 bAutoWidth:false,
                 autowidth:false,
                 bDestroy: true
             });
        }
    });
}

$("#productinventorylink").on('click',function(event){
    event.preventDefault();
     window.location.replace("/inventory");

$(window).bind("load", function() {
  getStock();
});


     
})




$("#registeritembtn").on('click',function(event){
    window.location.replace("/products");
  
});

function getStock() {
    $.ajax({
        url:'getstock',
        dataType:'json',
        method:'get',
        success:function(data){
             var i=1;
             $("#inventorytable").DataTable({
                processing: true,
                dom:'Bfrtip',
                buttons:[
                         {
                            extend: 'excelHtml5',
                            title: 'Product Inventory'
                        },
                            {
                             extend: 'csvHtml5',
                            title: 'Product Inventory'
                            },
                            {
                             extend: 'copyHtml5',
                             title: 'Product Inventory'
                            },
                         {
                             extend: 'pdfHtml5',
                             title: 'Product Inventory'
                            }
                   // 'copy','csv','excel','pdf','print'
                 ],
                data: data,
                 createdRow: function(row,data,index){
                     $(row).attr('id',data.id).find('td').eq(1).attr('class','td-check');
                     $(row).attr('id',data.id).find('td').eq(2).attr('class','td-itemid');
                     $(row).attr('id',data.id).find('td').eq(3).attr('class','td-itemname');
                     $(row).attr('id',data.id).find('td').eq(4).attr('class','td-category');
                     $(row).attr('id',data.id).find('td').eq(5).attr('class','td-stockqty');
                     $(row).attr('id',data.id).find('td').eq(6).attr('class','td-lastupdated');
                 },

                 columns:[
                 {mRender:function(){
                    $checkbox = "<span><input type='checkbox'/></span>"
                             return $checkbox;
                         }},
                     {mRender:function(){
                             return i++;
                         }},
                    {data:"id"},
                     {data:"productname"},
                     {data:"category"},
                     {mRender:function(data,type,row){
                             var stockqty = parseFloat(row.stockqty);
                           return numeral(stockqty).format("0,0.0");
                         }},
                     
                      
                     {mRender:function(data,type,row){
                         var updated_at = row.updated_at;
                         if(updated_at=== null){
                             updated_at = "N/A";

                         }else{
                           updated_at = moment(updated_at).format("ddd Do MMM,YYYY");
                         }
                         return updated_at;
                         },
                     },
                      {data:"name"},
                 ],
                 pageLength:10,
                 bLengthChange:false,
                 bAutoWidth:false,
                 autowidth:false,
                 bDestroy: true
             });
        }
    });
}

$(document).ready(function(){
    var currentpath = window.location.pathname;
   // alert("current path: "+currentpath);
   if(currentpath === '/inventory'){
             getStock();
    }else if(currentpath==='/products'){
        getAllproducts();
    }
});


 

$(document).on("click","table#inventorytable >tbody >tr",function(e){
     $(".overlay").css("display","block");
     $(".addproductstock").css("display","block");
     $(".addproductstock").show().focus();
     
      const itemid = $(this).closest('tr').find('td.td-itemid').text();
      $("#productid").val(itemid);

       const itemname = $(this).closest('tr').find('td.td-itemname').text();
        $("#productname").val(itemname);
});


$("#cancelbtn").on('click',function(event){
    event.preventDefault();
      $(".overlay").css("display","none");
  $(".addproductstock").css("display","none");
  $('#addstockform')[0].reset();
  $('#addstockform').parsley().reset();
});


/*ADD STOCK*/

$(document).ready(function(){
    
$("#addstockform").parsley();

    $("#addstockform").on('submit',function(event){
          event.preventDefault();
    
 
    if($('#addstockform').parsley().isValid())
        {
            $.ajax({
                url: 'addstock',
                method:"post",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function()
                {
                    $('#addstockbtn').attr('disabled', 'disabled');
                    $('#addstockbtn').html('Submitting...');
                },
                success:function(data)
                {
                   
                    $('#addstockbtn').attr('disabled', false);
                     $('#addstockbtn').html('<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp;Save');
                    $(".statusmsg").css("display","block").fadeOut(4000);
                    if(data.response>0){
                        $(".statusmsg").removeClass("alert-danger");
                        $(".statusmsg").addClass("alert-success");
                        $("#errormsq").html(data.msg);
                        $('#addstockform')[0].reset();
                        $('#addstockform').parsley().reset();
                         getStock();
                    }else{
                        $("#errormsq").text(data.msg);
                        $('#addstockbtn').attr('disabled', false);
                        $('#addstockbtn').html('<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp;Save');
                    }
                }
                 });
      }
      else{
       // alert("btn clicked, form invalid");
      }
  }) 
});


$(document).on('click','table#productstable >tbody >tr',function(e){
    $(".overlay").css("display","block");
     $(".newproductcontainer").css("display","block");
     $("#cardtitle").text("Edit Item");

      const itemid = $(this).closest('tr').find('td.td-itemid').text();
      $("#productid").val(itemid);

      const itemname = $(this).closest('tr').find('td.td-itemname').text();
      $("#productname").val(itemname);

      const category = $(this).closest('tr').find('td.td-category').text();
      $("#category").val(category);

       const costprice = $(this).closest('tr').find('td.td-costprice').text();
      $("#costprice").val(numeral(costprice).format('0.00'));

       const saleprice = $(this).closest('tr').find('td.td-saleprice').text();
      $("#saleprice").val(numeral(saleprice).format('0.00'));

      const stockalarm = $(this).closest('tr').find('td.td-stockalarm').text();
      $("#stockalarm").val(stockalarm.split(" ")[0]);

      $("#profit").val(saleprice - costprice);

}); 
 
