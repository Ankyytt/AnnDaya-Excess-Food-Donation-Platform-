<?php
include 'connection.php';
if(isset($_POST['sign'])) {

    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM login WHERE email='$email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1) {
        echo "<h1><center>Account already exists</center></h1>";
    } else {
        $query = "INSERT INTO login(name, email, password, gender) VALUES('$username','$email','$pass','$gender')";
        $query_run = mysqli_query($connection, $query);
        if($query_run) {
            header("location:signin.php");
        } else {
            echo '<script type="text/javascript">alert("Data not saved")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        body {
            background: linear-gradient(to right, #06C167, #2d98da);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
        }

        .regform {
            text-align: center;
        }

        .logo {
            font-size: 36px;
            margin-bottom: 10px;
            color: #333;
        }

        .logo b {
            color: #06C167;
        }

        #heading {
            font-size: 22px;
            margin-bottom: 30px;
            color: #666;
        }

        .input {
            margin-bottom: 20px;
            text-align: left;
        }

        .input label {
            font-size: 14px;
            color: #333;
        }

        .input input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 8px;
            outline: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .input input:focus {
            border-color: #06C167;
        }

        .password {
            position: relative;
            margin-bottom: 20px;
        }

        .password input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 8px;
            outline: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .password input:focus {
            border-color: #06C167;
        }

        .password .showHidePw {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 20px;
            color: #333;
        }

        .radio {
            margin: 20px 0;
        }

        .radio input {
            margin-right: 10px;
        }

        .btn button {
            width: 100%;
            padding: 14px;
            background-color: #06C167;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn button:hover {
            background-color: #04a456;
        }

        .signin-up {
            margin-top: 20px;
        }

        .signin-up a {
            color: #06C167;
            text-decoration: none;
        }

        .signin-up a:hover {
            text-decoration: underline;
        }

        @media only screen and (max-width: 768px) {
            .container {
                padding: 30px;
                width: 100%;
            }

            .logo {
                font-size: 28px;
            }

            #heading {
                font-size: 20px;
            }

            .input input {
                padding: 10px;
            }

            .btn button {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="regform">
            <form action="" method="post">
                <p class="logo">Anna <b>Daya</b></p>
                <p id="heading">Create your account</p>

                <div class="input">
                    <label for="name">Username</label>
                    <input type="text" id="name" name="name" required/>
                </div>

                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required/>
                </div>

                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required/>
                    <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>
                </div>

                <div class="radio">
                    <input type="radio" name="gender" id="male" value="male" required/>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label>
                </div>

                <div class="btn">
                    <button type="submit" name="sign">Continue</button>
                </div>

                <div class="signin-up">
                    <p>Already have an account? <a href="signin.php">Sign in</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordToggle = document.getElementById('showpassword');

        showPasswordToggle.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('uil-eye');
            this.classList.toggle('uil-eye-slash');
        });
    </script>

</body>
</html>
