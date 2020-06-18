<?php
    session_start();

    function set_alert($type = "message", $content = ""){
        switch($type){
            case "message":
                $_SESSION['message'] = $content;
            break;

            case "error":
                $_SESSION['error'] = $content;
            break;

            case "info":
                $_SESSION['info'] = $content;
            break;

            default:
                $_SESSION['message'] = $content;
            break;
        }
    }

    
    //if(isset($_POST['calculate'])){
        echo "got here";
        $capital = $_POST['capital'] ?? "";
        $package = $_POST['package'] ?? "";
        $month = $_POST['month'];
        $time = $month / 12;

        $_SESSION['package'] = $package;
        $_SESSION['capital'] = $capital;
        $_SESSION['month'] = $month;

        //initialise variable
        $rate_array = ['0.1','0.15','0.6 '];
        $interest = 0;
        $roi = 0;
        $rate = 0;

    switch ($package) {
        case 'piggybank':
            $rate = $rate_array[0];
            break;
        case 'Flex Naira':
            $rate = $rate_array[0];
            break;
        case 'Safelock':
            $rate = $rate_array[1];
            break;
        case 'Targets':
            $rate = $rate_array[0];
            break;
        case 'Flex Dollar':
            $rate = $rate_array[2];
            break;
        
        default:
        $content = "Enter a valid package";
        set_alert("error",$content);
        header("location: ../index.php");
        break;
    }

    //return the value to the UI
    $interest = $capital * $rate * $time;
    $roi = $capital + $interest;

    //local
   // $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/interestcalc'. '/index.php';

    //web
    $home_url = 'https://' . $_SERVER['HTTP_HOST'] . '/index.php';
  
    $content = "Your ROI is ". $roi;
    set_alert("message",$content);
    header('Location: ' . $home_url);
//}

?>