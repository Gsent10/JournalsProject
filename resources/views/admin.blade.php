@extends('layouts.app')

@section('content')
    <div id="app">
        <admin-component user-id="{{ auth()->user()->id ?? 0}}"></admin-component>
        <new-journal-form-component user-id="{{ auth()->user()->id ?? 0}}"></new-journal-form-component>
    </div>
@endsection
