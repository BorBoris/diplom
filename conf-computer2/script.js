
function openbox(type, id, component){
	if(id == 0){
		if(component.getAttribute("selected") <= 0){

			document.querySelector('.box').style.display = 'block'

			let xhr = new XMLHttpRequest();

		
			xhr.open('GET', "link/elements.php?type="+type+"&element=0&id=0", false);

			
			xhr.send();

			
			if (xhr.status != 200) {
			 
			  alert( "Произошла ошибка" ); 
			} else {
				
			  document.querySelector('.box').innerHTML = xhr.responseText
			}
		}
	}else{

		
		document.querySelector('.box').style.display = 'block'

		let xhr = new XMLHttpRequest();

		
		xhr.open('GET', "link/elements.php?type="+type+"&element=1&id="+id, false);

			
		xhr.send();

			
		if (xhr.status != 200) {
			 
			alert( "Произошла ошибка" ); 
		} else {
				
			document.querySelector('.box').innerHTML = xhr.responseText
		}
	}
}
function openboxadmin(type, id, component){
	if(id == 0){
		if(component.getAttribute("selected") <= 0){
			document.querySelector('.box').style.display = 'block'


			let xhr = new XMLHttpRequest();

		
			xhr.open('GET', "../link/elements.php?type="+type+"&element=0&id=0&admin=1", false);

			
			xhr.send();

			
			if (xhr.status != 200) {
			 
			  alert( "Произошла ошибка" ); 
			} else {

			  document.querySelector('.box').innerHTML = xhr.responseText
			}
		}
	}
}

let mboard = 0,
	cpu = 0,
	gpu = 0,
	cpufan = 0,
	ram = 0,
	hdd = 0,
	block = 0,
	price = 0;



function addelement(type, id, component){


	price = Number(component.getAttribute("price"))+price
	document.querySelector('.price').innerHTML = price+"р."

	if(type == "mboard"){
		document.querySelector('.box').style.display = 'none'
		mboard = id
		ajaxrequest(id, type)
		document.querySelector('.m-board').setAttribute("selected", "1")
		document.querySelector('.gpu').setAttribute("selected", -component.getAttribute("gpu")+1)
		document.querySelector('.hdd').setAttribute("selected", -component.getAttribute("hdd")+1)
		document.querySelector('.ram').setAttribute("selected", -component.getAttribute("ram")+1)
		document.querySelector('.cpu').setAttribute("selected", "0")
		document.querySelector('.box').style.display = 'none'
		
		document.querySelector('.gpu').innerHTML += "x"+component.getAttribute("gpu")
		document.querySelector('.ram').innerHTML += "x"+component.getAttribute("ram")
		document.querySelector('.hdd').innerHTML += "x"+component.getAttribute("hdd")
	}
	if(type == "cpu"){
		cpu = id;
		document.querySelector('.'+type).setAttribute("selected", Number(document.querySelector('.'+type).getAttribute('selected'))+1)
		ajaxrequest(id, type)
		document.querySelector('.box').style.display = 'none'
	}
	if(type == "gpu"){
		gpu = id;		
		document.querySelector('.'+type).setAttribute("selected", Number(document.querySelector('.'+type).getAttribute('selected'))+1)
		ajaxrequest(id, type)
		document.querySelector('.box').style.display = 'none'
	}
	if(type == "cpufan"){
		cpufan = id;
		document.querySelector('.'+type).setAttribute("selected", Number(document.querySelector('.'+type).getAttribute('selected'))+1)
		ajaxrequest(id, type)
		document.querySelector('.box').style.display = 'none'
	}
	if(type == "ram"){
		ram = id;
		document.querySelector('.'+type).setAttribute("selected", Number(document.querySelector('.'+type).getAttribute('selected'))+1)
		ajaxrequest(id, type)
		document.querySelector('.box').style.display = 'none'
	}
	if(type == "hdd"){
		hdd = id;
		document.querySelector('.'+type).setAttribute("selected", Number(document.querySelector('.'+type).getAttribute('selected'))+1)
		ajaxrequest(id, type)
		document.querySelector('.box').style.display = 'none'
	}
	if(type == "block"){
		block = id;	
		document.querySelector('.'+type).setAttribute("selected", Number(document.querySelector('.'+type).getAttribute('selected'))+1)
		ajaxrequest(id, type)
		document.querySelector('.box').style.display = 'none'
	}


}

function ajaxrequest(id, type){

	document.querySelector('.box').style.display = 'block'

	let xhr = new XMLHttpRequest();

		
	xhr.open('GET', "link/handler.php?id="+id+"&type="+type, false);

			
	xhr.send();

			
	if (xhr.status != 200) {
			 
		alert( "Произошла ошибка" ); 
	} else {

	document.querySelector('.box-selected').innerHTML += xhr.responseText
	}
}


function openboxadmin(type, id, component){
	if(id == 0){
		if(component.getAttribute("selected") <= 0){
			document.querySelector('.box').style.display = 'block'


			let xhr = new XMLHttpRequest();

		
			xhr.open('GET', "../link/elements.php?type="+type+"&element=0&id=0&admin=1", false);

			
			xhr.send();

			
			if (xhr.status != 200) {
			 
			  alert( "Произошла ошибка" ); 
			} else {

			  document.querySelector('.box').innerHTML = xhr.responseText
			}
		}
	}
}

function dltelement(type, id, component){

	price = price-Number(component.getAttribute("price"))
	document.querySelector('.price').innerHTML = price+"р."
	component.parentNode.removeChild(component);
	if(type == "mboard"){

		window.location.href = window.location.href
	}else{
		document.querySelector('.'+type).setAttribute("selected", Number(document.querySelector('.'+type).getAttribute('selected'))-1)
	}

}



if(document.querySelector(".edit-element")){
	document.querySelector(".main").style.display = 'none'
}else{
	document.querySelector(".main").style.display = 'block'
}


document.addEventListener('keydown', function(event) {
	  if(event.code == "Escape"){
	  		document.querySelector(".box").style.display = 'none'
	  }
});