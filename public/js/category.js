function getParam(param) {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    return urlParams.get(param)
}

$(document).ready(function () {
    var categoryId = getParam('categoryId')
    $.ajax({
        url: 'http://localhost/api/categories/show.php?categoryId=' + categoryId,
        type: 'GET',
        success: function (data) {
            var categoryList = JSON.parse(data)
            renderCategoryListListUI(categoryList)
        },
        error: function (e) {
            console.log(e.message);
        }
    });
})


// showAllProducts
function renderCategoryListListUI(categoryList) {
    categoryList.forEach(category => {
        $('#categories-list').append(
            `
        <div class="col-md-3 py-3 py-md-0 mt-3">
        <a class="card" style="text-decoration: none;" href="detail.html?productId=${category.id}">
                <img src="${category.image}" alt="">
                <div class="card-body">
                    <h3>${category.name}</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>${category.price}<span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
                </a>
        </div>
            `
        )
    });
}


