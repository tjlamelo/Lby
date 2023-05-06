
Menu = document.getElementById("nav");


window.onscroll = function () {
    if(pageYOffset > 60){
        nav.style.position = "fixed";
        nav.style.top = "0";
        nav.style.background = "rgb(216, 130, 31)";
        nav.style.transition= ".5s";
        
    }else{
        nav.style.position = "relative";
        nav.style.top = "100";
        nav.style.background = "#ED7C0A";
        nav.style.transition= ".5s";
        
    }
}




// Js du slider 

var anim = {
	
	cadre: "slider",
	
	width: 100,
	height: 500,
	unite_w : "%",
	unite_h : "px",
	
	pas: 1, //pour deplacer l'image
	date : 20, //durée après chaque pas (en miliseconde)
    
    type : 1, //de l'animation (1 ou 2)
    

////////////////pour l'auto///////////////////////////////
    pause : 5000,
    sens : "right",
//////////////////////////////////////////////////////////

	transition : 2, //durée de transition en seconde

	src : [	
			"Images/a.jpg",
			"Images/b.jpg", 
			"Images/c.jpg"
			],
    

    /*DON'T TOUCH*/    
    pos : [],
    position : 0,
    interval : undefined,

    auto : undefined

}


window.onload = function (event) {

    load = document.getElementById("container");
    container.style.visibility = "hidden";
    container.style.transition = "1.2s";

	load_animation();
    
    ///pour l'auto////////////////////////////////////////
    anim.auto = setInterval(manage_animation, anim.pause);
    /////////////////////////////////////////////////////
}





//////////////pour l'auto////////////////////////////////
function manage_animation(argument) {
	
	switch(anim.type){
		case 1:
			if (anim.sens == "right" && anim.position + 1 <= anim.src.length-1)
				next()
			else
				anim.sens = "left";

			if (anim.sens == "left" &&  anim.position - 1 >= 0)
				prev()
			else
				anim.sens = "right";

		break;
		case 2:
			if (anim.sens == "right" && anim.pos[0].x - anim.pas  >= -1*anim.width*(anim.pos.length-1) )
				next();
			else
				anim.sens = "left"

			if (anim.sens == "left" && anim.pos[anim.pos.length-1].x + anim.pas <= anim.width*(anim.pos.length-1) )
				prev();
			else
				anim.sens = "right";
		break;
	}
	
}

//////////////////////////////////////////////////////////////////////

function load_animation(argument) {


	
	//on initialise les positions des img
	if (anim.type == 2) 
		for (var i = 0; i < anim.src.length; i++) {
			anim.pos[i] = {
				x : anim.width*i,
				y : 0
			}
		}


   //on crée les img
   for (var j = 0; j < anim.src.length; j++) {
   	 el = document.createElement("img");
   	 el.setAttribute("id", anim.cadre+"_IMG"+j);
   	 el.setAttribute("src", anim.src[j]);
   	 document.getElementById(anim.cadre).appendChild(el);
   }
   

   //on applique les style
   for (var k = 0; k < anim.src.length; k++) {

   	 _obj_(anim.cadre+"_IMG"+k).width = anim.width + anim.unite_w;
   	 _obj_(anim.cadre+"_IMG"+k).height = anim.height + anim.unite_h;

   	 _obj_(anim.cadre+"_IMG"+k).position = "absolute";
   	
     if (anim.type == 1) { 
       _obj_(anim.cadre+"_IMG"+k).left =  0 + anim.unite_w;
   	   _obj_(anim.cadre+"_IMG"+k).top =  0 + anim.unite_h;
       _obj_(anim.cadre+"_IMG"+k).opacity = 0;
       _obj_(anim.cadre+"_IMG"+k).transition = anim.transition + "s";
   	 }
   	 else{
   	   _obj_(anim.cadre+"_IMG"+k).left =  anim.pos[k].x + anim.unite_w;
   	   _obj_(anim.cadre+"_IMG"+k).top =  anim.pos[k].y + anim.unite_h;
   	 }
   
   }

   if (anim.type == 1)
    _obj_(anim.cadre+"_IMG"+anim.position).opacity = 1;

}



function _obj_(arg) {
	return document.getElementById(arg).style;
}


function next() {
	
	switch(anim.type){
		case 1:
		 if (anim.position + 1 <= anim.src.length-1) {
			anim.position++;
			_obj_(anim.cadre+"_IMG"+ (anim.position-1) ).opacity = 0;
			_obj_(anim.cadre+"_IMG"+anim.position).opacity = 1;
		 }
		break;
		case 2:
		 clearInterval(anim.interval)
  		 anim.interval = setInterval(next_animation_for2, anim.date);
		break;
	}
	
}

function prev(argument) {
    
    switch(anim.type){
		case 1:
		 if (anim.position - 1 >= 0) {
			anim.position--;
			_obj_(anim.cadre+"_IMG"+ (anim.position+1) ).opacity = 0;
			_obj_(anim.cadre+"_IMG"+anim.position).opacity = 1;
		 }
		break;
		case 2:
		 clearInterval(anim.interval)
  	     anim.interval = setInterval(prev_animation_for2, anim.date);
		break;
	}

}

function next_animation_for2() {
	
	if (anim.pos[0].x - anim.pas >= -1*anim.width*(anim.pos.length-1) ) 
		for (var i = 0; i < anim.pos.length; i++) 	
			anim.pos[i].x -= anim.pas;

	if (anim.pos[0].x % anim.width == 0)
		clearInterval(anim.interval); 

   //on les positionne en fonction de leurs positions
   for (var k = 0; k < anim.pos.length; k++) {
   	_obj_(anim.cadre+"_IMG"+k).left =  anim.pos[k].x + anim.unite_w;
   	_obj_(anim.cadre+"_IMG"+k).top =  anim.pos[k].y + anim.unite_h;
   }

}

function prev_animation_for2() {
	
	if (anim.pos[anim.pos.length-1].x + anim.pas <= anim.width*(anim.pos.length-1) ) 
		for (var i = 0; i < anim.pos.length; i++) 	
			anim.pos[i].x += anim.pas;

	if (anim.pos[0].x % anim.width == 0)
		clearInterval(anim.interval); 

   //on les positionne en fonction de leurs positions
   for (var k = 0; k < anim.pos.length; k++) {
   	_obj_(anim.cadre+"_IMG"+k).left =  anim.pos[k].x + anim.unite_w;
   	_obj_(anim.cadre+"_IMG"+k).top =  anim.pos[k].y + anim.unite_h;
   }

}


