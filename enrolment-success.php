<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Enrolment Successful - LPU Online</title>
    <link rel="icon" href="img/lpuicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        :root {
            --primary-orange: #f39c12;
            --primary-dark: #e67e22;
            --primary-light: #fef9e7;
            --secondary-orange: #d35400;
        }

        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        body {
            padding-top: 160px;
        }

        @media (max-width: 991.98px) {
            body {
                padding-top: 90px;
            }
        }

        .success-container {
            padding: 80px 0;
            min-height: 70vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .success-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            padding: 50px 40px;
            text-align: center;
            animation: fadeInUp 0.6s ease;
            position: relative;
            overflow: hidden;
        }

        .success-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--primary-dark) 100%);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            animation: pulse 1s ease infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(243, 156, 18, 0.4);
            }
            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 15px rgba(243, 156, 18, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(243, 156, 18, 0);
            }
        }

        .success-icon i {
            font-size: 50px;
            color: white;
        }

        .success-card h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .success-card .lead {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        .success-card p {
            color: #666;
            margin-bottom: 10px;
        }

        .enrollment-details {
            background: var(--primary-light);
            border-radius: 12px;
            padding: 15px;
            margin: 25px 0;
            text-align: left;
            border-left: 4px solid var(--primary-orange);
        }

        .enrollment-details p {
            margin-bottom: 8px;
            font-size: 14px;
        }

        .enrollment-details i {
            color: var(--primary-orange);
            width: 25px;
            margin-right: 10px;
        }

        .btn-custom {
            padding: 12px 30px;
            margin: 8px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            text-decoration: none;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--secondary-orange) 100%);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.3);
            color: white;
            text-decoration: none;
        }

        .btn-secondary-custom {
            background: #6c757d;
            color: white;
            border: none;
        }

        .btn-secondary-custom:hover {
            background: #5a6268;
            transform: translateY(-3px);
            color: white;
            text-decoration: none;
        }

        .whatsapp-btn {
            background: #25D366;
            color: white;
            margin-top: 15px;
        }

        .whatsapp-btn:hover {
            background: #128C7E;
            color: white;
        }

        @media (max-width: 768px) {
            .success-card {
                padding: 30px 20px;
            }
            .success-icon {
                width: 70px;
                height: 70px;
            }
            .success-icon i {
                font-size: 35px;
            }
            .success-card h2 {
                font-size: 24px;
            }
            .btn-custom {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <!-- Fixed Header Start -->
    <div class="fixed-header">
        <!-- Topbar Start -->
        <div class="container-fluid d-none d-lg-block">
            <div class="row align-items-center py-4 px-xl-5">
                <div class="col-lg-3">
                    <a href="index.html" class="text-decoration-none">
                        <img src="img/LPU.jpg" alt="LPU Online Degree" style="max-height: 70px; width: auto;">
                    </a>
                </div>
                <div class="col-lg-3 text-right">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa fa-2x fa-map-marker-alt" style="color: var(--primary-orange); margin-right: 12px;"></i>
                        <div class="text-left">
                            <h6 class="font-weight-semi-bold mb-1">Our Office</h6>
                            <small>Jalandhar-Delhi, G.T.Road,Phagwara, Punjab(INDIA) - 144411</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa fa-2x fa-envelope" style="color: var(--primary-orange); margin-right: 12px;"></i>
                        <div class="text-left">
                            <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                            <small>LPU Punjab@gmail.com</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa fa-2x fa-phone" style="color: var(--primary-orange); margin-right: 12px;"></i>
                        <div class="text-left">
                            <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                            <small>+91-1824-517000</small><br>
                            <small>+91-1824-404404</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
        <div class="container-fluid">
            <div class="row border-top px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none"
                       data-toggle="collapse" href="#navbar-vertical"
                       style="height: 67px; padding: 0 30px;">
                        <h5 class="m-0" style="color: var(--primary-orange);"><i class="fa fa-book-open mr-2"></i>Subjects</h5>
                        <i class="fa fa-angle-down" style="color: var(--primary-orange);"></i>
                    </a>
                    <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                         id="navbar-vertical" style="width: calc(100% - 30px); z-index: 9;">
                        <div class="navbar-nav w-100">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">Web Design <i class="fa fa-angle-down float-right mt-1"></i></a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                    <a href="course-detail.php?slug=web-design" class="dropdown-item">HTML</a>
                                    <a href="course-detail.php?slug=web-design" class="dropdown-item">CSS</a>
                                    <a href="course-detail.php?slug=web-design" class="dropdown-item">jQuery</a>
                                </div>
                            </div>
                            <a href="course-detail.php?slug=apps-design" class="nav-item nav-link">Apps Design</a>
                            <a href="course-detail.php?slug=marketing" class="nav-item nav-link">Marketing</a>
                            <a href="course-detail.php?slug=research" class="nav-item nav-link">Research</a>
                            <a href="course-detail.php?slug=seo" class="nav-item nav-link">SEO</a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="index.html" class="text-decoration-none d-block d-lg-none">
                            <h1 class="m-0"><span style="color: var(--primary-orange);">E</span>COURSES</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav py-0">
                                <a href="index.html" class="nav-item nav-link">Home</a>
                                <a href="about.html" class="nav-item nav-link">About</a>
                                <a href="course.html" class="nav-item nav-link">Courses</a>
                                <a href="teacher.html" class="nav-item nav-link">Teachers</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Blog</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="blog.html" class="dropdown-item">Blog List</a>
                                        <a href="single.html" class="dropdown-item">Blog Detail</a>
                                    </div>
                                </div>
                                <a href="contact.html" class="nav-item nav-link">Contact</a>
                            </div>
                            <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="joinnow.html" style="background: linear-gradient(135deg, var(--primary-orange), var(--primary-dark)); border: none;">Join Now</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
    </div>
    <!-- Fixed Header End -->

    <!-- Success Section Start -->
    <div class="success-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="success-card">
                        <div class="success-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <h2>Enrolment Successful! 🎉</h2>
                        <p class="lead">Thank you for choosing LPU Online</p>
                        <p>Your enrolment has been submitted successfully. Our team will contact you within 24 hours with further details about your course.</p>
                        
                        <div class="enrollment-details">
                            <p><i class="fas fa-id-card"></i> <strong>Enrolment ID:</strong> LPU<?php echo date('Ymd') . rand(1000, 9999); ?></p>
                            <p><i class="fas fa-calendar-alt"></i> <strong>Enrolment Date:</strong> <?php echo date('d M Y, h:i A'); ?></p>
                            <p><i class="fas fa-envelope"></i> <strong>Confirmation Email:</strong> Sent to your registered email</p>
                            <p><i class="fas fa-phone-alt"></i> <strong>Next Steps:</strong> Our counselor will call you soon</p>
                        </div>
                        
                        <div class="mt-4">
                            <a href="course.html" class="btn-custom btn-primary-custom">
                                <i class="fas fa-book-open mr-2"></i> Browse More Courses
                            </a>
                            <a href="index.html" class="btn-custom btn-secondary-custom">
                                <i class="fas fa-home mr-2"></i> Go to Homepage
                            </a>
                        </div>
                        
                        <a href="https://wa.me/918273872910?text=Hi%20LPU%20Team,%20I%20have%20successfully%20enrolled%20in%20your%20course.%20I%20want%20more%20information." target="_blank" class="btn-custom whatsapp-btn" style="display: inline-block;">
                            <i class="fab fa-whatsapp mr-2"></i> Chat on WhatsApp
                        </a>
                        
                        <p class="mt-4 text-muted" style="font-size: 12px;">
                            <i class="fas fa-shield-alt"></i> You will receive a confirmation SMS and Email shortly
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Section End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 0px;">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>Block 36, LOVELY PROFESSIONAL UNIVERSITY, Jalandhar Punjab India.</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+91 9693967173</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+91 8273872910</p>
                        <p><i class="fa fa-envelope mr-2"></i>harsh832019@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="https://www.linkedin.com/in/harsh-kumar555125" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Our Courses</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="course-detail.php?slug=web-design"><i class="fa fa-angle-right mr-2"></i>Web Design</a>
                            <a class="text-white mb-2" href="course-detail.php?slug=apps-design"><i class="fa fa-angle-right mr-2"></i>Apps Design</a>
                            <a class="text-white mb-2" href="course-detail.php?slug=marketing"><i class="fa fa-angle-right mr-2"></i>Marketing</a>
                            <a class="text-white mb-2" href="course-detail.php?slug=research"><i class="fa fa-angle-right mr-2"></i>Research</a>
                            <a class="text-white" href="course-detail.php?slug=seo"><i class="fa fa-angle-right mr-2"></i>SEO</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 mb-5">
                <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Newsletter</h5>
                <p>Stay in the loop with the latest courses, expert tips, and exclusive offers. Subscribe to our newsletter and never miss an update that can shape your future.</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; 2024 LPU Online. All Rights Reserved. Designed by <a href="https://www.linkedin.com/in/harsh-kumar555125" target="_blank" class="text-white">HARSH KUMAR</a></p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item"><a class="nav-link text-white py-0" href="#">Privacy</a></li>
                    <li class="nav-item"><a class="nav-link text-white py-0" href="#">Terms</a></li>
                    <li class="nav-item"><a class="nav-link text-white py-0" href="#">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link text-white py-0" href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>