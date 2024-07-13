<x-app-layout>
    @include('categories.includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="category_name" :value="__('Category Name')" />
                            <x-text-input id="category_name" class="block mt-1 w-full" type="text" name="category_name" :value="old('category_name')" required autofocus />
                            <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
                        </div>
                        <div class="mt-4 w-full flex justify-center">
                            <button type="submit" class="w-1/2 add-btn">Add</button>
                        </div>
                        <div class="mt-4 w-full flex justify-center">
                            <a href="{{ route('categories.index') }}" class="link">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
