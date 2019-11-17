<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Data;
use App\Logo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
        $header     = Logo::where('type','header')->first();
        $footer     = Logo::where('type','footer')->first();
        $favicon    = Logo::where('type','favicon')->first();

        $correo     = Data::where('type','correo')->first();
        $telefono   = Data::where('type','telefono')->first();
        $telefono2  = Data::where('type','telefono2')->first();
        $direccion  = Data::where('type','direccion')->first();
        $whatsapp   = Data::where('type','whatsapp')->first();
        $presupuesto1= Data::where('type','mensaje-presupuesto')->first();

        $mapa       = Data::where('type','mapa')->first();

        view()->share([
            'header'    => $header,
            'footer'    => $footer,
            'favicon'   => $favicon,

            'presupuesto1'   => $presupuesto1,

            'mapa'      => $mapa,
            'correo'    => $correo,
            'telefono'  => $telefono,
            'telefono2' => $telefono2,
            'direccion' => $direccion,
            'whatsapp'  => $whatsapp,
            ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
