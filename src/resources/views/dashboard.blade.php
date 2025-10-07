<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">Go to projects</a>  
                    <a href="{{ route('companies.index') }}" class="btn btn-primary">Go to companies</a>  
                    <a href="{{ route('technologies.index') }}" class="btn btn-primary">Go to technologies</a>  
                </div>
            </div>
        </div>
    </div>


{{-- <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
</ul> --}}

{{-- <ul class="nav nav-tabs mb-4">
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('projects.index') ? 'active' : '' }}" href="{{ route('projects.index') }}">
      Projects
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('companies.index') ? 'active' : '' }}" href="{{ route('companies.index') }}">
      Companies
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('technologies.index') ? 'active' : '' }}" href="{{ route('technologies.index') }}">
      Technologies
    </a>
  </li>
</ul> --}}







</x-app-layout>


