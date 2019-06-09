<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Mapping;
use App\Models\Address;
use App\Models\Locale;

class MappingRepository
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        try
        {

            $locale = Locale::create([
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
            ]);

            $address = $locale->address()->create([
                'street' => $request->street,
                'number' =>  $request->number,
                'district' =>  $request->district,
                'city' =>  $request->city,
                'state' =>  $request->state,
                'locale_id' =>  $locale->id
            ]);
            
            $mapping = Mapping::create([
                'users_id' => $request->user_id,
                'mapping_types_id' => $request->mapping_type_id,
                'address_id' => $address->id
            ]);
                

            $mappings = Mapping::with('mapping_types', 'address')->get();

            return $mappings->toJson();
        }
        catch(Exception $e)
        {
            return response()->json(['Erro', 500]);
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
        //
    }
}
