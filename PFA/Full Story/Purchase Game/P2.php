<?php include('../../Fonctions/Ajout_c.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Purchase Game</title>
	<link rel="stylesheet" href="../..\css\Preorder.css">
</head>
<body>
    <header class="bar">
        <h1>Escape Room</h1>
        <nav>
        <div class="label">
            <ul>
                <li><a href="../../">Home</a></li>
                <li><a href="..\Review\Rev.php">Review Us</a></li>
                <li><a href="">Sign Out</a></li>
                
            </ul>
        </div>
        </nav>
</header>
    <div class="container">
        <div class="column-left">
            <div class="image">
                <img src="https://www.gpbrands.eu/wp-content/uploads/2017/08/visa-logo.png" alt="skjdbchb"></div>
            <div class="everlane">
                <h2>The Escape Room</h2>
                <h1> The Horror Never Ends </h1>
                <h1> Price : 9.99£</h2>
            </div>
            <div class="order">
                <h2>Purchase Now</h2>
                </div>
        </div>
        <div class="column-right">
            <div class="card">
                <div class="card-left">
                    <div class="search">
                        <i class="fas fa-search"></i>
                        </div>
                    <img src="../..\Pics\es.jpg" width="200px">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i></div>
                    
                </div>
                <div class="card-right">
                    <div class="logo">
                        <img src="https://logodownload.org/wp-content/uploads/2016/10/visa-logo.png" width="100px">
                    </div>
                    <form name="f" action="P2.php" method="post" >
                    <div class="data">
                        <label>NAME</label>
                        <input class="name" type="text" name="name" id="name" placeholder="Name" value="<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];} ?>" >
                        <label>CARD NUMBER</label>
                        <input type="text" class="card-number" name="num" id="num"  maxlength="19" placeholder="Card Number"  value="<?php if(isset($_POST["num"])){echo $_POST["num"];} ?>"  >
                        <label>EXPIRES</label>
                        <div class="expires">
                            <select class="month" name="month" >
                                <option>Jan</option>
                                <option>Feb</option>
                                <option>Mars</option>
                                <option>April</option>
                                <option>May</option>
                                <option>Jun</option>
                                <option>July</option>
                                <option>Aug</option>
                                <option>Sep</option>
                                <option>Oct</option>
                                <option>Nov</option>
                                <option>Dec</option>
                            </select>
                            <select name="years" id="yearSelect" >
                                <?php
                                  $currentYear = date('Y');
                                  $futureYear = $currentYear + 10;
                                ?>
                                <?php for($year = $currentYear; $year <= $futureYear; $year++) { ?>
                                  <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php } ?>
                              </select>
                            <label>CVV</label>
                            <input class="cvv" id="cvv" name="cvv" type="tel" min="3" max="4" value="<?php if(isset($_POST["cvv"])){echo $_POST["cvv"];} ?>" size="4">
                        </div>
                        <?php if (isset($succ)): ?>
                            <div class="success">
                            <span><?php echo $succ;
                            ?></span>
                            </div>
                            <?php endif ?>
                        <?php if (isset($error)): ?>
                            <div class="error">
                            <span><?php echo $error;
                            ?></span>
                            </div>
                            <?php endif ?>
                        <button  type="submit" name="but" >BUY NOW</button>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div> 
       
        
        
    

    
</body>
</html>