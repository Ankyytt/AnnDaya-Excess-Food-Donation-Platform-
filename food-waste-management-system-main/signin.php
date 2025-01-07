<?php
session_start();
include 'connection.php';

$msg = 0;
if (isset($_POST['sign'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM login WHERE email='$email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $row['name'];
                $_SESSION['gender'] = $row['gender'];
                header("location:home.html");
            } else {
                $msg = 1;
            }
        }
    } else {
        echo "<h1><center>Account does not exist </center></h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Font and Icon links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        body {
            background: linear-gradient(to right, #06C167, #2d98da);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 450px;  /* Updated box dimensions */
            margin: 20px;  /* Equal margins on all sides */
        }

        .regform {
            text-align: center;
        }

        .logo {
            font-size: 36px;
            margin-bottom: 15px;
            color: #333;
        }

        .logo b {
            color: #06C167;
        }

        #heading {
            font-size: 22px;
            margin-bottom: 30px;
            color: #555;
        }

        .input input {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        .input input:focus {
            border-color: #06C167;
        }

        .password {
            position: relative;
            margin-bottom: 25px;
        }

        .password input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        .password input:focus {
            border-color: #06C167;
        }

        .showHidePw {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #666;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn button {
            width: 100%;
            padding: 15px;
            background-color: #06C167;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
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

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 30px;
            }

            .logo {
                font-size: 28px;
            }

            #heading {
                font-size: 20px;
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

                <p class="logo">Anna <b>daya</b></p>
                <p id="heading">Welcome back!</p>

                <div class="input">
                    <input type="email" placeholder="Email address" name="email" required />
                </div>

                <div class="password">
                    <input type="password" placeholder="Password" name="password" id="password" required />
                    <i class="uil uil-eye-slash showHidePw"></i>
                    <?php
                    if ($msg == 1) {
                        echo '<p class="error">Password not matched.</p>';
                    }
                    ?>
                </div>

                <div class="btn">
                    <button type="submit" name="sign">Sign in</button>
                </div>

                <div class="signin-up">
                    <p>Don't have an account? <a href="signup.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Password visibility toggle
        const passwordInput = document.getElementById('password');
        const showPasswordToggle = document.querySelector('.showHidePw');

        showPasswordToggle.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('uil-eye');
            this.classList.toggle('uil-eye-slash');
        });
    </script>

</body>

</html>
