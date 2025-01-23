<?php
include 'header.php';
?>
<!---End of nav ---->
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            height: 30rem;
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #333;
            color: white;
        }
        h1 {
            height: 5rem 20rem;
            color: white;
        }
        .contact-item {
            
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .contact-item i {
            font-size: 24px;
            margin-right: 10px;
            color: white;
        }
        .contact-item a {
            color: #1e90ff;
            text-decoration: none;
        }
        .contact-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Contact Us</h1>
    <div class="contact-item">
        <i class="fas fa-envelope"></i>
        <p>Email: <a href="mailto:example@example.com">shanzida@gmail.com</a></p>
    </div>
    <div class="contact-item">
        <i class="fab fa-linkedin"></i>
        <p>LinkedIn: <a href="https://www.linkedin.com/in/example" target="_blank">linkedin.com/in/shanzida</a></p>
    </div>
    <div class="contact-item">
        <i class="fas fa-phone"></i>
        <p>Contact Number: +8801727606032</p>
    </div>
    <div class="contact-item">
        <i class="fab fa-facebook"></i>
        <p>Facebook: <a href="https://www.facebook.com/example" target="_blank">facebook.com/shanzida</a></p>
    </div>
    <div class="contact-item">
        <i class="fab fa-youtube"></i>
        <p>Youtube: <a href="https://www.youtube.com/channel/example" target="_blank">youtube.com/channel/shanzida</a></p>
    </div>
</body>
</html>




        <?php
include '../partials/footer.php';
?>