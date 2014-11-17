(function (window, document, undefined) {
	var menus, images, def;

	var setupImage = function(index) {
		menus[index].addEvents({
			mouseenter: function() {
				images[index].removeClass('hidden');
				def.addClass('hidden');
			},
			mouseleave: function() {
				images.addClass('hidden');
				def.removeClass('hidden');
			}
		})
	}

	window.addEvent('domready', function() {
		menus	= $$('body.home #menu .menu li');
		images	= $$('#header .header_image');

		def = images.shift();

		for (i = menus.length-1; i >= 0; i--) {
			setupImage(i);
		}
	});
})(this, this.document);

var ItemPop = new Class({

	elements: 	null,
	settings: 	null,
	toggles:	null,

	initialize: function(container) {
		var i;

		this.elements	= this.getElements(container);
		this.settings	= this.getSettings();
		this.toggles	= new Array();

		for (i = 0; i < this.elements.length; i++) {
			this.toggles.push(new Fx.Styles(this.elements[i], this.getTransition()));
		}

		container.addEvents({
			mouseenter: this.transition.bind(this, 1),
			mouseleave: this.transition.bind(this, 0)
		});
		this.transition(0);
	},

	getElements: function(container) {
		return new Array();
	},
	getSettings: function() {
		return new Array();
	},
	getTransition: function () {
		return { 'duration': 200 };
	},

	transition: function(index) {
		var i;
		for (i = this.toggles.length - 1; i >= 0; i--) {
			this.toggles[i].stop();
			this.toggles[i].start(this.settings[i][index]);
		}
	}
});

var MenuItemPop = ItemPop.extend({
	getElements: function (container) {
		var elements = new Array();

		elements.push(container);
		elements.push((container.getElement('a') !== null)? container.getElement('a') : container.getElement('span'));
		elements.push(elements[1].getElement('span'));

		return elements;
	},
	getSettings: function() {
		return [
				[ {}, {} ],
				[ { 'top': 0 }, { 'top': -5 } ],
				[ { 'line-height': 32 }, { 'line-height': 41 } ]
			   ];
	}
});

var BottomItemPop = ItemPop.extend({
	getElements: function (container) {
		var elements = new Array();

		elements.push(container);
		elements.push(container.getElement('.title'));
		elements.push(container.getElement('.inner'));
		elements.push(container.getElement('.body'));
		elements.push(container.getElement('h3'));

		return elements;
	},
	getSettings: function () {
		return [
				[ {}, {} ],	// .moduleBlock
				[ {'margin-top': 15 }, { 'margin-top': 20 } ],	// .title
				[ { 'height': 343, 'left': 0, 'top': 0, 'width': 236 }, { 'height': 355, 'left': -5, 'top': -5, 'width': 247 } ],	// .inner
				[ { 'padding-right': 14, 'padding-left': 14 }, { 'padding-right': 19, 'padding-left': 20 } ],	// .body
				[ { 'line-height': 32 }, { 'line-height': 41 } ],	// h3
			   ];
	}
});

window.addEvent('domready', function() {
	var menu, bottom;

	menu = $$('#menu .moduletable_menu');
	if (menu.length) {
		menu[0].getElements('li').each(function(li) {
			new MenuItemPop(li);
		});
	}

	bottom = $$('#bottom');
	if (bottom.length) {
		bottom[0].getElements('.moduleBlock').each(function(li) {
			new BottomItemPop(li);
		});
	}
});



function set_cookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	} else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function get_cookie(name) {
	var name_eq = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(name_eq) == 0) return c.substring(name_eq.length,c.length);
	}
	return null;
}

if(get_cookie("page_size") != null &&  get_cookie("page_size") != "NaN"){
	document.write('<style>');
	document.write('#content{');
	document.write('font-size:'+ get_cookie("page_size") + 'px');
	document.write('}');
	document.write('</style>')
}else{
	document.write('<style>');
	document.write('#content{');
	document.write('font-size: 12px');
	document.write('}');
	document.write('</style>')
	set_cookie('page_size', 12, 30);
}
function resize(increase) {
	size = parseInt(get_cookie("page_size"), 10);
	if (increase)
		size += 2
	else
		size -= 2

	size = Math.min(16, Math.max(10, size));
	$('content').setStyle("font-size", size+"px");
	set_cookie('page_size', size, 30);
}


