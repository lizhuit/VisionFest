<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cotización</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Cotización</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productosCotizacion as $producto)
            <tr>
                <td>{{ $producto['nombre'] }}</td>
                <td>${{ number_format($producto['precio'], 2) }}</td>
                <td>{{ $producto['cantidad'] }}</td>
                <td>${{ number_format($producto['precio'] * $producto['cantidad'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3 style="text-align: right;">Total: ${{ number_format($total, 2) }}</h3>
</body>
</html>