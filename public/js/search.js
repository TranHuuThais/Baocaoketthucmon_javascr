function getParam(param){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    return urlParams.get(param)
}

$(document).ready(function () {
    var key = getParam('key')
    $.ajax({
        url: 'http://localhost/api/products/search.php?key=' + key,
        type: 'GET',
        success: function (data) {
            var productList = JSON.parse(data)
            renderProductListUI(productList)
        },
        error: function (e) {
            console.log(e.message);
        }
    });
})


// showAllProducts
function renderProductListUI(productList) {
    productList.forEach(products => {
        $('#product-list').append(
            `
            <div class="col-md-3 pt-3 py-md-">
            <a class="card" style="text-decoration: none;" href="detail.html?productId=${products.id}">
            <img src="${products.image}" alt="">
                <div class="card-body">
                    <h3>${products.name}</h3>
                    <p>${products.description}</p>
                    <h5>${products.price} <span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
            </a>
        </div>
            `
        )
    });
}