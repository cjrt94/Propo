@extends('layouts.app')

@section('title','Cotizaciones')

@section('content')


    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2>Opciones</h2>

                <ul class="actions">

                    <li class="dropdown">
                        <a href="" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">

                            <li>
                                <a href="{{route('newPropo')}}" >Nueva</a>
                            </li>


                            <li>
                                <a href="">Refrescar</a>
                            </li>


                        </ul>
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Cotizaciones
                        <small>Listado de cotizaciones.
                        </small>
                    </h2>
                </div>

                <div class="table-responsive">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                        <tr>

                            <th  data-column-id="" scope="col">#</th>
                            <th  data-column-id="" scope="col">Razón social/Nombre</th>
                            <th  data-column-id="" scope="col">Documento</th>
                            <th  data-column-id="" scope="col">Moneda</th>
                            <th  data-column-id="" scope="col">Total</th>
                            <th  data-column-id="" scope="col"> Acciones </th>


                        </tr>
                        </thead>
                        <tbody>

                        @foreach($propos as $propo)
                            <tr>
                                <td scope="row">{{$propo->id}}</td>
                                <td >{{$propo->client->description}}</td>
                                <td >{{$propo->client->document}}</td>
                                <td >{{$propo->currency}}</td>
                                <td >{{$propo->total}}</td>
                                <td>
                                    <button class="btn btn-icon command-edit waves-effect waves-circle"
                                            onclick="window.location.href=''" ><span class="zmdi zmdi-edit"></span></button>

                                    <button class="btn btn-icon command-edit waves-effect waves-circle"
                                            onclick="window.location.href='{{route('viewPropo', ['id' =>$propo->id])}}'" ><span class="zmdi zmdi-eye"></span></button>

                                </td>


                            </tr>
                        @endforeach




                        </tbody>


                    </table>



                </div>
            </div>
        </div>
    </section>

@endsection
