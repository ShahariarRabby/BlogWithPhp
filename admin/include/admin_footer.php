 </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
     
    <script src="js/jquery.js"></script>
    

     <script>
		
$('#selectAllBoxes').click(function(){
	if(this.checked){
		 //alert(123);
		$('.checkBoxes').each(function(){
			this.checked=true;
		});
	}else{
		$('.checkBoxes').each(function(){
			this.checked=false;
		});
	}
});


function loadUserOnline (){
	
	$.get("function.php?useronlines=result", function(data){
		$(".useronline").text(data);
	});
	
	
	
}

setInterval(function(){
	loadUserOnline();
},500);



</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
   

</body>

</html>
