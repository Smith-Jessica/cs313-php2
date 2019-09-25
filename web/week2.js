function clicked() {
    alert("Clicked!");
}

window.onload = initDivMouseOver;

function initDivMouseOver() {
    var first = document.getElementById("first");
    var second = document.getElementById("second");
    var third = document.getElementById("third");

    first.onmouseover = function () {
        document.getElementById("first").style.fontWeight = "bold";
    };
    first.onmouseout = function () {
        document.getElementById("first").style.fontWeight = "normal";
    }

    second.onmouseover = function () {
        document.getElementById("second").style.fontWeight = "bold";
    };
    second.onmouseout = function () {
        document.getElementById("second").style.fontWeight = "normal";
    }

    third.onmouseover = function () {
        document.getElementById("third").style.fontWeight = "bold";
    };
    third.onmouseout = function () {
        document.getElementById("third").style.fontWeight = "normal";
    }


}
/*
function changeColor() {
    var color = document.getElementById("color").value;

    console.log(color);

    document.getElementById("first").style.backgroundColor = color;
}
*/
$(function(){
    //change the color of the first div
    $("#changeColor").click(
        function(){
            
            //print it to the console
            console.log($("#color").val())
            
            //change the background color
            $("#first").css("background-color", $("#color").val());

          });

    //Hide or show the third div
          $("#hideThird").click(
            function(){
                $("#third").fadeToggle();
              });
  
  }); 
