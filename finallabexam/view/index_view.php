<html lang="en">
<head>
    <title>Job Portal</title>
</head>
<body>
    <h1>Job Portal - Admin Panel</h1>

    <h2>Register New Employer</h2>
    <form id="register-form" action="..view/index_controller.php" method="POST" onsubmit="return registerEmployer()">
        <input type="text" id="employer_name" name="employer_name" placeholder="Employer Name"><br>
        <input type="text" id="company_name" name="company_name" placeholder="Company Name"><br>
        <input type="text" id="contact_no" name="contact_no" placeholder="Contact No"><br>
        <input type="text" id="username" name="username" placeholder="Username"><br>
        <input type="password" id="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Register"><br>
        <p id="register-message"></p>
    </form>

    <h2>Search Employer</h2>
    <form id="search-form" action="..view/index_controller.php" method="GET" onsubmit="return searchEmployer()">
        <input type="text" id="search_query" name="query" placeholder="Search by Employer Name">
        <input type="submit" value="Search">
        <p id="search-message"></p>
        <div id="search-results"></div>
    </form>

    <script>
        function registerEmployer() {
            if (!document.getElementById('employer_name').value || !document.getElementById('company_name').value || !document.getElementById('contact_no').value || !document.getElementById('username').value || !document.getElementById('password').value) {
                document.getElementById('register-message').innerText = 'All fields are required!';
                document.getElementById('register-message').style.color = 'red';
                return false;
            }

            var xhttp = new XMLHttpRequest();
            xhttp.open('POST', '..view/index_controller.php', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('register-message').innerText = this.responseText;
                    document.getElementById('register-message').style.color = 'green';
                    document.getElementById('register-form').reset();
                }
            };
            xhttp.send('action=register&employer_name=' + document.getElementById('employer_name').value + '&company_name=' + document.getElementById('company_name').value + '&contact_no=' + document.getElementById('contact_no').value + '&username=' + document.getElementById('username').value + '&password=' + document.getElementById('password').value);
            return false;
        }

        function searchEmployer() {
            if (!document.getElementById('search_query').value) {
                document.getElementById('search-message').innerText = 'Please enter a search query!';
                document.getElementById('search-message').style.color = 'red';
                return false;
            }

            var xhttp = new XMLHttpRequest();
            xhttp.open('GET', 'index_controller.php?action=search&query=' + document.getElementById('search_query').value, true);
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var resultsDiv = document.getElementById('search-results');
                    resultsDiv.innerHTML = this.responseText;
                    document.getElementById('search-message').innerText = '';
                }
            };
            xhttp.send();
            return false;
        }
    </script>
</body>
</html>
