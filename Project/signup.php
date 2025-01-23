<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/validation.js" defer></script>
</head>
<body>
<section class="form__section">
<div class="container form__section-container">
<div id="signup-message"></div>
</div>
<h2>Sign Up</h2>
<?php if (isset($_SESSION['signup'])): ?>
<div class="alert__message error">
<p><?= $_SESSION['signup']; ?></p>
</div>
<?php unset($_SESSION['signup']); ?>
<?php endif; ?>
<form id="signupForm" enctype="multipart/form-data">
<label for="firstname">First Name</label>
<input type="text" name="firstname" id="firstname" placeholder="First Name" required>
<label for="lastname">Last Name</label>
<input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
<label for="username">Username</label>
<input type="text" name="username" id="username" placeholder="Username" required>
<label for="email">Email</label>
<input type="email" name="email" id="email" placeholder="Email" required>
<label for="password">Password</label>
<input type="password" name="createpassword" id="createpassword" placeholder="Password" required>
<label for="confirm-password">Confirm Password</label>
<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
<label for="avatar">Upload Avatar</label>
<input type="file" name="avatar" id="avatar" required>
<button type="submit">Sign Up</button>
<small>Already have an account? <a href="signinoption.php">Sign In</a></small>
</form>

</section>
</body>
</html>

