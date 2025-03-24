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
                    {{ __("You're logged in!") }}

                    <!-- Add links to other views -->
                    <div class="mt-4">
                        <a href="{{ route('even') }}" class="text-blue-500">Even Numbers</a><br>
                        <a href="{{ route('prime') }}" class="text-blue-500">Prime Numbers</a><br>
                        <a href="{{ route('gpa_simulator') }}" class="text-blue-500">GPA Simulator</a><br>
                        <a href="{{ route('marketbill') }}" class="text-blue-500">Market Bill</a><br>
                        <a href="{{ route('multable') }}" class="text-blue-500">Multiplication Table</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>