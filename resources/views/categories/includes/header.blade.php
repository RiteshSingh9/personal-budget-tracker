<x-slot name="header">
    <div class="flex flex-col md:flex-row justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>

        <div class="right">
            <a href="{{ route('categories.create') }}""  class="add-btn">Add</a>
        </div>
    </div>
</x-slot>
