<div class="form-group">

	{!! Form::label('nome', 'Nome:') !!}
	{!! Form::text('nome', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

	{!! Form::label('email', 'Email:') !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
	
</div>

<div class="form-group">

	{!! Form::label('telefone', 'Telefone:') !!}
	{!! Form::text('telefone', null, ['class' => 'form-control', 'maxlength' => '15', 'onkeyup' => 'phoneMask(this, event)', 'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 15']) !!}
	
</div>

<div class="form-group">

	{!! Form::submit('Salvar', ['class' => 'btn btn-success form-control']) !!}

</div>

<div class="form-group">

	<a href="{{ url()->previous() }}" class="btn btn-danger form-control" role="button">Cancelar</a>

</div>

<script type="text/javascript">
	function phoneMask(element, event) {
		var key = event.keyCode || event.charCode;

		if(key != 8 && key != 46) {
			var phone = element.value;
			phone = phone.replace(/\D*/g, "");

			//element.value = phone.replace(/^(\d{2})(\d{4,5})(\d{4})$/, "($1) $2-$3");

			switch(phone.length) {
				case 2:
					element.value = phone.replace(/^(\d{2})$/, "($1) ");
					break;
				case 6:
					element.value = phone.replace(/^(\d{2})(\d{4})$/, "($1) $2-");
					break;
				case 10:
					element.value = phone.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
					break;
				case 11:
					element.value = phone.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
					break;
			}
		}
	}
</script>