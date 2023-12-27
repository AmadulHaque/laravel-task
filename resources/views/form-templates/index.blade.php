<x-app-layout>

    <div class="py-12">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if ($formTemplate->count() <= 0)
                <div class="mb-16 bg-white border border-gray-100 rounded-xl">
                    <div class="flex flex-col justify-center items-center">
                        <h3 class="p-6 text-center text-xl">
                            No data found
                        </h3>
                    </div>
                </div>
            @else
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formTemplate as $item)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   {{$item->title}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   {{$item->category->name ?? ''}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$item->description}}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center p-5">
                                        <a class="inline-flex w-8 h-8 mr-2 items-center justify-center bg-green-500 hover:bg-green-600 rounded-2xl"
                                            href="{{ route('form-templates.edit', $item->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                height="20">
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path
                                                    d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"
                                                    fill="rgba(255,255,255,1)"/>
                                            </svg>
                                        </a>
                                        <button data-delete-route="{{ route('form-templates.destroy', $item->id) }}"class="delete-item-btn inline-flex w-8 h-8 items-center justify-center bg-red-500 hover:bg-red-600 rounded-2xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                height="20">
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="rgba(255,255,255,1)"/>
                                            </svg>
                                        </button>
                                        <a href="{{ route('form.submitted_data', $item->id) }}"  class="inline-flex w-8 h-8 mr-2 items-center justify-center bg-green-500 hover:bg-green-600 rounded-2xl text-white ml-3 font-[24px]" >
                                            <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                                <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('form.create', $item->id) }}"  class="inline-flex w-8 h-8 mr-2 items-center justify-center bg-green-500 hover:bg-green-600 rounded-2xl text-white ml-3 font-[24px]" >
                                            <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif
        </div>

    </div>
</x-app-layout>
