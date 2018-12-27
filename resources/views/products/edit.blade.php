@extends('layouts.app')


@section('title',"Modificar producto")


@section('content')


    <section id="content">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h2>Productos
                        <small>Modificar producto.
                        </small>
                    </h2>
                </div>

                <div class="card-body card-padding">

                    <form action="{{route('updateProduct', $product->id) }}" method="POST">

                        @method('PUT')
                        @csrf

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group">
                                    <div class="fg-line">
                                        <textarea class="form-control" rows="5"
                                                  placeholder="Descripción" name="description" >{{$product->description}}</textarea>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="row">

                            <div class="col-lg-3">

                                <div class="form-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control input-sm" placeholder="SKU" name="sku" value="{{$product->sku}}">
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

                                                    <option @if($product->category===$category->description)selected="true" @endif>{{$category->description}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="text-right">

                            <button type="submit" class="btn btn-danger">Modificar</button>

                        </div>

                    </form>


                </div>

            </div>

        </div>

    </section>

@endsection
