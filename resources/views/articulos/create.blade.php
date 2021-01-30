@extends ('layouts.admin')
@section ('contenido')

    <!-- ----------------------------------------------  CONTENIDO DE CADA MODULO ---------------------------------------->

    <script>
      function soloLetras(e)
        {
           key = e.keyCode || e.which;
           tecla = String.fromCharCode(key).toLowerCase();
           letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
           especiales = "8-37-39-46";

           tecla_especial = false
           for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }
    </script>

    <!-- ----------------------------------------------  FIN DE LA VALIDACION  ---------------------------------------- -->

	<div class="row">
		<div class="col-xs-12">
			<h3 class="text-center"><strong>Nuevo Articulo</strong></h3><br>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::open(array('url'=>'articulos','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="articulo">Nombre del articulo</label>
            	<input type="text" name="articulo" value="{{old('articulo')}}" onkeypress="return soloLetras(event)"  class="form-control" placeholder="Nombre del articulo">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="">Fabricas</label>
						<select name="id_fabrica" id="" class="form-control">
						<option value="">-- SELECCIONES LA FABRICA --</option>
						@foreach ($fabricas as $fab)
						<option value="{{$fab->id_fabrica}}">{{$fab->nombre}}</option>
						@endforeach
						</select>
					</div>	
				</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="existencia">Existencias</label>
            	<input type="number" name="existencia" value="{{old('existencia')}}" class="form-control" placeholder="Nombre de existencias">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for=descripcion>Descripcion</label>
            	<input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion del articulo">
            </div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
            	<a class="btn btn-danger" href="{{ url('/articulos') }}" >Cancelar</a>
            </div>
		</div>

	</div>
			{!!Form::close()!!}		
@endsection