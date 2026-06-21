<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Eliminación</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md border-t-4 border-red-500 overflow-hidden">
        
        <div class="p-6 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>

            <h3 class="text-lg font-bold text-gray-900 mb-2">¿Confirmar Eliminación?</h3>
            <p class="text-sm text-gray-500 mb-4">¿Estás completamente seguro de que deseas eliminar el siguiente producto?</p>
            
            <div class="bg-gray-50 p-3 rounded mb-6">
                <span class="text-base font-semibold text-gray-700">{{ $producto->nombre }}</span>
            </div>

            <form action="{{ url('/producto/delete/'.$producto->id) }}" method="POST" class="flex justify-center gap-3">
                @csrf
                <a href="{{ url('/producto') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded transition">
                    No, Cancelar
                </a>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded shadow transition">
                    Sí, Eliminar Producto
                </button>
            </form>
        </div>

    </div>
</body>
</html>