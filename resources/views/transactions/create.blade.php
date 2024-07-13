<x-app-layout>
    @include('transactions.includes.header')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('transactions.store') }}" method="post">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="mt-4 w-full flex flex-col md:flex-row justify-between">
                            <div class="amount w-full md:w-6/12">
                                <x-input-label for="amount" :value="__('Amount')" />
                                <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')"  />
                                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                            </div>
                            <div class="type w-full md:w-5/12">
                                <x-input-label for="type" :value="__('Type')" />
                                <x-select-input id="type" name="type" required>
                                    <option value="income" class="">Income</option>
                                    <option value="expense">Expense</option>
                                </x-select-input>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>
                        </div>
                        <div class="mt-4 w-full flex flex-col md:flex-row justify-between">
                            <div class="category w-full md:w-6/12">
                                <x-input-label for="category_id" :value="__('Category')" />
                                <x-select-input id="category_id" name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>
                            <div class="date w-full md:w-5/12">
                                <x-input-label for="date" :value="__('Date')" />
                                <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required />
                                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                            </div>
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
