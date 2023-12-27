<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Services\FieldServices;
use App\Http\Requests\StoreFieldRequest;

class FieldsController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return view('fields.index', ['fields' => $fields]);
    }

    public function create()
    {
        return view('fields.create');
    }

    public function store(StoreFieldRequest $request,FieldServices $fieldServices)
    {
        $data = $request->validated();
        if (isset($data['options']) && is_array($data['options'])) {
            $data['options'] = json_encode($data['options']);
        }
        $fieldServices->store($data);
        return redirect()->back()->with(['success' => 'Field created']);
    }

    public function edit(Field $field)
    {
        return view('fields.edit', ['Field' => $field]);
    }

    public function update(StoreFieldRequest $request, Field $field,FieldServices $fieldServices)
    {
        $fieldServices->update(
            $field,
            $request->validated()
        );
        return redirect()->route('fields.index')->with(['success' => 'Field updated']);
    }

    public function destroy(Field $field,FieldServices $fieldServices)
    {
        $fieldServices->destroy($field);
        return response('Field deleted');
    }
}
