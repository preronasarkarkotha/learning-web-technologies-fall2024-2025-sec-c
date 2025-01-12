<?php
include '../model/index_model.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $employer_name = $_POST['employer_name'];
    $company_name = $_POST['company_name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($employer_name) || empty($company_name) || empty($contact_no) || empty($username) || empty($password)) {
        echo "All fields are required!";
        exit;
    }
    $response = registerEmployer($employer_name, $company_name, $contact_no, $username, $password);
    echo $response;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'search') {
    $search_query = $_GET['query'];
    if (empty($search_query)) {
        echo "Please enter a search query!";
        exit;
    }
    $results = searchEmployer($search_query);

    if (is_array($results)) {
        foreach ($results as $row) {
            echo "<div>
                    <h3>" . $row['employer_name'] . "</h3>
                    <p>Company: " . $row['company_name'] . "</p>
                    <p>Contact: " . $row['contact_no'] . "</p>
                    <p>Username: " . $row['username'] . "</p>
                  </div>";
        }
    } else {
        echo $results;
    }
}
?>
