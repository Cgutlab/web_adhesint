<div class="slider">
    <ul class="slides">
        @foreach($sliders as $slider)
        <li style="border-bottom: 0;">
            <img src="{{ asset('img/sliders/'.$slider->imagen) }}">
            <div class="caption" style="">
                <div class="center-align hide-on-med-and-down" style="padding-top:30px;">
                    <span class="lts blanco fw6 fs30 editorRico ff1">{!!$slider->titulo!!}</span>
                    <span class="lts gris6 fs18 editorRico ff2">{!!$slider->subtitulo!!}</span>
                </div>
                <div class="center-align hide-on-large-only">
                    <span class="lts blanco ff1">{!!$slider->titulo!!}</span>
                    <span class="lts gris6 ff2">{!!$slider->subtitulo!!}</span>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
