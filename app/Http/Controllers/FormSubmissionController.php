<?php

namespace App\Http\Controllers;

use App\Models\FormTemplate;
use Illuminate\Http\Request;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\Auth;

class FormSubmissionController extends Controller
{
    public function showForm($formTemplateId) {
        $formTemplate = FormTemplate::findOrFail($formTemplateId);
        return view('submissions.create', compact('formTemplate'));
    }



    public function submitForm(Request $request, $formTemplateId)
    {

        $formTemplate = FormTemplate::findOrFail($formTemplateId);

        $formData = $request->input('formData');
        $submission = new FormSubmission();
        $submission->form_template_id = $formTemplate->id;
        $submission->user_id = Auth::user()->id;
        $submission->submitted_data = json_encode($formData);
        $submission->save();

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }



    public function showSubmittedData($formTemplateId)
    {
        $formTemplate = FormTemplate::findOrFail($formTemplateId);
        $submissions = FormSubmission::where('form_template_id', $formTemplate->id)
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('submissions.view', compact('formTemplate', 'submissions'));
    }


}
