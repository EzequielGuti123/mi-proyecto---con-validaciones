document.addEventListener('DOMContentLoaded', function () { 
    console.log("JavaScript cargado");

    // Generación de las cards
    const cards = [
        { name: "75MB", installation: "Instalacion sin cargo", price: "$10000/mes", descent: "50 Megas de Bajada", rise: "25 Megas de Subida" },
        { name: "100MB", installation: "Instalacion sin cargo", price: "$12500/mes", descent: "100 Megas de Bajada", rise: "50 Megas de Subida" },
        { name: "300MB", installation: "Instalacion sin cargo", price: "$15000/mes", descent: "300 Megas de Bajada", rise: "100 Megas de Subida" }
    ];

    const container = document.querySelector(".banners");

    function armarCard(card) {  
        return `
            <div class="content-banner">
                <h3>${card.name} <br> ${card.installation}</h3>
                <p>${card.price}</p>
                <p>Conexion Wifi</p>
                <p>${card.descent}</p>
                <p>${card.rise}</p>
                <p>Conexion por Fibra</p>
                <a href="./formulario.html">Contratar ahora</a>
            </div>
        `;
    }

    if (cards.length > 0) {
        for (let card of cards) {
            container.innerHTML += armarCard(card);
        }
    }
    else {
    console.log("No se encontró el contenedor de las cards.");
    }
    
    const buttons = document.querySelectorAll('.toggle-answer');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
            const answer = this.parentElement.nextElementSibling;
            if (answer.style.display === 'block') {
                answer.style.display = 'none';
                this.textContent = '.';
            } else {
                answer.style.display = 'block';
                this.textContent = '.';
            }
        });
    });
});

const sliderInner = document.querySelector(".slider-frame");

let images =sliderInner.querySelectorAll("img");


let index = 0;

setInterval(function(){

let porcentaje = index * -100;

sliderInner.style.transform = "translateX(" + porcentaje + "%)";
index++;
if(index > images.length -1 ){
    index = 0;
}

}, 3000);


