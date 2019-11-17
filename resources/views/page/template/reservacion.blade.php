

<div class="container center-align" style="margin:0 auto; padding: 15px 0; width: 82%; background: #D16243; border-radius: 0 0 10px 10px;">

<div class="fc1 fs25 fw6 lts">Reservá Online</div>

<div class="fc1 fs25 fw5 ">Mejor Precio Garantizado</div>

<div>

  <ul style="display:flex; justify-content: space-around;">

    {!!Form::open(['route'=>'llenarformulario', 'method'=>'POST'])!!}



    <li style="float: left; margin-bottom:5px;">

      <div class="input-field col s12 center-align" style="margin:0; float: left; padding: 0;">

        <i class="material-icons prefix fs14 fc3 bc2" style="top:0px; padding-top: 8px; right: 20px; ">event_note</i>

        {!!Form::text('desde', null, ['class' => 'datepicker', 'required', 'autocomplete' => 'off', 'style' => 'border-bottom:none; margin:0; background: white; color: black; font-weight: 400; padding-left: 5px;', 'placeholder' => 'Seleccionar'])!!}

      </div>

    </li>



    <li style="float: left; margin-bottom:5px;">

      <div class="input-field col s12" style="margin:0; float: left;">

        <i class="material-icons prefix fs14 fc3 bc2" style="top:0px; padding-top: 8px; right: 20px; ">event_note</i>

        {!!Form::text('hasta', null, ['class' => 'datepicker', 'required', 'autocomplete' => 'off', 'style' => 'border-bottom:none; margin:0; background: white; color: black; font-weight: 400; padding-left: 5px;', 'placeholder' => 'Seleccionar'])!!}

      </div>

    </li>



    <li style="float: left; margin-bottom:5px;">

      <div class="input-field" style="margin:0 15px; padding:0px; background: white; color: #8A8A8A;">

        <select name="cabanas" style="padding-left: 5px;">

          @foreach($cabanas as $cabana)
          <option value="{{$cabana->titulo}}">&nbsp;{{$cabana->titulo}}</option>
          @endforeach

        </select>

      </div>

    </li>



    <li style="float: left; margin-bottom:5px;">

      <div class="input-field" style="margin:0 15px; padding:0; background: white; color: #8A8A8A;">

        <select name="pasajeros" style="padding-left: 5px;">

          <option value="1">&nbsp;1 Persona</option>

          <option value="2">&nbsp;2 Personas</option>

          <option value="3">&nbsp;3 Personas</option>

          <option value="4">&nbsp;4 Personas</option>

          <option value="5">&nbsp;5 Personas</option>

          <option value="9">&nbsp;Más de 6 Personas</option>

        </select>

      </div>

    </li>



    <li style="float: left; margin-bottom:5px;">

      <div class="col s12 no-padding">

				{!!Form::submit('RESERVAR', ['class' => 'fs14', 'style' => 'height: 42px; width: 130px; margin: 0 15px; border: 1px solid white; color: white; background: #D16243; border-radius: 3px;'])!!}

			</div>

    </li>

    {!!Form::close()!!}

  </ul>

</div>



</div>

