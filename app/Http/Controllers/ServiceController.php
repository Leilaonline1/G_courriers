<?php
namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Request\ServiceRequest;
use Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $services = Service::paginate(5);

        return view('services.index', compact('services'));
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $services = Service::where('name', 'LIKE', '%'.$search_text.'%')->get();

        return view('services.search', compact('services'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $service = new Service();

        $service->libelle_s = $request->post('libelle_s');
        $service->save();

        session()->flash('Add', 'La service a été ajouté avec succés ');
        return back();
        return redirect(route('services.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service, Request $request)
    {
        $service->libelle_s = $request->post('libelle_s');
        $service->save();

        session()->flash('edit', ' La service a été modifié avec succes ');
        return back();
        return redirect(route('services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return back()
            ->with('info', $service->name . 'a été supprimé avec succée');
    }
}


