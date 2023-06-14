window.onload = function(){
	if(window.location.pathname =="/salesreports"){
		$.ajax({
			url:"generalsales",
			type:"get",
			dataType:"json",
			success:function(data){
				//console.log(data);

				var i=1;
             $("#generalsalestable").DataTable({
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
                     $(row).attr('id',data.id).find('td').eq(1).attr('class','td-transno');
                     $(row).attr('id',data.id).find('td').eq(2).attr('class','td-date');
                     $(row).attr('id',data.id).find('td').eq(3).attr('class','td-paymode');
                     $(row).attr('id',data.id).find('td').eq(4).attr('class','td-productname');
                     $(row).attr('id',data.id).find('td').eq(5).attr('class','td-qtysold');
                     $(row).attr('id',data.id).find('td').eq(6).attr('class','td-unitprice');
                     $(row).attr('id',data.id).find('td').eq(7).attr('class','td-grosstotal');
                     $(row).attr('id',data.id).find('td').eq(8).attr('class','td-discount');
                     $(row).attr('id',data.id).find('td').eq(9).attr('class','td-vat'); 
                     $(row).attr('id',data.id).find('td').eq(10).attr('class','td-nettotal'); 
                     $(row).attr('id',data.id).find('td').eq(11).attr('class','td-cashier');           
                     
                 },

                 columns:[
                 
                     {mRender:function(){
                             return i++;
                         }},
                    {data:"transaction_no"},
                    {mRender:function(data,type,row){
                             var saledate = moment(row.created_at).format("Do MMM,YYYY h:m a");
                           //  return moment(createddate).format("ddd Do MMM,YYYY");
                           return saledate;
                         }
                     },
                    
                    {data:"payment_mode"},
                     {data:"productname"},
                     {data:"qty_sold"},

                     {mRender:function(data,type,row){
                             var unitprice = parseFloat(row.unit_price);
                           //  return moment(createddate).format("ddd Do MMM,YYYY");
                           return numeral(unitprice).format("0,0.00");
                         }},
                      {mRender:function(data,type,row){
                             var grosstotal = parseFloat(row.unit_price)*parseFloat(row.qty_sold);
                             return numeral(grosstotal).format("0,0.00");
                         }},
                     {mRender:function(data,type,row){
                             var discount = parseFloat(row.discount);
                             //return moment(estimateclosingddate).format("ddd Do MMM,YYYY");
                             return numeral(discount).format("0,0.00");
                         }},
                      
                     {mRender:function(data,type,row){
                         var vat = row.vat;
                         
                          return numeral(vat).format("0,0.00");
                         }                   

                     },
                     {mRender:function(data,type,row){
                             var grosstotal = parseFloat(row.unit_price)*parseFloat(row.qty_sold);
                             var nettotal = grosstotal - parseFloat(row.discount) - parseFloat(row.vat);;
                             return numeral(nettotal).format("0,0.00");
                         }
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
}