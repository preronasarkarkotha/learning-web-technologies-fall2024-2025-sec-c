<html lang="en">
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
    <script>
        function validateInput() {
            let email = document.getElementById('email');
            let emailValue = email.value.trim();
            let password = document.getElementById('password');
            let passwordValue = password.value.trim();
            let msg = document.getElementById('msg');
            if (emailValue === '' && passwordValue === '') {
                msg.innerHTML = "Both email and password are required!";
                msg.style.color = 'blue';
            }
            else if (emailValue === '') {
                msg.innerHTML = "Please enter your email.";
                msg.style.color = 'blue';
            }
            else if (passwordValue === '') {
                msg.innerHTML = "Please enter your password.";
                msg.style.color = 'blue';
            } else {
                msg.innerHTML = "";
            }
        }

        function submitForm(event) {
            event.preventDefault();

            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let rememberMe = document.querySelector('input[name="rememberMe"]').checked;

            let json = {
                'email': email,
                'password': password,
                'rememberMe': rememberMe
            };
            let data = JSON.stringify(json);

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/login_controller.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('mydata=' + encodeURIComponent(data));

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.responseText);
                    if (response.success) {
                        window.location.href = 'dashboard_view.php';
                    } else {
                        document.getElementById('msg').innerHTML = response.message;
                        document.getElementById('msg').style.color = 'red';
                    }
                }
            };
        }
    </script>
</head>
<body>
    <form id="loginForm" onsubmit="submitForm(event)">
        <fieldset>
            <legend><h1>Login</h1></legend>
            <h3>Email:</h3>
            <input type="email" id="email" name="email" required onblur="validateInput()"><br>

            <h3>Password:</h3>
            <input type="password" id="password" name="password" required onblur="validateInput()"><br>
            
            <input type="checkbox" name="rememberMe"> Remember Me
            
            <p>Don't have an account? <a href="../view/registration.html">Register</a></p>
            
            <input type="submit" value="Login">
        </fieldset>
    </form>

    <p id="msg"></p>

</body>
</html>
