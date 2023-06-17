<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\OldUserAddress;
use App\Models\OldUserProfile;
use App\Models\Process;
use App\Models\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use App\Models\UserFile;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $profile = $user->profile;
        return Inertia::render('User/Profile', [
            'profile' => $profile
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        OldUserProfile::create([
            'user_id' => $user->id,
            'name' => $user->profile->name,
            'birth_date' => $user->profile->birth_date,
            'mothers_name' => $user->profile->mothers_name,
            'cpf' => $user->profile->cpf,
            'identification_document' => $user->profile->identification_document
        ]);

        $user->profile->update([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'mothers_name' => $request->mothers_name,
            // 'cpf' => $request->cpf,
            'identification_document' => $request->identification_document
        ]);

        return redirect()->back();
    }

    public function address()
    {
        $user = Auth::user();
        $address = $user->address;
        return Inertia::render(
            'User/Address',
            [
                'address' => $address
            ]
        );
    }

    public function addressUpdate(Request $request)
    {
        $user = Auth::user();

        OldUserAddress::create([
            'user_id' => $user->id,
            'state' => $user->address->state,
            'city' => $user->address->city,
            'zip_code' => $user->address->zip_code,
            'address' => $user->address->address,
            'number' => $user->address->number
        ]);

        $user->address->update([
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'number' => $request->number
        ]);

        return redirect()->back();
    }

    public function file()
    {
        $user = Auth::user();
        $files = $user->file;

        return Inertia::render(
            'User/File',
            [
                'files' => $files
            ]
        );
    }

    public function fileUpdate(Request $request)
    {
        $user = Auth::user();

        $fileTypes = ['education', 'curriculum', 'certificate', 'license'];

        foreach ($fileTypes as $fileType) {
            if ($request->hasFile($fileType)) {
                $file = $request->file($fileType);
                $filename = $file->getClientOriginalName();
                $filePath = $file->store('curriculums/' . $user->id);

                $userFile = $user->file()->where('type', $fileType)->first();
                if ($userFile) {
                    Storage::delete($userFile->file_path);
                    $userFile->update([
                        'name' => $filename,
                        'file_path' => $filePath,
                    ]);
                } else {
                    $user->file()->create([
                        'name' => $filename,
                        'type' => $fileType,
                        'file_path' => $filePath,
                    ]);
                }
            }
        }

        return redirect()->back();
    }

    public function updateCourses(Request $request)
    {
        $user = Auth::user();

        function processMultipleCourses($courses, $user, $type)
        {
            if (!empty($courses)) {
                foreach ($courses as $file) {
                    if ($file) {
                        $userFile = new UserFile();
                        $userFile->user_id = $user->id;
                        $userFile->name = $file->getClientOriginalName();
                        $userFile->file_path = $file->store('curriculums/' . $user->id);
                        $userFile->type = $type;

                        $userFile->save();
                    }
                }
            }
        }
        processMultipleCourses($request->file('courses'), $user, 'courses');

        return redirect()->back();
    }

    public function updateReceipts(Request $request)
    {
        $user = Auth::user();

        function processMultipleReceipts($receipts, $user, $type)
        {
            if (!empty($receipts)) {
                foreach ($receipts as $file) {
                    if ($file) {
                        $userFile = new UserFile();
                        $userFile->user_id = $user->id;
                        $userFile->name = $file->getClientOriginalName();
                        $userFile->file_path = $file->store('curriculums/' . $user->id);
                        $userFile->type = $type;

                        $userFile->save();
                    }
                }
            }
        }
        processMultipleReceipts($request->file('receipts'), $user, 'receipts');

        return redirect()->back();
    }

    public function fileDelete($id)
    {
        $file = UserFile::findOrFail($id);
        // dd($file->file_path);
        $filePath = storage_path('app/' . $file->file_path);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $file->delete();
    }

    public function userProcessSignUp(Request $request)
    {
        $user = Auth::user();
        // dd($request);
        Relation::create([
            'user_id' => $user->id,
            'process_id' => $request->input('process_id')
        ]);
    }

    public function user()
    {
        $user = auth()->user();

        return ['user' => $user];
    }
}
