<x-app-layout>
    <div class="py-12">
        <div class="mb-4">
            <form action="{{ route('all.submitted.data') }}" method="GET">
                @php
                    $category_id  = $_GET['category_id'] ?? '';
                    $form_template  = $_GET['form_template_id'] ?? '';
                @endphp
                <label for="category_id" class="mr-2">Select Category:</label>
                <select name="category_id" id="category_id" class="px-2 py-1 border rounded-md">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option {{$category_id==$category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <label for="form_template_id" class="mx-4">Select Form Template:</label>
                <select name="form_template_id" id="form_template_id" class="px-2 py-1 border rounded-md">
                    <option value="">All Form Templates</option>
                    @foreach ($formTemplates as $formTemplate)
                        <option {{$form_template==$formTemplate->id ? 'selected' : ''}} value="{{ $formTemplate->id }}">{{ $formTemplate->title }}</option>
                    @endforeach
                </select>

                <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-md">Filter</button>
            </form>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Form Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted By</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submission Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($submissions as $submission)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $submission->formTemplate->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $submission->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $submission->created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <ul>
                            @foreach(json_decode($submission->submitted_data, true) as $key => $value)
                                @php
                                    $field = App\Models\Field::find($key) ?? [];
                                @endphp
                                <li><b>{{ $field->name }}:</b> {{ $value }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$submissions->links()}}
    </div>
</x-app-layout>

