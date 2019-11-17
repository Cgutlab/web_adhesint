<!DOCTYPE html>
<html lang="es">
<head>

@include('page.template.metas')
@include('page.template.links')

</head>
<body>

@include('page.template.header')
@include('page.template.slider')

<section class="contenido">
<div class="container" style="width: 100%;">
<div class="center-align" style=" margin-top: 35px; margin-bottom: 80px;">
  <div class="fs38 fc2">
    {!!$contenido->titulo!!}
  </div>
  <div class="fs22 fc6">
    {!!$contenido->subtitulo!!}
  </div>
</div>
</div>
</section>

<div class="container" style="width: 100%;">
  <iframe src="{{ $mapa->texto }}" width="100%" height="600" frameborder="0" allowfullscreen></iframe>
</div>

<section class="contenido">
<div class="container" style="width: 100%;">
<div class="center-align" style=" margin-top: 35px; margin-bottom: 80px;">
  <div class="fs18 fc7 fw5 editorRico container" style="width: 50%;">
    {!!$contenido->texto!!}
  </div>
</div>
</div>
</section>

@include('page.template.footer')

</body>
</html>

@include('page.template.scripts')
