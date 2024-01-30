let totalRecord = 0;
let fromRange = $("#fromRangeInputId").val();
let toRange = $("#toRangeInputId").val();
let language = $("#language").val();
$.ajax({
	type: 'POST',
	url : "../pages/home.php",
	dataType: "json",			
	data:{totalRecord:totalRecord, fromRange:fromRange, toRange:toRange, language:language},
	success: function (data) {
		$("#results").append(data.products);
		totalRecord++;
	}
});	
$(window).scroll(function() {
	scrollHeight = parseInt($(window).scrollTop() + $(window).height());		
	if(scrollHeight == $(document).height()){	
		if(totalRecord <= totalData){
			loading = true;
			$('.loader').show();                
			$.ajax({
				type: 'POST',
				url : "../pages/home.php",
				dataType: "json",			
				data:{totalRecord:totalRecord, fromRange:fromRange, toRange:toRange, language:language},
				success: function (data) {
					$("#results").append(data.products);
					$('.loader').hide();
					totalRecord++;
				}
			});
		}            
	}
});


