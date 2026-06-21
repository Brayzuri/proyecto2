<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Administración de Productos</h2>
            <a href="{{ url('/producto/create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">
                Registrar Nuevo Producto
            </a>
        </div>
        

        <form action="{{ url('/producto') }}" method="GET" class="flex items-center gap-2 mb-6">
    <div class="relative w-72">
        <input type="text" 
               name="buscar" 
               value="{{ $buscar }}" 
               placeholder="Buscar producto por nombre..." 
               class="w-full border border-gray-300 rounded-lg pl-4 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm text-gray-700 shadow-sm">
    </div>
    
    <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white font-medium text-sm px-5 py-2 rounded-lg shadow transition duration-150">
        Buscar
    </button>

    @if($buscar)
        <a href="{{ url('/producto') }}" class="text-sm text-blue-600 hover:text-blue-800 hover:underline ml-2 transition">
            Limpiar filtro
        </a>
    @endif
</form>

       

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-800 text-white text-left text-sm uppercase font-semibold">
                        <th class="py-3 px-4 border-b">Codigo</th>
                        <th class="py-3 px-4 border-b">Nombre</th>
                        <th class="py-3 px-4 border-b">Precio</th>
                        <th class="py-3 px-4 border-b">Stock</th>
                        <th class="py-3 px-4 border-b">Categoría</th>
                        <th class="py-3 px-4 border-b text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                    @forelse($productos as $prod)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-4 font-bold">{{ $prod->id }}</td>
                            <td class="py-3 px-4">{{ $prod->nombre }}</td>
                            <td class="py-3 px-4 text-green-600 font-semibold">${{ number_format($prod->precio, 2) }}</td>
                            <td class="py-3 px-4">{{ $prod->stock }}</td>
                            <td class="py-3 px-4">
                                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-xs font-medium">
                                    {{ $prod->categoria ? $prod->categoria->nombre : 'Sin categoría' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center flex justify-center gap-2">
                                <a href="{{ url('/producto/show/'.$prod->id) }}" class="bg-cyan-500 hover:bg-cyan-600 text-white text-xs font-medium py-1 px-3 rounded transition">Ver Detalle</a>
                                <a href="{{ url('/producto/edit/'.$prod->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white text-xs font-medium py-1 px-3 rounded transition">Modificar</a>
                                <a href="{{ url('/producto/deleteconfirm/'.$prod->id) }}" class="bg-red-500 hover:bg-red-600 text-white text-xs font-medium py-1 px-3 rounded transition">Eliminar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">No se encontraron productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>