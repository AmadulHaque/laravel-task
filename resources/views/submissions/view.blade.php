<x-app-layout>

    <div class="py-12">

        <h2 class="text-[24px] mb-5" ><b>Form Submissions - {{ $formTemplate->title }}</b></h2>
        @foreach($submissions as $submission)
            <div class="mb-5">
                <p><b>Submitted By : </b>  {{ $submission->user->name }}</p>
                <p><b>Submission Date :</b> {{ $submission->created_at }}</p>
                <p><b>Data : </b></p>
                <ul class="ml-5" >
                    @foreach(json_decode($submission->submitted_data, true) as $key => $value)
                        @php
                            $field = App\Models\Field::find($key) ?? [];
                        @endphp
                        <li>
                            <b class="capitalize" >{{ $field->name }} </b> : {{ $value }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <hr>
        @endforeach



    </div>
</x-app-layout>

