<x-app-layout>
    <div class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <!-- component -->
                    <div class="w-full rounded-md bg-white p-2">
                        <div class="flex items-center justify-between pb-2">
                            <div>
                                <h2 class="font-semibold text-gray-600">Categories</h2>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center rounded-md bg-gray-50 p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                    <input class="ml-1 block bg-gray-50 outline-none" type="text" name="" id="" placeholder="search..." />
                                </div>
                                <div class="ml-3 space-x-2">
                                    <a href="{{ route('category.create') }}" class="cursor-pointer rounded-md bg-blue-600 px-4 py-2 font-semibold tracking-wide text-white">Create</a>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auton -mx-4 sm:-mx-8 sm:px-8">
                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th class="border-b-2 border-gray-200 bg-gray-100 p-2 text-left text-sm font-bold tracking-wider text-gray-600">#</th>
                                            <th class="border-b-2 border-gray-200 bg-gray-100 p-2 text-left text-sm font-bold tracking-wider text-gray-600">Name</th>
                                            <th class="border-b-2 border-gray-200 bg-gray-100 p-2 text-left text-sm font-bold tracking-wider text-gray-600">Created at</th>
                                            <th class="border-b-2 border-gray-200 bg-gray-100 p-2 text-left text-sm font-bold tracking-wider text-gray-600"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- category --}}
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td class="border-b border-gray-200 bg-white p-1 text-sm">
                                                    <p class="whitespace-no-wrap text-gray-900">
                                                        {{ $category->id }}
                                                    </p>
                                                </td>
                                                <td class="border-b border-gray-200 bg-white p-1 text-sm">
                                                    <p class="whitespace-no-wrap text-gray-900">
                                                        {{ $category->name }}
                                                    </p>
                                                </td>
                                                <td class="border-b border-gray-200 bg-white p-1 text-sm">
                                                    <p class="whitespace-no-wrap text-gray-900">
                                                        {{ $category->created_at->diffForHumans() }}
                                                    </p>
                                                </td>
                                                <td class="flex border-b border-gray-200 bg-white p-1 text-sm">
                                                    <a href="{{ route('category.edit', $category->id) }}" class="text-blue-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                            <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                                                            <path fill-rule="evenodd" d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.133 2.845a.75.75 0 011.06 0l1.72 1.72 1.72-1.72a.75.75 0 111.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 11-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 11-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="xs:flex-row xs:justify-between flex flex-col items-center border-t bg-white px-5 py-5">
                                    <!-- Link -->
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
