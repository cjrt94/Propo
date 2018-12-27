@extends('layouts.app')


@section('title',"Nueva cotización")


@section('content')


    <newpropo  :products="{{ json_encode($products) }}" :clients="{{ json_encode($clients) }}"  route="{{ route('storePropo') }}">


    </newpropo>



@endsection
