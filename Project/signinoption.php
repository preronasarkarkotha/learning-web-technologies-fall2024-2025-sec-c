<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Option Page</title>
<style>
       body {
           font-family: Arial, sans-serif;
           text-align: center;
           background-color:rgb(9, 130, 37); /* Green background */
           margin: 0;
           padding: 0;
           color: white;
       }
       .container {
           margin-top: 20vh;
       }
       button {
           padding: 10px 20px;
           margin: 10px;
           font-size: 16px;
           border: none;
           border-radius: 5px;
           cursor: pointer;
           transition: background-color 0.3s ease;
           color: white;
       }
       .admin-btn {
           background-color: #007bff; /* Blue */
       }
       .admin-btn:hover {
           background-color: #0056b3;
       }
       .event-btn {
           background-color:rgb(7, 255, 243); /* Yellow */
           color: black;
       }
       .event-btn:hover {
           background-color:rgb(9, 174, 86);
       }
       .user-btn {
           background-color: #dc3545; /* Red */
       }
       .user-btn:hover {
           background-color: #a71d2a;
       }
</style>
</head>
<body>
<div class="container">
<h1>Choose Your Option</h1>
<!-- Buttons linked to respective pages -->
<button class="admin-btn" onclick="window.location.href='Project/view/login_view.php'">Admin</button>
<button class="event-btn" onclick="window.location.href='Event/signin.php'">Event</button>
<button class="user-btn" onclick="window.location.href='webproject/model/login.php'">User</button>
</div>
</body>
</html>