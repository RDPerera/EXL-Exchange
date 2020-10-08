
function add(){
  var x = document.getElementById("field1");
  var y = document.getElementById("field2");
  var z = document.getElementById("field3");
  if (x.style.display=="none")
  {
     x.style.display="block";
   }
   else
   {
   	if(y.style.display=="none")
    {
    	y.style.display="block";
    }
    else
    {
    	if(z.style.display=="none")
        {
         z.style.display="block"
        }
    }
   }
}
function remove(){
    var z = document.getElementById("field1");
    var y = document.getElementById("field2");
    var x = document.getElementById("field3");
    if (x.style.display=="block")
    { 
       x.style.display="none";
       x.getElementsByClassName("member")[0].value = "";
     }
     else
     {
         if(y.style.display=="block")
      {
          y.style.display="none";
          y.getElementsByClassName("member")[0].value = "";
      }
      else
      {
          if(z.style.display=="block")
          {
           z.style.display="none"
           z.getElementsByClassName("member")[0].value = "";
          }
      }
     }
  }