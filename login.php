<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "adoption";


$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['Password'];

    $sql = "INSERT INTO `adoption`.`pet`(email, password)
            VALUES ('$email', '$password')";

    if (mysqli_query($con, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        // echo "Error: " . mysqli_error($con);
    }
}
// INSERT INTO `pet` (`SI.NO`, `email`, `password`) VALUES ('1', 'simran@email.com', 'simran');
mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PetAdopt Login</title>

    <link rel="stylesheet" href="login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

    <div class="container">

        <div class="left">

            <h1>
                <i class="fa-solid fa-paw"></i>
                PetAdopt
            </h1>

            <h2>Welcome Back!</h2>

            <p>

                Login to continue your journey of finding a loving companion.
                Every adoption creates a happy family.

            </p>

            <img src="images/login-pet.png" alt="Pet">

        </div>

        <div class="right">

            <form action="login.php" method="POST" id="loginForm">

                <h2>Login</h2>

                <div class="input-box">

                    <i class="fa-solid fa-envelope"></i>

                    <input type="email" id="email" placeholder="Email Address" name="email" required>

                </div>

                <div class="input-box">

                    <i class="fa-solid fa-lock"></i>

                    <input type="password" id="password"   name="Password" placeholder="enter password" required>

                    <span id="togglePassword">

                        <i class="fa-solid fa-eye"></i>

                    </span>

                </div>

                <div class="options">

                    <label>

                        <input type="checkbox">

                        Remember Me

                    </label>

                    <a href="#">
                        Forgot Password?

                    </a>

                </div>

                <button type="submit" id="new">

                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login

                </button>

                <div class="or">

                    OR

                </div>

                <div class="social">

                    <a href="#">
                        <i class="fab fa-google"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-github"></i>
                    </a>

                </div>

                <p class="register">

                    Don't have an account?

                    <a href="register.php">

                        Register Here

                    </a>

                </p>

                <a href="index.php" class="home">Home</a>

                <i class="fa-solid fa-house"></i>

                Back to Home

                </a>

            </form>

        </div>

    </div>

    <script>

const password=document.getElementById("password");

const confirmPassword=document.getElementById("confirmPassword");

const toggle=document.querySelector(".togglePassword");

const bar=document.getElementById("strengthBar");

toggle.onclick=()=>{

if(password.type==="password"){

password.type="text";

toggle.innerHTML='<i class="fa-solid fa-eye-slash"></i>';

}else{

password.type="password";

toggle.innerHTML='<i class="fa-solid fa-eye"></i>';

}

}

password.addEventListener("keyup",()=>{

let value=password.value.length;

if(value<5){

bar.style.width="30%";

bar.style.background="red";

}

else if(value<8){

bar.style.width="60%";

bar.style.background="orange";

}

else{

bar.style.width="100%";

bar.style.background="green";

}

});

document.getElementById("registerForm").onsubmit=function(e){

e.preventDefault();

if(password.value!==confirmPassword.value){

alert("Passwords do not match!");

return;

}

alert("🎉 Registration Successful! Welcome to PetAdopt ❤️");

window.location="login.php";

}

</script>
</body>

</html>