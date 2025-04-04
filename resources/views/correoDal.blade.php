<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - Contacto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FFFFFF] font-sans">
    <div class="flex h-screen">
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col">
            <a href="{{ route('homeDal') }}" class="text-center text-white text-3xl mb-4">
                <span class="text-4xl">🏠</span>
            </a>
            <nav class="mt-5">
                <a href="{{ route('galeriaDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>🖼</span> Galería
                </a>
                <a href="{{ route('cotizacionDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>📄</span> Cotización
                </a>
                <a href="{{ route('correoDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>📧</span> Contáctanos
                </a>
                <a href="{{ route('configuracion') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>⚙</span> Configuración
                </a>
            </nav>
        </div>

        <!-- Contenido Principal -->
        <div class="flex-1 flex flex-col">
            <div class="bg-[#E3A8B6] flex justify-between items-center p-4">
                <h1 class="text-[#FFFFFF] text-3xl font-bold text-center">VisionFest</h1>
                <img src="{{ asset('img/articulos/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16 ml-auto">
            </div>
            <h2 class="text-2xl font-bold text-[#6F2063]">Contáctanos</h2>

            <center>
                <div class="contact-form mt-8">
                    <h3 class="text-2xl font-bold">Escribe tu mensaje:</h3>
                    <br>
                    <input type="text" id="nombre" class="w-96 p-2 border-2 border-gray-300 rounded-lg mb-4" placeholder="Tu nombre">
                    <br>
                    <input type="email" id="email" class="w-96 p-2 border-2 border-gray-300 rounded-lg mb-4" placeholder="Tu correo">
                    <br>
                    <textarea id="mensaje" class="w-96 h-32 p-2 border-2 border-gray-300 rounded-lg mb-4" placeholder="Escribe aquí tu mensaje..."></textarea>
                    <br>
                    <button onclick="enviarCorreo()" class="px-4 py-2 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#B76A87]">
                        Enviar correo
                    </button>
                </div>
            </center>
        </div>
    </div>

    <script>
     function enviarCorreo() {
    let nombre = document.getElementById("nombre").value;
    let email = document.getElementById("email").value;
    let mensaje = document.getElementById("mensaje").value;

    if (!nombre || !email || !mensaje) {
        alert("Por favor, completa todos los campos.");
        return;
    }

    let asunto = encodeURIComponent("Consulta de " + nombre);
    let body = encodeURIComponent(`Nombre: ${nombre}\nCorreo: ${email}\nMensaje: ${mensaje}`);

    window.location.href = `mailto:huitzillizbeth4@gmail.com?subject=${asunto}&body=${body}`;
}

</script>
</body>
</html>