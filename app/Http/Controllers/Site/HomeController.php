<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\UserAddress;
use App\Models\UserFile;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user()->load('relations');
        
        $fullName = Auth::user()->profile->name;
        $firstName = explode(' ', $fullName)[0];
        $processes = Process::all();

        return Inertia::render('Home', [
            'user' => $user,
            'name' => $firstName,
            'processes' => $processes
        ]);
    }


    public function firstLogin()
    {
        $cpfs = UserProfile::pluck('cpf');
        return Inertia::render('FirstLogin', [
            'cpfs' => $cpfs
        ]);
    }

    public function delete()
    { }

    public function registerProfile(Request $request)
    {
        // dd($request);

        $user = Auth::user();

        UserProfile::create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'birth_date' => $request->input('birth_date'),
            'mothers_name' => $request->input('mothers_name'),
            'cpf' => $request->input('cpf'),
            'identification_document' => $request->input('identification_document')
        ]);
        UserAddress::create([
            'user_id' => $user->id,
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code'),
            'address' => $request->input('address'),
            'number' => $request->input('number')
        ]);

        function processUpload($file, $user, $type)
        {
            if ($file) {
                $userFile = new UserFile();
                $userFile->user_id = $user->id;
                $userFile->name = $file->getClientOriginalName();
                $userFile->file_path = $file->store('curriculums/' . $user->id);
                $userFile->type = $type;

                $userFile->save();
            }
        }

        processUpload($request->file('education'), $user, 'education');
        processUpload($request->file('curriculum'), $user, 'curriculum');
        processUpload($request->file('certificate'), $user, 'certificate');
        processUpload($request->file('license'), $user, 'license');

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

        return redirect('/');
    }
}
