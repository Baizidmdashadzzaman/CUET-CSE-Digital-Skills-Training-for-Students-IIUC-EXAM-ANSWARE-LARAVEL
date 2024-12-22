<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Education Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                    <div class="container mx-auto px-4">
                        <h1 class="text-2xl font-bold mb-4">Edit Education Information</h1>
                        <form action="{{ route('education.update', $education->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-4">
                                <label for="institute" class="block text-gray-700">Institute</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="institute" name="institute" value="{{ $education->institute }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="institute_logo" class="block text-gray-700">Institute Logo</label>
                                <input type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="institute_logo" name="institute_logo">
                                @if($education->institute_logo)
                                    <img src="{{ asset('resources/education/' . $education->institute_logo) }}" alt="Institute Logo" class="mt-2 h-20">
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="degree" class="block text-gray-700">Degree</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="degree" name="degree" value="{{ $education->degree }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="block text-gray-700">Subject</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="subject" name="subject" value="{{ $education->subject }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="passing_year" class="block text-gray-700">Passing Year</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="passing_year" name="passing_year" value="{{ $education->passing_year }}" required>
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                        </form>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
