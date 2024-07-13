<!-- Main modal -->
<div class="w-full h-full flex items-center justify-center">
    <div
        id="create-category"
        tabindex="-1"
        aria-hidden="true"
        class="hidden bg-gray-200 dark:bg-gray-800 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center"
    >
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600"
                >
                    <h3
                        class="text-xl font-semibold text-gray-900 dark:text-white"
                    >
                        Create Category
                    </h3>
                    <button
                        type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="create-category"
                        id="createCategoryModalCloseButton"
                    >
                        <svg
                            class="w-3 h-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                            />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form
                        class="space-y-4"
                        action="{{ route('categories.store') }}"
                    >
                        @csrf
                        <div>
                            <x-input-label
                                for="category_name"
                                :value="__('Category Name')"
                            />
                            <x-text-input
                                id="category_name"
                                class="block mt-1 w-full"
                                type="number"
                                name="category_name"
                                :value="old('category_name')"
                                required
                                autofocus
                            />
                            <x-input-error
                                :messages="$errors->get('name')"
                                class="mt-2"
                            />
                        </div>
                        <input
                            type="button"
                            class="w-full add-btn"
                            id="addCategoryBtn"
                            value="ADD"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let createCategoryModel = document.getElementById("create-category");

    function toggleCreateCategoryModal() {
        console.log("toggle");
        if (createCategoryModel.ariaHidden) {
            // console.log(elem.ariaHidden);
            createCategoryModel.classList.remove("hidden");
            createCategoryModel.ariaHidden = false;
        } else {
            createCategoryModel.classList.add("hidden");
            createCategoryModel.ariaHidden = true;
        }
    }

    document
        .getElementById("createCategoryModalCloseButton")
        .addEventListener("click", function () {
            // console.log('close');
            createCategoryModel.classList.add("hidden");
        });
</script>
