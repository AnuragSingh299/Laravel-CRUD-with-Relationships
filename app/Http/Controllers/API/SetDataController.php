<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\App;

use app\Models\Contact;

class SetDataController extends Controller
{
    private $modelPath;
    private $modelRepo;

    public function __construct(Request $request)
    {
        if (isset($request->module_name)) 
        {
            $this->modelPath = 'App\\Interfaces\\'.$request->module_name.'RepositoryInterface';
            //dd($request);
            $this->modelRepo = App::make($this->modelPath);
        }
    }
        
    public function create(Request $request)
    {
        $input = $request->input_request;
        $data = $this->modelRepo->create($input);
        $dataWithoutId = $data->makeHidden(["id"]);
        return response()->json(["module name" => $request->module_name, "id" => $data["id"], "data" => $dataWithoutId]);
    }

    public function index(Request $request)
    {
        $data = $this->modelRepo->all($request->select);
        return response()->json(["module name" => $request->module_name, "data" => $data]);
    }

    public function show(Request $request)
    {
        $data =  $this->modelRepo->find($request->id);
        $dataWithoutId = $data->makeHidden(["id"]);
        return response()->json(["module name" => $request->module_name, "id" => $data["id"], "data" => $dataWithoutId]);
    }

    public function update(Request $request)
    {
        $input = $request->input_request;
        $data = $this->modelRepo->update($request->id, $input);
        $dataWithoutId = $data->makeHidden(["id"]);
        return response()->json(["module name" => $request->module_name, "id" => $request->id, "data" => $dataWithoutId]);
    }

    public function destroy(Request $request)
    {
        $this->modelRepo->delete($request->id);  
        return response()->json([
            "message" => "deleted successfully"
        ]);      
    }
}
