<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .custom-flex-container {
            display: flex;
            justify-content: center;
            /* Optional: Set a height to center vertically within a parent container */
            /* height: 100vh; */
            /* align-items: center; */
        }

        .custom-btn {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            border: none;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            /* Optional: Add transition for background color change on hover */
            transition: background-color 0.15s ease-in-out;
        }

        .custom-btn:hover {
            background-color: #0056b3; /* Darker shade for hover effect */
        }
    </style>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

            </div>
            <div class="custom-flex-container">
                <a href="/add-card">
                    <button type="button" class="custom-btn">Criar novo card</button>
                </a>

              </div>
        </div>
    </div>
</x-app-layout>
