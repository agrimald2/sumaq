<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\mae_materials;

class MaterialController extends Controller
{
    public function GetMaterials()
    {
        return mae_materials::all();
    }

    public function PostMaterials(Request $request){

       $images = $request->file('materials_image_url');
       
        $material=mae_materials::create([
            'materials_name'=>$request['materials_name'],
        ]);
        $cont = 0;
        foreach($images as $img){

            $custom_name = 'material-'.$material->materials_id.'-'.Str::uuid()->toString().'.'.$img->getClientOriginalExtension();
            if  ($cont === 0){
                $material->materials_image_url = $custom_name;
            }else{
                break;
            }
            $img->move(public_path().'/img_material',$custom_name);
            $material->update();
            $cont++;
        }

        if ($material==true) {
            return [ "status" => "success", "message" => "Categoria Creada con Exito"];
        }else{
            return [ "status" => "error", "message" => "Error al Registrar la Categoria"];
        }
    }
}
