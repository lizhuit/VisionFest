<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cotización VisionFest</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { 
            text-align: center; 
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        .logo { width: 80px; height: auto; }
        .title { 
            font-size: 24px; 
            font-weight: bold; 
            color: #6F2063; 
        }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th { background-color: #FAD0C4; color: white; padding: 8px; }
        .table td { padding: 8px; border: 1px solid #ddd; text-align: center; }
        .total { text-align: right; font-size: 18px; font-weight: bold; }
        .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/articulos/logo.jpg') }}" class="logo" alt="VisionFest Logo">
        <div>
            <h1 class="title">VisionFest - Cotización</h1>
            <p>Fecha: {{ date('d/m/Y') }}</p>
        </div>
    </div>
    
    <table class="table">
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
    
    <div class="total">
        <span>Total: ${{ number_format($total, 2) }}</span>
    </div>

    <div style="margin-top: 20px; text-align: center;">
        <p>Para cualquier duda o aclaración, contáctenos:</p>
        <p>Teléfono: 2217130772</p>
        <p>Correo electrónico: huitzillizbeth4@gmail.com</p>
    </div>
    
    <div class="footer">
        Gracias por su preferencia - VisionFest
    </div>
</body>
</html>