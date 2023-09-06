@extends('layouts.app')

@section('content')
    <oferta-component obreiro_id="{{ Auth::user()->id }}" membros-prop="{{$membros}}" csrf_token="{{@csrf_token()}}"></oferta-component>
@endsection
