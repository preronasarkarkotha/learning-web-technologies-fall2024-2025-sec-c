
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/signin.js" defer></script> <!-- Include JavaScript file -->
</head>
<body>
<section class="form__section">
<div class="container form__section-container">
<h2>Sign In</h2>
<div id="error-message" class="alert__message error" style="display: none;"></div> <!-- Error message container -->
<form id="signinForm">
<label for="username">Username</label>
<input type="text" name="username" id="username" placeholder="Enter your username" required>
<label for="password">Password</label>
<input type="password" name="password" id="password" placeholder="Enter your password" required>
<button type="submit">Sign In</button>
<small>Don't have an account? <a href="signup.php">Sign Up</a></small>
</form>
</div>
</section>
</body>
</html>