// Aquí puedes agregar JavaScript para detectar qué mascota se seleccionó
const radios = document.querySelectorAll('input[name="mascota"]');

radios.forEach(radio => {
  radio.addEventListener('change', () => {
    if (radio.checked) {
      console.log('Has seleccionado a:', radio.value);
      // Aquí puedes hacer algo con la mascota seleccionada, como mostrar más detalles, agregarla a un carrito, etc.
    }
  });
});

function mostrarBotonAdoptar(mascotaSeleccionada) {
  // Obtener el ID del contenedor de la tarjeta de la mascota seleccionada
  const idMascota = mascotaSeleccionada.id;
  const contenedor = document.getElementById(`adoptar-container-${idMascota}`);

  // Crear el botón de adoptar si no existe
  if (!document.querySelector(`#adoptar-container-${idMascota} .boton-adoptar`)) {
      const botonAdoptar = document.createElement("button");
      botonAdoptar.classList.add("boton-adoptar");
      botonAdoptar.innerText = "Adoptar";

      // Agregar el botón al contenedor
      contenedor.appendChild(botonAdoptar);
  }

  // Ocultar otros botones de adoptar si se selecciona otra mascota
  document.querySelectorAll('.boton-adoptar').forEach(button => {
      if (button.parentElement.id !== `adoptar-container-${idMascota}`) {
          button.remove();
      }
  });
}
