@extends('layouts.app')

@section('content')
    <relatorio-component ofertas-prop="{{$ofertas}}" csrf_token="{{@csrf_token()}}"></relatorio-component>
@endsection
