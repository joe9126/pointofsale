$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var itemslist=[]; var j=1;
$("input[type=text]").val('');


function keyPress (e) {
    if(e.key === "Escape") {
         $("#searchbox").val('');
    }
}

/* AUTOSEARCH */

$(document).ready(function(){
	 var currentpath = window.location.pathname;
   // alert("current path: "+currentpath);
   if(currentpath === '/pointofsale'){
            $.ajax({
			url:'getproductregistry',
			type:'get',
			dataType:'json',
			success:function(data){
				 $.each(data,function(index,value){
                  itemslist.push(value.productname); 
                  itemslist.push(value.id);  
                  //console.log(itemslist);
                });
			}
		});
    }	

});



 $(function(){
      
     $("#searchbox").autocomplete({
         source:function(request,response){
             var results = $.ui.autocomplete.filter(itemslist,request.term);
             response(results.slice(0,10));
         }
     });
 });

   $('#searchbox').on('keypress', function (e) {
         if(e.which === 13){
            //Disable textbox to prevent multiple submit
            $(this).attr("disabled", "disabled");
            var productname = $(this).val(); 
            var i=0; 
            
           // var grandtotal=0;

            $.ajax({
            	url:'searchproduct',
            	type:'get',
            	async:false,
            	dataType:'json',
            	data:{'searchphrase':productname},
            	success:function(data){
            		
            		if(data[0].status===0){
            			 $(".statusmsg").css("display","block").fadeOut(5000);
            			 var msg = productname+" is locked! Please contact Admin";
            			 $("#errormsq").text(msg);
            		}
            		else if(data[i].stockqty<1){
            			 $(".statusmsg").css("display","block").fadeOut(5000);
            			 var msg = productname+" is out of stock! Please check inventory.";
            			 $("#errormsq").text(msg);
            		}
            		else{
            			    var rows = $("table#salelist >tbody >tr").length;
            					 
            				for(var t=1;t<=rows;t++){
            							var itemlistid = $("#salelist tbody tr:nth-child("+t+")").find("td:nth-child(3)").html();
            							//alert("counter:"+t+"itemlistid: "+itemlistid+" dbitemid:"+data[0].id);

            							if(itemlistid === $.trim(data[0].id)){
            								//alert("match found at row: "+t);
            								            								
            								var itemqty = parseInt($("#salelist tbody tr:nth-child("+t+")").find("td:nth-child(6)").html()) + 1;
            								
            								$("#salelist tbody tr:nth-child("+t+")").find("td:nth-child(6)").html(itemqty);

            								$itemtotal = numeral(parseFloat($.trim(data[0].saleprice))*parseFloat(itemqty)).format("0,0.00");
            								$("#salelist tbody tr:nth-child("+t+")").find("td:nth-child(7)").html($itemtotal);
            								$('#searchbox').val('');  $('#searchbox').focus(); 
            								getGrandtotal();
            								return true;
            								}
            							 
            							}


            								$itemtotal = numeral(parseFloat(data[i].saleprice)*1).format("0,0.0");
            								$itemdata = "<tr><td class='td-remove'><button class='del-item'><i class='fa fa-times' aria-hidden='true'></i></button></td><td>"+(rows+1)+"</td><td class='td-itemid'>"+data[i].id+"</td><td class='td-productname'>"+data[i].productname+"</td><td>"+data[i].saleprice+"</td><td class='td-itemqty'>1</td><td class='td-itemtotal'>"+$itemtotal+"</td></tr>";
            								$("table#salelist >tbody:last-child").append($itemdata);
            								$('#searchbox').val('');  $('#searchbox').focus();
            								getGrandtotal();
            						
            		}
            	},compelete:function(data){	}
           
        });
          	
            //Enable the textbox again if needed.
            $(this).removeAttr("disabled");
         }
         
   });

   /*CALCULATE SALES TOTAL*/

function getGrandtotal(){
	var grandtotal=0;
		$("#salelist tbody >tr").each(function(){
            	grandtotal = grandtotal + parseFloat(numeral($(this).find("td:nth-child(7)").html()).format("0.00"));
            });
		console.log('grandtotal '+grandtotal);
		
		$("input[name=totalsale]").val(numeral(grandtotal).format("0,0.00"));
		
}
 
 

   $(".del-item").on('click',function(){
   		 $(".overlay").css("display","block");
   });

   $("#cashbtn").on("click",function(){
   		var totalsale = parseFloat(numeral($("#totalsale").val()).format("0"));
   		//alert("total sale:"+totalsale);
   		if(totalsale<1){
   				 
            	$("#errormsq").text("Please add at least one item to sell!");
            	 $(".statusmsg").css("display","block").fadeOut(5000);
            	 $("#searchbox").focus();
   		}else{
   			$(".overlay").css("display","block");
   		  $(".cashsale").css("display","block");
   		  $("#totalsaletext").val(numeral(totalsale).format("0,0.00"));
   		    $("#cashtext").focus();
   		}
   		 
   });

   $("#cashtext").on("change paste keyup",function(e){
   		if($.isNumeric($(this).val())){
   			var totalsale = parseFloat(numeral($("#totalsale").val()).format("0"));
   			var cashissued = parseFloat(numeral($("#cashtext").val()).format("0"));
   			var balance = cashissued - totalsale;
   			$("#changetext").val(numeral(balance).format("0,0.00"));
   		}
   });


   $(document).ready(function(){
   		 $("#transcashform").parsley();
   		 $("#transcashform").on("submit",function(event){
   		 	event.preventDefault();



   		 	if($('#transcashform').parsley().isValid()){
   		 	 
                   executeSale();
                	
                }
                
   		 	})
   		 });
   


