var addclass = 'color';
var idlist="";
var ss=0;
$(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
function clickedf()
{
            var language=document.getElementById("Mv_Ind").value;
            var genre=document.getElementById("genre").value;
            var rating=document.getElementById("rating").value;
            var votes=document.getElementById("votes").value;

            window.open("http://localhost/caps/caps/ShowPref.php?language="+language+"&genre="+genre+"&rating="+rating+"&votes="+votes,"_self");

}

$("#s1").click(clickedf);
function clickedf2()
{
            

            window.open("http://localhost/caps/caps/ShowPref2.php?ids="+idlist,"_self");

}

$("#s2").click(clickedf2);

var $cols = $('.ListItems').click(function(e) {
    
    if($(this).hasClass(addclass))
    {
            $(this).removeClass(addclass);
            ss-=1;
            
    }
    else
    {
      console.log($(this).hasClass(addclass));
      
            if(ss>=1)
            {  
                idlist+=',';
                  idlist+=$(this).attr("value");
            }
            else
            {
                  idlist+=$(this).attr("value");
            }
            ss+=1;
           
    $(this).addClass(addclass);
    }
});
