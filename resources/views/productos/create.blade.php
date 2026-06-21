<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-md overflow-hidden">
        
        <div class="bg-blue-600 p-4 text-white">
            <h4 class="text-xl font-bold">Registrar Nuevo Producto</h4>
        </div>
        
        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/producto/store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nombre del Producto</label>
                    <input type="text" name="nombre" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('nombre') }}">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Descripción</label>
                    <textarea name="descripcion" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3">{{ old('descripcion') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Precio</label>
                        <input type="number" step="0.01" name="precio" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('precio') }}">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Stock</label>
                        <input type="number" name="stock" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('stock') }}">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Categoría</label>
                    <select name="categoria_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="">-- Seleccione una Categoría --</option>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="{{ url('/producto') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded transition">Cancelar</a>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded shadow transition">Guardar Producto</button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>