<?php include('layout/header.php') ?>
<main>
    <!--Main Starts-->
    <!-- Banner Starts -->
    <section class="banner"
             style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.5)), url('assets/images/general/LogIn-Register-Banner.jpg'); background-position: center;padding: 0 0 190px 0; background-size: cover;">
        <div class="header">
            <div class="logo">
                <figure>
                    <a href="index.php">
                        <img src="assets/images/icons/logo[photography].png" alt="Logo">
                    </a>
                </figure>
            </div>
            <div class="navigation">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php"> About</a>
                    </li>
                    <li>
                        <a href="portfolio.php">Portfolio</a>
                    </li>
                    <li>
                        <a href="contact.php" >Contact</a>
                    </li>
                </ul>
            </div>
            <div class="login">
                <a href="register.php" class="btn">Log In</a>
            </div>
        </div>
        <div class="banner-content">
            <p>
                “To me, photography is an art of observation. It’s about finding something interesting in an ordinary place… I’ve found it has little to do with the things you see and everything to do with the way you see them.”
            </p>
        </div>
    </section>
    <div class="contact-info space">
        <div class="flex">
            <form name="registration" action="" method="post" id="registerForm" class="register-form">
                <h3>Don't have an account? / Register Form</h3>
                <div class="form-wrapper">
                    <div class="form-group">
                        <input type="text" name="username" value="" placeholder="First Name" class="main-input"
                               id="first-name" >
                        <div id="first-name-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="" placeholder="E-Mail" class="main-input"
                               id="register-email" >
                        <div id="email-register-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="" placeholder="Password" class="main-input"
                               id="pwd-register" >
                        <div id="pwd-register-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <p>If you already registered, <a href="login.php">Login</a></p>
                    </div>
                    <div class="form-group-submit-wrapper flex">
                        <button type="submit" class="btn" id="registerBtn">Register</button>
                    </div>
                </div>
            </form>

        </div>

    </div>

    <script>

        var button = document.getElementById("registerBtn");

        var username = document.forms["contact-form"]["username"];
        var email = document.forms["contact-form"]["email"];
        var message = document.forms["contact-form"]["message"];

        var emailRegEx = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

        var name_error = document.getElementById("name-error");
        var surname_error = document.getElementById("surname-error");
        var email_error = document.getElementById("email-error");
        var message_error = document.getElementById("message-error");

        Name.addEventListener("blur", verifyName, true);
        surname.addEventListener("blur", verifySurname, true);
        email.addEventListener("blur", verifyEmail, true);
        message.addEventListener("blur", verifyMessage, true);


        function verifyName() {
            if (Name.value != "") {
                name_error.innerHTML = "";
                return true;
            }
        }

        function verifySurname() {
            if (surname.value != "") {
                surname_error.innerHTML = "";
                return true;
            }
        }

        function verifyEmail() {

            if (email.value != "") {
                email_error.innerHTML = "";
                return true;
            } else {
                if (emailRegEx.test(email)) {
                    email_error.innerHTML = "";
                } else {
                    email_error.textContent = "Email should be something like this : shkurtehoxha@gmail.com";
                    event.preventDefault();
                }
            }

        }

        function verifyMessage() {
            if (message.value != "") {
                message_error.innerHTML = "";
                return true;
            }
        }

        button.addEventListener("click", function (event) {

            if (Name.value == "") {
                name_error.textContent = 'This field is a required field.';
                Name.focus();
                event.preventDefault();
            }
            if (surname.value == "") {
                surname_error.textContent = 'This field is a required field.';
                surname.focus();
                event.preventDefault();
            }

            if (email.value == "") {
                email_error.textContent = "This field is a required field.";
                email.focus();
                event.preventDefault();
            } else {
                if (emailRegEx.test(email.value)) {
                    email_error.innerText = "";
                } else {
                    email_error.innerText = "Email must be something like this shkurtehoxha@gmail.com!";
                    event.preventDefault();
                }

            }
        });

    </script>

<?php include('layout/footer.php') ?>


