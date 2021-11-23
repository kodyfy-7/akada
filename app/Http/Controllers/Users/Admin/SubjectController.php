<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\{
    Subject,
    Employee,
};

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject.index', compact('subjects'));
    }

    public function create()
    {
        $subject = new Subject();
        return view('admin.subject.create', compact('subject'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'subject_title' => ['required', 'string'],
            'sub_title' => ['required', 'string'],
        ]);

        $strlowsubjecttitle = strtolower($data['subject_title']);
        $slug = str_replace(' ', '-', $strlowsubjecttitle); 
        if (Subject::whereSubjectSlug($slug)->exists())
        {
            $slug = $slug.'-'.time();
        }

        Subject::create([
            'subject_title' => $data['subject_title'],
            'sub_title' => $data['sub_title'],
            'subject_slug' => $slug,
        ]);

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function edit(Subject $subject)
    {
        return view('admin.subject.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'subject_title' => ['required', 'string'],
            'sub_title' => ['required', 'string'],
        ]);

        if($request->input('subject_title') != $request->input('old_title')) {

            $strlowsubjecttitle = strtolower($data['subject_title']);
            $slug = str_replace(' ', '-', $strlowsubjecttitle); 
            if (Subject::whereSubjectSlug($slug)->exists())
            {
                $slug = $slug.'-'.time();
            }
        } else{
            $slug = $request->input('old_title');
        }

        Subject::whereId($id)->update([
            'subject_title' => $data['subject_title'],
            'sub_title' => $data['sub_title'],
            'subject_slug' => $slug,
        ]);

        return redirect('/admin/subjects/'.$slug.'/edit')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
