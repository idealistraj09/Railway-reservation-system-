<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/train.css">
      <script src="../js/time.js"></script>
      <script src="../js/scroll.js"></script>
      <title>RRS - Trains</title>
   </head>
   <body>
      <!-- navbar -->
      <nav class="navbar">
         <div class="navbar2">
            <div class="navbar3">
               <h1 class="logo">Railway Reservation System </h1>
               <span style="margin-left: 10px; font-size: 18px;" >Trains</span>
               <ul class="nav nav-right">
                  <li><span id="welcome"></span></li>
                  <li class="menu__group"><a href="../php/signin.php" class="menu__link r-link text-underlined">SignIn</a></li>
                  <li class="menu__group">
                     <div class="datetime">
                        <div class="date">
                           <span id="dayname">Day</span>,
                           <span id="month">Month</span>
                           <span id="daynum">00</span>,
                           <span id="year">Year</span>
                        </div>
                        <div class="time">
                           <span id="hour">00</span>:
                           <span id="minutes">00</span>:
                           <span id="seconds">00</span>
                           <span id="period">AM</span>
                        </div>
                     </div>
                     </p>
                  </li>
               </ul>
            </div>
         </div>
         <!--/.container-->
      </nav>
      <div class="container">
         <!-- Sidebar -->
         <aside class="container_top">
            <ul>
               <li><span class="titlefilter">Quick Filters</span></li>
               <li><input type="checkbox"><span>AC</span></li>
               <li><input type="checkbox"><span>Available</span></li>
               <li><input type="checkbox"><span>Between 12PM to 12AM</span></li>
               <li><input type="checkbox"><span>Between 12AM to 12PM</span></li>
            </ul>
         </aside>
         <div class="container_middel">
            <ul>
               <li><span class="titlefilter">Train Types</span></li>
               <li><input type="checkbox"><span>Special Trains -  
                SP</span></li>
               <li><input type="checkbox"><span>Rajdhani -  
                R</span></li>
               <li><input type="checkbox"><span>Special Tatkal Trains -  
                ST</span></li>
               <li><input type="checkbox"><span>Others -  
                O</span></li>
            </ul>
         </div>
         <!-- Main -->
         <aside class="container_buttom">
            <ul>
               <li><span class="titlefilter">Journey Class Filters</span></li>
               <li><input type="checkbox"><span>1st Class AC -1A</span></li>
               <li><input type="checkbox"><span>2 Tier AC -2A</span></li>
               <li><input type="checkbox"><span>Sleeper -  
                SL</span></li>
               <li><input type="checkbox"><span>Seater</span></li>
            </ul>
         </aside>
      </div>
      <div class="main">
         <div id="thumb-wrap">
            <ul>
               <li>
                  <button>25 jan,tue</button>
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
               <li>
                  <button>25 jan,tue</button>  
               </li>
            </ul>
         </div>
         <div class="maintrain">
           <ul class="ultrains">
             <li class="trains">1</li>
             <li class="trains">2</li>
             <li class="trains">3</li>
             <li class="trains">4</li>
             <li class="trains">5</li>
             <li class="trains">6</li>
             <li class="trains">7</li>
             <li class="trains">8</li>
             <li class="trains">9</li>
             <li class="trains">10</li>
             <li class="trains">11</li>
             <li class="trains">12</li>
             <li class="trains">13</li>
             <li class="trains">14</li>
             <li class="trains">15</li>
             <li class="trains">16</li>
           </ul>
         </div>
      </div>
   </body>
</html>