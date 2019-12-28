jQuery(document).ready(function () {
    jQuery('ul.accordion a.opener').click(function () {
        if(jQuery(this).next().is("ul"))
        {
            jQuery(this).parent().find("ul:first").slideToggle();
            jQuery(this).parent().toggleClass('active');
            return false;
        }
    });

 



    jQuery("ul.accordion .current-cat").parent().slideToggle().parent().toggleClass('active');

    if(jQuery("ul.accordion a.active").next().is(':hidden'))
    {
        if(jQuery("ul.accordion .current-cat").length > 0 )
        {

        }
        else
        {
             jQuery("ul.accordion a.active").next().slideToggle();    
        }      
    }
});

jQuery(function () {
    // This will select everything with the class smoothScroll
    // This should prevent problems with carousel, scrollspy, etc...
    jQuery('.smoothScroll').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                jQuery('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000); // The number here represents the speed of the scroll in milliseconds
                return false;
            }
        }
    });
     jQuery(document).on('change','.notCorrect',function(){
        jQuery(this).removeClass('notCorrect');
    })

     jQuery('#contactForm .submit_btn').on('click',function(event){
        event.preventDefault();     
        var dataForAjax="action=my_action&";
        var valid = true;
        
        jQuery(this).closest('form').find('input:not([type=submit]),textarea').each(function(i,elem){
            if(this.value.length<3&&jQuery(this).hasClass('required')){
                valid = false;
                jQuery(this).addClass('notCorrect');             
            }
            if(jQuery(this).attr('name')=='email'&&jQuery(this).hasClass('required')){
                var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}jQuery/i;
                if(!pattern.test(jQuery(this).val())){
                    valid = false;
                    jQuery(this).addClass('notCorrect');                 
                }
            }
            if(jQuery(this).attr('name')=='agree' && !jQuery(this).prop("checked")){  
                jQuery(this).addClass('notCorrect'); 
                valid = false;
            }

            if(i>0)
            {
                dataForAjax+='&';
            }
            dataForAjax+=this.name+'='+this.value;
        })
        
        if(!valid){
            return false;
        }       

        jQuery( "#contactForm" ).submit();
    });

	jQuery(document).on('click', '.js-link', function (event) {
        var href = jQuery(this).data('href');

        if ( href.substring(0,4) != 'http' ) {
            var base64 = base64_decode(href);
            if ( base64.substring(0,4) == 'http' ) {
                href = base64;
            }
        }

        var target = 'self';
        if ( jQuery(this).data('target') == 'blank' || jQuery(this).data('target') == '_blank' ||
             jQuery(this).attr('target') == 'blank' || jQuery(this).attr('target') == '_blank' ) {
            target = 'blank';
        }

        if ( target == 'blank' ) {
            window.open( href );
        } else {
            document.location.href = href;
        }
    });

	jQuery('.js-spoiler-box-title').click(function(){
        var $this = jQuery(this);
        $this.toggleClass('active').next().slideToggle();
    })

    /*jQuery('.feedback .submit_btn').on('click',function(event){
        event.preventDefault();     
        var dataForAjax="action=my_action&";
        var addressForAjax = myajax.url;
        var valid = true;
        
        jQuery(this).closest('form').find('input:not([type=submit]),textarea').each(function(i,elem){
            if(this.value.length<3&&jQuery(this).hasClass('required')){
                valid = false;
                jQuery(this).addClass('notCorrect');             
            }
            if(jQuery(this).attr('name')=='email'&&jQuery(this).hasClass('required')){
                var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}jQuery/i;
                if(!pattern.test(jQuery(this).val())){
                    valid = false;
                    jQuery(this).addClass('notCorrect');                 
                }
            }
            if(jQuery(this).attr('name')=='agree' && !jQuery(this).prop("checked")){  
                jQuery(this).addClass('notCorrect'); 
                valid = false;
            }

            if(i>0)
            {
                dataForAjax+='&';
            }
            dataForAjax+=this.name+'='+this.value;
        })
        
        if(!valid){
            return false;
        }
        jQuery.ajax({
            type:'POST',
            data:dataForAjax,
            url:addressForAjax,
            success: function(response){                
                    
                    jQuery(".data").slideUp();
                    jQuery(".result_form").fadeIn();
                
            }       
        });
    });*/

    /*if(jQuery('#check-also-box').length>0 && jQuery(window).width() > 1800){
        var articleHeight =  jQuery('.text_block').outerHeight();
        var checkAlsoClosed = false ;
        jQuery(window).scroll(function() {
            if( !checkAlsoClosed ) {
                var articleScroll = jQuery(document).scrollTop();
                if ( articleScroll > articleHeight ){jQuery('#check-also-box').addClass('show-check-also');} 
                else {jQuery('#check-also-box').removeClass('show-check-also');}
            }
        });
    }
    jQuery("#check-also-close").click(function() {
        jQuery("#check-also-box").removeClass("show-check-also");
        checkAlsoClosed = true ;
        return false;
    });*/

    jQuery('.buttonUp a').click(function(e) {
        e.preventDefault()
        jQuery('body,html').stop(false, false).animate({
            scrollTop: 0
        }, 800)
    });

});


