        <?php
        include 'config.php';
        if (isset($_POST['reg'])) {
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $confirm = mysqli_real_escape_string($con, $_POST['confirm']);
            $passwordh = password_hash($password, PASSWORD_DEFAULT);

            // Error message variable
            $error_message = '';

            // Check if email already exists
            $email_check_query = "SELECT * FROM `user` WHERE `email` = '$email' LIMIT 1";
            $result = mysqli_query($con, $email_check_query);
            $email_exists = mysqli_num_rows($result) > 0;

            if ($email_exists) {
                $error_message = "<div class='alert alert-danger w-100'>Email is already registered! </div>";
            } elseif ($password !== $confirm) {
                $error_message = "<div class='alert alert-danger'>Passwords do not match!</div>";
            } else {
                $sql = "INSERT INTO `user` (`username`, `phone`, `email`, `password`) VALUES ('$username', '$phone', '$email', '$passwordh')";
                $query = mysqli_query($con, $sql);

                if ($query) {
                    echo "<div class='alert alert-success'>Registration successful</div>";
                    header('Location: login.php');
                    exit();
                } else {
                    $error_message = "<div class='alert alert-danger'>Registration Failed!</div>" . mysqli_error($con);
                }
            }
        }
        ?>


        <!DOCTYPE html>
        <html class="no-js" lang="en">

        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Register-ShoeXpress</title>
        <meta name="description" content="description">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png" />
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="assets/css/plugins.css">
        <!-- Bootstap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        </head>
        <body class="template-index  template-index-">
        <div id="pre-loader">
            <img src="assets/images/loader.gif" alt="Loading..." />
        </div>
        <div class="pageWrapper">
            <!--Search Form Drawer-->
            <div class="search">
                <div class="search__form">
                    <form class="search-bar__form" action="#">
                        <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                        <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
                    </form>
                    <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
                </div>
            </div>
            <!--End Search Form Drawer-->
            <!--Top Header-->
            <div class="top-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                            <div class="currency-picker">
                                <span class="selected-currency">NG</span>
                                <ul id="currencies">
                                    <li data-currency="INR" class="">INR</li>
                                    <li data-currency="GBP" class="">GBP</li>
                                    <li data-currency="CAD" class="">CAD</li>
                                    <li data-currency="NG" class="selected">NG</li>
                                    <li data-currency="AUD" class="">AUD</li>
                                    <li data-currency="EUR" class="">EUR</li>
                                    <li data-currency="JPY" class="">JPY</li>
                                </ul>
                            </div>
                            <div class="language-dropdown">
                                <span class="language-dd">English</span>
                                <ul id="language">
                                    <li class="">German</li>
                                    <li class="">French</li>
                                </ul>
                            </div>
                            <p class="phone-no"><i class="anm anm-phone-s"></i> +234 70 38 2906 72</p>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                            <div class="text-center"><p class="top-header_middle-text"> Worldwide Express Shipping</p></div>
                        </div>
                        <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                            <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                            <ul class="customer-links list-inline">
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register.php">Create Account</a></li>
                                <!-- <li><a href="wishlist.html">Wishlist</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Top Header-->
            <!--Header-->


            <!--Body Content-->
            <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                    <a href="index.html">
                    	<!-- <img src="assets/images/logo.svg" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" /> -->
                         <h2><strong>Shoe</strong>Xpress</h2>
                    </a>
                </div>
            <div id="page-content">
                <!--Page Title-->
                <div class="page section-header text-center">
                    <div class="page-title">
                        <div class="wrapper mt-5"><h1 class="page-width">Register</h1></div>
                    </div>
                </div>
                <!--End Page Title-->
                
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                            <div class="mb-4">
                            <form method="post" action="" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                                <div class="row">
                                    <?php if(isset($error_message)) echo $error_message;?>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerName">Username</label>
                                            <input type="text" name="username" placeholder="enter your username" required id="CustomerName" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerNumber">Phone number</label>
                                            <input type="tel" name="phone" placeholder="enter your phone number" required id="CustomerNumber" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerEmail">Email</label>
                                            <input type="email" name="email" placeholder="enter your email address" required id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerPassword">Password</label>
                                            <input type="password" value="" name="password" required placeholder="enter your password" id="CustomerPassword" class="">                        	
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerPassword">confirm Password</label>
                                            <input type="password" value="" name="confirm" required placeholder="confirm password" id="CustomerPassword" class="">                        	
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                        <!-- <input type="submit" class="btn mb-3" name="reg" value="Sign up"> -->
                                        <button type="submit" class="btn mb-3" id="submit"  name="reg" >Sign up</button>

                                        <p class="mb-4">
                                            <!-- <p>This&nbsp;is&nbsp;an&nbsp;example&nbsp;of&nbsp;using&nbsp;non-breaking&nbsp;spaces.</p> -->
                                        <a href="#" id="RecoverPassword">Already have an Account?</a> &nbsp; | &nbsp;
                                        <a href="login.php" id="customer_register_link">Login</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!--End Body Content-->
            
            <!--Footer-->
            <footer id="footer">
                <div class="newsletter-section">
                    <div class="container">
                        <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
                                    <div class="display-table">
                                        <div class="display-table-cell footer-newsletter">
                                            <div class="section-header text-center">
                                                <label class="h2"><span>sign up for </span>newsletter</label>
                                            </div>
                                            <form action="#" method="post">
                                                <div class="input-group">
                                                    <input type="email" class="input-group__field newsletter__input" name="EMAIL" value="" placeholder="Email address" required="">
                                                    <span class="input-group__btn">
                                                        <button type="submit" class="btn newsletter__submit" name="commit" id="Subscribe"><span class="newsletter__submit-text--large">Subscribe</span></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-end align-items-center">
                                    <div class="footer-social">
                                        <ul class="list--inline site-footer__social-icons social-icons">
                                            <li><a class="social-icons__link" href="#" target="_blank" title="Facebook"><i class="icon icon-facebook"></i></a></li>
                                            <li><a class="social-icons__link" href="#" target="_blank" title="Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                            <li><a class="social-icons__link" href="#" target="_blank" title="Pinterest"><i class="icon icon-pinterest"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                                            <li><a class="social-icons__link" href="#" target="_blank" title="Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                                            <li><a class="social-icons__link" href="#" target="_blank" title="Tumblr"><i class="icon icon-tumblr-alt"></i> <span class="icon__fallback-text">Tumblr</span></a></li>
                                            <li><a class="social-icons__link" href="#" target="_blank" title="YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                            <li><a class="social-icons__link" href="#" target="_blank" title="Vimeo"><i class="icon icon-vimeo-alt"></i> <span class="icon__fallback-text">Vimeo</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>    
                </div>
                <div class="site-footer">
                    <div class="container">
                        <!--Footer Links-->
                        <div class="footer-top">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                                    <h4 class="h4">Quick Shop</h4>
                                    <ul>
                                        <li><a href="#">Women</a></li>
                                        <li><a href="#">Men</a></li>
                                        <li><a href="#">Kids</a></li>
                                        <li><a href="#">Sportswear</a></li>
                                        <li><a href="#">Sale</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                                    <h4 class="h4">Informations</h4>
                                    <ul>
                                        <li><a href="about-us.html">About us</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Privacy policy</a></li>
                                        <li><a href="#">Terms &amp; condition</a></li>
                                        <li><a href="register.html">My Account</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                                    <h4 class="h4">Customer Services</h4>
                                    <ul>
                                        <li><a href="#">Request Personal Data</a></li>
                                        <li><a href="faqs.html">FAQ's</a></li>
                                        <li><a href="contact-us.html">Contact Us</a></li>
                                        <li><a href="faqs.html">Orders and Returns</a></li>
                                        <li><a href="contact-us.html">Support Center</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                                    <h4 class="h4">Contact Us</h4>
                                    <ul class="addressFooter">
                                        <li><i class="icon anm anm-map-marker-al"></i><p>alx hub</p></li>
                                        <li class="phone"><i class="icon anm anm-phone-s"></i><p>(+234) 000 000 0000</p></li>
                                        <li class="email"><i class="icon anm anm-envelope-l"></i><p>sales@yousite.com</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Footer Links-->
                        <hr>
                        <div class="footer-bottom">
                            <div class="row">
                                <!--Footer Copyright-->
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-sm-center text-md-left text-lg-left"><span></span>ShoeXpress</a></div>
                                <!--End Footer Copyright-->
                                <!--Footer Payment Icon-->
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 order-0 order-md-1 order-lg-1 order-sm-0 payment-icons text-right text-md-center">
                                    <ul class="payment-icons list--inline">
                                        <li><i class="icon fa fa-cc-visa" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-cc-mastercard" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-cc-discover" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-cc-paypal" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-cc-amex" aria-hidden="true"></i></li>
                                        <li><i class="icon fa fa-credit-card" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                                <!--End Footer Payment Icon-->
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--End Footer-->
            <!--Scoll Top-->
            <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
            <!--End Scoll Top-->
            
            <!-- Including Jquery -->
            <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
            <script src="assets/js/vendor/jquery.cookie.js"></script>
            <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
            <script src="assets/js/vendor/wow.min.js"></script>
            <!-- Including Javascript -->
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/lazysizes.js"></script>
            <script src="assets/js/main.js"></script>
        </div>
        </body>

        <!-- shoexpress/login.html   11 Nov 2019 12:22:27 GMT -->
        </html>