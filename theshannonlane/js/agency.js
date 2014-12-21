/*!
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

// JS for the Carousel feature in the portfolio area of the website
var Conclave=(function(){
    var buArr =[],arlen;
    return {
      init:function(){
        this.addCN();this.clickReg();
      },
      addCN:function(){
        var buarr=["holder_bu_awayL2","holder_bu_awayL1","holder_bu_center","holder_bu_awayR1","holder_bu_awayR2"];
        for(var i=1;i<=buarr.length;++i){
          $("#bu"+i).removeClass().addClass(buarr[i-1]+" holder_bu");
        }
      },
      clickReg:function(){
        $(".holder_bu").each(function(){
          buArr.push($(this).attr('class'))
        });
        arlen=buArr.length;
        for(var i=0;i<arlen;++i){
          buArr[i]=buArr[i].replace(" holder_bu","")
        };
        $(".holder_bu").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu","");
          var cpos=buArr.indexOf(joCN),mpos=buArr.indexOf("holder_bu_center");
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
              while(tomove){
                var t=buArr.shift();
                buArr.push(t);
                for(var i=1;i<=arlen;++i){
                  $("#bu"+i).removeClass().addClass(buArr[i-1]+" holder_bu");
                }
                --tomove;
              }
          }
        })
      },
      auto:function(){
        for(i=1;i<=1;++i){
          $(".holder_bu").delay(4000).trigger('click',"bu"+i).delay(4000);
          console.log("called");
        }
      }
    };
})();

$(document).ready(function(){
    window['conclave']=Conclave;
    Conclave.init();
})

// Supports the clicking of a portfolio item, which will initalize it's carosel and display it
/* $(document).ready(function(){
    $("#portfolioModal1").click(function() {
        $("#carosel-container1").append( '<div id="wrapper_bu">' +
            '<div id="bu1"> Slide 1 </div>' +
            '<div id="bu2"> Slide 2 </div>' +
            '<div id="bu3"> Slide 3 </div>' +
            '<div id="bu4"> Slide 4 </div>' +
            '<div id="bu5"> Slide 5 </div>' +
            '</div>' 
        );
        window['conclave']=Conclave;
        Conclave.init();
    });
                                
    $('#portfolioModal2').click(function() {
        $('#carosel-container2').append( '<div id="wrapper_bu">' +
            '<div id="bu1"> Slide 1 </div>' +
            '<div id="bu2"> Slide 2 </div>' +
            '<div id="bu3"> Slide 3 </div>' +
            '<div id="bu4"> Slide 4 </div>' +
            '<div id="bu5"> Slide 5 </div>' +
            '</div>' 
        );
        window['conclave']=Conclave;
        Conclave.init();
    });
    
    $('#portfolioModal3').click(function() {
        $('#carosel-container3').append( '<div id="wrapper_bu">' +
            '<div id="bu1"> Slide 1 </div>' +
            '<div id="bu2"> Slide 2 </div>' +
            '<div id="bu3"> Slide 3 </div>' +
            '<div id="bu4"> Slide 4 </div>' +
            '<div id="bu5"> Slide 5 </div>' +
            '</div>' 
        );
        window['conclave']=Conclave;
        Conclave.init();
    });
    
    $('#portfolioModal4').click(function() {
       $('#carosel-container4').append( '<div id="wrapper_bu">' +
            '<div id="bu1"> Slide 1 </div>' +
            '<div id="bu2"> Slide 2 </div>' +
            '<div id="bu3"> Slide 3 </div>' +
            '<div id="bu4"> Slide 4 </div>' +
            '<div id="bu5"> Slide 5 </div>' +
            '</div>' 
        );
        window['conclave']=Conclave;
        Conclave.init();
    });
    
    $('#portfolioModal5').click(function() {
        $('#carosel-container5').append( '<div id="wrapper_bu">' +
            '<div id="bu1"> Slide 1 </div>' +
            '<div id="bu2"> Slide 2 </div>' +
            '<div id="bu3"> Slide 3 </div>' +
            '<div id="bu4"> Slide 4 </div>' +
            '<div id="bu5"> Slide 5 </div>' +
            '</div>' 
        );
        window['conclave']=Conclave;
        Conclave.init();
    });
    
    $('#portfolioModal6').click(function() {
        $('#carosel-container6').append( '<div id="wrapper_bu">' +
            '<div id="bu1"> Slide 1 </div>' +
            '<div id="bu2"> Slide 2 </div>' +
            '<div id="bu3"> Slide 3 </div>' +
            '<div id="bu4"> Slide 4 </div>' +
            '<div id="bu5"> Slide 5 </div>' +
            '</div>' 
        );
        window['conclave']=Conclave;
        Conclave.init();
    });
}) */