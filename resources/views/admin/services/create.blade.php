@extends('admin.layouts.app')

@section('title', 'Ajouter un service')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un service</h2>

        <form action="{{ route('admin.services.store') }}" method="POST">
            @include('admin.services.partials.form')
        </form>
    </div>
@endsection
