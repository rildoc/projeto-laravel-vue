<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Http\Requests\StoreUpdateCmsFormRequest;
use Illuminate\Support\Facades\Storage;

class CmsController extends Controller
{
    private $cms;

    private $path = 'products';


    public function __construct(Cms $cms)
    {
        $this->cms = $cms;

        $this->middleware('auth:api')->except([
            'index', 'show'
        ]);
    }

     public function index()
     {
         $conteudos = $this->cms->get();

         return response()->json($conteudos);
     }


     public function store(StoreUpdateCmsFormRequest $request)
     {

         $data = $request->all();

         if ($request->hasFile('logo') && $request->file('logo')->isValid()) {

                $name = kebab_case($request->name);
                $extension = $request->logo->extension();

                $nameFile = "{$name}.{$extension}";
                $data['logo'] = $nameFile;

                $upload = $request->logo->storeAs($this->path, $nameFile);

                if (!$upload)
                    return response()->json(['error' => 'Fail_Upload'], 500);
        }

        $conteudos = $this->cms->create($data);

        return response()->json($conteudos, 201);

     }


     public function update(StoreUpdateCmsFormRequest $request, $id)
     {
         if(!$conteudos = $this->cms->find($id))
            return response()->json(['error' => 'Not Found'], 404);

         $data = $request->all();

         if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
             if ($conteudos->logo) {
                if (Storage::exists("{$this->path}/{$conteudos->logo}"))
                    Storage::delete("{$this->path}/{$conteudos->logo}");
            }

            $name = kebab_case($request->name);
            $extension = $request->logo->extension();

            $nameFile = "{$name}.{$extension}";
            $data['logo'] = $nameFile;

            $upload = $request->logo->storeAs($this->path, $nameFile);

            if (!$upload)
                return response()->json(['error' => 'Fail_Upload'], 500);
        }

         $conteudos->update($data);

         return response()->json($conteudos);


     }

      public function show($id)
    {
         if(!$conteudos = $this->cms->find($id))
            return response()->json(['error' => 'Not Found'], 404);

        return response()->json($conteudos);
    }

     public function destroy($id)
    {
         if(!$conteudos = $this->cms->find($id))
            return response()->json(['error' => 'Not Found'], 404);


              if ($conteudos->logo) {
                if (Storage::exists("{$this->path}/{$conteudos->logo}"))
                    Storage::delete("{$this->path}/{$conteudos->logo}");
             }

        $conteudos->delete();

        return response()->json(['success' => true], 204);
    }
}
