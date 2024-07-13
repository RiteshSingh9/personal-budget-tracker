<x-app-layout>
    @include('categories.includes.header')

    <div class="py-12">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if (session('success'))
                <x-alert type="success" close="true">
                    {{ session('success') }}
                </x-alert>
            @endif

            <table class="w-full lg:w-2/3 mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Added On
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $category->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $category->created_at }}
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800 flex flex-row">
                                <a href="{{ route('categories.edit', $category->id) }}" class="edit-btn mx-2">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Delete</button>
                                    {{-- <a href="{{ route('categories.', $category->id) }}" class="link">Transactions</a> --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
