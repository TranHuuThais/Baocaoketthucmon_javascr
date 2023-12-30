var itemList = []

function loadCart() {
    var json = localStorage.getItem('cart')
    if (json != null) {
        itemList = JSON.parse(json)     //sử dụng để chuyển đổi một chuỗi JSON thành một đối tượng JavaScript.
    }

    console.log(itemList)
    render(itemList)
}

function saveToLocaStorage() {
    this.localStorage.setItem('cart', JSON.stringify(itemList))
}
//Save todoList to localStorage when tab closing
window.addEventListener('beforeunload', function (e) {
    saveToLocaStorage()
});

function addToCart(item) {
    let count = 0
    itemList.forEach(it => {
        if (it.productId == item.productId) {
            it.quantity += item.quantity
            count++;
        }
    })
    if (count == 0) {
        itemList.push(item)
    }

    saveToLocaStorage()
}

function removeFromCart(productId) {
    for (let i = 0; i < itemList.length; i++) {
        if (productId == itemList[i].productId) {
            itemList.splice(i, 1)

        }
    }
    render(itemList)
}

function render(cart) {
    $('#cart-list').empty()
    for (let i = 0; i < cart.length; i++) {
        let product = cart[i];
        let productElement = `
            <div class="col-lg-8">
              
                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                            <img class="img-fluid mx-auto d-block image" src="${product.productImage}" alt="${product.productName}">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <h6 class="text-muted">${product.productName}</h6>

                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <input id="form1" min="0" name="quantity" value="${product.quantity}" type="number"
                                    class="form-control form-control-sm" />

                                <button class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0">${product.productPrice}</h6>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <input type="hidden" id="productId" value="${product.productId}" />
                                <button class="btn btn-link" onclick="doDeleteItem(${product.productId})">
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <hr class="my-4">
                  </div>
                

                `;

        // Thêm sản phẩm vào #cart-list
        $('#cart-list').append(productElement);

    }
    // Tính tổng số lượng và giá trị đơn hàng
    let subtotal = 0;
    for (let i = 0; i < cart.length; i++) {
        const product = cart[i];
        subtotal += product.productPrice * product.quantity;
    }

    // Formatting subtotal as currency


    // Render summary
    let summaryElement = `
                <div class="col-lg-4 bg-grey">
                    <div class="p-5">
                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                        <hr class="my-4">

                            <h5 class="text-uppercase mb-3">Give code</h5>

                            <div class="mb-5">
                                <div class="form-outline">
                                    <input type="text" id="form3Examplea2"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Examplea2">Enter your code</label>
                                </div>
                            </div>

                            <hr class="my-4">

                                <div class="d-flex justify-content-between mb-5">
                                    <h5 class="text-uppercase">Total price</h5>
                                    <h5>${subtotal}.000</h5>
                                </div>

                                <button type="button" class="btn btn-dark btn-block btn-lg"
                                    data-mdb-ripple-color="dark">Register</button>

                            </div>
                    </div>

                    `;

    $('#cart-list').append(summaryElement);
    addCartEvents();
}

function addCartEvents() {
    let btnDeleteItem = document.getElementById('btnDeleteItem')
    btnDeleteItem.addEventListener('click', doDeleteItem)
}

function doDeleteItem() {
    let productId = Number(document.getElementById('productId').value)
    removeFromCart(productId)
}