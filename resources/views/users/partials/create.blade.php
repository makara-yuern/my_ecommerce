<x-app-layout>
    <x-slot name="header">
        <h2 class="flex text-gray-800 leading-tight space-x-2 mt-4">
            {{ Breadcrumbs::render('user.create') }}
        </h2>
    </x-slot>

    <section>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
            <div class="w-full p-2 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Create New User</h2>
                </header>
                <div class="p-3">
                    <form action='{{ route('user.store') }}' method="post" class="p-6" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="name">Name <span class="text-red-500">*</span></label>
                            <input id="name" name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('name') }}" />
                            @error('name')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email">Email <span class="text-red-500">*</span></label>
                            <input id="email" name="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('email') }}" />
                            @error('email')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password">Password <span class="text-red-500">*</span></label>
                            <input id="password" name="password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                            @error('password')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation">Confirm Password <span class="text-red-500">*</span></label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                            @error('password_confirmation')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <div class="admin">
                                <span class="ml-2 mb-1">Admin</span>
                                <input type="checkbox" name="isAdmin" id="isAdmin" class="toggle-checkbox hidden">
                                <label for="isAdmin" class="toggle-label relative flex items-center cursor-pointer">
                                    <span class="block w-12 h-6 rounded-full bg-gray-300"></span>
                                    <span class="toggle-thumb block w-6 h-6 rounded-full bg-white absolute transition-transform duration-300 transform"></span>
                                </label>
                            </div>

                            <div class="status">
                                <span class="ml-2 mb-1">Status</span>
                                <input type="checkbox" name="isActive" id="isActive" class="toggle-checkbox hidden">
                                <label for="isActive" class="toggle-label relative flex items-center cursor-pointer">
                                    <span class="block w-12 h-6 rounded-full bg-gray-300"></span>
                                    <span class="toggle-thumb block w-6 h-6 rounded-full bg-white absolute transition-transform duration-300 transform"></span>
                                </label>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <div class="select-user-country">
                                <label for="country_code" class="mb-1">Country</label>
                                <select id="country_code" name="country_code" class="form-select-user-country bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="">Select Country</option>
                                    @foreach (config('countries') as $code => $country)
                                    <option value="{{ $code }}" {{ old('country_code') == $code ? 'selected' : '' }}>
                                        {{ $country['name'] }} {{ $country['flag'] }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('country_code')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="select-user-type">
                                <label for="user_type_id" class="mb-1">User Type</label>
                                <select id="user_type_id" name="user_type_id" class="form-select-user-type bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="">Select User Type</option>
                                    <!-- Populate this list with user types from the database -->
                                    @foreach ($userTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('user_type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->type }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('user_type_id')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="avatar">Avatar</label>
                            <input id="avatar" name="avatar" type="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                            @error('avatar')
                            <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-6 flex justify-end">
                            <a type="button" href='{{ route('user.index') }}' class="py-2 px-3 mx-2 min-w-15 w-20 bg-gray-500 text-center text-white text-sm font-semibold rounded-md shadow focus:outline-none">
                                Back
                            </a>
                            <button type="submit" class="py-2 px-3 mx-2 min-w-15 w-20 bg-indigo-500 text-center text-white text-sm font-semibold rounded-md shadow focus:outline-none">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <script type='module'>
        $(document).ready(function() {
            $('.form-select-user-country').select2({
                placeholder: 'Select a country',
                width: 'resolve',
            });

            $('.form-select-user-type').select2({
                placeholder: 'Select a country',
                width: 'resolve',
            });
        });
    </script>
    @endpush
</x-app-layout>