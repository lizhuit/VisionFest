<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - Cotización</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        let productosCotizacion = [
            { nombre: 'Arco pequeño', precio: 200, cantidad: 1 },
            { nombre: 'Semi arco', precio: 250, cantidad: 1 }
        ];

        // Función para agregar un producto a la cotización
        function agregarProducto(nombre, precio) {
            const cantidad = 1;
            productosCotizacion.push({ nombre, precio, cantidad });
            actualizarTabla();
        }

        // Función para eliminar un producto de la cotización
        function eliminarProducto(index) {
            productosCotizacion.splice(index, 1);
            actualizarTabla();
        }

        // Función para actualizar la tabla y el monto total
        function actualizarTabla() {
            const tbody = document.getElementById('productosTabla');
            tbody.innerHTML = '';
            let total = 0;

            productosCotizacion.forEach((producto, index) => {
                const totalProducto = producto.precio * producto.cantidad;
                total += totalProducto;

                const tr = document.createElement('tr');
                tr.classList.add('border');
                tr.innerHTML = `
                    <td class="p-2">${producto.nombre}</td>
                    <td class="p-2">$${producto.precio.toFixed(2)}</td>
                    <td class="p-2">${producto.cantidad}</td>
                    <td class="p-2">$${totalProducto.toFixed(2)}</td>
                    <td class="p-2"><button onclick="eliminarProducto(${index})" class="px-2 py-2 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#B76A87]">Eliminar</button></td>
                `;
                tbody.appendChild(tr);
            });

            document.getElementById('montoTotal').innerText = `$${total.toFixed(2)}`;
        }

        // Función para cancelar la cotización
        function cancelarCotizacion() {
            productosCotizacion = [];
            actualizarTabla();
        }

        // Inicializar la tabla al cargar la página
        window.onload = actualizarTabla;
    </script>
</head>
<body class="bg-[#FFFFFF] font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col">


            <!-- Icono de Home arriba -->
            <a href="{{ route('home') }}" class="text-center text-white text-3xl mb-4">
                <span class="text-4xl">🏠</span>
            </a>
            <nav class="mt-5">
                <a href="{{ route('galeria') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>🖼️</span> Galería
                </a>
                <a href="{{ route('cotizacion') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>📄</span> Cotización
                </a>
                <a href="{{ route('correo') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>📧</span> Contáctanos
                </a>
                <a href="{{ route('configuracion') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>⚙️</span> Configuración
                </a>
            </nav>
        </div>


        <!-- Contenido Principal -->
        <div class="flex-1 flex flex-col">
            <!-- Encabezado -->
            <div class="bg-[#E3A8B6] flex justify-between items-center p-4">
                <h1 class="text-[#FFFFFF] text-3xl font-bold text-center">VisionFest</h1>
                <img src="{{ asset('img/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16 ml-auto">
            </div>
            <h2 class="text-2xl font-bold text-[#6F2063]">Cotización</h2>
            
            <!-- Tabla de Cotización -->
            <div class="flex-1 p-10 bg-[#FFFFFF]">
                <table class="w-full border mt-5 text-center">
                    <thead class="bg-[#FAD0C4] text-white">
                        <tr>
                            <th class="p-2">Nombre</th>
                            <th class="p-2">Precio</th>
                            <th class="p-2">Cantidad</th>
                            <th class="p-2">Total</th>
                            <th class="p-2">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="productosTabla">
                        
                    </tbody>
                </table>

                <!-- Monto total -->
                <div class="text-right mt-5 text-xl">Monto: <span class="font-bold" id="montoTotal">$0.00</span></div>

                <!-- Botones de cancelar -->
                <div class="flex justify-between mt-5">
                    <button onclick="cancelarCotizacion()" class="px-2 py-2 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#B76A87]">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
