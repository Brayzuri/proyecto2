<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-lg bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
        
        <div class="bg-cyan-600 p-4 text-white flex justify-between items-center">
            <h4 class="text-xl font-bold">Detalle del Producto</h4>
            <span class="text-xs font-mono bg-cyan-700 px-2 py-1 rounded">ID: #{{ $producto->id }}</span>
        </div>
        
        <div class="p-6 space-y-4">
            
            <div class="border-b border-gray-100 pb-3 flex justify-between">
                <span class="text-gray-500 font-medium">Nombre:</span>
                <span class="text-gray-900 font-semibold text-right">{{ $producto->nombre }}</span>
            </div>
            
            <div class="border-b border-gray-100 pb-3">
                <span class="text-gray-500 font-medium block mb-1">Descripción:</span>
                <p class="text-gray-700 text-sm bg-gray-50 p-3 rounded-lg border border-gray-150">
                    {{ $producto->descripcion ?? 'Este producto no cuenta con una descripción detallada.' }}
                </p>
            </div>

            <div class="border-b border-gray-100 pb-3 flex justify-between items-center">
                <span class="text-gray-500 font-medium">Precio Unitario:</span>
                <span class="text-2xl font-bold text-green-600">${{ number_format($producto->precio, 2) }}</span>
            </div>

            <div class="border-b border-gray-100 pb-3 flex justify-between">
                <span class="text-gray-500 font-medium">Stock en Almacén:</span>
                <span class="text-gray-900 font-semibold">{{ $producto->stock }} unidades</span>
            </div>

            <div class="border-b border-gray-100 pb-4 flex justify-between items-center">
                <span class="text-gray-500 font-medium">Categoría Asignada:</span>
                <span class="bg-gray-200 text-gray-800 text-xs px-3 py-1 rounded-full font-bold uppercase tracking-wider">
                    {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría asignada' }}
                </span>
            </div>

            <div class="text-center pt-2">
                <a href="{{ url('/producto') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow transition duration-150 inline-block">
                    Volver al Panel Principal
                </a>
            </div>
        </div>

    </div>
</body>
</html>