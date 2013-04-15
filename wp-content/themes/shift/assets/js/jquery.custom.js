/*! Stag Cookie Reader*/
var stagCookies={getItem:function(a){if(!a||!this.hasItem(a)){return null}return unescape(document.cookie.replace(new RegExp("(?:^|.*;\\s*)"+escape(a).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=\\s*((?:[^;](?!;))*[^;]?).*"),"$1"))},setItem:function(d,g,c,b,a,e){if(!d||/^(?:expires|max\-age|path|domain|secure)$/i.test(d)){return}var f="";if(c){switch(c.constructor){case Number:f=c===Infinity?"; expires=Tue, 19 Jan 2038 03:14:07 GMT":"; max-age="+c;break;case String:f="; expires="+c;break;case Date:f="; expires="+c.toGMTString();break}}document.cookie=escape(d)+"="+escape(g)+f+(a?"; domain="+a:"")+(b?"; path="+b:"")+(e?"; secure":"")},removeItem:function(b,a){if(!b||!this.hasItem(b)){return}document.cookie=escape(b)+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT"+(a?"; path="+a:"")},hasItem:function(a){return(new RegExp("(?:^|;\\s*)"+escape(a).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=")).test(document.cookie)},keys:function(){var a=document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g,"").split(/\s*(?:\=[^;]*)?;\s*/);for(var b=0;b<a.length;b++){a[b]=unescape(a[b])}return a}};

jQuery(document).ready(function($){
    /*------------------------------------------------------------------------------*/
    /* Set cookie for retina displays; refresh if not set
    /*------------------------------------------------------------------------------*/

    if( !stagCookies.hasItem('retina') && 'devicePixelRatio' in window && window.devicePixelRatio === 2 ){
        stagCookies.setItem('retina', window.devicePixelRatio);
        window.location.reload();
    }

    /*------------------------------------------------------------------------------*/
    /* Mobile Navigation Setup
    /*------------------------------------------------------------------------------*/
    var mobileNav = $('#primary-menu').clone().attr('id', 'mobile-primary-nav');

    $('#primary-menu').supersubs({
        minWidth: 10,
        maxWidth: 14,
        extraWidth: 1
    }).superfish({
        delay: 100,
        animation: {opacity:'show', height:'show'},
        speed: 'fast',
        autoArrows: false,
        dropShadows: false
    });

    function stag_mobilemenu(){
        "use strict";
        var windowWidth = $(window).width();
        if( windowWidth <= 992 ) {
            if( !$('#mobile-nav').length ) {
                $('<a id="mobile-nav" href="#mobile-primary-nav"><i class="icon icon-navicon"></i></a>').prependTo('#navigation');
                mobileNav.insertAfter('#mobile-nav').wrap('<div id="mobile-primary-nav-wrap" />');
                mobile_responder();
            }
        }else{
            mobileNav.css('display', 'none');
        }
    }
    stag_mobilemenu();

    function mobile_responder(){
        $('#mobile-nav').click(function(e) {
            if( $('body').hasClass('ie8') ) {
                var mobileMenu = $('#mobile-primary-nav');
                if( mobileMenu.css('display') === 'block' ) {
                    mobileMenu.css({
                        'display' : 'none'
                    });
                } else {
                    mobileMenu.css({
                        'display' : 'block',
                        'height' : 'auto',
                        'z-index' : 999,
                        'position' : 'absolute'
                    });
                }
            } else {
                $('#mobile-primary-nav').stop().slideToggle(500);
            }
            e.preventDefault();
        });
    }

    $(window).resize(function() {
        stag_mobilemenu();
    });

    /*------------------------------------------------------------------------------*/
    /* Keyboard Navigation
    /*------------------------------------------------------------------------------*/
    $("body").keydown(function(e){
      if(e.keyCode === 39){
        if($('a[rel=next]').attr('href') !== undefined){
            document.location.href = $('a[rel=next]').attr('href');
        }
      }else if(e.keyCode === 37){
        if($('a[rel=prev]').attr('href') !== undefined){
            document.location.href = $('a[rel=prev]').attr('href');
        }
      }
    });

    /*------------------------------------------------------------------------------*/
    /* Top Overlay Thing
    /*------------------------------------------------------------------------------*/
    var overlay = $('#overlay'),
        overlayTrigger = $('#overlay-trigger'),
        overlayWpapper = $('.overlay-wrapper'),
        overlayIcon = $('#overlay-trigger i.icon');

    overlayTrigger.toggle(function(){
        overlayWpapper.slideDown(parseInt(stag.animDuration));
        overlayIcon.removeClass('icon-plus');
        overlayIcon.addClass('icon-minus');
    }, function(){
        overlayWpapper.slideUp(parseInt(stag.animDuration));
        overlayIcon.removeClass('icon-minus');
        overlayIcon.addClass('icon-plus');
    });


    /*------------------------------------------------------------------------------*/
    /* FitVids
    /*------------------------------------------------------------------------------*/
    $("#primary, .entry-content").fitVids();


    /*------------------------------------------------------------------------------*/
    /* Ensure things won't go crazy in older browsers
    /*------------------------------------------------------------------------------*/
    $('.ie8 .format-chat p:nth-child(even)').addClass('chat-style');
    $('.ie8 .home .entry-content').find("p:first").addClass('mt40');


    /*------------------------------------------------------------------------------*/
    /* Load More Posts
    /*------------------------------------------------------------------------------*/
    var load = $('#load-more'),
        page = 1,
        archive = load.attr('rel');

    load.on('click', function(e){
        e.preventDefault();
        page++;
        load.addClass('active');
        $.post(stag.ajaxurl, { action: 'stag_load_more_posts', nonce: stag.nonce, page: page, archive:archive }, function( data ) {
            var content = $(data.content);
            $('#primary').append(content);
            load.removeClass('active');
            if(page >= data.pages) load.fadeOut();
        }, 'json');
    });

    /*------------------------------------------------------------------------------*/
    /* Setup Post Likes
    /*------------------------------------------------------------------------------*/
    $('.stag-likes').live('click', function(e){
        e.preventDefault();
        var link = $(this);
        if(link.hasClass('active')) return false;

        var id = $(this).attr('id');

        $.post(stag_likes.ajaxurl, {action: 'stag-likes', likes_id: id}, function(data){
            link.html(data).addClass('active').attr('title','You already like this');
        });
    });

});


/*------------------------------------------------------------------------------*/
/* Target all Gallery Post Formats Sliders
/*------------------------------------------------------------------------------*/
jQuery(window).load(function($){
    jQuery('[data-role="slider"]').each(function(){
        jQuery('#'+jQuery(this).attr('id')).flexslider({
            smoothHeight: true,
            directionNav: false,
            after: function(){
                jQuery(window).resize();
            },
            start: function(){
                jQuery(window).resize();
            }
        });
    });
});