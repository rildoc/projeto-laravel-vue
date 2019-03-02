<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\StoreUpdateBannerFormRequest;


class BannerController extends Controller
{
    private $banner, $totalPage = 10;

    public function __construct(Banner $banner){
        $this->banner  = $banner;

    }

    public function index() {

        $banners = $this->banner->paginate($this->totalPage);

        return response()->json($banners);

    }

    public function store(StoreUpdateBannerFormRequest $request) {

        $banner = $this->banner->create($request->all());

        return response()->json($banner, 201);

    }

    public function update(StoreUpdateBannerFormRequest $request , $id)
    {
        if (!$banner  = $this->banner->find($id))
              return response()->json(['error' => 'Not Found'], 404);

          $banner->update($request->all());

          return response()->json($banner, 200);
    }


}

