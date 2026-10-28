<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <!-- Tailwind CSS rápido para que se vea ordenado -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Registrar Nuevo Producto</h1>

        <!-- Bloque para mostrar errores de validación -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <p class="font-bold">¡Por favor corrige los siguientes errores!</p>
                <ul class="list-disc pl-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">
                @error('nombre')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Descripción:</label>
                <textarea name="descripcion" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Precio:</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">
                @error('precio')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Existencia -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Existencia:</label>
                <input type="number" name="existencia" value="{{ old('existencia') }}" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">
                @error('existencia')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Categorías Dinámicas -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Categoría:</label>
                <select name="categorias[]" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ (collect(old('categorias'))->contains($categoria->id)) ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categorias')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Guardar Producto</button>
                <a href="{{ route('productos.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>