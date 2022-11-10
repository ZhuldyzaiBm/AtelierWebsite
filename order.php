<?php
// Connecting to database
include_once './dbconnect.php';

// Retrieving data from POST
function getParam($param, $conn, $default = '') {
    return (isset($_POST[$param])) ? mysqli_real_escape_string($conn, $_POST[$param]) : $default;
}

// Preparing the data
function getData($conn) {
    return array(
        'name' => getParam('name', $conn, 'noname'),
        'email' => getParam('email', $conn, 'unknown email'),
        'phone' => getParam('phone', $conn),
        'address' => getParam('address', $conn),
        'message' => getParam('message', $conn),
        'delivery_type' => getParam('delivery_type', $conn),
        'delivery_summa' => getParam('delivery_summa', $conn),
        'full_summa' => getParam('full_summa', $conn),
        'cart' => isset($_POST['cart']) ? stripslashes($_POST['cart']) : '[]'
    );
}

// Adding the order
function addOrder($data, $conn) {
    $query = sprintf(
        "insert into orders (`name`, `email`, `phone`, `address`, `message`, `delivery_type`, `cost`) values ('%s', '%s', '%s', '%s', '%s', '%s', '%d')",
        $data['name'],
        $data['email'],
        $data['phone'],
        $data['address'],
        $data['message'],
        $data['delivery_type'],
        $data['full_summa']
    );
    $conn->query($query);
    return $conn->insert_id;
}

// Adding the order details
function addDetails($data, $conn) {
    $cart = json_decode($data['cart'], true);
    $orderId = $data['order_id'];
    $values = array();
    foreach($cart as $cartItem) {
        $value = sprintf(
            "(%d, %d, '%s', %d, %d)",
            $orderId,
            $cartItem['id'],
            mysqli_real_escape_string($conn, $cartItem['name']),
            $cartItem['price'],
            $cartItem['count']
        );
        array_push($values, $value);
    }
    $query = sprintf(
        "insert into details (`order_id`, `good_id`, `good`, `price`, `count`) values %s",
        implode(',', $values)
    );
    $conn->query($query);
}

try {
    // Connecting to the database
    $conn = connectDB();
    // Receiving the data from POST array
    $data = getData($conn);
    // Adding items to Orders table
    $orderId = addOrder($data, $conn);
    $data['order_id'] = $orderId;
    // Adding items to Details table
    addDetails($data, $conn);
    // Returning a successful response to the client
    echo json_encode(array(
        'code' => 'success'
    ));
}
catch (Exception $e) {
    // Returning an error response to the client
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}
