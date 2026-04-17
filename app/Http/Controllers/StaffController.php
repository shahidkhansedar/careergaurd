<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffDocument;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $staff = Staff::with('role')->get();
            return response()->json(['data' => $staff]);
        }
        return view('staff.index');
    }

    public function create()
    {
        $roles = Role::where('status', 1)->get();
        return view('staff.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|unique:staff,phone',
            'email' => 'nullable|email|unique:staff,email',
            'joining_date' => 'required|date',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'pincode' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            // Auto-generate Employee Code
            $count = Staff::withTrashed()->count();
            $empCode = 'EMP-' . ($count + 1);

            // Generate Slug
            $fullName = trim($request->first_name . ' ' . ($request->last_name ?? ''));
            $slug = Str::slug($fullName . '-' . $empCode);

            $staff = Staff::create(array_merge($request->all(), [
                'emp_code' => $empCode,
                'slug' => $slug,
                'full_name' => $fullName,
                'created_by' => auth()->id(),
            ]));

            // Handle Documents
            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $key => $file) {
                    $docName = $request->document_names[$key] ?? $file->getClientOriginalName();
                    $path = $file->store('staff_docs', 'public');

                    StaffDocument::create([
                        'staff_id' => $staff->id,
                        'document_name' => $docName,
                        'file_path' => $path,
                        'file_original_name' => $file->getClientOriginalName(),
                        'file_type' => $file->getClientMimeType(),
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Staff created successfully', 'staff' => $staff]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($slug)
    {
        $staff = Staff::where('slug', $slug)->with('documents')->firstOrFail();
        $roles = Role::where('status', 1)->get();
        return view('staff.edit', compact('staff', 'roles'));
    }

    public function update(Request $request, $slug)
    {
        $staff = Staff::where('slug', $slug)->firstOrFail();

        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|unique:staff,phone,' . $staff->id,
            'email' => 'nullable|email|unique:staff,email,' . $staff->id,
            'joining_date' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            // Handle Slug update if name changes
            $fullName = trim($request->first_name . ' ' . ($request->last_name ?? ''));
            if ($fullName !== $staff->full_name) {
                $slug = Str::slug($fullName . '-' . $staff->emp_code);
                $staff->slug = $slug;
            }

            $staff->update(array_merge($request->all(), [
                'full_name' => $fullName,
            ]));

            // Handle New Documents
            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $key => $file) {
                    $docName = $request->document_names[$key] ?? $file->getClientOriginalName();
                    $path = $file->store('staff_docs', 'public');

                    StaffDocument::create([
                        'staff_id' => $staff->id,
                        'document_name' => $docName,
                        'file_path' => $path,
                        'file_original_name' => $file->getClientOriginalName(),
                        'file_type' => $file->getClientMimeType(),
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Staff updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return response()->json(['success' => 'Staff deleted successfully']);
    }

    public function toggleStatus($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->status = !$staff->status;
        $staff->save();
        return response()->json(['success' => 'Status updated successfully']);
    }

    public function deleteDocument($id)
    {
        $doc = StaffDocument::findOrFail($id);
        Storage::disk('public')->delete($doc->file_path);
        $doc->delete();
        return response()->json(['success' => 'Document deleted successfully']);
    }
}
