@extends('layouts.app')

@section('title', ' - Categories')

@section('content')

    <h1>Categories</h1>

    {{--Research v-bind in component--}}
    {{--Double curly-braces automatically calls JSON-Encode and double encode html-entities to avoid syntax issues.--}}

    <category-manager :initial-categories="{{ $categories }}" ></category-manager>


@endsection
