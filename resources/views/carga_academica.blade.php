@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <alumnos/> --}}
    <alumnos :h="{{ $h }}" :usuarios="{{ $usuarios }}"></alumnos>
    
</div>
@endsection
