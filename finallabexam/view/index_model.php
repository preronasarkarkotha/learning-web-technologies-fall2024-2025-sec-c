<?php

function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'db');
    return $conn;
}

function registerEmployer($employer_name, $company_name, $contact_no, $username, $password){
    $conn = getConnection();
    $sql = "INSERT INTO employers (employer_name, company_name, contact_no, username, password) 
            VALUES ('{$employer_name}', '{$company_name}', '{$contact_no}', '{$username}', '{$password}')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}

function searchEmployer($search_query){
    $conn = getConnection();
    $sql = "SELECT * FROM employers WHERE employer_name LIKE '%{$search_query}%'";
    $result = mysqli_query($conn, $sql);
    $employers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $employers[] = $row;
    }
    return $employers;
}

?>
