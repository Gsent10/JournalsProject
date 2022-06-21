<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;

class JournalsController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'allJournals', 'about', 'dashboard']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journals = Journal::orderBy('updated_at', 'DESC')->take(3)->get();

        return view('index')->with('journals', $journals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allJournals()
    {
        return view('journals')->with('journals', Journal::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Get all journals on page load for Admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadAll(Request $request)
    {

        $journals = Journal::orderBy('updated_at', 'DESC')->get();

        return [
            'message' => 'Onload Return',
            'items' => $journals
        ];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'document'   => 'mimes:pdf',
            'name'     => 'required|string',
            'volume'     => 'required|string',
            'number'     => 'required|string',
            'publish_date'     => 'required',
            'abstract'     => 'required|string|unique:journals',
            'keywords'     => 'required',
        ]);

        $file = $request->file('document');

        $name = $request->name . '-' . $request->publish_date . '-'. $request->volume . '-' . $request->number . '.' . $file->extension();

        $move = $file->move(public_path('documents'), $name);


        $upload = Journal::create([
            'name' => $request->name,
            'abstract' => $request->abstract,
            'volume' => $request->volume,
            'number' => $request->number,
            'publish_date' => $request->publish_date,
            'doc_path' => $name,
            'keywords' => $request->keywords
        ]);

        $latest = Journal::orderBy('updated_at', 'DESC')->take(1)->get();

        if($upload) {
            return [
                'message' => 'Document Added Successfully',
                'latest' => $latest
            ];
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = 'File Successfully deleted';
        
        $latest = Journal::find($id);

        $delete = Journal::where('id', $id);

        
        $name = $latest->doc_path;
        $path = public_path('documents/' . $name);
        
        unlink($path);

        $success = $delete->delete();

        if($success){
            return [
                $message
            ];
        }
            
        


    }

    /**
     * 
     * About us Page
     * 
     */
    public function about()
    {
        return view('about');
    }

    /**
     * 
     * Admin us Page
     * 
     */
    public function admin()
    {
        return view('admin');
    }

    /**
     * 
     * Dashboard
     * 
     */
    public function dashboard()
    {
        return view('dashboard.admin');
    }
}
