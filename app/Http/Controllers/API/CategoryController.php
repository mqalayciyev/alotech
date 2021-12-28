<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        $categories = $request->all();

        // Log::create([
        //     "content" => json_encode($categories)
        // ]);

        $errors = array();
        foreach ($categories as $category) {
            $validation = Validator::make($category, [
                'category_id' => 'required',
                'category_name' => 'required'
            ]);

            $error_array = array();
            if ($validation->fails()) {
                // return $validation->messages()->getMessages();
                foreach ($validation->messages()->getMessages() as $messages) {

                    $error_array[] = $messages[0];

                }
                $errors[$category['category_id']] = $error_array;
            }
            else{
                $data = array(
                    'category_name' => $category['category_name']
                );

                if(isset($category['top_id'])){
                    $data['top_id'] = $category['top_id'];
                }


                $data['slug'] = str_slug($category['category_name']);

                Category::updateOrCreate(
                    [ 'id' => $category['category_id']],
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
