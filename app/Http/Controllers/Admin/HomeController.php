<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant;
use App\Models\Subsidio;
use App\Models\City;
use App\Models\Mh;
use App\Models\Visit;
use App\Http\Requests\Admin\Visit\IndexVisit;
use App\Models\MediaDocument;
use App\Models\EducationLevel;
use App\Models\DocumentType;
use App\Models\ApplicantDocument;
use App\Models\ApplicantStatus;
use App\Models\ContactMethod;
use App\Models\ApplicantContactMethod;
use App\Http\Requests\StoreApplicantUser;
use App\Http\Requests\StoreApplicantUserDocument;
use App\Http\Requests\StoreApplicantUserConyuge;
use App\Http\Requests\UpdateApplicantUserConyuge;
use App\Http\Requests\UpdateApplicantUser;
use Illuminate\Support\Facades\Storage;

use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;


use Brackets\AdminListing\Facades\AdminListing;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        //$data = Mh::find(278);
        //return view('home', compact('data'));
        return view('admin.help.create');

    }


//   public function index(Request $request)
//     {
//         // create and AdminListing instance for a specific model and
//         $data = AdminListing::create(Mh::class)->processRequestAndGet(
//             // pass the request with params
//             $request,

//             // set columns to query
//             ['id', 'codigo', 'proyecto', 'documento', 'adjudicatario', 'fecha_ins', 'institucion_acreedora', 'obs', 'fecha_reins'],

//             // set columns to searchIn
//             ['codigo', 'proyecto', 'documento', 'adjudicatario', 'fecha_ins', 'institucion_acreedora', 'obs', 'fecha_reins']
//         );

//         if ($request->ajax()) {
//             if ($request->has('bulk')) {
//                 return [
//                     'bulkItems' => $data->pluck('id')
//                 ];
//             }
//             return ['data' => $data];
//         }

//         return view('formulario.mh.index', ['data' => $data]);

//     }




}
