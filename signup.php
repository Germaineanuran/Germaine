<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {

            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }else
        {
            echo "please enter some valid information!";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

     <style type="text/css">
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {
            padding: 10px;
            width:  100px;
            color: snow;
            background-color: gray;
            border: none;
        }
        #box{
            background-color: stone;
            margin: auto;
            width: 400px;
            padding: 30px;
            }
        

    </style>

    <div id="box">
        <form method = "post">
        <div style="font-size: 50px; margin: 20px; color:lightpink;">Signup</div><br>
        <input id="text" type="text" name="user_name" placeholder="Username" required><br><br>
        <input id="text" type="password" name="password" placeholder="Password"><br><br>

        <input id="button" type="submit" value="signup"><br><br>

        <a href= "login.php"> Click to Login</a><br><br>

        </form>
    </div>
</body>
</html>
