 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>wait......</title>
 </head>

 <body>
     <style>
         .center{
            transform: 0.2s scale(20);
         }
     </style>
    <div class="center" style="text-align: center; align-items: center; justify-self: center;">
        <img src="../img/loading1.gif" alt="">
        <h1>Ticket Booked !!!</h1>
    </div>
     <script>
         window.setTimeout(function() {
             window.location.href = "printticket.php";
         }, 2000);
     </script>

 </body>

 </html>