@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <div class="w-full m-auto mt-6 flex items-center justify-evenly">
        <button id="participant-register" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Participant</button>
        <button id="organizer-register" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Organizer</button>
    </div>
    <div id="organizer-form" class="hidden">
        <x-organizer-register/>
    </div>
    <div id="participant-form">
        <x-participant-register />
    </div>

    <script>
        let show_participant_register_form_btn = document.getElementById('participant-register');
        let show_organizer_register_form_btn = document.getElementById('organizer-register');
        let participant_register_form = document.getElementById('participant-form');
        let organizer_register_form = document.getElementById('organizer-form');

        show_participant_register_form_btn.addEventListener('click', function () {
            show_organizer_register_form_btn.classList.remove('bg-indigo-500', 'hover:bg-indigo-700');
            show_organizer_register_form_btn.classList.add('bg-gray-500', 'hover:bg-gray-700');
            show_participant_register_form_btn.classList.remove('bg-gray-500', 'hover:bg-gray-700');
            show_participant_register_form_btn.classList.add('bg-indigo-500', 'hover:bg-indigo-700');
            organizer_register_form.classList.add('hidden');
            participant_register_form.classList.remove('hidden');
        });

        show_organizer_register_form_btn.addEventListener('click', function () {
            show_participant_register_form_btn.classList.remove('bg-indigo-500', 'hover:bg-indigo-700');
            show_participant_register_form_btn.classList.add('bg-gray-500', 'hover:bg-gray-700');
            show_organizer_register_form_btn.classList.remove('bg-gray-500', 'hover:bg-gray-700');
            show_organizer_register_form_btn.classList.add('bg-indigo-500', 'hover:bg-indigo-700');
            participant_register_form.classList.add('hidden');
            organizer_register_form.classList.remove('hidden');
        });
    </script>
@endsection

