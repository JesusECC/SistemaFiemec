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
   
   

     //Se crea las Rutas empelado
    Route::get('empleados',['as'=>'empleado','uses'=>'ControllerEmpleados@index']);
    Route::get('empleados/create',['as'=>'empleado-create','uses'=>'ControllerEmpleados@create']);
    Route::post('empleados/guardar',['as'=>'empleado-store','uses'=>'ControllerEmpleados@store']);
    Route::get('empleados/{idEmpleado}/edit',['as'=>'empleado-edit','uses'=>'ControllerEmpleados@edit']);
    Route::get('empleados/show/{idEmpleado}',['as'=>'empleado-show','uses'=>'ControllerEmpleados@show']);


    //Se crea las rutas para productos 
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

    //Se crea rutas bandejas
    Route::post('bandejas/guardar',['as' => 'bandejas-store','uses'=>'ControllerBandejas@store']);
    Route::get('bandejas',['as'=>'bandejas','uses'=>'ControllerBandejas@index']);
    Route::get('bandejas/create',['as'=>'bandejas-create','uses'=>'ControllerBandejas@create']);
    Route::get('proforma/bandejas/pdf/{idProforma}','ControllerBandejas@pdf');
    Route::get('proforma/bandejas/pdf2/{idProforma}','ControllerBandejas@pdf2');
    Route::get('bandejas/show/{id}',['as'=>'bandejas-show','uses'=>'ControllerBandejas@show']);
    Route::delete('bandejas/eliminar/{id}',['as'=>'bandejas-eliminar','uses'=>'ControllerBandejas@destroy']);
    Route::get('bandejas/editar/{id}',['as'=>'bandejas-edit','uses'=>'ControllerBandejas@edit']);
    Route::post('bandejas/editar/modificar',['as' => 'bandejas-update','uses'=>'ControllerBandejas@update']); 
    
    //Se crea rutas servicios
     Route::get('servicios',['as'=>'servicio','uses'=>'ControllerProformaServicio@index']);
    Route::get('servicios/create',['as'=>'servicio-create','uses'=>'ControllerProformaServicio@create']);
    Route::post('servicios/guardar',['as'=>'servicio-store','uses'=>'ControllerProformaServicio@store']);
    Route::get('servicios/show/{id}',['as'=>'servicio-show','uses'=>'ControllerProformaServicio@show']);
    Route::get('servicios/edit/{id}',['as'=>'servicios-edit','uses'=>'ControllerProformaServicio@edit']);
    Route::get('servicios/pdf/{idProforma}','ControllerProformaServicio@pdf');
    Route::get('servicios/pdf2/{idProforma}','ControllerProformaServicio@pdf2');
    Route::delete('servicios/eliminar/{id}',['as'=>'servicios-eliminar','uses'=>'ControllerProformaServicio@destroy']);

    //Se crea rutas cliente
    Route::get('cliente',['as'=>'clientes','uses'=>'ControllerClientes@index']);
    Route::get('cliente/create',['as'=>'clientes-create','uses'=>'ControllerClientes@create']);
    Route::post('cliente/',['as'=>'clientes-store','uses'=>'ControllerClientes@store']);
    Route::get('cliente/{idCliente}/edit',['as'=>'clientes-edit','uses'=>'ControllerClientes@edit']);
    Route::get('cliente/show/{idCliente}',['as'=>'clientes-show','uses'=>'ControllerClientes@show']);
    Route::get('tarea/create',['as'=>'tarea-create','uses'=>'ControllerTarea@create']);

    
    //se crea rutas para ajsutes
    Route::get('Ajustes',['as'=>'ajustes','uses'=>'ControllerAjustes@index']);
});   
Auth::routes();


