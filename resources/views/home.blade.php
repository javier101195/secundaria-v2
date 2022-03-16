@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <materias/> --}}
    <materias :mat="{{ $mat }}"  ></materias>
    
</div>
@endsection
