//load blog feed and display the first few blog posts in the feedContainer in the footer section
$(document).ready(function() {
    var feedUrl = "http://andrewzurn.com/blog/?feed=rss2";
    var feedContainer=document.getElementById("feedContainer");
    var feed = new google.feeds.Feed(feedUrl);

    feed.setNumEntries(3);
    feed.load( function(result) {
        var list = "";
        if (!result.error){
            var posts=result.feed.entries;
            for (var i = 0; i < posts.length; i++) {
                list+="<h6><a href='" + posts[i].link + "'target=_blank'" + "'>" + posts[i].title + "</a></h6>";
                list+="<p class='small-text'>" + posts[i].contentSnippet + "<br/>";
                list+= "<div class='small-text text-right'>" + new Date(posts[i].publishedDate).toDateString().substr(4) + "</div></p>";
            }
            feedContainer.innerHTML = list;
        }
        else {
            feedContainer.innerHTML = "Unable to fetch feed from " + feedUrl;
        }
    });

    $('.nav a').on('click', function(){
        $(".btn-navbar").click(); //bootstrap 2.x
        $(".navbar-toggle").click() //bootstrap 3.x by Richard
    });
});

//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('.page-scroll a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1700, 'easeInOutExpo');
        event.preventDefault();
    });
});