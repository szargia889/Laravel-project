<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth; $users = Auth::User(); ?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyectos') }}
        </h2>

        <a href="{{ route('subirproyecto') }}">Subir +</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>
                        @foreach ($proyectos as $proyecto)
                            @if ($users->rol == 0)
                                @if ($proyecto->autor == $users->name)
                                    <ul>
                                        <li><a href="{{ route('mostrarProyecto', $proyecto) }}"> - {{ $proyecto->nombre }}</a></li>
                                    </ul>
                                @endif
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
