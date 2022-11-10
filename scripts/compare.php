<?php

// Объявляем нужные константы
    require_once("header.php");

// Получение товаров
function getGoods($goods, $conn) {
    $query = "
        select
            g.id as good_id,
            g.good as good,
            b.brand as brand,
            g.price as price,
            g.rating as rating,
            g.photo as photo
        from
            goods as g,
            brands as b
        where
            g.id in ($goods) and
            g.brand_id = b.id
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

// Получение свойств товаров
function getProps($goods, $conn) {
    $query = "
        select
            gp.good_id as good_id,
            gp.prop as prop,
            gp.value as value
        from
            goods_props as gp
        where
            gp.good_id in ($goods)
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

// Получение всех данных для сравнения товаров
function getData($goods, $conn) {
    $result = array(
        'goods' => getGoods($goods, $conn),
        'props' => getProps($goods, $conn)
    );

    return $result;
}


try {
    // Подключаемся к базе данных
    $conn = connectDB();

    // Получаем товары
    $data = getData(urldecode($_GET['goods']), $conn);

    // Возвращаем клиенту успешный ответ
    echo json_encode(array(
        'code' => 'success',
        'data' => $data
    ));
}
catch (Exception $e) {
    // Возвращаем клиенту ответ с ошибкой
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}
