<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestorDocumentController extends Controller
{
    public function index()
    {
        $documents = \App\Models\InvestorDocument::latest()->paginate(10);
        return view('admin.investors.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.investors.form');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'document' => 'required|file|mimes:pdf,doc,docx,xlsx,xls|max:5120',
            'published_at' => 'required|date',
        ]);

        if ($request->hasFile('document')) {
            $data['file_path'] = $request->file('document')->store('investors');
        }

        \App\Models\InvestorDocument::create($data);

        return redirect()->route('admin.investors.index')->with('success', 'Document uploaded successfully.');
    }

    public function edit($id)
    {
        $document = \App\Models\InvestorDocument::findOrFail($id);
        return view('admin.investors.form', compact('document'));
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $doc = \App\Models\InvestorDocument::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls|max:5120',
            'published_at' => 'required|date',
        ]);

        if ($request->hasFile('document')) {
            \Illuminate\Support\Facades\Storage::cloud()->delete($doc->file_path);
            $data['file_path'] = $request->file('document')->store('investors');
        }

        $doc->update($data);

        return redirect()->route('admin.investors.index')->with('success', 'Document updated successfully.');
    }

    public function destroy($id)
    {
        $doc = \App\Models\InvestorDocument::findOrFail($id);
        \Illuminate\Support\Facades\Storage::cloud()->delete($doc->file_path);
        $doc->delete();
        return redirect()->route('admin.investors.index')->with('success', 'Document deleted successfully.');
    }
}
