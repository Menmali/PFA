<?php     
    include_once '../Fonctions/Ans.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riddle</title>
    <link rel="stylesheet" href="../css/Morse.css" >
</head>
<body>
    <form action="./Rid1.php" method="post">
    <div class="card">
    - .-. ..- ... - / -- -.-- / .-- --- .-. -.. ... / .- -. -.. / .--. .- -.-- / .- - - . -. - .. --- -. / - --- / . ... -.-. .- .--. . --..-- / --- -.- .- -.-- / ..--.. / -.--. - -.-- .--. . / -.-- / - --- / -.-. --- -. - .. -. ..- . -.--.-
        </div>
        <p hidden>use 64decoder in the future</p>

        <div class="answer">
                <div>
                
                    <input type="text" name="ans" placeholder="S.O.L.V.E. M.E " > 
                    <input type="hidden" value="1" name="rid">
                <div>       
                    <?php if (isset($error)): ?>
                    <div class="error">
                        <span><?php echo $error; ?></span>
                    </div>
                    <?php endif ?>
                    <button type="submit" name="but" >LET'S START</button>
                </div>
                </form>
        </div>
     
</body>
</html>