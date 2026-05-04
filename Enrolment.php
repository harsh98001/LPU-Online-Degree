<?php
session_start();

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ecourses_db';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$course_name = isset($_GET['course']) ? htmlspecialchars($_GET['course']) : 'Selected Course';
$error = isset($_SESSION['enrol_error']) ? $_SESSION['enrol_error'] : '';
unset($_SESSION['enrol_error']);

// Fetch course details if course_id exists
$course = null;
if ($course_id > 0) {
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE id = $course_id");
    $course = mysqli_fetch_assoc($result);
    if ($course) {
        $course_name = $course['name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Enrolment - <?php echo $course_name; ?> | LPU Online</title>
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
        
        /* Carousel Styles */
        .carousel-item {
            min-height: 300px;
        }
        .carousel-item img {
            min-height: 300px;
            object-fit: cover;
        }
        .carousel-caption {
            bottom: 50%;
            transform: translateY(50%);
        }
        
        /* LPU Theme Colors - Yellow + Orange Mix */
        .enrol-form-container {
            padding: 50px 0;
        }
        
        .course-badge {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-left: 5px solid #f39c12;
        }
        .course-badge h4 {
            margin: 0;
        }
        .course-badge .text-primary {
            color: #f39c12 !important;
            font-weight: 700;
        }
        
        .form-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .form-header {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            padding: 25px;
            text-align: center;
            color: white;
            position: relative;
        }
        .form-header h3 {
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .form-header p {
            margin-top: 10px;
            opacity: 0.95;
            font-weight: 500;
        }
        .form-header::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: white;
            border-radius: 3px;
        }
        
        .alert-danger {
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 5px solid #e74c3c;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            border: none;
            padding: 14px 40px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            border-radius: 50px;
            color: white;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.3);
        }
        .btn-submit:hover {
            background: linear-gradient(135deg, #e67e22 0%, #d35400 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(243, 156, 18, 0.4);
        }
        
        .form-control {
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 12px 18px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #f39c12;
            box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25);
        }
        
        input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            cursor: pointer;
            accent-color: #f39c12;
        }
        input[type="checkbox"]:checked {
            background-color: #f39c12;
            border-color: #f39c12;
        }
        
        .text-primary {
            color: #f39c12 !important;
        }
        
        .btn-primary {
            background: #f39c12;
            border-color: #f39c12;
        }
        .btn-primary:hover {
            background: #e67e22;
            border-color: #e67e22;
        }
        
        label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label i {
            color: #f39c12;
            margin-right: 8px;
        }
        
        select.form-control {
            cursor: pointer;
            background-color: white;
        }
        
        select.form-control option {
            padding: 10px;
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }
        
        /* Checkbox group styling */
        .checkbox-group {
            background: #fef9e7;
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid #f39c12;
        }
        
        .interest-checkbox {
            padding: 5px 0;
        }
        
        .interest-checkbox label {
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 0;
        }
        
        .interest-checkbox label:hover {
            color: #f39c12;
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
                        <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                        <div class="text-left">
                            <h6 class="font-weight-semi-bold mb-1">Our Office</h6>
                            <small>Jalandhar-Delhi, G.T.Road,Phagwara, Punjab(INDIA) - 144411</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                        <div class="text-left">
                            <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                            <small>LPU Punjab@gmail.com</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa fa-2x fa-phone text-primary mr-3"></i>
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
                        <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>Subjects</h5>
                        <i class="fa fa-angle-down text-primary"></i>
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
                            <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1>
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
                            <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="joinnow.html">Join Now</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
    </div>
    <!-- Fixed Header End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/c1.png" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">BEST ONLINE COURSES</h5>
                            <h1 class="display-3 text-white mb-md-4">Best Education From Your Home</h1>
                            <a href="course.html" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/Amphitheater at Lovely Professional University.png" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">BEST ONLINE COURSES</h5>
                            <h1 class="display-3 text-white mb-md-4">New Way To Learn From Home</h1>
                            <a href="course.html" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/c2.png" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">ADMISSIONS</h5>
                            <h1 class="display-3 text-white mb-md-4">Start Your Journey From Home</h1>
                            <a href="course.html" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Enrolment Form Section -->
    <div class="container enrol-form-container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="course-badge">
                    <h4>🎓 You are enrolling for: <span class="text-primary"><?php echo $course_name; ?></span></h4>
                </div>
                
                <?php if($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle mr-2"></i> <?php echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                
                <div class="form-card">
                    <div class="form-header">
                        <h3><i class="fa fa-graduation-cap mr-2"></i> Student Enrolment Form</h3>
                        <p>Fill in your details to secure your seat</p>
                    </div>
                    
                    <form method="POST" action="process-enrolment.php" class="p-5">
                        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                        
                        <div class="form-group">
                            <label><i class="fa fa-user"></i> Full Name <span style="color:#e74c3c;">*</span></label>
                            <input type="text" class="form-control" name="full_name" placeholder="Enter your full name" required>
                        </div>
                        
                        <div class="form-group">
                            <label><i class="fa fa-envelope"></i> Email Address <span style="color:#e74c3c;">*</span></label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                        </div>
                        
                        <div class="form-group">
                            <label><i class="fa fa-phone"></i> Phone Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number">
                        </div>
                        
                        <div class="form-group">
                            <label><i class="fa fa-certificate"></i> Highest Qualification</label>
                            <select class="form-control" name="qualification">
                                <option value="">Select your qualification</option>
                                <option>High School (10+2)</option>
                                <option>Bachelor's Degree</option>
                                <option>Master's Degree</option>
                                <option>Diploma</option>
                                <option>PhD</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label><i class="fa fa-heart"></i> Your Interests (Select all that apply)</label>
                            <div class="checkbox-group">
                                <div class="row">
                                    <?php
                                    $interests = ['Web Development', 'UI/UX Design', 'Mobile Apps', 'Data Science', 
                                                 'Digital Marketing', 'Content Writing', 'SEO', 'Game Development'];
                                    foreach($interests as $int): ?>
                                        <div class="col-md-6 interest-checkbox">
                                            <label class="d-block">
                                                <input type="checkbox" name="interests[]" value="<?= $int ?>"> 
                                                <?= $int ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label><i class="fa fa-comment"></i> Additional Message (Optional)</label>
                            <textarea class="form-control" name="message" rows="3" placeholder="Any specific questions or requirements?"></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button class="btn btn-submit" type="submit">
                                <i class="fa fa-paper-plane mr-2"></i> Submit Enrolment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
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