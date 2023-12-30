// Hàm đăng xuất
function performLogout() {
    // Xóa trạng thái đăng nhập và thông tin người dùng từ sessionStorage
    sessionStorage.removeItem('isLoggedIn');
    sessionStorage.removeItem('name');
    // Chuyển hướng người dùng về trang đăng nhập
    window.location.href = 'login.html';
}