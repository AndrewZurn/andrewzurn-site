// Carosel 1
var Conclave1=(function(){
    var buArr1 =[];
		var buArr2 =[];
	  var buArr3 =[];
	  var buArr4 =[];
	  var buArr5 =[];
	  var buArr6 =[];
		var arlen;
	
    return {
      init:function(){
        this.addCN();this.clickReg();
      },
      addCN:function(){
        var buarr=["holder_bu_awayL2","holder_bu_awayL1","holder_bu_center","holder_bu_awayR1","holder_bu_awayR2"];
        for(var i=1;i<=buarr.length;++i){
          $("#bu"+i).removeClass().addClass(buarr[i-1]+" holder_bu");
					$("#bu"+(i+5)).removeClass().addClass(buarr[i-1]+" holder_bu2");
					$("#bu"+(i+10)).removeClass().addClass(buarr[i-1]+" holder_bu3");
					$("#bu"+(i+15)).removeClass().addClass(buarr[i-1]+" holder_bu4");
					$("#bu"+(i+20)).removeClass().addClass(buarr[i-1]+" holder_bu5");
					$("#bu"+(i+25)).removeClass().addClass(buarr[i-1]+" holder_bu6");
        }
      },
      clickReg:function(){
        $(".holder_bu").each(function(){
          buArr1.push($(this).attr('class'))
        });
				$(".holder_bu2").each(function(){
          buArr2.push($(this).attr('class'))
        });
				$(".holder_bu3").each(function(){
          buArr3.push($(this).attr('class'))
        });
				$(".holder_bu4").each(function(){
          buArr4.push($(this).attr('class'))
        });
				$(".holder_bu5").each(function(){
          buArr5.push($(this).attr('class'))
        });
				$(".holder_bu6").each(function(){
          buArr6.push($(this).attr('class'))
        });
				
        arlen=buArr1.length;
        for(var i=0;i<arlen;++i){
          buArr1[i]=buArr1[i].replace(" holder_bu","")
					buArr2[i]=buArr2[i].replace(" holder_bu2","")
					buArr3[i]=buArr3[i].replace(" holder_bu3","")
					buArr4[i]=buArr4[i].replace(" holder_bu4","")
					buArr5[i]=buArr5[i].replace(" holder_bu5","")
					buArr6[i]=buArr6[i].replace(" holder_bu6","")
        };
				
				// Carosel 1
        $(".holder_bu").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu","");
          var cpos=buArr1.indexOf(joCN),mpos=buArr1.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr1.shift();
                buArr1.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+i).removeClass().addClass(buArr1[i-1]+" holder_bu");
                }
                --tomove;
              }
          }
        });
				
				// Carosel 2
				$(".holder_bu2").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu2","");
          var cpos=buArr2.indexOf(joCN),mpos=buArr2.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr2.shift();
                buArr2.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+5)).removeClass().addClass(buArr2[i-1]+" holder_bu2");
                }
                --tomove;
              }
          }
        });
				
				// Carosel 3
				$(".holder_bu3").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu3","");
          var cpos=buArr3.indexOf(joCN),mpos=buArr3.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr3.shift();
                buArr3.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+10)).removeClass().addClass(buArr3[i-1]+" holder_bu3");
                }
                --tomove;
              }
          }
        });
				
				// Carosel 4
				$(".holder_bu4").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu4","");
          var cpos=buArr4.indexOf(joCN),mpos=buArr4.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr4.shift();
                buArr4.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+15)).removeClass().addClass(buArr4[i-1]+" holder_bu4");
                }
                --tomove;
              }
          }
        });
				
				// Carosel 5
				$(".holder_bu5").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu5","");
          var cpos=buArr5.indexOf(joCN),mpos=buArr5.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr5.shift();
                buArr5.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+20)).removeClass().addClass(buArr5[i-1]+" holder_bu5");
                }
                --tomove;
              }
          }
        });
				
				// Carosel 6
				$(".holder_bu6").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu6","");
          var cpos=buArr6.indexOf(joCN),mpos=buArr6.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr6.shift();
                buArr6.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+25)).removeClass().addClass(buArr6[i-1]+" holder_bu6");
                }
                --tomove;
              }
          }
        });
      },
      auto:function(){
        for(i=1;i<=1;++i){
          $(".holder_bu").delay(4000).trigger('click',"bu"+i).delay(4000);
					$(".holder_bu2").delay(4000).trigger('click',"bu"+i).delay(4000);
					$(".holder_bu3").delay(4000).trigger('click',"bu"+i).delay(4000);
					$(".holder_bu4").delay(4000).trigger('click',"bu"+i).delay(4000);
					$(".holder_bu5").delay(4000).trigger('click',"bu"+i).delay(4000);
					$(".holder_bu6").delay(4000).trigger('click',"bu"+i).delay(4000);
          console.log("called");
        }
      }
    };
})();

$(document).ready(function(){
    window['conclave1']=Conclave1;
    Conclave1.init();
})
