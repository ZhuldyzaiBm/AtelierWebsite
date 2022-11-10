<?php
//connecting the header
    include'header.php';
?>

<!--header section-->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Каталог товаров</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
          </nav>
                </div>
            </div>
    </div>
    </section>
    <br>
    <br>

<!--catalogue section-->
<body data-page="catalogDB">
    <div class="container">
        <br />
        <div id="filters" class="col-md-12">

            <!--Categorization-->
            <div class="btn-group">
                <button type="button" data-category="0" class="btn btn-default active js-category">Все категории</button>
                <button type="button" data-category="1" class="btn btn-default js-category">Ткани</button>
                <button type="button" data-category="2" class="btn btn-default js-category">Швейная фурнитура</button>
            </div>
            <br />
            <br />
            
            <!--Filtering by price-->
            <form id="filters-form" role="form">
                <div class="col-md-4">
                    <h4>Фильтр по ценам</h4>
                    <div id="prices-label">0 - 0 тг.</div>
                    <br />
                    <input type="hidden" id="min-price" name="min_price" value="5000">
                    <input type="hidden" id="max-price" name="max_price" value="50000">
                    <div id="prices"></div>
                </div>
                <div class="col-md-4">

                    <!--Sorting by price, rating-->
                    <h4>Сортировка</h4>
                    <br />
                    <select id="sort" name="sort" class="form-control">
                        <option value="price_asc">По цене, сначала дешевые</option>
                        <option value="price_desc">По цене, сначала дорогие</option>
                        <option value="rating_desc">По популярности</option>
                    </select>
                </div>
            </form>
        </div>
        <br />
        <br />

        <!--Loading while waiting data-->
        <ul id="goods" class="col-md-12">
            <img src="img/loading.gif" alt="" />
        </ul>
    </div>

    <!--Scripts for displaying goods from database, adding to Cart-->
    <script id="goods-template" type="text/template">
        <section class="lattest-product-area pb-40 category-list">
            <div class="row">
        <% _.each(goods, function(item) { %>
        <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/goods/<%= item.photo %>" alt="">
                    <ul class="card-product__imgOverlay">
                    <button
                    class="small-good-item__btn-add btn btn-info btn-sm js-add-to-cart"
                    data-id="<%= item.good_id %>"
                    data-name="<%- item.good %>"
                    data-price="<%= item.price %>"
                    data-image="<%- item.photo %>"
                >Добавить в корзину</button>
                    </ul>
                  </div>
                  <div class="card-body">                  
                    <h4 class="card-product__title"><a href="#"><%- item.good %></a></h4>
                    <p class="card-product__price" id="price"><%= item.price %> тг.</p>
                  </div>
                </div>
              </div>
        <% }); %>
    </script>

        <script id="brands-template" type="text/template">
        <% _.each(brands, function(item) { %>
        <div class="checkbox"><label><input type="checkbox" name="brands[]" value="<%= item.id %>"> <%= item.brand %></label></div>
        <% }); %>
    </script>

<?php
    //connecting the footer
    require_once("footer.php");
?>