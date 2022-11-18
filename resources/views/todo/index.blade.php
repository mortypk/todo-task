<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            To Do Task
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="">
                    <!-- component -->
                    <div class="w-full rounded-md bg-white p-2">
                        <div class="pb-2">
                            @if (isset($category))
                                <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @method('PUT')
                            @else
                                <form action="{{ route('category.store') }}" method="POST">
                            @endif
                            @csrf
                                <div class="flex flex-col">
                                    <div class="flex">        
                                        <div class="inline-flex px-2 rounded-none border-y 
                                            text-sm font-bold
                                            border-gray-300 bg-gray-100 text-gray-600 
                                            first:border-l first:rounded-l-md 
                                            last:border-r last:rounded-r-md p-2" >
                                            Enter Category Name
                                        </div>
                                        @isset($category)
                                        <input type="text" name="name" value=" {{ $category->name }} "
                                            class="block p-1 w-full min-w-0 flex-1 rounded-none border border-gray-300 bg-white text-base
                                            focus:outline outline-2 outline-blue-400
                                            first:rounded-l-md last:rounded-r-md" />
                                        <button type="submit" class="cursor-pointer bg-green-600 px-4 py-2 font-semibold tracking-wide text-white">
                                            Update 
                                        </button>
                                        <a href="{{ route('todo.index') }}" class="cursor-pointer rounded-r-md bg-red-600 px-4 py-2 font-semibold tracking-wide text-white">
                                            Cancel 
                                        </a>
                                        @else                                           
                                        <input type="text" name="name" value="@isset($category) {{ $category->id }} @endisset"
                                        class="block p-1 w-full min-w-0 flex-1 rounded-none border border-gray-300 bg-white text-base
                                        focus:outline outline-2 outline-blue-400
                                        first:rounded-l-md last:rounded-r-md" />
                                            <button type="submit" class="cursor-pointer rounded-r-md bg-blue-600 px-4 py-2 font-semibold tracking-wide text-white">
                                                New
                                            </button>
                                        @endisset
                                    </div>
                                    @error('name')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="pb-2">
                            @if (isset($todo))
                                <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                            @method('PUT')
                            @else
                                <form action="{{ route('todo.store') }}" method="POST">
                            @endif
                            @csrf
                                <div class="flex flex-col">
                                    <div class="flex">        
                                        <div class="inline-flex px-2 rounded-none border-y 
                                            text-sm font-bold
                                            border-gray-300 bg-gray-100 text-gray-600 
                                            first:border-l first:rounded-l-md 
                                            last:border-r last:rounded-r-md p-2" >
                                            Enter Task
                                        </div>
                                        <select name="category_id" id="category_id"
                                        class="block p-1 w-full min-w-0 flex-1 rounded-none border border-gray-300 bg-white text-base
                                            focus:outline outline-2 outline-blue-400
                                            first:rounded-l-md last:rounded-r-md">
                                            @isset($todo->category) 
                                                <option value="{{ $todo->category->id }}">{{ $todo->category->name }}</option>
                                            @endisset
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="title" value="@isset($todo) {{ $todo->title }} @endisset"
                                            class="block p-1 w-full min-w-0 flex-1 rounded-none border border-gray-300 bg-white text-base
                                            focus:outline outline-2 outline-blue-400
                                            first:rounded-l-md last:rounded-r-md" />
                                        @isset($todo)
                                            <button type="submit" class="cursor-pointer bg-green-600 px-4 py-2 font-semibold tracking-wide text-white">
                                                Update 
                                            </button>
                                            <a href="{{ route('todo.index') }}" class="cursor-pointer rounded-r-md bg-red-600 px-4 py-2 font-semibold tracking-wide text-white">
                                                Cancel 
                                            </a>
                                        @else
                                            <button type="submit" class="cursor-pointer rounded-r-md bg-blue-600 px-4 py-2 font-semibold tracking-wide text-white">
                                                Add
                                            </button>
                                        @endisset
                                    </div>
                                    @error('title')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="overflow-x-auton -mx-4 sm:-mx-8 sm:px-8">
                            <div class="inline-block min-w-full overflow-hidden">
                                @foreach ($categories as $category)
                                <details open class="bg-gray-100 duration-300 open:bg-gray-200 rounded-md mb-1">
                                    <summary class="flex justify-between cursor-pointer border-b-2 border-gray-300 text-sm font-bold tracking-wider text-gray-600 px-5 py-3">
                                        <div>
                                            {{ $category->name }}
                                        </div>
                                        <div class="flex">
                                            <a href="{{ route('todo.category', $category->id) }}" class="text-blue-400 hover:text-blue-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                    <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-600"  onclick="return confirm('Are you sure?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                    <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                                                    <path fill-rule="evenodd" d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.133 2.845a.75.75 0 011.06 0l1.72 1.72 1.72-1.72a.75.75 0 111.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 11-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 11-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            </form>
                                        </div>
                                    </summary>
                                    <table class="min-w-full leading-normal">
                                    <tbody>
                                        {{-- todo --}}
                                        @foreach ($category->todo as $todo)
                                            <tr class="border-b border-gray-200 bg-white text-sm">
                                                <td class="p-1 w-[10%]">
                                                    <p class="whitespace-no-wrap text-gray-900 mx-auto">
                                                        @if( $todo->status )
                                                        <a href="{{ route('todo.change', $todo->id) }}" class="text-green-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                        @else
                                                        <a href="{{ route('todo.change', $todo->id) }}" class="text-gray-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                            </svg>
                                                        </a>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td class="p-1 w-[70%]">
                                                    <p class="whitespace-no-wrap text-gray-900">
                                                        {{ $todo->title }}
                                                    </p>
                                                </td>
                                                <td class="p-1 w-[10%]">
                                                    <p class="whitespace-no-wrap text-gray-900">
                                                        {{ $todo->created_at->diffForHumans() }}
                                                    </p>
                                                </td>
                                                <td class="flex p-1 w-[10%]">
                                                    <a href="{{ route('todo.edit', $todo->id) }}" class="text-blue-400 hover:text-blue-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-600"  onclick="return confirm('Are you sure?')">
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
                                </details>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
