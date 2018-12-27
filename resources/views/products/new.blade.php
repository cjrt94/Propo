@extends('layouts.app')


@section('title',"Nuevo producto")


@section('content')


<section id="content">
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h2>Productos
                    <small>Agregar producto.
                    </small>
                </h2>
            </div>

            <div class="card-body card-padding">

                <form action="{{route('storeProduct')}}" method="POST">

                    @method('POST')
                    @csrf

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="form-group">
                                <div class="fg-line">
                                        <textarea class="form-control" rows="5"
                                                  placeholder="Descripción" name="description"></textarea>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="row">

                        <div class="col-lg-3">

                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" class="form-control input-sm" placeholder="SKU" name="SKU">
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-3">

                            <div class="form-group">
                                <div class="fg-line">
                                    <div class="select">
                                        <select class="form-control" name="category">
                                            <option>Seleccionar Cateogría</option>

                                            @foreach($categories as $category  )
                                                <option>{{$category->description}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="text-right">

                        <button type="submit" class="btn btn-danger">Crear</button>

                    </div>

                </form>


            </div>

        </div>

    </div>

</section>

@endsection
