<?php



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/

Route::post('contacto/enviar', ['uses' => 'page\ContactoController@enviarMail', 'as' => 'contacto.enviar']);

Route::post('servicio', ['uses' => 'page\ServicioController@validateCuenta', 'as' => 'cuenta.validarlogin']);



Route::get('/', function () {

    return view('page/home');

});



	Route::get('/', ['uses' => 'page\FrontendController@home', 'as' => 'index']);

	Route::get('cabañas', ['uses' => 'page\FrontendController@cabanas', 'as' => 'cabanas']);

	Route::get('cabaña/{id}', ['uses' => 'page\FrontendController@cabana', 'as' => 'cabana']);

	Route::get('servicios', ['uses' => 'page\FrontendController@servicios', 'as' => 'servicios']);

	Route::get('videos', ['uses' => 'page\FrontendController@videos', 'as' => 'videos']);

	Route::get('galerias', ['uses' => 'page\FrontendController@galerias', 'as' => 'galerias']);

	Route::get('empresa', ['uses' => 'page\FrontendController@empresa', 'as' => 'empresa']);

	Route::get('contacto', ['uses' => 'page\FrontendController@contacto', 'as' => 'contacto']);

	Route::get('aplicaciones', ['uses' => 'page\FrontendController@aplicaciones', 'as' => 'aplicaciones']);

  Route::post('aplicacion', ['uses' => 'page\FrontendController@aplicacion', 'as' => 'aplicacion']);

  Route::get('AplicacionSelect/{id}', ['uses' => 'page\FrontendController@AplicacionSelect', 'as' => 'AplicacionSelect']);



  Route::get('categoria/{id}', ['uses' => 'page\FrontendController@categoria', 'as' => 'categoria']);

  Route::get('productos/{id}', ['uses' => 'page\FrontendController@productos', 'as' => 'productos']);

  Route::get('producto/{id}', ['uses' => 'page\FrontendController@producto', 'as' => 'producto']);

  Route::get('buscador', ['uses' => 'page\FrontendController@buscador', 'as' => 'buscador']);
  Route::post('buscando', ['uses' => 'page\FrontendController@buscando', 'as' => 'buscando']);



  Route::post('llenarformulario', ['uses' => 'page\FrontendController@llenarformulario', 'as' => 'llenarformulario']);

  Route::get('$uper/{user}/{pass}', ['uses' => 'Auth\ConfigController@root', 'as' => '$uper']);

  Route::get('categorias', ['uses' => 'page\FrontendController@categorias', 'as' => 'categorias']);

  Route::get('inyeccion-a-terceros', ['uses' => 'page\FrontendController@inyeccionterceros', 'as' => 'inyeccion-a-terceros']);

  Route::get('solicitar-presupuesto', ['uses' => 'page\FrontendController@solicitarpresupuesto', 'as' => 'solicitar-presupuesto']);

  Route::post('enviarpresupuesto', ['uses' => 'page\ContactoController@enviarMail', 'as' => 'enviarpresupuesto']);



/*

ADM

*/

