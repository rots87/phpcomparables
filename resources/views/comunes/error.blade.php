@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" data-closable>
    <span><b>Existen los siguientes errores al procesar tu solicitud</b></span>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif
