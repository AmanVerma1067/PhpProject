<?php
$insert = false;
//jab name enter karega tabhi ye connection banega otherwise nothing
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    
    // Create a connection
    $con = mysqli_connect($server, $username, $password);
    
    // Select the database
    mysqli_select_db($con, 'form');
    
    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    
    // Collect POST variables
    $name = $_POST['name'];
    $email = $_POST['useremail'];
    $address = $_POST['address'];
    $dob = $_POST['userdob'];
    $password = $_POST['userpass'];
    $age = $_POST['age'];
    
    // Insert query
    $sql = "INSERT INTO `form` (`name`, `email`, `address`, `dob`, `password`, `age`, `dt`) VALUES ('$name', '$email', '$address', '$dob', '$password', '$age', current_timestamp())";
    
    // Execute the query
    if ($con->query($sql) === true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }
    
    // Close the connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    
</head>
<style>
    * {
        margin: auto;
        box-sizing: border-box;
        background-color: aquamarine;
    }
    p{
        text-align: center;
        text-decoration: dotted;
        font-weight: bolder;
        font-size: large;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .submitmsg{
        color: red;
        font-style: italic;
    }

    form {
        background-color: aqua;
        display: flex;
        flex-direction: column;
        padding: 30px;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        gap: 7px;
        width: inherit;

    }

    input {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 2px solid blue;
        border-radius: 7px;
        outline: none;
        font-size: 14px;
        width: 100%;
        margin: auto;
        padding: 7px;
    }

    .btn {
        
        color: white;
        background: purple;
        padding: 8px 12px;
        font-size: 12px;
        border: 2px solid white;
        border-radius: 14px;
        cursor: pointer;
        display: flex;
        font-size: 15px;
        justify-content: center;
    }

    .btn:hover {
        opacity: 0.8;
        box-shadow: 3px 5px #894808;
    }
</style>

<body>
    <p>Enter your details carefully and submit this form to confirm your participarion.</p>
    <?php
    if($insert == true){
    echo "<p class='submitmsg'>Thanks for submiting your form!!</p>";
    }
    ?>
    <form action="index.php" method="post">
        <fieldset>
            <legend>User Registration!!</legend>
            <label for="name">Enter Name: </label>
            <input type="text" id="name" name="name" autofocus placeholder="Enter Your Name">
            <br>
            <label for="email">Enter Email: </label>
            <input type="email" id="email" name="useremail" placeholder="abc@example.com">
            <br>
            <label for="address">Enter Address: </label>
            <textarea name="address" cols="30" rows="10" ></textarea>
            <br>
            <label for="dob">Enter DOB: </label>
            <input type="date" id="dob" name="userdob">
            <br>
            <label for="password">Enter Password</label>
            <input type="password" id="password" name="userpass">
            <br>
            <label for="num">Enter Age: </label>
            <input name= "age" id="num" type="number" min="0" max="25" placeholder="Enter Your Age">
            <br>
            <button class="btn">Submit</button>
        </fieldset>
    </form>
</body>

</html>

