
var userList = [];

$(document).ready(function () {
  // Fetch user list
  $.ajax({
    url: 'http://localhost/api/users/index.php',
    type: 'GET',
    success: function (data) {
      userList = JSON.parse(data); // Sửa tên biến ở đây
      renderUserListUI(userList);
    },
    error: function (e) {
      console.log(e.message);
    }
  });
});

function renderUserListUI(userList) {
  $('#users-list').empty();

  userList.forEach(user => {
    $('#users-list').append(
      `
        <tr>
          <th scope="row">${user.id}</th>
          <td>${user.name}</td>
          <td>${user.email}</td>
          <td>${user.password}</td>
          <td>${user.role}</td>
          <td>${user.id}</td>
          <td>
            <a href="http:edit.html" class="btn btn-primary">
              <i data-lucide="pencil"></i>Edit
            </a>
          </td>
          <td>
            <div class="d-flex justify-content-end">
              <button onclick="deleteUser(${user.id})" type="button" class="btn btn-primary">
                <i data-lucide="trash-2"></i>Delete
              </button>
            </div>
          </td>
        </tr>
        `
    );
  });
}



function deleteUser(userId) {
  $.ajax({
    url: 'http://localhost/api/users/delete.php?userId=' + userId,
    type: 'GET',
    success: function (data) {
      location.reload();
    },
    error: function (e) {
      console.log(e.message);
    }
  });
}



function createUser() {
  var name = $('#name').val();
  var email = $('#email').val();
  var password = $('#password').val();
  var role = $('#role').val();

  var emailRegex = /^[a-zA-Z0-9._-]+@gmail\.com$/;

  // Kiểm tra xem email có được nhập không
  if (!email) {
      alert('Vui lòng nhập địa chỉ email.');
      return;
  }

  // Kiểm tra định dạng email (Gmail)
  if (!emailRegex.test(email)) {
      // Hiển thị thông báo lỗi nếu địa chỉ email không hợp lệ
      alert('Vui lòng nhập địa chỉ email Gmail hợp lệ.');
      return;
  }

  // Yêu cầu AJAX
  $.ajax({
      url: 'http://localhost/api/users/create.php', // Thay đổi đường dẫn này thành mã server của bạn
      method: 'POST',
      data: {
          name: name,
          email: email,
          password: password,
          role: role
      },
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


function editUser() {
  // Lấy dữ liệu từ biểu mẫu
  var id = $('#id').val();
  var name = $('#name').val();
  var email = $('#email').val();
  var password = $('#password').val();
  var role = $('#role').val();

  // Đảm bảo tất cả các trường đều đã được điền
  if (!id || !name || !email || !password || !role) {
    alert("Vui lòng điền đầy đủ thông tin.");
    return;
  }

  // Tạo đối tượng FormData để gửi các tệp tin
  var formData = new FormData();
  formData.append('id', id);
  formData.append('name', name);
  formData.append('email', email);
  formData.append('password', password);
  formData.append('role', role);

  // Tạo yêu cầu AJAX
  $.ajax({
    type: 'POST',
    url: 'http://localhost/api/users/update.php', // Cập nhật đường dẫn đúng
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