<section>
    <div class="mb-4 flex justify-between items-center">
        <form id="search-form" action="{{ route('user_managements') }}" method="GET" class="flex space-x-2">
            <div class="flex-grow">
                <label for="user-search" class="block text-sm font-medium text-gray-700">Search a User</label>
                <input type="text" id="user-search" name="search" value="{{ session('last_search_input') }}" placeholder="Search users" class="mt-1 px-4 py-2 block rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <button type="submit" class="self-end px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Search
            </button>
        </form>
        <button id="create-new-user" class="openCreateUserModal mt-7 px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            Create a User
        </button>
    </div>
</section>