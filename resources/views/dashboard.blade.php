<x-app-layout>
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div>
                    <a href="{{ route('categories.index') }}" class="link">Categories</a>
                    <br />
                    <a href="{{ route('transactions.index') }}" class="link">Transactions</a>
                </div> --}}
                    <div class="w-full flex justify-between px-2 py-2">
                        <div class="w-full md:w-5/12">
                            <h2>Income vs Expense</h2>
                            <canvas id="incomeExpenseChart"></canvas>
                        </div>

                        <div class="w-full md:w-5/12">
                            <h2>Expenses by Category</h2>
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var incomeExpenseCtx = document.getElementById('incomeExpenseChart').getContext('2d');
                var categoryCtx = document.getElementById('categoryChart').getContext('2d');

                var incomeExpenseChart = new Chart(incomeExpenseCtx, {
                    type: 'pie',
                    data: {
                        labels: ['Income', 'Expense'],
                        datasets: [{
                            data: [{{ $income }}, {{ $expense }}],
                            backgroundColor: ['#4CAF50', '#F44336'],
                        }]
                    }
                });

                var categoryData = @json($categoryData);
                var categoryLabels = Object.keys(categoryData);
                var categoryValues = Object.values(categoryData);

                var categoryChart = new Chart(categoryCtx, {
                    type: 'pie',
                    data: {
                        labels: categoryLabels,
                        datasets: [{
                            data: categoryValues,
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                                '#FF9F40'
                            ],
                        }]
                    }
                });
            });
        </script>


    </x-app-layout>
