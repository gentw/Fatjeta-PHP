function validimiKontaktFormes(){

var name = document.getElementById('name').value;
var email = document.getElementById('email').value;
var message = document.getElementById('message').value;

if(name =='' && email == ''){
	document.getElementById("result").innerHTML = "Plotesoni Fushat !"
	return false;
}
else if(name == ''){
	document.getElementById("result").innerHTML = "Ju Lutem Plotesoni emrin !";
	return false;
}
else if(name.length<4){
	document.getElementById("result").innerHTML = "Emri duhet te permbaj minimum 4 Karaktere !";
	return false;	
}
else if(email == ''){
	document.getElementById("result").innerHTML = "Nuk keni Shtypur Email-in !";
	return false ;
}
else if(!email.includes("@",".com")){
	document.getElementById("result").innerHTML = "Shtoni Email Valide !";
	return false;
}
else if(message == ''){
	document.getElementById('result').innerHTML = "Mesazhi eshte i Zbrazet !";
}
else{
	return true;
}

}