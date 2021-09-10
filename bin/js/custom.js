function onload() {
    document.getElementById("header-beranda").innerHTML = "Beranda";
}

function showhidelogincust() {  
         var div = document.getElementById("btngroupberanda");
         var logincust = document.getElementById("logincust");

         if (div.style.display !== "none") 
         {  
             div.style.display = "none";
            logincust.style.display = "block";
            document.getElementById("header-beranda").innerHTML = "LOGIN CUSTOMER";
         }  
         else
         {  
             div.style.display = "block"; 
             onload();
         }  
}  

function showhideregistcust() {  
         var div = document.getElementById("logincust");
         var logincust = document.getElementById("registrasicust");

         if (div.style.display !== "none") 
         {  
            div.style.display = "none";
            logincust.style.display = "block";
            document.getElementById("header-beranda").innerHTML = "REGISTRASI CUSTOMER";
         }  
         else
         {  
             div.style.display = "block"; 
             onload();
         }  
}  

function showhideloginadm() {  
         var div = document.getElementById("btngroupberanda");
         var loginadm = document.getElementById("loginadm");

         if (div.style.display !== "none") 
         {  
            div.style.display = "none";
            loginadm.style.display = "block";  
            document.getElementById("header-beranda").innerHTML = "LOGIN ADMIN";
         }  
         else
         {  
             div.style.display = "block"; 
             onload();
         }  
}  
