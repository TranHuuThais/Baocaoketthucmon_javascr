
var productList = [];

$(document).ready(function () {
  // Fetch user list
  $.ajax({
    url: 'http://localhost/api/products/index.php',
    type: 'GET',
    success: function (data) {
      productList = JSON.parse(data); // Sửa tên biến ở đây
      renderproductListUI(productList);
    },
    error: function (e) {
      console.log(e.message);
    }
  });
});



function renderproductListUI(productList) {
  $('#product-list').empty();

  productList.forEach(product => {
    $('#product-list').append(
      `
        <tr>
          <th scope="row">${product.id}</th>
          
          <td>${product.name}</td>
          <td>${product.description}</td>
          <td>${product.image}</td>
          <td>${product.price}</td>
          <td>${product.quantity}</td>
          <td>${product.view}</td>
          
          <td>${product.id}</td>
          <td>
            <a href="http:edit.html" class="btn btn-primary">
              <i data-lucide="pencil"></i>Edit
            </a>
          </td>
          <td>
            <div class="d-flex justify-content-end">
              <button onclick="deleteProduct(${product.id})" type="button" class="btn btn-primary">
                <i data-lucide="trash-2"></i>Delete
              </button>
            </div>
          </td>
        </tr>
        `
    );
  });
}




function deleteProduct(ProductID) {
  $.ajax({
    url: 'http://localhost/api/products/delete.php?ProductID=' + ProductID,
    type: 'GET',
    success: function (data) {
      location.reload();
    },
    error: function (e) {
      console.log(e.message);
    }
  });
}



function createProduct() {
  var name = $('#name').val();
  var description = $('#description').val();
  var image = $('#image').val();
  var price = $('#price').val();
  var quantity = $('#quantity').val();
  var view = $('#view').val();

  // Validate input here if needed

  // Gửi yêu cầu AJAX
  $.ajax({
    url: 'http://localhost/api/products/create.php', // Thay thế bằng đường dẫn thực tế đến tệp PHP của bạn
    type: 'POST',
    data: {
      name: name,
      description: description,
      image: image,
      price: price,
      quantity: quantity,
      view: view
    },
    dataType: 'json',
    success: function (response) {
      console.log(response);

      // Redirect to the login page after successful registration
      window.location.href = 'index.html';
    },
    error: function (error) {
      console.error('Error:', error);
    }
  });
}




function editProduct() {
  // Lấy dữ liệu từ biểu mẫu
  var id = $('#id').val();
  var name = $('#name').val();
  var description = $('#description').val();
  var image = $('#image').val();
  var price = $('#price').val();
  var quantity = $('#quantity').val();
  var view = $('#view').val();

  // Đảm bảo tất cả các trường đều đã được điền
  if (!id || !name || !description || !image || !price || !quantity || !view) {
    alert("Vui lòng điền đầy đủ thông tin.");
    return;
  }

  // Tạo đối tượng FormData để gửi các tệp tin
  var formData = new FormData();
  formData.append('id', id);
  formData.append('name', name);
  formData.append('description', description);
  formData.append('image', image);
  formData.append('price', price);
  formData.append('quantity', quantity);
  formData.append('view', view);

  // Tạo yêu cầu AJAX
  $.ajax({
    type: 'POST',
    url: 'http://localhost/api/products/update.php', // Cập nhật đường dẫn đúng
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log(response);

      // Redirect to the login page after successful registration
      window.location.href = 'index.html';
    },
    error: function (xhr, status, error) {
      console.error('Lỗi AJAX: ' + status + ' - ' + error);
    }
  });
}