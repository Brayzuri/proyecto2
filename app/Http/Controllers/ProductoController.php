<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria; //importamos los mdelos
use App\Models\Producto;//importamos los modelos

class ProductoController extends Controller
{
    /**
     * se lista todos los productos desde la base de datos;
     */
    public function index(Request $request)
    {
        //para buscar y cargar los datos en la vista principal
        // 1. Capturar lo que el usuario escribió en el input "buscar"
    $buscar = $request->get('buscar');
    // 2. Si hay texto, filtramos por nombre. Si no, traemos todos.
    if ($buscar) {
        $productos = Producto::with('categoria')
            ->where('nombre', 'LIKE', "%{$buscar}%")
            ->get();
    } else {
        $productos=Producto::all();
    }


        //
        
        $datos=[
            'productos'=>$productos,
            'buscar' => $buscar,
        ];
        return view('productos/index',$datos);
    }

    /**
     * //redirige a la vista(formulario)
     */

    
    public function create()
    {
        //
        // 1. Traer todas las categorías de la base de datos
    $categorias = Categoria::all();
    
    // 2. Meterlas en el arreglo de datos que va a la vista
    $datos = [
        'categorias' => $categorias
    ];
        return view('productos/create',$datos);
    }

    /**
     * guarda los datos del formulario(create)
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre'       => 'required|string|max:49',            // Corrección: max:49
        'descripcion'  => 'required|string|max:249',           // Corrección: max:249
        'precio'       => 'required|numeric|min:0',            // Corrección: numeric y que no sea negativo
        'stock'        => 'required|integer|between:0,255',    // ¡Esto está perfecto!
        'categoria_id' => 'required|exists:categorias,id',    // ¡Perfecto también!
    ]);

    Producto::create($request->all());
    echo "Producto registrado correctamente";
}

   

    /**
     * vamos a llevar todos los datos al formulario para despues actualizar los datos
     */
    public function edit($id)
{
    // 1. Buscar el producto por su ID
    $producto = Producto::find($id);

    // 2. Validar que exista el registro al estilo de tu docente
    if (!$producto) {
        echo "Producto no encontrado";
        return;
    }

    // 3. Obtener todas las categorías para el menú desplegable del formulario
    $categorias = Categoria::all();

    // 4. Empaquetar todo en el arreglo de datos
    $datos = [
        'producto' => $producto,
        'categorias' => $categorias
    ];

    // 5. Retornar la vista pasando los datos
    return view('productos/edit', $datos);
}

    /**
     * actualizar datos enviados del formulario a la base de datos
     */
    public function update(Request $request, $id)
{
    // 1. Validar los datos con las reglas corregidas para evitar fallos
    $request->validate([
        'nombre'       => 'required|string|max:49',
        'descripcion'  => 'required|string|max:249',
        'precio'       => 'required|numeric|min:0',
        'stock'        => 'required|integer|between:0,255',
        'categoria_id' => 'required|integer'
    ]);

    // 2. Buscar el producto en la base de datos
    $producto = Producto::find($id);

    // 3. Si no existe, mostrar el mensaje al estilo de tu docente
    if (!$producto) {
        echo "Producto no encontrado";
        return;
    }

    // 4. Actualizar los datos de forma masiva
    $producto->update($request->all());

    // 5. Mensaje de confirmación final
    echo "Producto actualizado correctamente";
}

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
    // Muestra la vista de confirmación de eliminación (Estilo de tu docente)
    public function deleteconfirm($id)
    {
        $producto = Producto::find($id);
        
        if (!$producto) {
            echo "Producto no encontrado";
            return;
        }
        
        $datos = [
            'producto' => $producto
        ];
        
        return view('productos/delete', $datos);
    }

    // Realiza la eliminación física en la base de datos (Estilo de tu docente)
    public function delete($id)
    {
        $producto = Producto::find($id);
        
        if (!$producto) {
            echo "Producto no encontrado";
            return;
        }
        
        $producto->delete();
        echo "Producto eliminado correctamente";
    }



     /**
     * vista del detalle
     */
    public function show($id)
{
    // 1. Buscamos el producto con su categoría asociada
    $producto = Producto::with('categoria')->find($id);

    // 2. Si no existe, lanzamos el mensaje clásico de tu docente
    if (!$producto) {
        echo "Producto no encontrado";
        return;
    }

    // 3. Pasamos el registro a los datos de la vista
    $datos = [
        'producto' => $producto
    ];

    return view('productos/show', $datos);
}
}
