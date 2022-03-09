<?php include('layout/header.php') ?>
    <main>
        <!-- Main Starts-->
        <!-- Banner Starts -->
        <section class="banner"
                 style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.5)), url('assets/images/general/LogIn-Banner.jpg'); background-position: center;padding: 0 0 190px 0; background-size: cover;">
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
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="login">
                    <a href="register.php" class="btn">Log In</a>
                </div>
            </div>
            <div class="banner-content">
                <p>
                    “A good photograph is one that communicates a fact, touches the heart and leaves the viewer a changed person for having seen it. It is, in a word, effective.”
                </p>
            </div>
        </section>
        <div class='contact-info space'>
            <div class='flex'>
                <form action='' method='post' id='loginForm' class='login-form' name='login'>
                    <h3>Login Form</h3>
                    <div class='form-wrapper'>
                        <div class='form-group'>
                            <input type='text' name='username' value='' placeholder='Username' class='main-input'>
                            <div id='username-error' class='text-error'>Username is incorrect.</div>

                        </div>
                        <div class='form-group'>
                            <input type='password' name='password' value='' placeholder='Password' class='main-input' required>
                            <div id='pwd-error' class='text-error'>Password is incorrect</div>
                        </div>
                        <div class='form-group-submit-wrapper flex'>
                            <button type='submit' class='btn' id='loginBtn'>Login</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        </div>;
    </main>
<?php include('layout/footer.php') ?>