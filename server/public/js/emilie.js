

var wrapper = document.getElementById("wrapper");
var getHeight = window.innerHeight;


wrapper.style.height = getHeight +"px";
wrapper.style.overflow = "hidden";

window.onresize = function(){
	var updateHeight = window.innerHeight;
	wrapper.style.height = updateHeight +"px";
};

console.log (window.innerHeight);