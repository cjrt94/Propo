<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Cotización</title>

    <link href="{{ asset('css/app_1.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app_2.min.css')}}" rel="stylesheet">

  </head>

  <body>

  <section id="">

    <div class="container invoice">



    <div class="card">
      <div class="card-header ch-alt text-center">
        <img class="i-logo" src="{{ asset('img/logo.png')}}" alt="">
      </div>

      <div class="card-body card-padding">
        <div class="row m-b-25">
        <div class="col-xs-6">
          <div class="text-right">
            <p class="c-gray">De</p>

            <h4>Anglidata Express EIRL</h4>

            <span class="text-muted">
                <address>
                 Cal. Perez Arabinar Nro. 134<br>
                Surquillo, Lima, Lima
                </address>

                Pedro Puerta <br/>
                20341031517<br/>
                ppuerta@anglidata.com
              </span>
          </div>
        </div>

        <div class="col-xs-6">
          <div class="i-to">
            <p class="c-gray">Para</p>

            <h4>{{$propo->client->description}}</h4>

            <span class="text-muted">
                <address>
                {{$propo->address->address}}<br>
                United Arab Emirates.
                </address>

                {{$propo->contact->name}} <br/>
                {{$propo->contact->phone}}<br/>
                {{$propo->contact->email}}
              </span>
          </div>
        </div>

        </div>

        <div class="clearfix"></div>

        <div class="row m-t-25 p-0 m-b-25">
        <div class="col-xs-3">
          <div class="bgm-amber brd-2 p-15">
            <div class="c-white m-b-5">Cotización#</div>
            <h2 class="m-0 c-white f-300">{{$propo->id}}</h2>
          </div>
        </div>

        <div class="col-xs-3">
          <div class="bgm-blue brd-2 p-15">
            <div class="c-white m-b-5">Fecha</div>
            <h2 class="m-0 c-white f-300">{{$propo->created_at->format('Y-m-d')}}</h2>
          </div>
        </div>

        <div class="col-xs-3">
          <div class="bgm-green brd-2 p-15">
            <div class="c-white m-b-5">Validez de oferta</div>
            <h2 class="m-0 c-white f-300">{{$propo->offer_validity}}</h2>
          </div>
        </div>

        <div class="col-xs-3">
          <div class="bgm-red brd-2 p-15">
            <div class="c-white m-b-5">Total</div>
            <h2 class="m-0 c-white f-300">{{number_format($propo->total, 2)}}</h2>
          </div>
        </div>
        </div>

        <div class="clearfix"></div>

        <table class="table i-table m-t-25 m-b-25">
        <thead class="text-uppercase">
        <th class="c-gray">Descripción</th>
        <th class="c-gray">Garantía</th>
        <th class="c-gray">PE</th>
        <th class="c-gray">PU</th>
        <th class="c-gray">Cantidad</th>
        <th class="highlight">TOTAL</th>
        </thead>

        <tbody>
        <thead>

        @foreach($propo->products()->get() as $product)
        <tr>
          <td width="50%">
            <h5 class="text-uppercase f-400">{{$product->sku}}</h5>
            <p class="text-muted" style="font-size:14px !important">{{$product->description}}</p>
          </td>
          <td  style="font-size:14px !important">{{$product->pivot->warranty}}</td>
          <td  style="font-size:14px !important">{{$product->pivot->term}}</td>
          <td  style="font-size:14px !important">@if($propo->currency==='Soles') S/ @else $ @endif {{number_format($product->pivot->price,2)}}</td>
          <td  style="font-size:14px !important">{{$product->pivot->quantity}}</td>
          <td  style="font-size:14px !important" class="text-right">@if($propo->currency==='Soles') S/ @else $ @endif {{number_format( $product->pivot->quantity * $product->pivot->price * 1.18 , 2 ) }}</td>


        </tr>

        @endforeach
        <tr>
          <td colspan="4"></td>
          <td class="highlight"> Subtotal</td>
          <td class="highlight text-right">@if($propo->currency==='Soles') S/ @else $ @endif{{number_format($propo->total/1.18,2)}}</td>
        </tr>

        <tr>
          <td colspan="4"></td>
          <td class="highlight"> IGV</td>
          <td class="highlight text-right">@if($propo->currency==='Soles') S/ @else $ @endif{{number_format($propo->total - round($propo->total/1.18,2) ,2 ) }}</td>
        </tr>

        <tr>
          <td colspan="4"></td>
          <td class="highlight"> Total</td>
          <td class="highlight text-right">@if($propo->currency==='Soles') S/ @else $ @endif{{number_format($propo->total,2)}}</td>
        </tr>


        </thead>
        </tbody>
        </table>

        <div class="clearfix"></div>

        <div class="p-25">

        <div class="row">

          <div class="col-lg-6">

            <h4 class="c-green f-400">CONDICIONES DE VENTA</h4>

            <ul class="c-gray" style="list-style: decimal">
             <li>Los precios son en {{$propo->currency}} e Incluye I.G.V.</li>
             <li>Forma de pago :	{{$propo->way_to_pay}}</li>
             <li>Validez de oferta :	{{$propo->offer_validity}}</li>
             <li>Lugar de entrega :	{{$propo->place_delivery}}</li>
            </ul>

            <p class="c-gray">

            <strong>Observaciónes :</strong>
            El Plazo de entrega se encuentra expresado en dias calendarios.
            La Garantía se encuentra expresada en meses.


            </p>

          </div>

          <div  class="col-lg-6">

            <h4 class="c-green f-400">NÚMEROS DE CUENTA</h4>


            <ul class="c-gray" style="list-style: decimal">
              <li>RNP :			B0112690</li>
              <li>CCI SOLES BCP :			00219400218617608497</li>
              <li>CCI DOLARES BCP			00219400217172017499</li>
              <li>Cuenta en SOLES BCP		194-2186176-0-84</li>
              <li>Cuenta en DÓLARES BCP :	194-2171720-1-74 </li>
            </ul>




          </div>

          <br/>

        </div>

        <div class="row m-t-25">

          <h4 class="c-green f-400">EMITIR SU ORDEN DE COMPRA A NOMBRE DE </h4>

            <ul class="c-gray" style="list-style: -o-repeating-linear-gradient">
            <li>Razón social :	ANGLIDATA EXPRESS S.R.L</li>
            <li>R.U.C :		20341031517</li>
            <li>Dirección :		JR. ANTENOR RIZO PATRON NRO. 134 LIMA - LIMA </li>
            </ul>



        </div>

        <div class="row m-t-30">

          <p  >

            Ala espera de su amable respuesta y agradeciendo anticipadamente su gentil respuesta, quedo de usted.



          </p>
        </div>

        </div>
      </div>

      <footer class="m-t-15 p-20">
        <ul class="list-inline text-center list-unstyled">
        <li class="m-l-5 m-r-5">
          <small>ppuerta@anglidata.com</small>
        </li>
        <li class="m-l-5 m-r-5">
          <small>(01) 241 2976 </small>
        </li>
        <li class="m-l-5 m-r-5">
          <small>anglidata.com</small>
        </li>
        </ul>
      </footer>
    </div>

    </div>

  </section>



  <!-- Javascript Libraries -->
  <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

  <script src="{{ asset('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script src="{{ asset('vendors/bower_components/Waves/dist/waves.min.js')}}"></script>
  <script src="{{ asset('vendors/bootstrap-growl/bootstrap-growl.min.js')}}"></script>
  <script src="{{ asset('vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>


  <script src="{{ asset('js/app.min.js')}}"></script>

  </body>
</html>
