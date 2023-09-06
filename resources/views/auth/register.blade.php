@extends('layouts.app')

@section('content')
    <register-component cargos-prop="{{$cargos}}" csrf_token="{{@csrf_token()}}"></register-component>
@endsection
