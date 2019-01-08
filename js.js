function pad(n, width, z) {
	z = z || '0';
	n = n + '';
	return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function okno(id, count) {
	if (count > 0) {
		window.open("/fotky/dreviny/f" + pad(id, 3) + "_1v.jpg")
		// window.open("podstranky/popis.php?id=" + id, scrollbars = true, resize = true);
	}
}

function fotka2(cislo) {
	document.getElementById('velka').src = "/img/f" + cislo + "_.jpg";

}
function schovaj() {
	document.getElementById('div_velka').style.display = "none";
}
function fotka(objekt) {
	cislo = objekt.src.substring(objekt.src.lastIndexOf('/') + 2, objekt.src.lastIndexOf('/') + 4);
	document.getElementById('velka').src = "/img/fotogaleria/f" + cislo + ".jpg";
	document.getElementById('div_velka').style.display = "block";
	// + (document.body.clientHeight - 300)/2
	document.getElementById('div_velka').style.top = document.body.scrollTop;
}
function schovaj() {
	document.getElementById('div_velka').style.display = "none";
}