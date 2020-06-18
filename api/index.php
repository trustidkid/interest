<?php session_start(); 
    require_once('functions/alert.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/piggy-icon.webp">
    <link rel="stylesheet" href="style.css">
    <title>PiggyVest Interest Calculator</title>
</head>

<body>
    <h3 class='note'>Interest rate are subject to change at any time based on market condition</h3>
    <form method='POST' action='api/v1/calcuteroi.php'>

        <div style='padding: 0px; height: 20px'> 
            <?php print_alert();?>
        </div><br>
        
        <div class='input-group'>
            <label for='capital'>Capital</label>
            <input type='number' id='capital' value="<? if(isset($_SESSION['capital']))  echo $_SESSION['capital']; else ''; ?>" name="amount" placeholder="$1200.00" required min=100>
            <p class='error' id='capital-error'></p>

        </div>
        
        <div class='input-group'>
            <label for='product'>Package</label>
            
            <select class="form-control" required id='product' name="product">
            
              <option name='Piggybank' value='Select Product'>Select Product</option>
              <option name='Piggybank' value='piggybank'>Piggybank</option>
              <option name='Flex Naira' value='Flex Naira'>Flex Naira</option>
              <option name='Safelock' value='Safelock'>SafeLock</option>
              <option name='Targets' value='Targets'>Targets</option>
              <option name='Flex Dollar' value='Flex Dollar'>Flex Dollar</option>
          </select>
            <p class='error' id='product-error'></p>
        </div>
        <!--<div class='input-group'>
            <label for='rate'>Conversion rate</label>
            <input type='text' id='rate' disabled placeholder="15%">
        </div>-->
        <div class='input-group'>
            <label for='month'>Month</label>
            <input type='number' id='month' name="month" value="<? if(isset($_SESSION['month'])) echo $_SESSION['month']; else ''; ?>" placeholder="Month" min="1" max="12">
            <p class='error' id='month-error'></p>
        </div>

        <button type='submit' name="calculate" id='calculate-btn'>Calcuate</button>

        <div>
            <p id='interest'></p>
        </div>
    </form>
    <script src='script.js'></script>
</body>

</html>