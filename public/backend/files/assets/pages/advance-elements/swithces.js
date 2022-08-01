"use strict";
$(document).ready(function() {

	var elem = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
	elem.forEach(function(html) {
		// let size = this.getAttribute("data-size");
		let size;
		let color;
		if(html.getAttribute('data-size') == 'null'){
			size = 'large';
		}else if(html.getAttribute('data-size') == 'small'){
			size = 'small'
		}else{
			size = 'medium'
		}

		console.log(html.getAttribute('data-color'));

		if(html.getAttribute('data-color') == 'null'){
			color = '#4680ff'
		}else{
			color = html.getAttribute('data-color')
		}


		var switchery = new Switchery(html, { color: color, jackColor: '#fff', size: size  });
	});

});
