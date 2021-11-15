<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdatePictureRequest;
use App\Http\Requests\FormationUpdateRequest;
use App\Models\Category;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::orderBy('updated_at', 'DESC')->get();
        return view('formations.list',  compact('formations'));
    }

    public function details($id)
    {
        $formation = Formation::find($id);
        $categories = Category::all();
        return view('formations.details', compact(['formation', 'categories']));
    }

    public function add()
    {
        $categories = Category::all();
        return view('formations.add', compact('categories'));
    }

    public function store(FormationStoreRequest $request)
    {
        $params = $request->validated();

        $file = Storage::put('public', $params['picture']);
        $params['picture'] = substr($file, 7);
        $params['user_id'] = auth()->user()->id;
        $formation = Formation::create($params);
        if(!empty($params['checkboxCategories'])){
            $formation->categories()->attach($params['checkboxCategories']);
        }
        return redirect()->route('formationList');
    }

    public function update($id, FormationUpdateRequest $request)
    {
        $params = $request->validated();
        $formation = Formation::find($id);
        $formation->update($params);
        $formation->categories()->detach();
        if(!empty($params['checkboxCategories'])){
            $formation->categories()->attach($params['checkboxCategories']);
        }

        return redirect()->route('formationDetails', $id);

    }

    public function updatePicture($id, FormationUpdatePictureRequest $request)
    {
        $params = $request->validated();
        $formation = Formation::find($id);

        if(Storage::exists("public/$formation->picture")){
            Storage::delete("public/$formation->picture");
        }
        $file = Storage::put('public', $params['picture']);
        $params['picture'] = substr($file, 7);
        $formation->picture = $params['picture'];
        $formation->save();
        return redirect()->route('formationDetails', $id);

    }

    public function delete($id)
    {
        $formation = Formation::find($id);
        if (Storage::exists("public/$formation->picture")){
            Storage::delete("public/$formation->picture");
        }
        $formation->delete();
        return redirect()->route('formationList');
    }


}
