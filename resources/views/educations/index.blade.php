<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Education List') }}
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
                        <h1 class="text-2xl font-bold mb-4">Add new Education information</h1>
                        <form action="{{ route('education.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="institute" class="block text-gray-700">Institute</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="institute" name="institute" required>
                            </div>
                            <div class="mb-4">
                                <label for="institute_logo" class="block text-gray-700">Institute Logo</label>
                                <input type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="institute_logo" name="institute_logo" required>
                            </div>
                            <div class="mb-4">
                                <label for="degree" class="block text-gray-700">Degree</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="degree" name="degree" required>
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="block text-gray-700">Subject</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="subject" name="subject" required>
                            </div>
                            <div class="mb-4">
                                <label for="passing_year" class="block text-gray-700">Passing Year</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="passing_year" name="passing_year" required>
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>

                    <br>




                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Institute</th>
                                    <th scope="col" class="px-6 py-3">Logo</th>
                                    <th scope="col" class="px-6 py-3">Degree</th>
                                    <th scope="col" class="px-6 py-3">Subject</th>
                                    <th scope="col" class="px-6 py-3">Passing Year</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($educations as $education)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $education->institute }}</td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('resources/education/' . $education->institute_logo) }}" alt="Logo" class="w-10 h-10">
                                    </td>
                                    <td class="px-6 py-4">{{ $education->degree }}</td>
                                    <td class="px-6 py-4">{{ $education->subject }}</td>
                                    <td class="px-6 py-4">{{ $education->passing_year }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('education.edit', $education->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="{{ route('education.destroy', $education->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


