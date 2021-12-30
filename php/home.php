<html>

    <head>
        <link rel="stylesheet" href="../css/home_css.css">
        <script src="time.js"></script>
        <title>Home</title>
    </head>
    <body onload="initClock()">
        <div class="container">
            <header class="container__header">
                <div class="page">
                    
                    <nav class="page__menu menu">
                        <ul class="menu__list r-list">
                            
                            <img src="BlueTrain.jpg" height="50px">
                            
                            <span class="titlerailway">Railway Reservation System</span>
                            
                            <li class="menu__group"><a href="#0" class="menu__link r-link text-underlined">Login</a></li>
                            <li class="menu__group"><a href="#0" class="menu__link r-link text-underlined">Register</a></li>
                            <li class="menu__group"><a href="#0" class="menu__link r-link text-underlined">About Us</a></li>
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
                                
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>
            
            <center>
            <main class="container__main">
                <div class="main_book">
                    <div class="main_title">
                        <span>Book Ticket</span>
                    </div>
                    
                    <div class="main_content">
                        <form method="get" action="#">
                            
                            <div class="sub_inputs">
                                <div class="placeholder">
                                    <input type="text" require placeholder="Source" id="c">
                                </div>
                            </div>
                            
                            <button onclick="swap()"><img src="https://img.icons8.com/glyph-neue/50/000000/swap.png" height="30px" width="20px" /></button>
                            
                            <div class="sub_inputs">
                                
                                <div class="placeholder">
                                    <input type="text" require placeholder="Destination" id="d">
                                </div>
                                
                                <input type="date" require>
                                
                                <select name="class">
                                    <option value="Select" default>--Select--</option>  /* Can apply condition to check if value="Select" then display message */
                                    <option value="Seater">Seater</option>
                                    <option value="Sleeper">Sleeper</option>
                                    <option value="AC">AC</option>
                                    <option value="Non-AC">Non-AC</option>
                                </select>
                                
                                <input type="submit" name="Search" value="Search" onclick="hi()">
                            </div>
                        </form>
                    </div>
                    
                </div>
            </main>
            </center>
            
            <footer class="container__footer">
                ...
            </footer>
        </div>
    </body>
</html>