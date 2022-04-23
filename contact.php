<?php
include("layout/header.php");
include_once("Crud.php");

$crud = new crud();

if (isset($_POST['submit'])) {
    $data = array(
        "name" => $crud->escape_string($_POST['name']),
        "surname" => $crud->escape_string($_POST['surname']),
        "email" => $crud->escape_string($_POST['email']),
        "message" => $crud->escape_string($_POST['message']),
    );

    $crud->insert($data, 'contact');

    if ($data) {
        echo '';
        header('location:sent-message.php');
    } else {
        echo 'try again';
    }
}
?>
<main>
    <!-- Main Starts -->
    <!-- Banner Starts -->
    <section class="banner"
             style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.5)), url('assets/images/general/contact-banner.jpg'); background-position: center;padding: 0 0 190px 0; background-size: cover;">
        <div class="header">
            <div class="logo">
                <figure>
                    <a href="index.php">
                        <img src="assets/images/icons/logo[photography].png" alt="Logo">
                    </a>
                </figure>
            </div>
            <?php include("partial/navigation.php") ?>
        </div>
        <div class="banner-content">
            <p>
                “Photography for me is not looking, it’s feeling. If you can’t feel what you’re looking at, then you’re
                never going to get others to feel anything when they look at your pictures.”
            </p>
        </div>
    </section>
    <div class="contact-info space">
        <div class="center mb-30">
            <h2>We are looking forward to your contact!</h2>
        </div>
        <div class="message"></div>
        <div class="flex responsive-flex">
            <form method="POST" id="contactForm" class="contact-form" name="form">
                <div class="form-wrapper">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name" class="main-input">
                        <div id="name-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname" placeholder="Surname" class="main-input">
                        <div id="surname-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="E-Mail" class="main-input">
                        <div id="email-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" cols="60" rows="5" placeholder="Message..." class="main-input main-textarea"></textarea>
                        <div id="message-error" class="text-error"></div>
                    </div>
                    <div class="form-group-submit-wrapper flex">
                        <input type="submit" name="submit" class="btn" id="submitBtn" value="Send">
                    </div>
                </div>
            </form>
            <div class="contact-box-info">
                <div class="box-wrapper">
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://goo.gl/maps/rMLDY7TiSEHAyteJ9" target="_blank">
                                <span class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                                [ Photography ] <br>
                                Jakove Xoxa 105 <br>
                                10000 Pristina
                            </a>
                        </li>
                        <li>
                            <a href="tel:+38349111222">
                                <span class="icon">
                                    <i class="fa fa-mobile"></i>
                                </span>
                                + 383 49 111 222
                            </a>
                        </li>
                        <li>
                            <a href="mailto:photography@gmail.com">
                                <span class="icon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                photography@gmail.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="map">
        <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46940.162381558395!2d21.12370785217964!3d42.666437879992586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ee605110927%3A0x9365bfdf385eb95a!2sPrishtin%C3%AB!5e0!3m2!1ssq!2s!4v1595352926798!5m2!1ssq!2s"
                width="100%" height="450" ; style="border:0; margin-bottom: -4px;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
    </div>
</main>
<?php include('layout/footer.php') ?>


<script>

    var button = document.getElementById("submitBtn");

    var Name = document.forms["form"]["name"];
    var surname = document.forms["form"]["surname"];
    var email = document.forms["form"]["email"];
    var message = document.forms["form"]["message"];

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
                email_error.textContent = "Email should be something like this : shkurtahoxha@gmail.com";
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
                email_error.innerText = "Email must be something like this: shkurtahoxha@gmail.com!";
                event.preventDefault();
            }

        }
        if (message.value == "") {
            message_error.textContent = 'This field is a required field.';
            message.focus();
            event.preventDefault();
        }

    });

</script>
