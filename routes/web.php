<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas son
| las rutas  cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso!
|
*/


Route::middleware(['auth','admin'])->group(function () {

    Route::get('/', 'MainController@index');
    Route::get('fiemec',['as' => 'fiemec','uses'=> 'MainController@index']);
    Route::resource('proforma/catalogo','ControllerCatalogo');
    Route::resource('proforma/empleado','ControllerEmpleados');
    Route::resource('proforma/producto','ControllerProducto');
    Route::resource('proforma/cliente','ControllerClientes');
    Route::resource('proforma/representante','ControllerClienteRE');
    Route::resource('proforma/proveedor','ControllerProveedor');
    Route::resource('proforma/empresa','ControllerEmpresa');
    Route::resource('proforma/marca','ControllerMarca');
    Route::resource('proforma/config','ControllerConfiguracion');
    Route::resource('proforma/familia','ControllerFamilia');
    Route::resource('dashboard/dashboard-admin','ControllerDashboard');
    Route::resource('proforma/tarea','ControllerTarea');
    Route::resource('proforma/cargo','ControllerCargo');
    Route::resource('proforma/productobandejas','ControllerProductoBandeja');
   

    // Se crea las rutas para tableros
    Route::get('tableros',['as' => 'tablero','uses'=>'ControllerProformaTableros@index']);
    Route::get('tableros/create',['as' => 'tablero-create','uses'=>'ControllerProformaTableros@create']);
    Route::post('tableros/guardar',['as' => 'tablero-store','uses'=>'ControllerProformaTableros@store']);
    Route::get('tableros/buscartext',['as' => 'tablero-buscartext','uses'=>'ControllerProformaTableros@buscarProducto']);
    Route::get('tableros/edit/{id}',['as'=>'tablero-edit','uses'=>'ControllerProformaTableros@edit']);
    Route::post('tableros/edit/update',['as' => 'tablero-update','uses'=>'ControllerProformaTableros@update']);
    Route::delete('tableros/eliminar/{id}',['as'=>'tablero-eliminar','uses'=>'ControllerProformaTableros@destroy']);
    Route::get('tableros/show/{idProforma}',['as'=>'tablero-show','uses'=>'ControllerProformaTableros@show']);
    Route::get('proforma/tablero/pdf/{idProforma}',['as'=>'tablero-pdf','uses'=>'ControllerProformaTableros@pdf']);
    Route::get('proforma/tablero/pdf2/{idProforma}',['as'=>'tablero-pdf2','uses'=>'ControllerProformaTableros@pdf2']);
    Route::get('proforma/tablero/pdf3/{idProforma}',['as'=>'tablero-pdf3','uses'=>'ControllerProformaTableros@pdf3']);
    Route::get('proforma/tablero/pdf4/{idProforma}',['as'=>'tablero-pdf4','uses'=>'ControllerProformaTableros@pdf4']);


    Route::post('tableros/cli',['as'=>'clientes-representante','uses'=>'ControllerProformaTableros@representante']);

    Route::post('tableros/fam',['as'=>'marca-familia','uses'=>'ControllerProformaTableros@familia']);
    Route::post('tableros/prod',['as'=>'familia-producto','uses'=>'ControllerProformaTableros@producto']);
    Route::post('tableros/predes',['as'=>'preciodescuento-producto','uses'=>'ControllerProformaTableros@preciodescuento']);

    Route::post('tableros/edit/famT',['as'=>'marcaT-familiaT','uses'=>'ControllerProformaTableros@familia']);
    Route::post('tableros/edit/prodT',['as'=>'familiaT-productoT','uses'=>'ControllerProformaTableros@producto']);
    Route::post('tableros/edit/predesT',['as'=>'preciodescuentoT-productoT','uses'=>'ControllerProformaTableros@preciodescuento']);
    Route::post('tableros/edit/busET',['as'=>'busquedaproductotE-productotE','uses'=>'ControllerProformaTableros@busqueda']);
    Route::post('tableros/bus',['as'=>'busquedaproductot-productot','uses'=>'ControllerProformaTableros@busqueda']);

   
   

     //Se crea las Rutas empelado
    Route::get('empleados',['as'=>'empleado','uses'=>'ControllerEmpleados@index']);
    Route::get('empleados/create',['as'=>'empleado-create','uses'=>'ControllerEmpleados@create']);
    Route::post('empleados/guardar',['as'=>'empleado-store','uses'=>'ControllerEmpleados@store']);
    Route::get('empleados/{idEmpleado}/edit',['as'=>'empleado-edit','uses'=>'ControllerEmpleados@edit']);
    Route::get('empleados/show/{idEmpleado}',['as'=>'empleado-show','uses'=>'ControllerEmpleados@show']);


    //Se crea las rutas para producto 
    Route::get('productos',['as'=>'producto','uses'=>'ControllerProducto@index']);
    Route::get('productos/create',['as'=>'producto-create','uses'=>'ControllerProducto@create']);
    Route::post('productos/',['as'=>'producto-store','uses'=>'ControllerProducto@store']);
    Route::get('productos/{idProducto}/edit',['as'=>'producto-edit','uses'=>'ControllerProducto@edit']);



    //se crea las rutas para catalago 
    Route::get('catalogo',['as'=>'catalogo','uses'=>'ControllerCatalogo@index']);
    Route::get('catalogo/show/{idProducto}',['as'=>'catalogo-show','uses'=>'ControllerCatalogo@show']);

    //Se crea rutas para familias
    Route::get('familias',['as'=>'familia','uses'=>'ControllerFamilia@index']);
    Route::get('familias/create',['as'=>'familia-create','uses'=>'ControllerFamilia@create']);
    Route::post('familias/',['as'=>'familia-store','uses'=>'ControllerFamilia@store']);
    Route::get('familias/{idFamilia}/edit',['as'=>'familia-edit','uses'=>'ControllerFamilia@edit']);

    //Se crea rutas de proforma
    Route::post('proformas/guardar',['as' => 'proforma-store','uses'=>'ControllerProformaUnitaria@store']);
    Route::get('proformas',['as'=>'proforma','uses'=>'ControllerProformaUnitaria@index']);
    Route::get('proformas/create',['as'=>'proforma-create','uses'=>'ControllerProformaUnitaria@create']);
    Route::get('proformas/editar/{id}',['as'=>'proforma-edit','uses'=>'ControllerProformaUnitaria@edit']);
    Route::post('proformas/editar/modificar',['as' => 'proforma-update','uses'=>'ControllerProformaUnitaria@update']); 
    Route::get('proforma/proforma/pdf/{idProforma}','ControllerProformaUnitaria@pdf');
    Route::get('proforma/proforma/pdf2/{idProforma}','ControllerProformaUnitaria@pdf2');
    Route::get('proformas/show/{id}',['as'=>'proforma-show','uses'=>'ControllerProformaUnitaria@show']);
    Route::delete('proformas/eliminar/{id}',['as'=>'proforma-eliminar','uses'=>'ControllerProformaUnitaria@destroy']);

    Route::post('proformas/fam',['as'=>'marcaP-familiaP','uses'=>'ControllerProformaUnitaria@familia']);
    Route::post('proformas/prod',['as'=>'familiaP-productoP','uses'=>'ControllerProformaUnitaria@producto']);
    Route::post('proformas/predes',['as'=>'preciodescuentoP-productoP','uses'=>'ControllerProformaUnitaria@preciodescuento']);
    Route::post('proformas/bus',['as'=>'busquedaproducto-productoB','uses'=>'ControllerProformaUnitaria@busqueda']);

    Route::post('proformas/editar/famE',['as'=>'marcaE-familiaE','uses'=>'ControllerProformaUnitaria@familia']);
    Route::post('proformas/editar/prodE',['as'=>'familiaE-productoE','uses'=>'ControllerProformaUnitaria@producto']);
    Route::post('proformas/editar/predesE',['as'=>'preciodescuentoE-productoE','uses'=>'ControllerProformaUnitaria@preciodescuento']);
    Route::post('proformas/editar/busE',['as'=>'busquedaproductoE-productoE','uses'=>'ControllerProformaUnitaria@busqueda']);
/**************************************************************************************************************************************** */
    //Se crea rutas bandejas
    Route::post('bandejas/guardar',['as' => 'bandejas-store','uses'=>'ControllerBandejas@store']);
    Route::get('bandejas',['as'=>'bandejas','uses'=>'ControllerBandejas@index']);
    Route::get('bandejas/create',['as'=>'bandejas-create','uses'=>'ControllerBandejas@create']);
    Route::get('bandejas/show/{id}',['as'=>'bandejas-show','uses'=>'ControllerBandejas@show']);
    Route::delete('bandejas/eliminar/{id}',['as'=>'bandejas-eliminar','uses'=>'ControllerBandejas@destroy']);
    Route::get('bandejas/editar/{id}',['as'=>'bandejas-edit','uses'=>'ControllerBandejas@edit']);
    Route::post('bandejas/editar/modificar',['as' => 'bandejas-update','uses'=>'ControllerBandejas@update']); 
    //
    Route::post('bandejas/cli',['as'=>'clientes-representante','uses'=>'ControllerBandejas@representante']);
    
    Route::get('proforma/bandejas/pdf/{idProforma}',['as'=>'bandeja-pdf','uses'=>'ControllerBandejas@pdf']);
    Route::get('proforma/bandejas/pdf2/{idProforma}',['as'=>'bandeja-pdf2','uses'=>'ControllerBandejas@pdf2']);
    
    
    //prueba  Andy Ancajima
    Route::get('bandejas/prototipo',['as'=>'bandejas-prototipo','uses'=>'ControllerBandejas@pruebabandeja']);
    //****************************************************************************************************************************+ */





    //Se crea rutas servicios
    Route::get('servicios',['as'=>'servicio','uses'=>'ControllerProformaServicio@index']);
    Route::get('servicios/create',['as'=>'servicio-create','uses'=>'ControllerProformaServicio@create']);
    Route::post('servicios/guardar',['as'=>'servicio-store','uses'=>'ControllerProformaServicio@store']);
    Route::get('servicios/show/{id}',['as'=>'servicio-show','uses'=>'ControllerProformaServicio@show']);
    Route::get('servicios/edit/{id}',['as'=>'servicios-edit','uses'=>'ControllerProformaServicio@edit']);
    Route::post('servicios/edit/update',['as' => 'servicios-update','uses'=>'ControllerProformaServicio@update']);
    Route::get('servicios/pdf/{idProforma}','ControllerProformaServicio@pdf');
    Route::get('servicios/pdf2/{idProforma}','ControllerProformaServicio@pdf2');
    Route::delete('servicios/eliminar/{id}',['as'=>'servicios-eliminar','uses'=>'ControllerProformaServicio@destroy']);
    Route::post('servicios/cli',['as'=>'clientes-representante','uses'=>'ControllerProformaServicio@representante']);

    Route::get('tableros/edit/{id}',['as'=>'tablero-edit','uses'=>'ControllerProformaTableros@edit']);
    Route::post('tableros/edit/update',['as' => 'tablero-update','uses'=>'ControllerProformaTableros@update']);

    //Se crea rutas cliente
    Route::get('cliente',['as'=>'clientes','uses'=>'ControllerClientes@index']);
    Route::get('cliente/create',['as'=>'clientes-create','uses'=>'ControllerClientes@create']);
    Route::post('cliente/',['as'=>'clientes-store','uses'=>'ControllerClientes@store']);
    Route::get('cliente/{idCliente}/edit',['as'=>'clientes-edit','uses'=>'ControllerClientes@edit']);
    Route::get('cliente/show/{idCliente}',['as'=>'clientes-show','uses'=>'ControllerClientes@show']);
    Route::get('tarea/create',['as'=>'tarea-create','uses'=>'ControllerTarea@create']);
    Route::post('proformas/cli',['as'=>'clientes-representante','uses'=>'ControllerProformaUnitaria@representante']);

   //rutas de proforma bandejas
   Route::get('productobandejas',['as'=>'productobandejas','uses'=>'ControllerProductoBandeja@index']);
   Route::get('productobandejas/create',['as'=>'productobandejas-create','uses'=>'ControllerProductoBandeja@create']);
   Route::post('productobandejas/',['as'=>'productobandejas-store','uses'=>'ControllerProductoBandeja@store']);
   Route::get('productobandejas/{idProducto}/edit',['as'=>'productobandejas-edit','uses'=>'ControllerProductoBandeja@edit']);

    

//


   //ruta de inventario
   Route::get('inventario',['as'=>'inventarios','uses'=>'ControllerInventario@index']);
   //ruta entrada-create
   Route::get('entrada/create',['as'=>'entradas-create','uses'=>'ControllerInventario@createentrada']);
   Route::post('entrada/mar',['as'=>'marcaEn-familiaEn','uses'=>'ControllerInventario@marca']);
   Route::post('entrada/busEn',['as'=>'busqueda-entrada','uses'=>'ControllerInventario@busqueda']);
   Route::post('entrada/asig',['as'=>'asginar-preciostock','uses'=>'ControllerInventario@stockprecio']);
   Route::get('entrada/list',['as'=>'listar-entradas','uses'=>'ControllerInventario@listar']);
   Route::post('entrada/save',['as'=>'guardar-entrada','uses'=>'ControllerInventario@storeentrada']);
   Route::post('entrada/delete',['as'=>'eliminar-entrada','uses'=>'ControllerInventario@destroy']);

    //ruta salida-create
   Route::get('salida/create',['as'=>'salidas-create','uses'=>'ControllerInventario@createsalida']);
   Route::post('salida/mar',['as'=>'marcaEn-familiaEn','uses'=>'ControllerInventario@marca']);
   Route::post('salida/busEn',['as'=>'busqueda-salida','uses'=>'ControllerInventario@busqueda']);
   Route::post('salida/asig',['as'=>'asginar-preciostock','uses'=>'ControllerInventario@stockprecio']);
   Route::get('salida/list',['as'=>'listar-salidas','uses'=>'ControllerInventario@listarsalida']);
   Route::post('salida/save',['as'=>'guardar-salida','uses'=>'ControllerInventario@storesalida']);
   Route::post('salida/delete',['as'=>'eliminar-salida','uses'=>'ControllerInventario@destroysalida']);
     
    
    //se crea rutas para ajsutes
    Route::get('Ajustes',['as'=>'ajustes','uses'=>'ControllerAjustes@index']);
    
    Route::get('Prof',['as'=>'prof','uses'=>'ControllerAjustes@index2']);



});   


Auth::routes();


