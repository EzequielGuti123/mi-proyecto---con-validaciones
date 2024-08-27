
        // Validación del formulario
        const form = document.querySelector(".form");
        const nombre = document.getElementById('nombre');
        const email = document.getElementById('email');
        const telefono = document.getElementById('telefono');

        form.addEventListener('submit', (e) => {
            console.log("hola, hiciste click");
            e.preventDefault();
            checkInputs();
            if (document.querySelectorAll('.form-error').length === 0) { // Verifica si no hay errores
                sendFormData();
            }

        });

        function checkInputs() {
            const nombreValue = nombre.value.trim();
            const emailValue = email.value.trim();
            const telefonoValue = telefono.value.trim();

            if (nombreValue === "") {
                setError(nombre, 'Este campo no puede estar vacío');
            } else {
                setSuccess(nombre);
                console.log(nombreValue);
            }emailValue
            if (emailValue === "") {
                setError(email, 'Este campo no puede estar vacío');
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'No es un email válido');
            } else {
                setSuccess(email);
                console.log(emailValue)
            }
            if (telefonoValue === "") {
                setError(telefono, 'Este campo no puede estar vacío');
            } else if (!/^\d+$/.test(telefonoValue)) {
                setError(telefono, 'El teléfono debe contener solo números');
            } else {
                setSuccess(telefono);
                console.log(telefonoValue);
            }
        }

        function setError(input, message) { 
            const datosForm = input.parentElement;
            const small = datosForm.querySelector('small');
            datosForm.className = 'datos_form form-error';
            small.innerText = message;
            console.log("pasaste por setError");
        }
    
        function setSuccess(input) {
            const datosForm = input.parentElement;
            datosForm.className = 'datos_form form-success';
            
        }

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
        function sendFormData() {
            const nombreValue = nombre.value.trim();
            const emailValue = email.value.trim();
            const telefonoValue = telefono.value.trim();
            
            console.log("Enviando datos:", { nombreValue, emailValue, telefonoValue }); // Debugging info
            
            fetch('http://localhost/mi%20proyecto%20-%20con%20validaciones/views/mail.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    nombre: nombreValue,
                    email: emailValue,
                    telefono: telefonoValue
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => { throw new Error(`HTTP error! status: ${response.status}, message: ${text}`) });
                }
                return response.text();
            })
            .then(data => {
                console.log('Respuesta del servidor:', data);
                alert('Formulario enviado con éxito');
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
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


