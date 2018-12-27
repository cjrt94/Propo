@extends('layouts.app')


@section('title',"Nuevo cliente")


@section('content')


    <newclient  :departments="{{ json_encode($departments) }}" route="{{ route('storeClient') }}">


    </newclient>



@endsection
