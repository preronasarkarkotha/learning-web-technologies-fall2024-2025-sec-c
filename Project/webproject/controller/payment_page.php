
<?php

function validatePaymentData($data)
{
    $errors = [];

    
    if (!isset($data['amount']) || !is_numeric($data['amount']) || $data['amount'] <= 0) {
        $errors[] = "Invalid payment amount. Please enter a positive numeric value.";
    }

    $validMethods = ['credit_card', 'paypal', 'bank_transfer'];
    if (!isset($data['payment_method']) || !in_array($data['payment_method'], $validMethods)) {
        $errors[] = "Invalid payment method. Please select a valid option.";
    }

    
    if (!isset($data['comment']) || empty(trim($data['comment']))) {
        $errors[] = "Comment field cannot be empty.";
    }

    return $errors;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $paymentData = [
        'amount' => $_POST['amount'] ?? null,
        'payment_method' => $_POST['payment_method'] ?? null,
        'comment' => $_POST['comment'] ?? null,
    ];


    $errors = validatePaymentData($paymentData);

    if (empty($errors)) {
        
        echo "<h1>Payment is valid and Successful!</h1>";
        
    } else {
       
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    }
}
?>
