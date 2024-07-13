<x-slot name="header">
    <div class="flex flex-col md:flex-row justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transcations') }}
        </h2>

        <div class="right mt-2 hidden md:block">
            <a href="{{ route('transactions.create') }}""  class="add-btn">ADD</a>
        </div>
    </div>
</x-slot>
