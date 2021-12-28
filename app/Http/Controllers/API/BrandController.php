<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Brand;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brands = $request->all();

        // Log::create([
        //     "content" => json_encode($brands)
        // ]);

        $errors = array();
        foreach ($brands as $brand) {
            $validation = Validator::make($brand, [
                'brand_id' => 'required',
                'brand_name' => 'required'
            ]);

            $error_array = array();
            if ($validation->fails()) {
                // return $validation->messages()->getMessages();
                foreach ($validation->messages()->getMessages() as $messages) {

                    $error_array[] = $messages[0];

                }
                $errors[$brand['brand_id']] = $error_array;
            }
            else{
                $data = array(
                    'name' => $brand['brand_name']
                );

                $data['slug'] = str_slug($brand['brand_name']);

                Brand::updateOrCreate(
                    [ 'id' => $brand['brand_id']],
                    $data
                );
            }
        }
        if(count($errors)){
            Log::create([
                "content" => json_encode($errors)
            ]);
        }

        return response()->json(['status' => 'success', 'errors'=> $errors]);
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
        //
    }
}
