<!DOCTYPE html>
<html lang="es">

<head>
    @include('page.template.metas')
    @include('page.template.links')

    <style>
      .select-wrapper input.select-dropdown{
        background-color: rgba(255,255,255,0.5);
        border-radius: 5px;
        border: 1px solid #AFB1B2;
        padding:0;
        color: #0058A8;
        font-weight: 500;
      }
      .dropdown-content li>a, .dropdown-content li>span{
        color: #595959;
      }
    </style>
</head>

<body>
    @include('page.template.header')

    <div class="slider" style="margin-bottom:-40px;">
        <ul class="slides">
            @foreach($sliders as $slider)
            <li style="border-bottom: 0;">
                <img src="{{ asset('img/sliders/'.$slider->imagen) }}">
            </li>
            @endforeach
        </ul>
    </div>

    {!!Form::open(['route'=>'aplicacion', 'method'=>'POST', 'files' => true])!!}
    <div class="container" style="width: 80%;">
        <div class="row" style="width:80%; position: absolute; z-index: 2; top: 30%;">
            <div class="col l5 s12">
                <div class="input-field col s12">
                    <select name="categoria" required id="categoria">
                      <option value="" disabled selected>&nbsp;&nbsp;Sectores</option>
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}" @if(isset($select)) @if($select == $categoria->id) selected @endif @endif>&nbsp;&nbsp;{{$categoria->titulo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col l5 s12">
              <div class="input-field col s12">
                  <select name="producto" id="producto">
                    <option value="" disabled selected>&nbsp;&nbsp;Aplicación</option>
                  </select>
              </div>
            </div>
            <div class="col l2 s12 center-align" style="margin-top: 18px;">
                <!-- <a class="boton" href="">BUSCAR</a> -->
                {!!Form::submit('BUSCAR', ['class' => 'fs14', 'style' => 'height: 42px; width: 130px; border: 0; color: white; background: #03A9F4; border-radius: 15px;'])!!}
            </div>
        </div>
    </div>
{!!Form::close()!!}

    @include('page.template.footer')

</body>

</html>
@include('page.template.scripts')
<script>
    const categoria = document.querySelector('#categoria')
    const producto = document.querySelector('#producto')

    categoria.addEventListener('change', function() {
        fetch('/adhesint/AplicacionSelect/' + this.value)
            .then( data => data.json())
            .then( json => {
                if (json.length > 0) {
                    producto.innerHTML = '<option value="" disabled selected>&nbsp;&nbsp;Aplicación</option>'
                    json.forEach( v => {
                        producto.innerHTML += `
                               <option value="${v.id}">${v.titulo}</option>
                    `
                    })
                    $('select').formSelect();
                }
            })
            .catch(err => console.error(err))
    })


</script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            selectYears: 200,
            min: new Date(2018, 11, 23),
            max: new Date(2080, 12, 31)
        });
    });


    $(document).ready(function() {
        $('select').formSelect();
    });
</script>
{{--
<script>
    const selector = document.querySelector('#select-id');
    const familySelector = document.querySelector('#familia-select');
    selector.value = selector[0]
    selector.addEventListener('change', function() {
        let submitBtn = document.querySelector('.waves-input-wrapper');
        if (selector.value) {
            return submitBtn.classList.remove('disabled')
        }
    })
    familySelector.addEventListener('change', function() {
        $.ajax({
            type: "POST",
            url: '{{ route('adm.colecciones.getFamilia') }}',
            data: {family_id: familySelector.value, _token: '{{csrf_token()}}'},
            success: function(data)
            {
                let model = $('#select-id');
                model.empty();
                model.append('<option value="" disabled selected>-- Selecciona una coleccion --</option>')
                $.each(data, function (index, element) {
                        model.append("<option value='" + element.id + "'>" + element.title + "</option>");
                    });
                $('select').formSelect();
            }
        });
        submitBtn.classList.add('disabled')
        if (selector.value) {
            return submitBtn.classList.remove('disabled')
        }
    })
</script>
--}}