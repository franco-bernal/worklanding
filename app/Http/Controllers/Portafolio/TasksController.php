<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Proyects;
use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    //
    function homeProyects(Request $request)
    {
        // dd($request->ip());
        $proyects = Proyects::all();
        $page = Page::where('user', '=', 1)->first();
        return  view('tasks/home', compact('page', 'proyects'));
    }
    function viewProyect(Request $request)
    {

        $proyect = Proyects::select(
            'proyects.*'
        )
            ->where('proyects.id', '=', $request->id)
            ->orderBy('proyects.created_at', 'desc')
            ->with('tasks')
            ->first();

        // dd($proyect[0]->title);
        $id = $request->id;
        // $proyect = Proyects::where('id', '=', $id)->first();
        $page = Page::where('user', '=', 1)->first();
        return  view('tasks/proyect', compact('page', 'proyect'));
    }
    public function addProyect(Request $request)
    {
        if ($request->input('img_link') != "") {
            $nameLogo = $request->input('img_link');
        } else {
            $nameLogo = "https://microsofters.com/wp-content/uploads/2021/06/img21-scaled.jpg";
        }

        if (isset($request->favorite)) {
            $favorite = true;
        } else {
            $favorite = false;
        }
        // dd($request, $nameLogo);
        DB::table('proyects')->insert([
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "limit" => $request->input('limit'),
            "img_link" => $nameLogo,
            "favorite" => $favorite,
            "steps" => '[' . $request->input('steps') . ']',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function favoriteProyect(Request $request)
    {
        $id = $request->id;

        $toCheck = $request->favorite;
        if ($toCheck == "true") {
            $toCheck = 0;
        } else {
            // if ($toCheck == "false")
            $toCheck = 1;
        }

        $resp = DB::table('proyects')
            ->where('id', '=', $id)
            ->update([
                "favorite" => $toCheck,
                "updated_at" => Carbon::now(),
            ]);
        if ($resp == 1) {
            return $toCheck;
        } else {
            return -1;
        }
    }

    public function deleteProyect(Request $request)
    {
        $idDelete = $request->input('id');
        $resp = DB::table('proyects')
            ->select('proyects.*')
            ->Where('proyects.id', '=', $idDelete)->delete();

        return $this->homeProyects();
        // return view('vendedor', compact('resp'));
    }

    //TASK TASK
    public function addTask(Request $request)
    {
        $now = Carbon::now();
        $jsons = [];

        $resp = DB::table('tasks')->insert([
            "created_at" => $now,
            "updated_at" => $now,
            "name" => $request->name,
            "description" => "",
            "step" => $request->step,
            "subTasks" =>  json_encode($jsons),
            "checkLists" => json_encode($jsons),
            "comments" =>  json_encode($jsons),
            // "subTasks" =>  null,
            // "checkLists" => null,
            // "comments" =>  null,
            "proyect_id" => $request->id,
        ]);
        if ($resp) {
            $id = Tasks::select("id")
                ->where("name", "=", $request->name)
                ->where("proyect_id", "=", $request->id)
                ->where("created_at", "=", $now)
                ->first();
        } else {
            $id = null;
        }
        return $id;
    }
    function getTask(Request $request)
    {
        $task = Tasks::where("id", "=", $request->id)
            ->first();
        return $task;
    }
    public function deleteFromJson(Request $request)
    {
        $arra = [];
        $task = Tasks::where("id", "=", $request->task_id)
            ->first();


        if ($request->type == "subTasks") {
            $typeOfJson = json_decode($task->subTasks, true);
        }
        if ($request->type == "comments") {
            $typeOfJson = json_decode($task->comments, true);
        }
        if ($request->type == "checkLists") {
            $typeOfJson = json_decode($task->checkLists, true);
        }

        foreach ($typeOfJson as $key => $value) {
            if ($value['id'] != $request->id_subtask) {
                array_push($arra, $value);
            }
        }


        $resp = DB::table('tasks')
            ->where('id', '=', $request->task_id)
            ->update([
                $request->type => $arra,
                "updated_at" => Carbon::now(),
            ]);

        return $resp;
    }

    public function addToJson(Request $request)
    {
        $task = Tasks::where("id", "=", $request->task_id)
            ->first();
        $now = Carbon::now();


        if ($request->type == "subTasks") {
            $typeOfJson = json_decode($task->subTasks, true);
        }
        if ($request->type == "comments") {
            $typeOfJson = json_decode($task->comments, true);
        }
        if ($request->type == "checkLists") {
            $typeOfJson = json_decode($task->checkLists, true);
        }

        $maxId = 0;

        if ($typeOfJson != null) {

            foreach ($typeOfJson as $key => $value) {
                if ($value['id'] > $maxId) {
                    $maxId = $value['id'];
                }
            }
        } else {
            $typeOfJson = [];
        }

        $maxId++;

        $jsons = [
            'id' => $maxId,
            'detail' => $request->toAdd,
            'check' => false,
            'created_at' => Carbon::parse($now)->format('d-m-Y H:i'),
            'user' => Auth::user()->name,
        ];
        array_unshift($typeOfJson, $jsons);
        if ($request->type == "checkLists" || $request->type == "comments" || $request->type == "subTasks") {
            $resp = DB::table('tasks')
                ->where('id', '=', $request->task_id)
                ->update([
                    $request->type => $typeOfJson,
                    "updated_at" => Carbon::now(),
                ]);
            if ($resp == 1) {
                return ['id' => $maxId, 'user' => Auth::user()->name, 'created_at' => $now];
            } else {
                return -1;
            }
        } else {
            return -1;
        }
    }

    public function checkFromJson(Request $request)
    {
        $arra = [];
        $task = Tasks::where("id", "=", $request->task_id)
            ->first();


        if ($request->type == "subTasks") {
            $typeOfJson = json_decode($task->subTasks, true);
        }
        if ($request->type == "comments") {
            $typeOfJson = json_decode($task->comments, true);
        }
        if ($request->type == "checkLists") {
            $typeOfJson = json_decode($task->checkLists, true);
        }

        foreach ($typeOfJson as $key => $value) {
            if ($value['id'] == $request->id_subtask) {
                if ($value['check'] == true) {
                    $value['check'] = false;
                } else {
                    $value['check'] = true;
                }
                array_push($arra, $value);
            } else {
                array_push($arra, $value);
            }
        }

        // dd($request->id_subtask, $arra);
        $resp = DB::table('tasks')
            ->where('id', '=', $request->task_id)
            ->update([
                $request->type => $arra,
                "updated_at" => Carbon::now(),
            ]);

        return $resp;
    }
    public function editTaskDescription(Request $request)
    {
        $resp = DB::table('tasks')
            ->where('id', '=', $request->task_id)
            ->update([
                'description' => $request->description,
                "updated_at" => Carbon::now(),
            ]);
    }
    public function editTaskStep(Request $request)
    {
        $resp = DB::table('tasks')
            ->where('id', '=', $request->idTAsk)
            ->update([
                'step' => $request->step,
                "updated_at" => Carbon::now(),
            ]);
        return $resp;
    }
}
