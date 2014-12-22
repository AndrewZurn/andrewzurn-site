// Carosel 1
var Conclave1=(function(){
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
					
        });
      },
      auto:function(){
        for(i=1;i<=1;++i){
          $(".holder_bu").delay(4000).trigger('click',"bu"+i).delay(4000);
          console.log("called");
        }
      }
    };
})();

// Carosel 2
var Conclave2=(function(){
    var buArr =[],arlen;
	
    return {
      init:function(){
        this.addCN();this.clickReg();
      },
      addCN:function(){
        var buarr=["holder_bu_awayL2","holder_bu_awayL1","holder_bu_center","holder_bu_awayR1","holder_bu_awayR2"];
        for(var i=1;i<=buarr.length;++i){
          $("#bu"+(i+5)).removeClass().addClass(buarr[i-1]+" holder_bu2");
        }
      },
      clickReg:function(){
        $(".holder_bu2").each(function(){
          buArr.push($(this).attr('class'))
        });
				
        arlen=buArr.length;
        for(var i=0;i<arlen;++i){
          buArr[i]=buArr[i].replace(" holder_bu2","")
        };
				
        $(".holder_bu2").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu2","");
          var cpos=buArr.indexOf(joCN),mpos=buArr.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr.shift();
                buArr.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+5)).removeClass().addClass(buArr[i-1]+" holder_bu2");
                }
                --tomove;
              }
          }
					
        });
      },
      auto:function(){
        for(i=1;i<=1;++i){
          $(".holder_bu2").delay(4000).trigger('click',"bu"+i).delay(4000);
          console.log("called");
        }
      }
    };
})();

// Carosel 3
var Conclave3=(function(){
    var buArr =[],arlen;
	
    return {
      init:function(){
        this.addCN();this.clickReg();
      },
      addCN:function(){
        var buarr=["holder_bu_awayL2","holder_bu_awayL1","holder_bu_center","holder_bu_awayR1","holder_bu_awayR2"];
        for(var i=1;i<=buarr.length;++i){
          $("#bu"+(i+10)).removeClass().addClass(buarr[i-1]+" holder_bu3");
        }
      },
      clickReg:function(){
        $(".holder_bu3").each(function(){
          buArr.push($(this).attr('class'))
        });
				
        arlen=buArr.length;
        for(var i=0;i<arlen;++i){
          buArr[i]=buArr[i].replace(" holder_bu3","")
        };
				
        $(".holder_bu3").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu3","");
          var cpos=buArr.indexOf(joCN),mpos=buArr.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr.shift();
                buArr.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+10)).removeClass().addClass(buArr[i-1]+" holder_bu3");
                }
                --tomove;
              }
          }
					
        });
      },
      auto:function(){
        for(i=1;i<=1;++i){
          $(".holder_bu3").delay(4000).trigger('click',"bu"+i).delay(4000);
          console.log("called");
        }
      }
    };
})();

// Carosel 4
var Conclave4=(function(){
    var buArr =[],arlen;
	
    return {
      init:function(){
        this.addCN();this.clickReg();
      },
      addCN:function(){
        var buarr=["holder_bu_awayL2","holder_bu_awayL1","holder_bu_center","holder_bu_awayR1","holder_bu_awayR2"];
        for(var i=1;i<=buarr.length;++i){
          $("#bu"+(i+15)).removeClass().addClass(buarr[i-1]+" holder_bu4");
        }
      },
      clickReg:function(){
        $(".holder_bu4").each(function(){
          buArr.push($(this).attr('class'))
        });
				
        arlen=buArr.length;
        for(var i=0;i<arlen;++i){
          buArr[i]=buArr[i].replace(" holder_bu4","")
        };
				
        $(".holder_bu4").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu4","");
          var cpos=buArr.indexOf(joCN),mpos=buArr.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr.shift();
                buArr.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+15)).removeClass().addClass(buArr[i-1]+" holder_bu4");
                }
                --tomove;
              }
          }
					
        });
      },
      auto:function(){
        for(i=1;i<=1;++i){
          $(".holder_bu4").delay(4000).trigger('click',"bu"+i).delay(4000);
          console.log("called");
        }
      }
    };
})();

// Carosel 5
var Conclave5=(function(){
    var buArr =[],arlen;
	
    return {
      init:function(){
        this.addCN();this.clickReg();
      },
      addCN:function(){
        var buarr=["holder_bu_awayL2","holder_bu_awayL1","holder_bu_center","holder_bu_awayR1","holder_bu_awayR2"];
        for(var i=1;i<=buarr.length;++i){
          $("#bu"+(i+20)).removeClass().addClass(buarr[i-1]+" holder_bu5");
        }
      },
      clickReg:function(){
        $(".holder_bu5").each(function(){
          buArr.push($(this).attr('class'))
        });
				
        arlen=buArr.length;
        for(var i=0;i<arlen;++i){
          buArr[i]=buArr[i].replace(" holder_bu5","")
        };
				
        $(".holder_bu5").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu5","");
          var cpos=buArr.indexOf(joCN),mpos=buArr.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr.shift();
                buArr.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+20)).removeClass().addClass(buArr[i-1]+" holder_bu5");
                }
                --tomove;
              }
          }
					
        });
      },
      auto:function(){
        for(i=1;i<=1;++i){
          $(".holder_bu5").delay(4000).trigger('click',"bu"+i).delay(4000);
          console.log("called");
        }
      }
    };
})();

var Conclave6=(function(){
    var buArr =[],arlen;
	
    return {
      init:function(){
        this.addCN();this.clickReg();
      },
      addCN:function(){
        var buarr=["holder_bu_awayL2","holder_bu_awayL1","holder_bu_center","holder_bu_awayR1","holder_bu_awayR2"];
        for(var i=1;i<=buarr.length;++i){
          $("#bu"+(i+25)).removeClass().addClass(buarr[i-1]+" holder_bu6");
        }
      },
      clickReg:function(){
        $(".holder_bu6").each(function(){
          buArr.push($(this).attr('class'))
        });
				
        arlen=buArr.length;
        for(var i=0;i<arlen;++i){
          buArr[i]=buArr[i].replace(" holder_bu6","")
        };
				
        $(".holder_bu6").click(function(buid){
          var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu6","");
          var cpos=buArr.indexOf(joCN),mpos=buArr.indexOf("holder_bu_center");
					
          if(cpos!=mpos){
              tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
						
              while(tomove){
                var t=buArr.shift();
                buArr.push(t);
								
                for(var i=1;i<=arlen;++i){
                  $("#bu"+(i+25)).removeClass().addClass(buArr[i-1]+" holder_bu6");
                }
                --tomove;
              }
          }
					
        });
      },
      auto:function(){
        for(i=1;i<=1;++i){
          $(".holder_bu6").delay(4000).trigger('click',"bu"+i).delay(4000);
          console.log("called");
        }
      }
    };
})();

$(document).ready(function(){
    window['conclave1']=Conclave1;
    Conclave1.init();
		window['conclave2']=Conclave2;
		Conclave2.init();
		window['conclave3']=Conclave3;
		Conclave3.init();
		window['conclave4']=Conclave4;
		Conclave4.init();
		window['conclave5']=Conclave5;
		Conclave5.init();
		window['conclave6']=Conclave6;
		Conclave6.init();
})