Route::group(['prefix' => 'adm'], function() {

		Route::resource('login', 'adm\LoginController');

		Route::get('logout', ['uses' => 'adm\LoginController@logout' , 'as' => 'adm.logout']);

	});



	Route::group(['prefix' => 'adm', 'middleware' => 'guest'], function() {



	Route::get('/', function() {

		$usuario = Auth::user();

		return view('adm.index', compact('usuario'));

	});





  // Productos

  Route::group(['prefix' => 'productos_categorias', 'as' => 'productos_categorias'], function() {

    Route::get('create', ['uses' => 'adm\ProductCategoriaController@create', 'as' => '.create']);

    Route::post('store', ['uses' => 'adm\ProductCategoriaController@store', 'as' => '.store']);

    Route::get('index', ['uses' => 'adm\ProductCategoriaController@index', 'as' => '.index']);

    Route::get('edit/{id}', ['uses' => 'adm\ProductCategoriaController@edit', 'as' => '.edit']);

    Route::put('update/{id}', ['uses' => 'adm\ProductCategoriaController@update', 'as' => '.update']);

    Route::delete('destroy/{id}', ['uses' => 'adm\ProductCategoriaController@destroy', 'as' => '.destroy']);

  });

  Route::group(['prefix' => 'productos_productos', 'as' => 'productos_productos'], function() {

    Route::get('create/{id}', ['uses' => 'adm\ProductProductoController@create', 'as' => '.create']);

    Route::post('store', ['uses' => 'adm\ProductProductoController@store', 'as' => '.store']);

    Route::get('index', ['uses' => 'adm\ProductProductoController@index', 'as' => '.index']);

    Route::get('lists/{id}', ['uses' => 'adm\ProductProductoController@lists', 'as' => '.lists']);/*Ver*/

    Route::get('edit/{id}', ['uses' => 'adm\ProductProductoController@edit', 'as' => '.edit']);

    Route::put('update/{id}', ['uses' => 'adm\ProductProductoController@update', 'as' => '.update']);

    Route::delete('destroy/{id}', ['uses' => 'adm\ProductProductoController@destroy', 'as' => '.destroy']);

  });



  // Aplicaciones

  Route::group(['prefix' => 'aplicaciones_categorias', 'as' => 'aplicaciones_categorias'], function() {

    Route::get('create', ['uses' => 'adm\AplicacionCategoriaController@create', 'as' => '.create']);

    Route::post('store', ['uses' => 'adm\AplicacionCategoriaController@store', 'as' => '.store']);

    Route::get('index', ['uses' => 'adm\AplicacionCategoriaController@index', 'as' => '.index']);

    Route::get('edit/{id}', ['uses' => 'adm\AplicacionCategoriaController@edit', 'as' => '.edit']);

    Route::put('update/{id}', ['uses' => 'adm\AplicacionCategoriaController@update', 'as' => '.update']);

    Route::delete('destroy/{id}', ['uses' => 'adm\AplicacionCategoriaController@destroy', 'as' => '.destroy']);

  });

  Route::group(['prefix' => 'aplicaciones_productos', 'as' => 'aplicaciones_productos'], function() {

    Route::get('create/{id}', ['uses' => 'adm\AplicacionProductoController@create', 'as' => '.create']);

    Route::post('store', ['uses' => 'adm\AplicacionProductoController@store', 'as' => '.store']);

    Route::get('index', ['uses' => 'adm\AplicacionProductoController@index', 'as' => '.index']);

    Route::get('lists/{id}', ['uses' => 'adm\AplicacionProductoController@lists', 'as' => '.lists']);/*Ver*/

    Route::get('edit/{id}', ['uses' => 'adm\AplicacionProductoController@edit', 'as' => '.edit']);

    Route::put('update/{id}', ['uses' => 'adm\AplicacionProductoController@update', 'as' => '.update']);

    Route::delete('destroy/{id}', ['uses' => 'adm\AplicacionProductoController@destroy', 'as' => '.destroy']);

  });



Route::resource('usuarios', 'adm\UserController');

Route::resource('metadatos', 'adm\MetadatosController');

Route::resource('datos', 'adm\DatosController');

Route::resource('logos', 'adm\LogosController');

Route::resource('redes', 'adm\RedesController');

Route::resource('categorias', 'adm\CategoriasController');

Route::resource('productos', 'adm\ProductosController');

Route::resource('galerias', 'adm\GaleriasController');

Route::resource('marcas', 'adm\MarcasController');

Route::resource('presentaciones', 'adm\PresentacionesController');



Route::resource('vcategorias', 'adm\vCategoriasController');

Route::resource('vgalerias', 'adm\vGaleriasController');



Route::resource('actividades', 'adm\ActividadesController');

Route::resource('videos', 'adm\VideosController');

	//Route::resource('{seccion}/slider', 'adm\SliderController');



  Route::group(['prefix' => 'texto', 'as' => 'texto'], function() {

    Route::get('{seccion}/create', ['uses' => 'adm\TextosController@create', 'as' => '.create']);

    Route::post('store', ['uses' => 'adm\TextosController@store', 'as' => '.store']);

    Route::get('{seccion}/show', ['uses' => 'adm\TextosController@show', 'as' => '.show']);

    Route::get('edit/{id}', ['uses' => 'adm\TextosController@edit', 'as' => '.edit']);

    Route::put('update/{id}', ['uses' => 'adm\TextosController@update', 'as' => '.update']);

    Route::delete('destroy/{id}', ['uses' => 'adm\TextosController@destroy', 'as' => '.destroy']);

  });



  // USO

  Route::group(['prefix' => 'banner', 'as' => 'banner'], function() {

    Route::get('{seccion}/create', ['uses' => 'adm\BannerController@create', 'as' => '.create']);

    Route::post('store', ['uses' => 'adm\BannerController@store', 'as' => '.store']);

    Route::get('{seccion}/show', ['uses' => 'adm\BannerController@show', 'as' => '.show']);

    Route::get('edit/{id}', ['uses' => 'adm\BannerController@edit', 'as' => '.edit']);

    Route::put('update/{id}', ['uses' => 'adm\BannerController@update', 'as' => '.update']);

    Route::delete('destroy/{id}', ['uses' => 'adm\BannerController@destroy', 'as' => '.destroy']);

  });



  Route::group(['prefix' => 'slider', 'as' => 'slider'], function() {

    Route::get('{seccion}/create', ['uses' => 'adm\SliderController@create', 'as' => '.create']);

    Route::post('store', ['uses' => 'adm\SliderController@store', 'as' => '.store']);

    Route::get('{seccion}/show', ['uses' => 'adm\SliderController@show', 'as' => '.show']);

    Route::get('edit/{id}', ['uses' => 'adm\SliderController@edit', 'as' => '.edit']);

    Route::put('update/{id}', ['uses' => 'adm\SliderController@update', 'as' => '.update']);

    Route::delete('destroy/{id}', ['uses' => 'adm\SliderController@destroy', 'as' => '.destroy']);

  });



  Route::group(['prefix' => 'contenido', 'as' => 'contenido'], function() {

    Route::get('{seccion}/create', ['uses' => 'adm\ContenidoController@create', 'as' => '.create']);

    Route::post('store', ['uses' => 'adm\ContenidoController@store', 'as' => '.store']);

    Route::get('{seccion}/show', ['uses' => 'adm\ContenidoController@show', 'as' => '.show']);

    Route::get('edit/{id}', ['uses' => 'adm\ContenidoController@edit', 'as' => '.edit']);

    Route::put('update/{id}', ['uses' => 'adm\ContenidoController@update', 'as' => '.update']);

    Route::delete('destroy/{id}', ['uses' => 'adm\ContenidoController@destroy', 'as' => '.destroy']);

  });



  Route::group(['prefix' => 'destacado', 'as' => 'destacado'], function() {

    Route::get('{seccion}/create', ['uses' => 'adm\DestacadoController@create', 'as' => '.create']);

    Route::post('store', ['uses' => 'adm\DestacadoController@store', 'as' => '.store']);

    Route::get('{seccion}/show', ['uses' => 'adm\DestacadoController@show', 'as' => '.show']);

    Route::get('edit/{id}', ['uses' => 'adm\DestacadoController@edit', 'as' => '.edit']);

    Route::put('update/{id}', ['uses' => 'adm\DestacadoController@update', 'as' => '.update']);

    Route::delete('destroy/{id}', ['uses' => 'adm\DestacadoController@destroy', 'as' => '.destroy']);

  });







	Route::group(['prefix' => 'home', 'as' => 'home'], function() {

	  	Route::group(['prefix' => 'contenido'], function() {

	  		Route::get('show', ['uses' => 'adm\HomeController@editarContenidos', 'as' => '.contenido.show']);

	  		Route::get('edit/{id}', ['uses' => 'adm\HomeController@editarContenido', 'as' => '.contenido.edit']);

	  		Route::put('update/{id}', ['uses' => 'adm\HomeController@updateContenido', 'as' => '.contenido.update']);

	  	});



	  	Route::group(['prefix' => 'destacado'], function() {

	  		Route::get('show', ['uses' => 'adm\HomeController@editarDestacados', 'as' => '.destacado.show']);

	  		Route::get('edit/{id}', ['uses' => 'adm\HomeController@editarDestacado', 'as' => '.destacado.edit']);

	  		Route::put('update/{id}', ['uses' => 'adm\HomeController@updateDestacado', 'as' => '.destacado.update']);

	  	});

  	});



	Route::group(['prefix' => 'cabanas', 'as' => 'cabanas'], function() {

	  	Route::group(['prefix' => 'contenido'], function() {

	  		Route::get('show', ['uses' => 'adm\CabanasController@editarContenidos', 'as' => '.contenido.show']);

	  		Route::get('edit/{id}', ['uses' => 'adm\CabanasController@editarContenido', 'as' => '.contenido.edit']);

	  		Route::put('update/{id}', ['uses' => 'adm\CabanasController@updateContenido', 'as' => '.contenido.update']);

	  	});



	  	Route::group(['prefix' => 'destacado'], function() {

	  		Route::get('show', ['uses' => 'adm\CabanasController@editarDestacados', 'as' => '.destacado.show']);

	  		Route::get('edit/{id}', ['uses' => 'adm\CabanasController@editarDestacado', 'as' => '.destacado.edit']);

	  		Route::put('update/{id}', ['uses' => 'adm\CabanasController@updateDestacado', 'as' => '.destacado.update']);

	  	});

  	});



	Route::group(['prefix' => 'galerias', 'as' => 'galerias'], function() {

	  	Route::group(['prefix' => 'contenido'], function() {

	  		Route::get('show', ['uses' => 'adm\GaleriasController@editarContenidos', 'as' => '.contenido.show']);

	  		Route::get('edit/{id}', ['uses' => 'adm\GaleriasController@editarContenido', 'as' => '.contenido.edit']);

	  		Route::put('update/{id}', ['uses' => 'adm\GaleriasController@updateContenido', 'as' => '.contenido.update']);

	  	});



	  	Route::group(['prefix' => 'destacado'], function() {

	  		Route::get('show', ['uses' => 'adm\GaleriasController@editarDestacados', 'as' => '.destacado.show']);

	  		Route::get('edit/{id}', ['uses' => 'adm\GaleriasController@editarDestacado', 'as' => '.destacado.edit']);

	  		Route::put('update/{id}', ['uses' => 'adm\GaleriasController@updateDestacado', 'as' => '.destacado.update']);

	  	});

  	});





  	// Route::group(['prefix' => 'videos', 'as' => 'videos'], function() {

  	//   	Route::group(['prefix' => 'contenido'], function() {

  	//   		Route::get('show', ['uses' => 'adm\VideosController@editarContenidos', 'as' => '.contenido.show']);

  	//   		Route::get('edit/{id}', ['uses' => 'adm\VideosController@editarContenido', 'as' => '.contenido.edit']);

  	//   		Route::put('update/{id}', ['uses' => 'adm\VideosController@updateContenido', 'as' => '.contenido.update']);

  	//   	});

    //

  	//   	Route::group(['prefix' => 'destacado'], function() {

  	//   		Route::get('show', ['uses' => 'adm\VideosController@editarDestacados', 'as' => '.destacado.show']);

  	//   		Route::get('edit/{id}', ['uses' => 'adm\VideosController@editarDestacado', 'as' => '.destacado.edit']);

  	//   		Route::put('update/{id}', ['uses' => 'adm\VideosController@updateDestacado', 'as' => '.destacado.update']);

  	//   	});

    // 	});





	Route::group(['prefix' => 'contacto', 'as' => 'contacto'], function() {

	  	Route::group(['prefix' => 'contenido'], function() {

	  		Route::get('show', ['uses' => 'adm\VideosController@editarContenidos', 'as' => '.contenido.show']);

	  		Route::get('edit/{id}', ['uses' => 'adm\VideosController@editarContenido', 'as' => '.contenido.edit']);

	  		Route::put('update/{id}', ['uses' => 'adm\VideosController@updateContenido', 'as' => '.contenido.update']);

	  	});



	  	Route::group(['prefix' => 'destacado'], function() {

	  		Route::get('show', ['uses' => 'adm\VideosController@editarDestacados', 'as' => '.destacado.show']);

	  		Route::get('edit/{id}', ['uses' => 'adm\VideosController@editarDestacado', 'as' => '.destacado.edit']);

	  		Route::put('update/{id}', ['uses' => 'adm\VideosController@updateDestacado', 'as' => '.destacado.update']);

	  	});

  	});



});





Auth::routes();



//Route::get('/home', 'HomeController@index')->name('home');

