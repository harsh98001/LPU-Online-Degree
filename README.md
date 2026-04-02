# LPU-Online-Degree
# 🎓 LPU Online - Educational Platform

![LPU Online](https://img.shields.io/badge/LPU-Online-orange)
![Version](https://img.shields.io/badge/version-1.0.0-blue)
![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.4.1-563D7C)

## 📋 Overview

LPU Online is a modern, responsive educational platform designed for Lovely Professional University's online degree programs. The website provides information about courses, faculty, admissions, and allows prospective students to register their interest through an interactive form.

### 🎯 Features

- ✅ **Responsive Design** - Fully responsive layout that works on all devices
- ✅ **Interactive Carousel** - Dynamic image slider showcasing university highlights
- ✅ **Online Registration Form** - Student inquiry form with database integration
- ✅ **Course Information** - Detailed course listings with descriptions
- ✅ **Faculty Profiles** - Information about university leadership and teachers
- ✅ **Blog Section** - Latest news and updates about LPU
- ✅ **Contact Information** - Easy access to university contact details
- ✅ **Admin Panel** - Basic admin interface for managing inquiries

## 🚀 Live Demo

[View Live Demo](#) *(Add your live URL here)*

## 📁 Project Structure
ECOURSES Website/
│
├── 📁 admin/ # Admin panel files
│
├── 📁 css/ # Stylesheet files
│ └── style.css # Main stylesheet
│
├── 📁 img/ # Image assets
│ ├── LPU.jpg # Logo
│ ├── lpu1.jpg # Campus images
│ ├── ranking.webp # Carousel images
│ └── ... # Other images
│
├── 📁 js/ # JavaScript files
│ └── main.js # Main JavaScript
│
├── 📁 lib/ # Third-party libraries
│ ├── easing/ # Easing animations
│ └── owlcarousel/ # Owl Carousel
│
├── 📁 mail/ # Email handling
│ ├── contact.js # Contact form handler
│ └── jqBootstrapValidation.min.js
│
├── 📁 scss/ # SCSS source files
│
├── 📄 index.html # Home page
├── 📄 about.html # About LPU page
├── 📄 course.html # Courses listing page
├── 📄 teacher.html # Faculty/Teachers page
├── 📄 blog.html # Blog listing page
├── 📄 single.html # Single blog post
├── 📄 contact.html # Contact page
├── 📄 joinnow.html # Registration/Join form
├── 📄 register.php # PHP registration handler
├── 📄 save_join_request.php # AJAX form submission handler
│
├── 📄 LICENSE # MIT License
└── 📄 README.md # Project documentation

text

## 🛠️ Technologies Used

| Technology | Version | Purpose |
|------------|---------|---------|
| HTML5 | - | Structure |
| CSS3 | - | Styling |
| Bootstrap | 4.4.1 | Responsive framework |
| JavaScript | ES6 | Interactivity |
| jQuery | 3.4.1 | DOM manipulation |
| PHP | 7.4+ | Backend processing |
| MySQL | 5.7+ | Database storage |
| Font Awesome | 5.10.0 | Icons |
| Google Fonts | Poppins | Typography |

## 💻 Installation Guide

### Prerequisites

- XAMPP / WAMP / MAMP (for local development)
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web browser (Chrome, Firefox, Edge recommended)

### Step-by-Step Installation

#### 1. Clone or Download the Project

```bash
git clone https://github.com/harsh98001/LPU-Online-Degree.git
Or download the ZIP file and extract it.

2. Move to Web Server Directory
For XAMPP:

bash
Copy the project folder to: C:\xampp\htdocs\
For WAMP:

bash
Copy to: C:\wamp64\www\
For MAMP:

bash
Copy to: /Applications/MAMP/htdocs/
3. Start Local Server
Open XAMPP Control Panel

Start Apache service

Start MySQL service

4. Create Database
Open phpMyAdmin: http://localhost/phpmyadmin

Run the following SQL query:

sql
CREATE DATABASE IF NOT EXISTS lpu_online;
USE lpu_online;

CREATE TABLE IF NOT EXISTS join_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    state VARCHAR(50) NOT NULL,
    course VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data (optional)
INSERT INTO join_requests (name, email, phone, state, course) VALUES
('John Doe', 'john@example.com', '9876543210', 'Punjab', 'MBA'),
('Jane Smith', 'jane@example.com', '9876543211', 'Delhi', 'MCA');
5. Configure Database Connection
Update database credentials in save_join_request.php:

php
$servername = "localhost";
$username = "root";      // Your MySQL username
$password = "";          // Your MySQL password
$dbname = "lpu_online";  // Database name
6. Access the Website
Open your browser and navigate to:

text
http://localhost/ECOURSES%20Website/
Or if you renamed the folder:

text
http://localhost/your-folder-name/
📱 Pages Overview
Page	URL	Description
Home	index.html	Landing page with carousel and highlights
About	about.html	University information and history
Courses	course.html	List of available courses
Teachers	teacher.html	Faculty and staff profiles
Blog	blog.html	Latest news and articles
Contact	contact.html	Contact form and location
Join Now	joinnow.html	Student registration form
🔧 Configuration
Email Settings
To configure email functionality, edit the contact form handler:

php
// In mail/contact.js or contact.php
$to = "admin@lpuonline.com";
$subject = "New Contact Form Submission";
Database Backup
To backup your database:

bash
mysqldump -u root -p lpu_online > backup.sql
🎨 Customization
Changing Colors
The primary theme color is orange (#ff6b35). To change it, update the CSS variables:

css
:root {
    --primary-orange: #ff6b35;    /* Change this */
    --primary-dark: #e85d2c;       /* Change this */
}
Adding New Courses
Edit course.html and add new course cards:

html
<div class="col-lg-4 col-md-6 mb-4">
    <div class="course-card">
        <h4>New Course Name</h4>
        <p>Course description here</p>
        <a href="#" class="btn btn-primary">Learn More</a>
    </div>
</div>
Updating Carousel Images
Replace images in the img/ folder and update paths in index.html:

html
<div class="carousel-item" style="background-image: url('img/your-image.jpg');">
🐛 Troubleshooting
Common Issues and Solutions
Issue	Solution
White screen on PHP pages	Check PHP error logs, ensure database connection is correct
Form not submitting	Check Apache is running, verify file permissions
Images not loading	Verify image paths are correct, check file extensions
Database connection error	Confirm MySQL is running, check credentials in PHP files
404 Page Not Found	Ensure all files are in the correct directory
Debug Mode
Add this to PHP files for debugging:

php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
📊 Database Schema
join_requests Table
Column	Type	Description
id	INT(AUTO_INCREMENT)	Primary key
name	VARCHAR(100)	Student's full name
email	VARCHAR(100)	Email address
phone	VARCHAR(20)	Contact number
state	VARCHAR(50)	State of residence
course	VARCHAR(50)	Selected course
created_at	TIMESTAMP	Submission timestamp
🤝 Contributing
Fork the repository

Create your feature branch (git checkout -b feature/AmazingFeature)

Commit your changes (git commit -m 'Add some AmazingFeature')

Push to the branch (git push origin feature/AmazingFeature)

Open a Pull Request

📝 License
This project is licensed under the MIT License - see the LICENSE file for details.

👨‍💻 Author
Harsh Kumar

GitHub: @harsh98001

LinkedIn: Harsh Kumar

Email: harsh832019@gmail.com

🙏 Acknowledgments
Lovely Professional University for inspiration

Bootstrap team for the framework

Font Awesome for icons

Google Fonts for typography

HTML Codex for template structure

📞 Support
For support, email harsh832019@gmail.com or create an issue in the GitHub repository.

📸 Screenshots
Home Page
[Add screenshot here]

Registration Form
[Add screenshot here]

Courses Page
[Add screenshot here]

⭐ Star this repository if you found it helpful!

text

This README includes:

1. **Project Overview** - What the project does
2. **Features** - Key functionalities
3. **File Structure** - Complete folder hierarchy
4. **Technologies** - All tech used with versions
5. **Installation Guide** - Step-by-step setup
6. **Database Setup** - SQL queries included
7. **Pages Overview** - All pages with descriptions
8. **Customization** - How to modify colors, courses, images
9. **Troubleshooting** - Common issues and solutions
10. **Database Schema** - Table structure
11. **Contributing** - How to contribute
12. **Author Info** - Your details
13. **Support** - Contact information
