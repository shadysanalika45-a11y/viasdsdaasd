<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CmsSectionUpdateRequest;
use App\Models\CmsSection;
use Illuminate\View\View;

class CmsSectionController extends Controller
{
    public function index(): View
    {
        return view('admin.cms.index', [
            'sections' => CmsSection::orderBy('page')->get(),
        ]);
    }

    public function edit(CmsSection $cmsSection): View
    {
        return view('admin.cms.edit', [
            'section' => $cmsSection,
        ]);
    }

    public function update(CmsSectionUpdateRequest $request, CmsSection $cmsSection)
    {
        $cmsSection->update($request->validated());

        return redirect()->route('admin.cms-sections.index')->with('status', 'Section updated.');
    }
}
