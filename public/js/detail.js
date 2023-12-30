function getParam(param) {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    return urlParams.get(param)
}

$(document).ready(function () {
    var productId = getParam('productId')
    $.ajax({
        url: 'http://localhost/api/products/show.php?productId=' + productId,
        type: 'GET',
        success: function (data) {
            var product = JSON.parse(data)
            renderProductUI(product)
            addEvents()
        },
        error: function (e) {
            console.log(e.message);
        }
    });
})


// show All Detail Products
function renderProductUI(product) {
    $('#product-detail').append(
        `
        <div class="row gx-5">
        <input type="hidden" id="productId" value="${product.id}">
        <input type="hidden" id="productName" value="${product.name}">
        <input type="hidden" id="productImage" value="${product.image}">
        <input type="hidden" id="productPrice" value="${product.price}">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a href="${product.image}">
              <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                src="${product.image}" />
            </a>
          </div>
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
            ${product.name}
            </h4>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span class="ms-1">
                  4.5
                </span>
              </div>
            </div>

            <div class="mb-3">
              <span class="h5">${product.price}$</span>
              
            </div>

            <p>
            ${product.description}
            </p>


            <hr />

            <div class="row mb-4">
             
              <div class="col-md-4 col-6 mb-3">
                <label class="mb-2 d-block">Quantity</label>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                     <button class="btn btn-link px-2" type="button" id="button-addon1"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                     </button>

                    <input id="quantity" min="0" name="quantity" min"0" value="1" type="number"
                        class="form-control1 form-control-sm" />

                    <button class="btn btn-link px-2" type="button" id="button-addon2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
            </div>
              </div>
            <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
            <button id="btnAddToCart" href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to
              cart </button>
          </div>
        </main>
      </div>
        `
    )
}

function addEvents(){
    let btnAddToCart = document.getElementById('btnAddToCart')
    btnAddToCart.addEventListener('click', doAddToCart)
}

function doAddToCart(){
  let productId = document.getElementById('productId').value
  let productName = document.getElementById('productName').value
  let productImage = document.getElementById('productImage').value
  let productPrice = document.getElementById('productPrice').value
  let quantity = Number(document.getElementById('quantity').value)

  let item = {
    productId,
    productImage,
    productName,
    productPrice,
    quantity
  }

  addToCart(item)
  Swal.fire("Đã vào giỏ hàng");
}