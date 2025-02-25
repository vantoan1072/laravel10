document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Kiểm tra tên đăng nhập và mật khẩu
    if (username === 'admin' && password === 'admin123') {
        alert('Đăng nhập thành công!');
        // Chuyển hướng đến trang admin sau khi đăng nhập thành công
        window.location.href = 'admin.html';
    } else {
        document.getElementById('error-message').textContent = 'Tên đăng nhập hoặc mật khẩu không đúng.';
    }
});
