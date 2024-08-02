<x-app-layout>
    <x-slot name="header">
        <h2 class="flex text-gray-800 leading-tight space-x-2 mt-4">
            {{Breadcrumbs::render('user.index')}}
        </h2>
    </x-slot>

    @include('layouts.notification')
    <section>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
            <div class="w-full p-2 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">User Management</h2>
                </header>
                <div class="p-3">
                    <form method="get" action='{{route('user.index')}}' class="p-6">
                        <div class="grid justify-items-stretch">
                            <div class="justify-self-start">
                                <input class='rounded-md shadow focus:outline-none' type='text' placeholder='keyword' name='title' value='{{$request->title ?? ''}}'>
                                <button type="submit" class="py-2 px-3 mx-2 bg-indigo-500 text-white text-sm font-semibold rounded-md shadow focus:outline-none" tabindex="-1">Search</button>
                            </div>
                            <div class="justify-self-end">
                                <a class="py-2 px-3 mx-2 w-20 bg-indigo-500 text-white text-sm font-semibold rounded-md shadow focus:outline-none" tabindex="-1" href='{{route('user.create')}}'>Create</a>
                            </div>
                        </div>
                    </form>

                    <div class="overflow-x-auto mt-2">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 w-12 whitespace-nowrap text-left">
                                        <div class="font-semibold">ID</div>
                                    </th>
                                    <th class="p-2 w-1/6 whitespace-nowrap text-left">
                                        <div class="font-semibold">User Name</div>
                                    </th>
                                    <th class="p-2 w-1/4 whitespace-nowrap text-left">
                                        <div class="font-semibold">Email</div>
                                    </th>
                                    <th class="p-2 w-1/8 whitespace-nowrap text-center">
                                        <div class="font-semibold">Is Admin</div>
                                    </th>
                                    <th class="p-2 w-1/8 whitespace-nowrap text-center">
                                        <div class="font-semibold">Status</div>
                                    </th>
                                    <th class="p-2 w-1/6 whitespace-nowrap text-center">
                                        <div class="font-semibold">Country Code</div>
                                    </th>
                                    <th class="p-2 w-1/6 whitespace-nowrap text-center">
                                        <div class="font-semibold">User Type</div>
                                    </th>
                                    <th class="p-2 w-1/3 whitespace-nowrap text-center">
                                        <div class="font-semibold">Created At</div>
                                    </th>
                                    <th class="p-2 w-1/1 whitespace-nowrap text-center">
                                        <div class="font-semibold">Action</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @foreach ($listUser as $user)
                                <tr>
                                    <td class="p-2 w-12 whitespace-nowrap">
                                        <div class="font-medium text-gray-800">{{ $user->id }}</div>
                                    </td>
                                    <td class="p-2 w-1/6 whitespace-nowrap">
                                        <div class="font-medium">{{ $user->name }}</div>
                                    </td>
                                    <td class="p-2 w-1/4 whitespace-nowrap">
                                        <div class="font-medium">{{ $user->email }}</div>
                                    </td>
                                    <td class="p-2 w-1/8 whitespace-nowrap text-center">
                                        <div class="font-medium">{{ $user->is_admin ? 'Yes' : 'No' }}</div>
                                    </td>
                                    <td class="p-2 w-1/8 whitespace-nowrap text-center">
                                        <div class="font-medium">{{ $user->status ? 'Active' : 'Inactive' }}</div>
                                    </td>
                                    <td class="p-2 w-1/6 whitespace-nowrap text-center">
                                        <div class="font-medium">{{ $user->country_code }}</div>
                                    </td>
                                    <td class="p-2 w-1/6 whitespace-nowrap text-center">
                                        <div class="font-medium">{{ $user->user_type }}</div>
                                    </td>
                                    <td class="p-2 w-1/3 whitespace-nowrap text-center">
                                        <div class="font-medium">{{ $user->created_at->format('Y-m-d H:i') }}</div>
                                    </td>
                                    <td class="p-2 w-1/1 whitespace-nowrap text-center flex justify-center space-x-2">
                                        <a type="button" class="py-2 px-3 bg-indigo-500 text-white text-sm font-semibold rounded-md shadow focus:outline-none" href='#'>Edit</a>
                                        <button type="button" class="py-2 px-3 bg-red-500 text-white text-sm font-semibold rounded-md shadow focus:outline-none delete-user" data-id="{{ $user->id }}" data-url="{{route('user.delete',['id' => $user->id])}}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$listUser->links('pagination::tailwind')}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
    <script type='module'>
        $(document).ready(function() {
            $('.delete-user').click(function() {
                let id = $(this).data('id');
                let url = $(this).data('url');
                Swal.fire({
                    title: "Are you sure!",
                    text: "Do you want to detele this item?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                            },
                            type: "DELETE",
                            url: url,
                            data: {
                                id: id,
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    Swal.fire('Deleted!', response.message, 'success').then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error!', response.message, 'error');
                                }
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', 'An error occurred while processing your request.', 'error');
                            }
                        });
                    }
                });
            })
        })
    </script>
    @endpush

</x-app-layout>