function executeSale(){
    
    var rows = $("table#salelist >tbody >tr").length;
   var totaldiscount=0; 
   var totalqty=0; 
   var totalvat=0; 
   var grandtotal=0; 
   var itemsubtotal=0; 
   var transubtotal=0; 
   var tzoffset = (new Date()).getTimezoneOffset() * 60000; //offset in milliseconds
   var d = new Date();
   var transaction_no = Math.floor((Math.random() * 10000) + 1)+""+d.getFullYear()+d.getMonth()+d.getDay();
   var timestamp = (new Date(Date.now()-tzoffset)).toISOString().slice(0,-1).replace("T"," ");
 
    for(var i=1;i<=rows;i++){ //GET TRANSACTION DETAILS
        var itemid =  $("tr:nth-child("+i+") td:nth-child(3)").html(); 
        var qty =  parseFloat($("tr:nth-child("+i+") td:nth-child(6)").html());
        var unitprice =  parseFloat($("tr:nth-child("+i+") td:nth-child(5)").html());
       //var disc = parseFloat($("tr:nth-child("+i+") td:nth-child(8)").html());
       //var vat = parseFloat($("tr:nth-child("+i+") td:nth-child(9)").html());
        var itemtotal = parseFloat($("tr:nth-child("+i+") td:nth-child(7)").html());
       var transprofit;
       
   var totalBP = function(){
     var temp_total=0;
        $.ajax({ 
           url:"pos/getitemDetails",
           type:"get",
           dataType:"json",
           async: false,
           data:{searchid:itemid},
           success:function(data){
             $.each(data,function(index,value){
             
                temp_total = temp_total +(parseFloat(value.costprice)*qty); 
             }); 
           } 
       });
       return temp_total;
   }();
         
         
        itemsubtotal = qty * unitprice;
        transubtotal = transubtotal + itemsubtotal;
        //totaldiscount = totaldiscount + disc;
       totalqty = totalqty + qty;
       //totalvat = totalvat + (((vat/100)*unitprice)*qty);
       grandtotal = grandtotal + itemtotal;  
       transprofit = transubtotal - totalBP;
        }
     
      
    $.ajax({
        url:"pos/createtransaction",
        type: 'post',
        dataType:'json',
        data:{transaction_no:transaction_no,transubtotal:transubtotal,totaldiscount:0,totalvat:0,transprofit:transprofit,
        payment_mode:'Cash',totalcost:totalBP},
        success:function(data){
           
            if(data.response>0){
             for(var i=1;i<=rows;i++){
         		var itemid =  $("tr:nth-child("+i+") td:nth-child(3)").html(); 
        		var qty =  parseFloat($("tr:nth-child("+i+") td:nth-child(6)").html());
       			var unitprice =  parseFloat($("tr:nth-child("+i+") td:nth-child(5)").html());
       			//var disc = parseFloat($("tr:nth-child("+i+") td:nth-child(8)").html());
       			//var vat = parseFloat($("tr:nth-child("+i+") td:nth-child(9)").html());
        		var itemtotal = parseFloat($("tr:nth-child("+i+") td:nth-child(7)").html());
       
      			$.ajax({
          			url: 'pos/transact_sale',
           			type: 'POST',
        			dataType: 'json',
        			// async: true,
          			 data: {transaction_no:transaction_no,item_id:itemid,qty_sold:qty,unit_price:unitprice,discount:0,vat:0,payment_mode:"cash"},
           			 success: function(data){
           				// console.log("success function running: "+data.status);
             			$('#executesalebtn').attr('disabled', false);
                	 	$('#executesalebtn').html('<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp;Transact Sale');
                		$("#transactionmsg").css("display","block").fadeOut(6000);
                    	if(data.response>0){

                        	$(".statusmsg").removeClass("alert-danger");
                        	$(".statusmsg").addClass("alert-success");
                        	$("#errormsg").text(data.msg);
                        	
                          	$("#salelist tbody ").empty();
                          	$("input[name=totalsale]").val('');

                         
                          $('#transcashform').parsley().reset();
                          
                              $('#transcashform')[0].reset();
                    	}else{
                        	$("#errormsq").text(data.msg);
                        	$('#saveitemBtn').attr('disabled', false);
                        	$('#saveitemBtn').html('<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp;Transact Sale');
                   		 }
             		},
           			error: function(status){
          			
               			// console.log("error logged: "+status);
               			}
       				});
   				   }      
            	}else{
          			 alert("an error occured");
            	}
        }
    });
    
    setTimeout(function(){
      $("#cashsale").css("display","none").fadeOut(6000);
        window.open('receiptprinter?trans_no='+transaction_no+'&cash='+$("#cashtext").val(), "", "width=600,height=600,scrollbars=yes");

    },2000); 
     
 }


