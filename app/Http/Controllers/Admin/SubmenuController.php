<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Submenu;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Menu;
use Carbon\Carbon;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'=> 'Sub Menu Lists',
            'mod'  => 'mod_submenu',
            'collection'  => Submenu::all()
        ];
        return view('admin.'. $this->defaultLayout, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'=> 'Create Sub Menu',
            'mod'  => 'mod_submenu',
            'action' => '/administrator/sub-menus/store',
            'menu_groups'   => Menu::all()
        ];
        return view('admin.'. $this->defaultLayout('submenu.form'), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Request::ajax()){
            $validator = Validator::make($request->All(), [
                'title'      => 'required',
                'url'        => 'required',
                'position'   => 'required',
                'target'     => 'required',
                'group'      => 'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    'messages' => $validator->messages()
                ], 400);
            } else {

                try {
                    Submenu::create([
                        'menu_id' => $request->group,
                        'title'     => $request->title,
                        'url'       => $request->url,
                        'target'    => $request->target,
                        'position'  => $request->position,
                        'created_by'=> getInfoLogin()->id,
                        'created_at'=> Carbon::now()
                    ]);

                    return response()->json([
                        'messages'  => 'New sub menu successfuly created',
                        'redirect'  => '/administrator/sub-menus'
                    ], 200);

                } catch (Exeption $e){
                    return response()->json([
                        'messages' => 'Opps! Something wrong.'
                    ], 409);
                }
            }
        } else {
            abort(403);
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
        $ids = Hashids::decode($id);
        $data = [
            'title'=> 'Edit Sub Menu',
            'mod'  => 'mod_submenu',
            'action' => '/administrator/sub-menus/'.$id.'/update',
            'menu_groups'   => Menu::all(),
            'sub_menu' => Submenu::find($ids[0])
        ];
        return view('admin.'. $this->defaultLayout('submenu.form'), $data);
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
        $ids = Hashids::decode($id);
        if(\Request::ajax()){
            $validator = Validator::make($request->All(), [
                'title'      => 'required',
                'url'        => 'required',
                'position'   => 'required',
                'target'     => 'required',
                'group'      => 'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    'messages' => $validator->messages()
                ], 400);
            } else {

                try {
                    Submenu::where('id', $ids[0])->update([
                        'menu_id' => $request->group,
                        'title'     => $request->title,
                        'url'       => $request->url,
                        'target'    => $request->target,
                        'position'  => $request->position,
                        'created_by'=> getInfoLogin()->id,
                        'created_at'=> Carbon::now()
                    ]);

                    return response()->json([
                        'messages'  => 'New sub menu successfuly updated',
                        'redirect'  => '/administrator/sub-menus'
                    ], 200);

                } catch (Exeption $e){
                    return response()->json([
                        'messages' => 'Opps! Something wrong.'
                    ], 409);
                }
            }
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Request::ajax()){
            try{
                $ids = Hashids::decode($id);
                Submenu::destroy($ids[0]);

                return response()->json([
                    'message' => 'Data has been deleted'
                ], 200);
            } catch(Exception $e) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 500);
            }
        } else {
            abort(403);
        }
    }
}
