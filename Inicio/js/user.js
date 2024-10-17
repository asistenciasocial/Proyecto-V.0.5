document.getElementById('loginTab').addEventListener('click', function() {
    document.getElementById('loginForm').classList.add('active');
    document.getElementById('registerForm').classList.remove('active');
    this.classList.add('active');
    document.getElementById('registerTab').classList.remove('active');
});

document.getElementById('registerTab').addEventListener('click', function() {
    document.getElementById('registerForm').classList.add('active');
    document.getElementById('loginForm').classList.remove('active');
    this.classList.add('active');
    document.getElementById('loginTab').classList.remove('active');
});