<?php
header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$response = [
    'success' => false,
    'message' => ''
];


if (!isset($data['amount']) || !is_numeric($data['amount']) || $data['amount'] <= 0) {
    $response['message'] = 'Invalid payment amount. Please enter a positive number.';
    echo json_encode($response);
    exit;
}

if (!isset($data['payment_method']) || !in_array($data['payment_method'], ['credit_card', 'paypal', 'bank_transfer'])) {
    $response['message'] = 'Invalid payment method. Please select a valid option.';
    echo json_encode($response);
    exit;
}

if (!isset($data['comment']) || empty(trim($data['comment']))) {
    $response['message'] = 'Comment cannot be empty.';
    echo json_encode($response);
    exit;
}


$response['success'] = true;
$response['message'] = 'Payment processed successfully!';
echo json_encode($response);
?>
