
document.getElementById('animalForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const animalType = document.getElementById('animalType').value;
    const age = document.getElementById('age').value;
    const description = document.getElementById('description').value;
    const image = document.getElementById('image').files[0];

        console.log(`Tipo: ${animalType}, Edad: ${age}, Descripción: ${description}, Imagen: ${image.name}`);
        alert('Animal subido con éxito.');

    this.reset();
});
  