var interval = null,
    currentSlide = 0,
    nextSlide = 0;

function getRandom() {
	return Math.random();
}

function getRandomArbitary(min, max) {
    return Math.random() * (max - min) + min;
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function onAfterCufon() {
    if ($('html').hasClass('cufon-ready')) {
        // Height of Sidebars and Content components
        var sb = $('.left-sb'),
            content = $('.content'),
            sbText = $('.sb-text'),
            sbImages = $('.sb-images'),
            sbButton = $('.sb-button'),
            sbtInner = $('.sbt-inner'),
            sbHeight = 0;
        
        $(sbtInner).each(function(index, item) {
            var sbiHeight = $(item).height();
            if (sbiHeight > sbHeight) {
                sbHeight = sbiHeight;
            }
        });
		if (!sbButton.find('object').length) {
                    sbHeight += 70;
                }
                else {
                    sbHeight += 20;
                }
                
		
		sbButtonHeight = 0;
		sbButton.each(function(index, item) {
                    if ($(item).find('object').length) {
                        sbButtonHeight += $(item).height() + 5;
                    }
                    else {
			sbButtonHeight += $(item).height() + 50;
                    }
		});
		

        if ($(content[0]).height() > sbHeight + $(sbImages[0]).height() + $('.sb-youtube-link').height() + sbButtonHeight) {
            sbButton.each(function(index, item) {
                            if (!$(item).find('object').length) {
            $(sbText[0]).height($(content[0]).height() - $(sbImages[0]).height() - $('.sb-youtube-link').height() - sbButtonHeight);
                                        }
                        });
        }
		else {
			sbButton.each(function(index, item) {
                            /*if (!$(item).find('object').length) {
                                $(sbText[0]).height(sbHeight);
                            }*/
                        });
                        
                        if (!sbButton.length && sbText.length) {
                            $(sbText[0]).height(sbHeight);
                        }
		}
        
		var activeNumber = getRandomInt(1, sbtInner.length) - 1;
		currentSlide = activeNumber;
		$(sbtInner).each(function(index, item) {
			$(item).css({
                'position': 'absolute',
                'width': $(sb[0]).width(),
                'left': '3px',
                'top': '35px'
            });
            if (sbButton.find('object').length) {
                $(sbtInner).each(function(index, item) {
			$(item).css({
                            'top': '13px'
                        });
                });
            }
            if (index != activeNumber) {
                $(item).css('display', 'none');
            }
        });
        clearInterval(interval);
    }
}

function changeSlide() {
    var slides = $('.sbt-inner');
    // Indian code of get random element
	nextSlide = currentSlide;
	while (nextSlide == currentSlide) {
		nextSlide = getRandomInt(1, slides.length) - 1;
	}
    $(slides[currentSlide]).fadeOut(300);
    $(slides[nextSlide]).fadeIn(300);
    currentSlide = nextSlide;
}

$(function() {
    // Main Menu
    var mmLinks = $('#menu-topnav > li > a');
    mmLinks.each(function(index, item) {
        $(item).append('<span></span>');
        if (($(item).parent().hasClass('current_page_item') && index != mmLinks.length - 1) || ($(item).parent().hasClass('current_page_ancestor') && index != mmLinks.length - 1)) {
            $(mmLinks[index + 1]).css('border-top-color', '#000');
        }
        if (!$(item).parent().hasClass('current_page_item') && !$(item).parent().hasClass('current_page_ancestor')) {
            $(item).hover(function() {
                if (index != mmLinks.length - 1) {
                    $(mmLinks[index + 1]).css('border-top-color', '#008c99');
                }
            }, function() {
                if (index != mmLinks.length - 1) {
                    if (!$(this).parent().hasClass('show')) {
                        $(mmLinks[index + 1]).css('border-top-color', '#abb21d');
                    }
                }
            });
        }
        if (index == mmLinks.length - 1) {
            $(item).parent().addClass('last');
        }
    });
    var mmLis = $('#menu-topnav li');
    mmLis.each(function(index, item) {
        $(item).hover(function() {
            $(item).addClass('show');
            $('span', $(item)).css('background-color', '#b2bb1e');
            if ($('>ul', $(item)).length) {
                $('>ul', $(item)).show(200);
            }
        }, function() {
            $(item).removeClass('show');
            if (!$(item).hasClass('current_page_item') && !$(item).hasClass('current_page_ancestor')) {
                $('span', $(item)).css('background-color', '#000000');
            }
            if ($('>ul', $(item)).length) {
                $('>ul', $(item)).hide(200);
            }
            Cufon.replace('#menu-topnav > li > a', {
                fontFamily: 'bank-gothic-light-bt',
                hover: true
            });
            var aaa = $(this).next();
            $('a', aaa).css('border-top-color', '#abb21d');
        });
    });
    
    // Height of Columns
    var cContainers = $('.columns');
    cContainers.each(function(index, item) {
        var columns = $('>.column', $(item)),
            height = $(columns[0]).height();
        for (var i = 1; i < columns.length; i++) {
            if ($(columns[i]).height() > height) {
                height = $(columns[i]).height();
            }
        }
        columns.css('height', height);
    });
    
    interval = setInterval('onAfterCufon()', 100);
    
    // Change Sidebar slide
    if ($('.sbt-inner').length > 1) {
        setInterval('changeSlide()', 5000);
    }
	
    // Nivo slider
    $('#slider').nivoSlider({
        effect: 'fade',
        slices: 14,
        boxCols: 8,
        boxRows: 4,
        animSpeed: 200,
        pauseTime: 1200
    });
});