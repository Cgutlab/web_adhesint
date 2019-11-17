<!DOCTYPE html>
<html lang="es">
<head>

@include('page.template.metas')
@include('page.template.links')

</head>
<body>

@include('page.template.header')
@include('page.template.slider')
@include('page.template.contenido')

<section class="videos">
  <div class="container"  style="margin-bottom: 35px; width: 100%;">
  <div class="row">
  @foreach($videos as $video)
  <div class="col l6 m6 s12 center-align" style="margin-bottom: 35px;">
    <iframe class="show-on-large hide-on-med-and-down" width="560" height="315" src="https://www.youtube.com/embed/{{$video->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <iframe class="hide-on-large-only show-on-medium-and-down" width="390" height="220" src="https://www.youtube.com/embed/{{$video->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  </div>
  @endforeach
  </div>

  </div>
</section>

@include('page.template.footer')

</body>
</html>

@include('page.template.scripts')
