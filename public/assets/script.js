function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

// Cierra el menú lateral
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

// Datos de ejemplo para las tarjetas
const cardsData = [
    /*{
        id:1,
        image:'./assets/imagenes/liverworts-8616125_1280.jpg',
        titulo:'Noticia 1',
        descripcion:'descripcion de la noticia',

    },
    {
        id:2,
        image:"./assets/imagenes/liverworts-8616125_1280.jpg",
        titulo:"Noticia 2",
        descripcion:"descripcion de la noticia",
    },
    {
        id:3,
        image:"./assets/imagenes/liverworts-8616125_1280.jpg",
        titulo:"Noticia 3",
        descripcion:"descripcion de la noticia",
    }*/
];

// Función para crear una tarjeta
function createCard(data) {
    const card = document.createElement('div');
    card.classList.add('card');
    card.innerHTML = `
        <img src="${data.image}" alt="${data.titulo}">
        <div class="card-body">
                <h5 class="card-title">${data.titulo}</h5>
                <p class="card-text">${data.descripcion}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    `;
    return card;
}

// Obtener el contenedor
const container = document.getElementById('contenido');

// Crear y agregar las tarjetas al contenedor
cardsData.forEach((data, i) => {
    const card = createCard(data);
    container.appendChild(card);

    // Agregar un retraso para la animación de cada tarjeta
    setTimeout(() => {
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
    }, i * 200);  // 200ms de retraso entre cada tarjeta
});