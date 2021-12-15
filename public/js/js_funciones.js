function myFunction(){
	var x = document.getElementById("myDIV");

	if(x.style.display === "none"){
		x.style.display = "block";
	}else{
		x.style.display = "none";
	}
}
function readURL(input,id){
	if(input.files && input.files[0]){
		var reader = new FileReader();
		reader.onload = (event)=>{
			$(id).attr('src',event.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$('#imagen').change(function(){
	readURL(this,'#imagenmuestra');
})
//Show logo
$('#imagen_logo').change(function(){
	readURL(this,'#show_logo');
})
//Show banner login
$('#imagen_banner').change(function(){
	readURL(this,'#show_banner');
})