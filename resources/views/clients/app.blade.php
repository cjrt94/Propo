@extends('layouts.app')

@section('title','Clientes')

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
                            <a href="{{route('newClient')}}" >Nuevo</a>
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
                <h2>Clientes
                    <small>Listado de clientes.
                    </small>
                </h2>
            </div>

            <div class="action-header clearfix">
                <div class="ah-label hidden-xs">Escribe aquí</div>

                <div class="ah-search">
                    <input type="text" placeholder="Filtra por razón social/nombre o documento..." class="ahs-input">

                    <i class="ahs-close" data-ma-action="action-header-close">&times;</i>
                </div>

                <ul class="actions">
                    <li>
                        <a href="" data-ma-action="action-header-open">
                            <i class="zmdi zmdi-search"></i>
                        </a>
                    </li>


                </ul>
            </div>


            <div class="table-responsive">
                <table id="data-table-basic" class="table table-striped">
                    <thead>
                        <tr>

                            <th  data-column-id="id" >#</th>
                            <th  data-column-id="description">Razón social/Nombre</th>
                            <th  data-column-id="document">Documento</th>
                            <th  data-column-id="type_document">Tipo de documento</th>
                            <th  data-column-id="type_document">Editar</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach($clients as $client)
                            <tr>
                                <td >{{$client->id}}</td>
                                <td >{{$client->description}}</td>
                                <td >{{$client->document}}</td>
                                <td >{{$client->type_document}}</td>
                                <td><button class="btn btn-icon command-edit waves-effect waves-circle"
                                            onclick="window.location.href='{{route('editClient',$client->id)}}'" ><span class="zmdi zmdi-edit"></span></button></td>


                            </tr>
                        @endforeach


                    </tbody>


                </table>


            </div>
        </div>
    </div>
</section>

@endsection
