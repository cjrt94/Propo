<div>

    <p>Hola {{$propo->contact->name}}, te saluda  {{auth()->user()->name}} de Angli Data Express EIRL</p>

    <p>Te comparto un link en donde podrás visualizar la cotización que me solicitaste:<br>
      {{base_url('/cotizaciones/'.$propo->url)}}
    </p>

    <p>
      Quedo pendiente a cualquier duda o consulta.
    </p>

</div>
