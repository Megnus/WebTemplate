$(document).ready(function() {
	var win = $(window),
		carusel = $('#carousel'),
		caruselUl = $('#carousel ul'),
		caruselUlLi = $('#carousel ul li'),
		caruselInner = $('#carousel > div'),
		menu = $('#cssmenu'),
		bottomDiv = $("#bottom-div"),
		caruselImages;

	var imageWidth = 0,
		isUp = false,
		leftPosCaruselUl = 0,
		imagePath = "img/carousel/";

	$.ajax({
		url: "../src/getImages.php ",
		dataType: "json",
		success: function(data) {
			loadSucess(data);
		}
	});

	function loadSucess(data) {
		$.each(data, function(i, file) {
			caruselUl.append(" <li><img src='" + imagePath + file + "' style=\"opacity: 0;\"/></li> ");
		});

		caruselImages = $('#carousel img');

		caruselUl.find("img:last").load(function() {
			var	caruselInnerImgFirst = $('#carousel img:first');
			caruselUlLi.css('width', caruselInnerImgFirst.width());
			caruselInner.css('height', caruselInnerImgFirst.height());
			caruselInner.css('width', caruselInnerImgFirst.width() * caruselImages.length);
			carusel.css('width', $('html').width());
			leftPosCaruselUl = (win.width() - caruselInner.width()) / 2;
			caruselUl.css('left', leftPosCaruselUl);
			caruselImages.fadeTo("slow", 1);
			imageWidth = caruselInnerImgFirst.width();
			bottomDiv.css('top', win.height());

			setInterval(function() {draws();}, 10000);
		});
	}

	function draws() {	
		var fadeIsSet = false;
		caruselImages.fadeTo("slow", 0.4, function() {
			if (!fadeIsSet) {
				caruselUl.animate({'left': '-=' + imageWidth}, 1000, function() {
					var liLast = $('#carousel ul li:last'),
						liFirst = $('#carousel ul li:first'),
						nthImage = $('#carousel ul li:nth-child(4) img');
					liLast.after(liFirst);
					caruselUl.css('left', leftPosCaruselUl);
					nthImage.fadeTo("slow", 1);
				});
				fadeIsSet = true;
			}
		});
	}

	win.scroll(function() {
		
		var topval = Number(caruselInner.offset().top - win.scrollTop() - menu.height()),
			winHeight = window.innerHeight,
			bootomDivHeight = bottomDiv.height(),
			docHeight = $(document).height(),
			winScrollTop = win.scrollTop();

		menu.css('top', (topval < 0 ? topval : 0) + 'px');	
		
		if (win.scrollTop() + winHeight > docHeight - 100) {
			if (!isUp) {
				bottomDiv.css('top', winHeight); 
				bottomDiv.animate({'top': '-=' + bootomDivHeight}, function() {
					bottomDiv.css('top', winHeight - bootomDivHeight);
				});
				isUp = true;
			} 
		} else if (isUp) {
			isUp = false;
			bottomDiv.animate({'top': '+=' + bootomDivHeight}, function() {
				bottomDiv.css('top', winHeight + 100);
			});	
		}		
	});

	win.resize(function() {
		caruselUl.css('left',  (win.width() - caruselInner.width()) / 2);
		carusel.css('width', $('html').width());
	});			
});	