jQuery('.menu-btn,.close').click(function () {
    jQuery('.main-menu-content').toggle(300);
});

jQuery('.rubrics-show').click(function () {
    console.log(123);
    jQuery('.rubrics-mobile ul').toggle(500);
});

jQuery('.content-list--show').click(function () {
    jQuery('.content-list-body').toggle(500);
});

jQuery('body').on('click', '.anchor-top', function (e) {
    e.preventDefault()

    jQuery('body, html').stop(false, false).animate({
        scrollTop: 0
    }, 1000)
})


jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > jQuery(window).innerHeight()) {
        jQuery('.anchor-top').fadeIn(300)
    } else {
        jQuery('.anchor-top').fadeOut(200)
    }
})


/*jQuery(function () {
    console.log(123);
   jQuery(".sticky_column").stick_in_parent();  
   jQuery('.sticky_column').hcSticky({
        stickTo: '.article__content'
      });

});*/




jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > jQuery(window).innerHeight()) {
        jQuery('.buttonUp').fadeIn(300)
    } else {
        jQuery('.buttonUp').fadeOut(200)
    }
})


// Функция декодирования строки из base64
function base64_decode (encodedData) { // eslint-disable-line camelcase
                                        //  discuss at: http://locutus.io/php/base64_decode/
                                        // original by: Tyler Akins (http://rumkin.com)
                                        // improved by: Thunder.m
                                        // improved by: Kevin van Zonneveld (http://kvz.io)
                                        // improved by: Kevin van Zonneveld (http://kvz.io)
                                        //    input by: Aman Gupta
                                        //    input by: Brett Zamir (http://brett-zamir.me)
                                        // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
                                        // bugfixed by: Pellentesque Malesuada
                                        // bugfixed by: Kevin van Zonneveld (http://kvz.io)

    if (typeof window !== 'undefined') {
        if (typeof window.atob !== 'undefined') {
            return decodeURIComponent(escape(window.atob(encodedData)))
        }
    } else {
        return new Buffer(encodedData, 'base64').toString('utf-8')
    }

    var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/='
    var o1
    var o2
    var o3
    var h1
    var h2
    var h3
    var h4
    var bits
    var i = 0
    var ac = 0
    var dec = ''
    var tmpArr = []

    if (!encodedData) {
        return encodedData
    }

    encodedData += ''

    do {
        // unpack four hexets into three octets using index points in b64
        h1 = b64.indexOf(encodedData.charAt(i++))
        h2 = b64.indexOf(encodedData.charAt(i++))
        h3 = b64.indexOf(encodedData.charAt(i++))
        h4 = b64.indexOf(encodedData.charAt(i++))

        bits = h1 << 18 | h2 << 12 | h3 << 6 | h4

        o1 = bits >> 16 & 0xff
        o2 = bits >> 8 & 0xff
        o3 = bits & 0xff

        if (h3 === 64) {
            tmpArr[ac++] = String.fromCharCode(o1)
        } else if (h4 === 64) {
            tmpArr[ac++] = String.fromCharCode(o1, o2)
        } else {
            tmpArr[ac++] = String.fromCharCode(o1, o2, o3)
        }
    } while (i < encodedData.length)

    dec = tmpArr.join('')

    return decodeURIComponent(escape(dec.replace(/\0+$/, '')))
}


   jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 1){
          jQuery('header').addClass("stickyl");
        }
        else{
            jQuery('header').removeClass("stickyl");
        }
    });


(function($) {
      $(document).ready(function() {
        var $sticky = $('.article__right-margin');

        $sticky.hcSticky({
          stickTo: '.article__middle',
          bottom: "10",
          bottomEnd: "30",
          responsive: {
            980: {
              disable: true
            }
          }
        });
      });
    })(jQuery);