<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Menu;
use App\Models\MenuGroup;
use Carbon\Carbon;
use Vinkla\Hashids\Facades\Hashids;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'         => 'Menu Lists',
            'mod'           => 'mod_menu',
            'backend_menu'  => Menu::where('type', 'Backend')->orderBy('position', 'ASC')->get(),
            'frontend_menu' => Menu::where('type', 'Frontend')->orderBy('position', 'ASC')->get()
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
            'title' => 'Create Menu',
            'mod' => 'mod_menu',
            'action' => '/administrator/menus/store',
            'menu_groups' => MenuGroup::all()
        ];
        return view('admin.'. $this->defaultLayout('menu.form'), $data);
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

            $validator = $this->__validate($request);

            if($validator->fails()){
                return response()->json([
                    'messages' => $validator->messages()
                ], 400);
            } else {

                try {
                    Menu::create([
                        'menu_group_id' => ($request->group == "null") ? null : $request->group,
                        'type'     => $request->type,
                        'title'     => $request->title,
                        'url'       => $request->url,
                        'icon'      => $request->icon,
                        'target'    => $request->target,
                        'position'  => $request->position,
                        'created_by'=> getInfoLogin()->id,
                        'created_at'=> Carbon::now()
                    ]);

                    return response()->json([
                        'messages'  => 'New menu successfuly created',
                        'redirect'  => '/administrator/menus'
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
            'title' => 'Edit Menu',
            'mod' => 'mod_menu',
            'action' => '/administrator/menus/'.$id.'/update',
            'menu_groups' => MenuGroup::all(),
            'menu' => Menu::find($ids[0])
        ];
        return view('admin.'. $this->defaultLayout('menu.form'), $data);
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

            $validator = $this->__validate($request);

            if($validator->fails()){
                return response()->json([
                    'messages' => $validator->messages()
                ], 400);
            } else {

                try {
                    Menu::where('id', $ids[0])->update([
                        'menu_group_id' => ($request->group == "null") ? null : $request->group,
                        'type'     => $request->type,
                        'title'     => $request->title,
                        'url'       => $request->url,
                        'icon'      => $request->icon,
                        'target'    => $request->target,
                        'position'  => $request->position,
                        'updated_by'=> getInfoLogin()->id,
                        'updated_at'=> Carbon::now()
                    ]);

                    return response()->json([
                        'messages'  => 'Menu successfuly updated',
                        'redirect'  => '/administrator/menus'
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
        //
    }

    private function __validate($request)
    {
        $validator = Validator::make($request->All(), [
            'title'      => 'required',
            'url'        => 'required',
            'position'   => 'required',
            'target'     => 'required',
            'type'       => 'required',
            'group'      => 'required',
        ]);
        return $validator;
    }
}
