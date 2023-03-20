document.getElementById("fikt").addEventListener("mouseover", function(){
	document.getElementById("fikt").style.backgroundColor = "green";
	document.getElementById("fikt").style.fontSize = "60px";
	document.getElementById("fikt").style.color = "white";
});

document.getElementById("fikt").onmouseleave = function() {
	document.getElementById("fikt").style.backgroundColor = "transparent";
	document.getElementById("fikt").style.color = "black";
}