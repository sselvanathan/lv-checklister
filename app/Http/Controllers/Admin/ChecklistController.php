<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;

class ChecklistController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklists.create', compact('checklistGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreChecklistRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreChecklistRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->checklists()->create($request->validated());

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.checklists.edit', compact('checklistGroup', 'checklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreChecklistRequest $request
     * @param ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->update($request->validated());

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();

        return redirect()->route('home');
    }
}
