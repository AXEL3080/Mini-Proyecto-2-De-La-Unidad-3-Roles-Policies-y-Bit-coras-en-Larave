<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <!-- Tailwind por CDN solo para prototipo; en el proyecto real conviene Vite + @vite -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Registrar Nuevo Producto</h1>

        {{-- Aviso corto: el detalle de cada error se muestra junto a su campo (sin duplicar mensajes) --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded" role="alert">
                <p class="font-bold">Revisa los campos marcados en rojo.</p>
            </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST" novalidate
              onsubmit="this.querySelector('button[type=submit]').disabled = true;">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                       required maxlength="255"
                       class="w-full border p-2 rounded focus:outline-none focus:border-blue-500 @error('nombre') border-red-500 @else border-gray-300 @enderror">
                @error('nombre')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4"
                          class="w-full border p-2 rounded focus:outline-none focus:border-blue-500 @error('descripcion') border-red-500 @else border-gray-300 @enderror">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <label for="precio" class="block text-gray-700 font-semibold mb-2">Precio:</label>
                <input type="number" id="precio" name="precio" value="{{ old('precio') }}"
                       step="0.01" min="0" required inputmode="decimal"
                       class="w-full border p-2 rounded focus:outline-none focus:border-blue-500 @error('precio') border-red-500 @else border-gray-300 @enderror">
                @error('precio')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Existencia -->
            <div class="mb-4">
                <label for="existencia" class="block text-gray-700 font-semibold mb-2">Existencia:</label>
                <input type="number" id="existencia" name="existencia" value="{{ old('existencia') }}"
                       step="1" min="0" required inputmode="numeric"
                       class="w-full border p-2 rounded focus:outline-none focus:border-blue-500 @error('existencia') border-red-500 @else border-gray-300 @enderror">
                @error('existencia')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Categoría -->
            <div class="mb-4">
                <label for="categorias" class="block text-gray-700 font-semibold mb-2">Categoría:</label>
                <select id="categorias" name="categorias[]" required
                        class="w-full border p-2 rounded focus:outline-none focus:border-blue-500 @if($errors->has('categorias') || $errors->has('categorias.*')) border-red-500 @else border-gray-300 @endif">
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            @selected(in_array($categoria->id, old('categorias', [])))>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                {{-- Los errores de arreglos llegan como "categorias.0", por eso se revisan ambos --}}
                @error('categorias')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
                @error('categorias.*')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center mt-6">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition disabled:opacity-50">
                    Guardar Producto
                </button>
                <a href="{{ route('productos.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
