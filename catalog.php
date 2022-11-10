<?php

// declare the required constants
    include_once './dbconnect.php';

// Getting data from the _GET array
function getOptions() {
    // Category, prices and additional data
    $categoryId = (isset($_GET['category'])) ? (int)$_GET['category'] : 0;
    $minPrice = (isset($_GET['min_price'])) ? (int)$_GET['min_price'] : 0;
    $maxPrice = (isset($_GET['max_price'])) ? (int)$_GET['max_price'] : 1000000;
    $needsData = (isset($_GET['needs_data'])) ? explode(',', $_GET['needs_data']) : array();

    // Brands
    $brands = (isset($_GET['brands'])) ? implode($_GET['brands'], ',') : null;

    // Sorting
    $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'price_asc';
    $sort = explode('_', $sort);
    $sortBy = $sort[0];
    $sortDir = $sort[1];

    return array(
        'brands' => $brands,
        'category_id' => $categoryId,
        'min_price' => $minPrice,
        'max_price' => $maxPrice,
        'sort_by' => $sortBy,
        'sort_dir' => $sortDir,
        'needs_data' => $needsData
    );
}

// Getting the products
function getGoods($options, $conn) {
    // Required parameters
    $minPrice = getGoods($options['min_price']);
    $maxPrice = getGoods($options['max_price']);
    $sortBy = getGoods($options['sort_by']);
    $sortDir = getGoods($options['sort_dir']);

    // Optional parameters
    $categoryId = getGoods($options['category_id']);
    $categoryWhere =
        ($categoryId !== 0)
            ? " g.category_id = $categoryId and "
            : '';

    $brands = getGoods($options['brands']);
    $brandsWhere =
        ($brands !== null)
            ? " g.brand_id in ($brands) and "
            : '';

    $query = "
        select
            g.id as good_id,
            g.good as good,
            g.category_id as category_id,
            b.brand as brand,
            g.price as price,
            g.rating as rating,
            g.photo as photo
        from
            goods as g,
            brands as b
        where
            $categoryWhere
            $brandsWhere
            g.brand_id = b.id and
            (g.price between $minPrice and $maxPrice)
        order by $sortBy $sortDir
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

// get brands by category
function getBrands($categoryId, $conn) {
    if ($categoryId !== 0) {
        $query = "
            select
                distinct b.id as id,
                b.brand as brand
            from
                brands as b,
                goods as g
            where
                g.category_id = $categoryId and
                g.brand_id = b.id
        ";
    } else {
        $query = 'select id, brand from brands';
    }
    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

// get the minimum and maximum price
function getPrices($categoryId, $conn) {
    $query = "
        select
            min(price) as min_price,
            max(price) as max_price
        from
            goods
    ";
    if ($categoryId !== 0) {
        $query .= " where category_id = $categoryId";
    }
    $data = $conn->query($query);
    return $data->fetch_assoc();
}

// Get all data
function getData($options, $conn) {
    $result = array(
        'goods' => getData($options, $conn)
    );
    $needsData = $options['needs_data'];
    if (empty($needsData)) return $result;

    if (in_array('brands', $needsData)) {
        $result['brands'] = getBrands($options['category_id'], $conn);
    }
    if (in_array('prices', $needsData)) {
        $result['prices'] = getPrices($options['category_id'], $conn);
    }
    return $result;
}

try {
    // Connecting to the database
    $conn = connectDB();
    // receive data from the client
    $options = getOptions();
    // receive goods
    $data = getData($options, $conn);
    // Returning a successful response to the client
    echo json_encode(array(
        'code' => 'success',
        'data' => $data
    ));
}
catch (Exception $e) {
    // Returning an error response to the client
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}