<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormTemplate;

class FormSubmissionController extends Controller
{
    public function index()
    {
        // Retrieve all form templates
        $formTemplates = FormTemplate::all();
        return view('form_templates.index', ['formTemplates' => $formTemplates]);
    }

}
