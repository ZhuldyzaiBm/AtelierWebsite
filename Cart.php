<?php
    //Connecting the header
include'header.php';
?>

<!--Linking css stylesheet-->
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<!--Cart section-->
<body data-page="cart">
    <div class="container">
        
        <!--Setting the table display settings-->
        <br />
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <!--Initializing table columns-->
                        <th>Артикул</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th></th>
                    </tr>
                </thead>

                <!--Loading while waiting for data-->
                <tbody id="cart">
                    <tr><td colspan="6"><img src="img/loading.gif" alt="" /></td></tr>
                </tbody>
            </table>
        </div>

        <!--Displaying total cost-->
        <div>Итого: <span id="total-cart-summa"></span> тг.</div>
        <br />

        <!--Submitting cart details, proceeding order-->
        <a class="btn btn-info" href="cartnext.php">Оформить заказ</a>
    </div>

    <!--template for displaying the each row-->
    <script id="cart-template" type="text/template">
        <% _.each(goods, function(good) { %>
            <tr class="cart-item js-cart-item" data-id="<%= good.id %>">
                <td><%= good.id %></td>
                <td><%- good.name %></td>
                <td><%= good.price %> тг.</td>
                <td>
                    <span 
                        class="cart-item__btn-dec-count js-change-count" 
                        title="Уменьшить на 1" 
                        data-id="<%= good.id %>" 
                        data-delta="-1"
                    >
                        <span class="glyphicon glyphicon-minus"></span>
                    </span>
                    <span class="js-count"><%= good.count %></span>
                    <span 
                        class="cart-item__btn-inc-count js-change-count" 
                        title="Увеличить на 1" 
                        data-id="<%= good.id %>" 
                        data-delta="1"
                    >
                        <span class="glyphicon glyphicon-plus"></span>
                    </span>
                </td>
                <td><span class="js-summa"><%= good.count * good.price %></span> тг.</td>
                <td>
                    <span class="cart-item__btn-remove js-remove-from-cart" title="Удалить из корзины" data-id="<%= good.id %>">
                        <span class="glyphicon glyphicon-remove"></span>                                
                    </span>
                </td>
            </tr>
        <% }); %>
    </script>

<?php
    //Connecting the footer
    require_once("footer.php");
?>