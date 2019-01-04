@extends('layouts.app')


@section('title',"Editar cliente")


@section('content')


    <editclient
            :departments="{{ json_encode($departments) }}"
            route="{{ route('updateClient',$client->id) }}" :contactsold="{{json_encode($contacts)}}" :addressesold="{{json_encode($addresses)}}"  :client= "{{json_encode($client)}}" :path="{{json_encode(url('/') )}}" >


    </editclient>



@endsection
