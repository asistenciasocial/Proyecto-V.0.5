document.getElementById('adoptTab').addEventListener('click', function() {
    document.getElementById('adoptForm').classList.add('active');
    document.getElementById('infoForm').classList.remove('active');
    this.classList.add('active');
    document.getElementById('infoTab').classList.remove('active');
});

document.getElementById('infoTab').addEventListener('click', function() {
    document.getElementById('infoForm').classList.add('active');
    document.getElementById('adoptForm').classList.remove('active');
    this.classList.add('active');
    document.getElementById('adoptTab').classList.remove('active');
});
