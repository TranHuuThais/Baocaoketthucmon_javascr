/**
 * Home Page
 */
// ready
$(document).ready(function () {
    getAllProducts();
    getHotProducts();
    getNewProducts();
})
function getAllProducts() {
    $.ajax({
        url: 'http://localhost/api/products/index.php',
        success: function (data) {
            var productList = JSON.parse(data)
            renderAllProducts(productList)
        },
        error: function (e) {
            console.log(e.message);
        }
    });
}
// show all Products
function renderAllProducts(productList) {
    productList.forEach(products => {
        $('#product-list').append(
            `
            <div class="col-md-3 pt-3 py-md-">
            <a class="card" style="text-decoration: none;" href="detail.html?productId=${products.id}">
            <img src="${products.image}" alt="">
                <div class="card-body">
                    <h3>${products.name}</h3>
                    <p>${products.description}</p>
                    <h5>${products.price}₫ <span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
            </a>
        </div>
            `
        )
    });
}

function getHotProducts() {
    $.ajax({
        url: 'http://localhost/api/products/hot.php',
        success: function (data) {
            var productList = JSON.parse(data)
            renderHotProducts(productList)
        },
        error: function (e) {
            console.log(e.message);
        }
    });
}
// show Hot Products
function renderHotProducts( ) {
    productList.forEach(products => {
        $('#product-hot').append(
            `<div class="col-md-3 pt-3 py-md-">
            <a class="card" style="text-decoration: none;" href="detail.html?productId=${products.id}">
            <img src="${products.image}" alt="">
                <div class="card-body">
                    <h4>${products.name}</h4>
                    <p>${products.description}</p>
                    <h5>${products.price}₫ <span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
            </a>
        </div>
            `
        )
    });
}

function renderProductListUIN(productList) {
    productList.forEach(products => {
        $('#product-new').append(
            `
            <div class="col-md-3 pt-3 py-md-">
            <a style="text-decoration: none;" class="card" href="detail.html?productId=${products.id}">
            <img src="${products.image}" alt="">
                <div class="card-body">
                    <h4>${products.name}</h4>
                    <p>${products.description}</p>
                    <h5>${products.price}₫ <span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
                </a>
        </div>
            `
        )
    });
}


// show New Products
function renderNewProducts(productList) {
    productList.forEach(products => {
        $('#product-new').append(
            `<div class="col-md-3 pt-3 py-md-">
            <a style="text-decoration: none;" class="card" href="detail.html?productId=${products.id}">
            <img src="${products.image}" alt=""> 
                <div class="card-body">
                    <h4 >${products.name}</h4>
                    <p>${products.description}</p>
                    <h5>${products.price}₫ <span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
                </a>
        </div>
            `
        )
    });
}

function getNewProducts() {
    $.ajax({
        url: 'http://localhost/api/products/new.php',
        type: 'GET',
        success: function (data) {
            var productList = JSON.parse(data)
            renderNewProducts(productList)
        },
        error: function (e) {
            console.log(e.message);
        }
    });
}
