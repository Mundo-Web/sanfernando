<?php

namespace App\Http\Controllers;

use App\Helpers\EmailConfig;
use App\Http\Requests\StoreIndexRequest;
use App\Http\Requests\UpdateIndexRequest;
use App\Models\AboutUs;
use App\Models\Address;
use App\Models\Attemp;
use App\Models\AttempDetail;
use App\Models\AttempSimulation;
use App\Models\AttempSimulationDetail;
use App\Models\Attributes;
use App\Models\AttributesValues;
use App\Models\Blog;
use App\Models\General;
use App\Models\Index;
use App\Models\Message;
use App\Models\Products;
use App\Models\Slider;
use App\Models\Strength;
use App\Models\Testimony;
use App\Models\Category;
use App\Models\ExamSimulation;
use App\Models\Faqs;
use App\Models\Galerie;
use App\Models\Major;
use App\Models\Module;
use App\Models\Offer;
use App\Models\PolyticsCondition;
use App\Models\Price;
use App\Models\ResourceList;
use App\Models\Resources;
use App\Models\SaleDetail;
use App\Models\Specifications;
use App\Models\Staff;
use App\Models\Tag;
use App\Models\TagResource;
use App\Models\TermsAndCondition;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Wishlist;
use Culqi\Culqi;
use Culqi\Resource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use SoDe\Extend\Response;

class IndexController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $sliders = Slider::where('status',  1)->where('visible',  1)->get()->toArray();
    $popularProducts = Products::where('products.destacar', '=', 1)->where('products.status', '=', 1)
      ->where('visible', '=', 1)->with(['tags', 'category'])->activeDestacado()->take(6)->get();
    $benefit = Strength::where('status', '=', 1)->take(9)->get();
    $testimonies = Testimony::where('status', '=', 1)->where('visible', '=', 1)->get();
    $recursos = Resources::where('status', '=', 1)->where('visible', '=', 1)->orderBy('created_at', 'desc')->take(4)->get();

    $blogs = Blog::where('status', '=', 1)->where('visible', '=', 1)->with('categories')->orderBy('id', 'desc')->take(3)->get();

    $aboutUs = AboutUs::whereIn('titulo', ['TITULO-NOSOTROS', 'DESCRIPCION-NOSOTROS', 'DESCRIPCIONSECOND-NOSOTROS', 'IMAGEN-NOSOTROS'])->get();
    $general = General::first();

    return Inertia::render('Home', [
      'url_env' => env('APP_URL'),
      'popularProducts' => $popularProducts,
      'sliders' => $sliders,
      'recursos' => $recursos,
      'benefit' =>  $benefit,
      'testimonies' => $testimonies,
      'aboutUs' => $aboutUs,
      'general' => $general,
      'blogs' => $blogs
    ])->rootView('app');

    // return view('public.index', compact('url_env', 'popups', 'banners', 'blogs', 'categoriasAll', 'productosPupulares', 'ultimosProductos', 'productos', 'destacados', 'descuentos', 'general', 'benefit', 'faqs', 'testimonie', 'slider', 'categorias', 'category'));
  }

  public function cursosyDiplomados()
  {
    $Wishlist = [];
    $productos =  Products::with(['tags', 'galeria', 'category'])->where('status', 1)->take(12)->get();

    $categorias = Category::select('categories.id', 'categories.name', 'categories.visible')
      ->with(['subcategories'])
      ->join('products', 'products.categoria_id', 'categories.id')
      ->where('categories.visible', 1)
      ->where('products.status', 1)
      ->groupBy('categories.id', 'categories.name', 'categories.visible')
      ->get();

    //check if user is logged in
    $userIsLogged = Auth::check();
    if ($userIsLogged) {
      $user = Auth::user();
      $Wishlist = Wishlist::where('user_id', $user->id)->with(['products', 'products.docentes'])->get();
    }



    return Inertia::render(
      'CatalogGP',
      [
        'productos' => $productos,
        'env_url' => env('APP_URL'),
        'userIsLogged' => $userIsLogged,
        'Wishlist' => $Wishlist,
        'categorias' => $categorias
      ]
    )->rootView('app');
  }




  public function simulacros()
  {

    $productos =  Products::with(['tags', 'galeria', 'category'])->where('status', 1)->take(12)->get();

    $categorias = Category::with(['subcategories'])
      ->select('categories.id', 'categories.name', 'categories.visible')
      ->join('products', 'products.categoria_id', 'categories.id')
      ->where('categories.visible', 1)
      ->where('products.status', 1)
      ->groupBy('categories.id', 'categories.name', 'categories.visible')
      ->get();

    //check if user is logged in
    $userIsLogged = Auth::check();
    if ($userIsLogged) {
      $user = Auth::user();
    }

    return Inertia::render(
      'CatalogoSimulacro',
      [
        'productos' => $productos,
        'env_url' => env('APP_URL'),
        'userIsLogged' => $userIsLogged,
        'categorias' => $categorias
      ]
    )->rootView('app');
  }

  public function detalleCurso(string $id)
  {
    $producto = Products::with(['tags', 'galeria', 'category', 'docentes'])->where('id', $id)->first();
    $modules = Module::select([
      'name',
      'duration',
      'order',
      'type'
    ])
      ->withCount(['sources'])
      ->where('course_id', $producto->id)
      ->get();
    return Inertia::render('CursoDetalle', [
      'producto' => $producto,
      'modules' => $modules,
      'url_env' => env('APP_URL')

    ])->rootView('app');
  }

  public function docente()
  {
    $cursos = Major::where('status', 1)
      ->where('visible', 1)
      ->whereHas('staff')
      ->get();

    $docentes = Staff::where('status', 1)->get();
    return Inertia::render('Docente', [
      'docentes' => $docentes,
      'cursos' => $cursos
    ])->rootView('app');
  }

  public function docenteDetalle(string $id)
  {
    $docente = Staff::where('id', $id)->with(['productos', 'productos.category'])->first();
    $cursos = Staff::find($id)->productos()->where('status', 1)->get()->toArray();



    return Inertia::render('DocenteDetalle', ['docente' => $docente])->rootView('app');
  }

  public function nosotros()
  {
    $aboutUs = AboutUs::all();
    $testimonies = Testimony::where('status', '=', 1)->where('visible', '=', 1)->get();
    return Inertia::render('Nosotros', [
      'aboutUs' => $aboutUs,
      'testimonies' => $testimonies,
    ])->rootView('app');
  }

  public function contacto()
  {
    $general = General::first();
    $aboutUs = AboutUs::all();
    $faqs = Faqs::where('status', '=', 1)->where('visible', '=', 1)->orderBy('created_at', 'desc')->get();
    return Inertia::render('Contacto', [
      'general' => $general,
      'faqs' => $faqs,
      'aboutUs' => $aboutUs,
    ])->rootView('app');
  }

  public function desarrolloCurso(Request $request, string $courseUUID, string $moduleId)
  {
    $courseJpa = Products::where('uuid', $courseUUID)->first();
    if (!$courseJpa) return redirect('/micuenta');

    if (!SaleDetail::where('product_id', $courseJpa->id)->where('user_id', Auth::user()->id)->exists()) return redirect('/micuenta');

    $modulesJpa = Module::select(['modules.*'])
      ->with(['sources'])
      ->join('products AS course', 'course.id', 'modules.course_id')
      ->where('course.uuid', $courseUUID)
      ->get();
    $moduleJpa = Module::select(['modules.*'])
      ->with(['sources'])
      ->withCount(['questions', 'attemps'])
      ->find($moduleId);
    $attemps = Attemp::select()
      ->with('evaluation')
      ->where('course_id', $courseJpa->id)
      ->where('user_id', Auth::user()->id)
      ->get();

    // $attemps->map(fn($attemp) => $attemp->getScore());

    return Inertia::render('CursoDesarrollo', [
      'course' => $courseJpa,
      'modules' => $modulesJpa,
      'module' => $moduleJpa,
      'attemps' => $attemps
    ])->rootView('app');
  }

  public function evaluationFinished(Request $request, string $attempId)
  {
    $attempJpa = Attemp::with(['evaluation.course'])->find($attempId);
    // $attempJpa->getScore();

    $attempsCount = Attemp::where('user_id', Auth::user()->id)
      ->where('course_id', $attempJpa->evaluation->course->id)
      ->count();
    return Inertia::render('EvaluationFinished', [
      'attemp' => $attempJpa,
      'evaluation' => $attempJpa->evaluation,
      'course' => $attempJpa->evaluation->course,
      'attempsCount' => $attempsCount,
    ])->rootView('app');
  }



  public function evaluation(Request $request, string $evaluationId)
  {
    $evaluation = Module::with(['course', 'questions', 'questions.answers'])
      ->where('type', 'final-exam')
      ->where('id', $evaluationId)
      ->first();

    if (!$evaluation) return \redirect('/micuenta');

    $attemp = Attemp::select()
      ->where('evaluation_id', $evaluation->id)
      ->where('user_id', Auth::user()->id)
      ->orderBy('created_at', 'DESC')
      ->first();

    if (!$attemp) return redirect("/micuenta/session/{$evaluation->course->uuid}/{$evaluation->id}");

    $questions = $evaluation->questions->map(function ($question) use ($attemp) {
      $question->random_answers = $question->randomAnswers();
      $isDone = AttempDetail::where('question_id', $question->id)
        ->where('attemp_id', $attemp->id)
        ->exists();
      $question->done = $isDone;
      unset($question->answers);
      return $question;
    });

    return Inertia::render('Evaluation', [
      'evaluation' => $evaluation,
      'questions' => $questions,
      'attemp' => $attemp
    ])->rootView('app');
  }


  public function simulacro(Request $request, string $examId)
  {

    $courseJpa = Products::where('examsimulation_id', $examId)->first();

    if (!$courseJpa) return redirect('/micuenta');

    if (!SaleDetail::where('product_id', $courseJpa->id)->where('user_id', Auth::user()->id)->exists()) return redirect('/micuenta');

    $evaluation = ExamSimulation::with('questions')
      ->where('id', $examId)
      ->withCount('questions')
      ->first();

    if (!$evaluation) return \redirect('/micuenta');


    $attemp = AttempSimulation::select()
      ->where('evaluation_id', $evaluation->id)
      ->where('user_id', Auth::user()->id)
      ->orderBy('created_at', 'DESC')
      ->first();

    $attemps = AttempSimulation::select()
      ->with('evaluation')
      ->where('course_id', $evaluation->id)
      ->where('user_id', Auth::user()->id)
      ->get();


    return Inertia::render('SimulacroDesarrollo', [
      'evaluation' => $evaluation,
      'course' => $courseJpa,
      'attemp' => $attemp,
      'attemps' => $attemps
    ])->rootView('app');
  }


  public function simulacroDesarrollo(Request $request, string $evaluationId)
  {



    $evaluation = Products::where('examsimulation_id', $evaluationId)->first();

    $examen = ExamSimulation::with('questions')
      ->where('id', $evaluationId)
      ->first();

    if (!$evaluation) return \redirect('/micuenta');

    $attemp = AttempSimulation::select()
      ->where('evaluation_id', $examen->id)
      ->where('user_id', Auth::user()->id)
      ->orderBy('created_at', 'DESC')
      ->first();

    if (!$attemp) return redirect("/micuenta/simulation/{$evaluationId}");

    $questions = $examen->questions->map(function ($question) use ($attemp) {
      $question->random_answers = $question->randomAnswers();
      $isDone = AttempSimulationDetail::where('question_id', $question->id)
        ->where('attemp_id', $attemp->id)
        ->exists();
      $question->done = $isDone;
      unset($question->answers);
      return $question;
    });

    return Inertia::render('ExamenDesarrollo', [
      'evaluation' => $evaluation,
      'questions' => $questions,
      'attemp' => $attemp
    ])->rootView('app');
  }


  public function simulacroTerminado(Request $request, string $attempId)
  {

    $attempJpa = AttempSimulation::with(['course', 'evaluation'])->find($attempId);

    $totalpuntaje = $this->calculateTotalScore($attempJpa);

    $attempsCount = AttempSimulation::where('user_id', Auth::user()->id)
      ->where('course_id', $attempJpa->course->id)
      ->count();

    return Inertia::render('SimulacroTerminado', [
      'attemp' => $attempJpa,
      'evaluation' => $attempJpa->evaluation,
      'course' => $attempJpa->course,
      'attempsCount' => $attempsCount,
      'totalpuntaje' => $totalpuntaje
    ])->rootView('app');
  }

  private function calculateTotalScore($attempJpa)
  {
    $totalScore = 0;
    foreach ($attempJpa->details as $detail) {
      if ($detail->is_correct) {
        $totalScore += $detail->points;
      }
    }
    return $totalScore;
  }


  public function dashDocente()
  {
    return Inertia::render('DashboardDocente')->rootView('dashboard');
  }

  public function dashEstudiante()
  {
    $session = Auth()->user();
    $general = General::first();
    $finishedCourses = Attemp::select([
      DB::raw('DISTINCT course_id'),
      'attemps.id',
    ])
      ->where('finished', true)
      ->where('user_id', Auth::user()->id)
      ->get();

    $courses = Products::byUser(Auth::user()->id)->get();
    $Wishlist = Wishlist::where('user_id', $session->id)->with(['products', 'products.docentes'])->get();

    return Inertia::render('DashboardEstudiante', [
      'session' => $session,
      'general' => $general,
      'finishedCourses' => $finishedCourses,
      'courses' => $courses,
      'Wishlist' => $Wishlist
    ])->rootView('dashboard');
  }

  public function diploma()
  {
    return Inertia::render('Diploma')->rootView('app');
  }
  // public function catalogo(Request $request, string $id_cat = null)
  // {
  //   $tag_id = null;
  //   $tag_id = $request->input('tag');

  //   $catId = $request->input('category');
  //   $subCatId = $request->input('subcategoria');
  //   $tag_id = $request->input('tag');
  //   $id_cat = $id_cat ?? $catId;

  //   // $categories = Category::with('subcategories')->where('visible', true)->get();
  //   $categories = Category::with(['subcategories' => function ($query) {
  //     $query->whereHas('products');
  //   }])->where('visible', true)->get();

  //   $tags = Tag::where('visible', true)->get();

  //   $minPrice = Products::select()
  //     ->where('visible', true)
  //     ->where('descuento', '>', 0)
  //     ->min('descuento');
  //   if ($minPrice) Products::where('visible', true)->min('precio');
  //   $maxPrice = Products::max('precio');

  //   $attribute_values = AttributesValues::select('attributes_values.*')
  //     ->with('attribute')
  //     ->join('attributes', 'attributes.id', '=', 'attributes_values.attribute_id')
  //     ->where('attributes_values.visible', true)
  //     ->where('attributes.visible', true)
  //     ->get();

  //   return Inertia::render('Catalogo', [
  //     'component' => 'Catalogo',
  //     'minPrice' => $minPrice,
  //     'maxPrice' => $maxPrice,
  //     'categories' => $categories,
  //     'tags' => $tags,
  //     'attribute_values' => $attribute_values,
  //     'id_cat' => $id_cat,
  //     'tag_id' => $tag_id,
  //     'subCatId' => $subCatId
  //   ])->rootView('app');
  // }

  public function ofertas(Request $request, string $id_cat = null)
  {
    $subCatId = $request->input('subcategoria');

    // $categories = Category::where('visible', true)->get();

    $categories = Category::with(['subcategories' => function ($query) {
      $query->whereHas('products');
    }])->where('visible', true)->get();

    $tags = Tag::where('visible', true)->get();

    $minPrice = Products::select()
      ->where('visible', true)
      ->where('descuento', '>', 0)
      ->min('descuento');
    if ($minPrice) Products::where('visible', true)->min('precio');
    $maxPrice = Products::max('precio');

    $attribute_values = AttributesValues::select('attributes_values.*')
      ->with('attribute')
      ->join('attributes', 'attributes.id', '=', 'attributes_values.attribute_id')
      ->where('attributes_values.visible', true)
      ->where('attributes.visible', true)
      ->get();

    return Inertia::render('Catalogo', [
      'component' => 'Ofertas',
      'minPrice' => $minPrice,
      'maxPrice' => $maxPrice,
      'categories' => $categories,
      'tags' => $tags,
      'attribute_values' => $attribute_values,
      'id_cat' => $id_cat
    ])->rootView('app');
  }



  public function comentario()
  {
    $comentarios = Testimony::where('status', '=', 1)->where('visible', '=', 1)->paginate(15);
    $categorias = Category::all();
    $contarcomentarios = count($comentarios);
    $url_env = env('APP_URL');
    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();
    return view('public.comentario', compact('comentarios', 'contarcomentarios', 'url_env', 'categorias', 'destacados'));
  }

  public function hacerComentario(Request $request)
  {
    $user = auth()->user();

    $newComentario = new Testimony();
    if (isset($user)) {
      $alert = null;
      $request->validate([
        'testimonie' => 'required',
      ], [
        'testimonie.required' => 'Ingresa tu comentario',
      ]);

      $newComentario->name = $user->name;
      $newComentario->testimonie = $request->testimonie;
      $newComentario->visible = 0;
      $newComentario->status = 1;
      $newComentario->email = $user->email;
      $newComentario->save();

      $mensaje = "Gracias. Tu comentario pasará por una validación y será publicado.";
      $alert = 1;
    } else {
      $alert = 2;
      $mensaje = "Inicia sesión para hacer un comentario";
    }

    return redirect()->route('comentario')->with(['mensaje' => $mensaje, 'alerta' => $alert]);
  }

  // public function contacto()
  // {
  //   $general = General::first();
  //   $categorias = Category::all();
  //   $url_env = env('APP_URL');
  //   $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
  //     ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();

  //   return view('public.contact', compact('general', 'url_env', 'categorias', 'destacados'));
  // }

  public function carrito()
  {
    //
    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();
    $categorias = Category::all();
    $url_env = env('APP_URL');
    return view('public.checkout_carrito', compact('url_env', 'categorias', 'destacados'));
  }

  public function pago()
  {
    //
    $detalleUsuario = [];
    $user = auth()->user();

    if (!is_null($user)) {
      $detalleUsuario = UserDetails::where('email', $user->email)->get();
    }

    // $departamento = DB::select('select * from departments where active = ? order by 2', [1]);
    $departments = Price::select([
      'departments.id AS id',
      'departments.description AS description',
    ])
      ->join('districts', 'districts.id', 'prices.distrito_id')
      ->join('provinces', 'provinces.id', 'districts.province_id')
      ->join('departments', 'departments.id', 'provinces.department_id')
      ->where('departments.active', 1)
      ->where('status', 1)
      ->groupBy('id', 'description')
      ->get();

    $provinces = Price::select([
      'provinces.id AS id',
      'provinces.description AS description',
      'provinces.department_id AS department_id'
    ])
      ->join('districts', 'districts.id', 'prices.distrito_id')
      ->join('provinces', 'provinces.id', 'districts.province_id')
      ->where('provinces.active', 1)
      ->groupBy('id', 'description', 'department_id')
      ->get();

    $districts = Price::select([
      'districts.id AS id',
      'districts.description AS description',
      'districts.province_id AS province_id',
      'prices.id AS price_id',
      'prices.price AS price'
    ])
      ->join('districts', 'districts.id', 'prices.distrito_id')
      ->where('districts.active', 1)
      ->groupBy('id', 'description', 'province_id', 'price', 'price_id')
      ->get();

    // $distritos  = DB::select('select * from districts where active = ? order by 3', [1]);
    // $provincias = DB::select('select * from provinces where active = ? order by 3', [1]);

    $categorias = Category::all();

    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();


    $url_env = env('APP_URL');
    $culqi_public_key = env('CULQI_PUBLIC_KEY');

    $addresses = [];
    $hasDefaultAddress = false;
    if (Auth::check()) {
      $addresses = Address::with([
        'price',
        'price.district',
        'price.district.province',
        'price.district.province.department'
      ])
        ->where('email', $user->email)
        ->get();
      $hasDefaultAddress = Address::where('email', $user->email)
        ->where('isDefault', true)
        ->exists();
    }

    return view('public.checkout_pago', compact('url_env', 'districts', 'provinces', 'departments', 'detalleUsuario', 'categorias', 'destacados', 'culqi_public_key', 'addresses', 'hasDefaultAddress'));
  }

  public function procesarPago(Request $request)
  {
    $response = new Response();
    $culqi = new Culqi(['api_key' => env('CULQI_PRIVATE_KEY')]);
    try {

      $charge = $culqi->Charges->create([
        "amount" => 1000,
        "capture" => true,
        "currency_code" => "PEN",
        "description" => "Compra en " . env('APP_NAME'),
        "email" => "test@culqi.com",
        "installments" => 0,
        "antifraud_details" => array(
          "address" => "Av. Lima 123",
          "address_city" => "LIMA",
          "country_code" => "PE",
          "first_name" => "Test_Nombre",
          "last_name" => "Test_apellido",
          "phone_number" => "9889678986",
        ),
        "source_id" => "{token_id o card_id}"
      ]);
      $response->status = 200;
      $response->message = 'El cargo se ha generado correctamente';
    } catch (\Throwable $th) {
      $response->status = 400;
      $response->message = $th->getMessage();
    } finally {
      return response($response->toArray(), $response->status);
    }
    $codigoAleatorio = '';
    $mensajes2compra = [
      'email.required' => 'El campo Email es obligatorio.',
      'nombre.required' => 'El campo Nombre es obligatorio.',
      'apellidos.required' => 'El campo Email es obligatorio.',
      'departamento_id.required ' => 'Seleccione un Departamento es obligatorio.',
      'provincia_id.required' => 'Seleccione una Provincia es obligatorio.',
      'distrito_id.required' => 'Seleccione un Distrito obligatorio.',
      'dir_av_calle.required' => 'El campo Avenida/Calle obligatorio.',
      'dir_numero.required' => 'El campo Numero es obligatorio.'
    ];

    try {
      $reglasPrimeraCompra = [
        'email' => 'required',
      ];
      $mensajes = [
        'email.required' => 'El campo Email es obligatorio.',

      ];
      $request->validate($reglasPrimeraCompra, $mensajes);

      $email = $request->email;
      $existeUser = UserDetails::where('email', $email)->get()->toArray();

      if (count($existeUser) === 0) {
        UserDetails::create($request->all());
        $datos = $request->all();
        $codigoAleatorio = $this->codigoVentaAleatorio();
        $this->guardarOrden();
        $this->envioCorreoCompra($datos);
        return response()->json(['message' => 'Data procesada correctamente', 'codigoCompra' => $codigoAleatorio],);
      } else {
        $existeUsuario = User::where('email', $email)->get()->toArray();

        if ($existeUsuario) {
          $validator = Validator::make($request->all(), [
            'email' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'departamento_id' => 'required',
            'provincia_id' => 'required',
            'distrito_id' => 'required',
            'dir_av_calle' => 'required',
            'dir_numero' => 'required',
            'dir_bloq_lote' => 'required',
            // Otras reglas de validación
          ]);

          if ($validator->fails()) {
            // Aquí puedes manejar el error como desees, por ejemplo, devolver una respuesta con los errores
            return response()->json(['errors' => $validator->errors()], 422);
          } else {
            $datos = $request->all();
            //Procesar Compra
            $userdetailU = UserDetails::where('email', $email)->first();
            $userdetailU->update($request->all());

            $codigoAleatorio = $this->codigoVentaAleatorio();
            $this->guardarOrden();
            $this->envioCorreoCompra($datos);
            return response()->json(['message' => 'Todos los datos estan correctos', 'codigoCompra' => $codigoAleatorio],);
          }
        } else {
          return response()->json(['errors' => 'Por favor registrese e inicie session '], 422);
        }
      }
    } catch (\Throwable $th) {
      //throw $th;
      return response()->json(['message' => $th], 400);
    }
  }

  private function guardarOrden()
  {
    //almacenar venta, generar orden de pedido , guardar en tabla detalle de compra, li
  }

  private function codigoVentaAleatorio()
  {
    $codigoAleatorio = '';

    // Longitud deseada del código
    $longitudCodigo = 10;

    // Genera un código aleatorio de longitud 10
    for ($i = 0; $i < $longitudCodigo; $i++) {
      $codigoAleatorio .= mt_rand(0, 9); // Agrega un dígito aleatorio al código
    }
    return $codigoAleatorio;
  }

  public function agradecimiento(Request $request)
  {
    if (!$request->code) return redirect('/');

    $categorias = Category::all();
    return view('public.checkout_agradecimiento')
      ->with('categorias', $categorias)
      ->with('code', $request->code);
  }

  public function cambiofoto(Request $request)
  {


    $user = User::findOrFail($request->id);

    if ($request->hasFile("image")) {

      $file = $request->file('image');
      $route = 'storage/images/users/';
      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

      if (File::exists(storage_path() . '/app/public/' . $user->profile_photo_path)) {
        File::delete(storage_path() . '/app/public/' . $user->profile_photo_path);
      }

      $this->saveImg($file, $route, $nombreImagen);

      $routeforshow = 'images/users/';
      $user->profile_photo_path = $routeforshow . $nombreImagen;

      $user->save();

      return response()->json(['message' => 'La imagen se cargó correctamente.']);
    }
  }

  public function actualizarPerfil(Request $request)
  {

    $name = $request->name;
    $lastname = $request->lastname;
    $email = $request->email;
    $phone = $request->phone;
    $user = User::findOrFail($request->id);

    $imprimir = '';
    $imrimirPassword = '';

    if ($request->password !== null || $request->newpassword !== null || $request->confirmnewpassword !== null) {
      if (!Hash::check($request->password, $user->password)) {
        $imrimirPassword = "La contraseña actual no es correcta";
        $alert = "error";
      } else {
        $user->password = Hash::make($request->newpassword);
        $imrimirPassword = "Cambio de contraseña exitosa";
        $alert = "success";
      }
    }


    if ($user->name == $name &&  $user->lastname == $lastname && $user->email == $email && $user->phone == $phone) {
      $imprimir = "Sin datos que actualizar";
      $alert = "question";
    } else {
      $user->name = $name;
      $user->lastname = $lastname;
      $user->email = $email;
      $user->phone = $phone;
      $alert = "success";
      $imprimir = "Datos actualizados";
    }
    if ($request->hasFile("image")) {

      $file = $request->file('image');
      $route = 'storage/images/users/';
      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

      if (File::exists(storage_path() . '/app/public/' . $user->profile_photo_path)) {
        File::delete(storage_path() . '/app/public/' . $user->profile_photo_path);
      }

      $this->saveImg($file, $route, $nombreImagen);

      $routeforshow = 'images/users/';
      $user->profile_photo_path = $routeforshow . $nombreImagen;
    }


    $user->save();
    return response()->json(['message' => "Datos Personales: $imprimir, Contraseña: $imrimirPassword ", 'alert' => $alert]);
  }

  public function micuenta()
  {
    $user = Auth::user();
    $categorias = Category::all();
    return view('public.dashboard', compact('user', 'categorias'));
  }


  public function pedidos()
  {
    $user = Auth::user();
    $categorias = Category::all();
    $statuses = [];
    return view('public.dashboard_order',  compact('user', 'categorias', 'statuses'));
  }

  public function listadeseos()
  {
    $user = Auth::user();


    $usuario = User::find($user->id);

    $wishlistItems = $usuario->wishlistItems()->with('products')->get();
    $arrayWishlist = $wishlistItems->toArray();
    $array = [];
    foreach ($arrayWishlist as $key => $value) {
      $array[] = $value['products']['id'];
    }


    $productos = Products::with('tags')->whereIn('id', $array)->get();
    return view('public.dashboard_wishlist', compact('user', 'wishlistItems', 'productos'));
  }

  public function searchDocente(Request $request)
  {
    $query = $request->input('query');
    $cursoSeleccionados =  $request->input('curse');
    $order = $request->input('order');


    $resultados = Staff::with('majors')->select('staff.*')
      ->where('status', 1);

    if (!empty($query)) {
      $resultados = $resultados->where('nombre', 'like', "%$query%");
    }

    if (!empty($cursoSeleccionados)) {
      $categoriaSplit = array_filter(explode(',', $cursoSeleccionados));
      if (!empty($categoriaSplit)) {
        $resultados = $resultados->whereIn('staff.major_id', $categoriaSplit);
      }
    }

    // if (isset($cursoSeleccionados)) {
    //     $cursosSplit = array_map('intval', explode(',', $cursoSeleccionados));

    //     if (count($cursosSplit) > 0) {
    //       $query = DB::table('staff_xproducts')->select('staff_id')->whereIn('producto_id', $cursosSplit)->get()->pluck('staff_id')->unique();
    //       $resultados = $resultados->whereIn('staff.id', $query);
    //     }
    // }

    $orderMapping = [
      'a-z' => ['column' => 'nombre', 'direction' => 'asc'],
      'z-a' => ['column' => 'nombre', 'direction' => 'desc'],
      'ultimos' => ['column' => 'created_at', 'direction' => 'desc'],
    ];

    $orderConfig = $orderMapping[$order] ?? ['column' => 'created_at', 'direction' => 'asc'];
    $resultados = $resultados->orderBy($orderConfig['column'], $orderConfig['direction']);

    $totalCount = 0;

    if ($request->requireTotalCount) {
      $totalCount = $resultados->count('*');
    }

    $resultados = $resultados->skip($request->skip ?? 0)
      ->take($request->take ?? 10)
      ->get();

    return response()->json(['resultado' => $resultados, 'totalCount' =>  $totalCount]);
  }

  public function searchResource(Request $request)
  {
    $query = $request->input('query');
    $order = $request->input('order');
    $tag = $request->input('tag');

    $resultados = Resources::select('resources.*')
      ->where('name', 'like', "%$query%")
      ->where('status', 1)
      ->where('visible', 1);

    if (isset($tag) && $tag !== 'todos') {
      $idtag = ResourceList::where('name', '=', $tag)->first();

      if ($idtag) {
        $tagsxProducts = TagResource::where('etiqueta', $idtag->id)->get()->pluck('id_resource');
        $resultados = $resultados->whereIn('resources.id', $tagsxProducts);
      }
    }

    switch ($order) {
      case 'a-z':
        $resultados = $resultados->orderBy('name', 'asc');
        break;
      case 'z-a':
        $resultados = $resultados->orderBy('name', 'desc');
        break;
      case 'ultimos':
        $resultados = $resultados->orderBy('created_at', 'desc');
        break;
      default:
        // Default ordering if no valid order is provided
        $resultados = $resultados->orderBy('created_at', 'asc');
        break;
    }

    $totalCount = 0;

    if ($request->requireTotalCount) {
      $totalCount = $resultados->count('*');
    }

    $resultados = $resultados->skip($request->skip ?? 0)
      ->take($request->take ?? 10)
      ->get();

    return response()->json(['resultado' => $resultados, 'totalCount' =>  $totalCount]);
  }


  public function searchProduct(Request $request)
  {
    $query = $request->input('query');
    $order = $request->input('order');
    $categoria =  $request->input('category');
    $subcategoria =  $request->input('subcategory');
    $tag = $request->input('tag');

    $skip = $request->input('skip', 0);
    $take = $request->input('take', 10);
    $requireTotalCount = $request->input('requireTotalCount', false);

    $resultados = Products::select('products.*')
      ->with(['docentes'])
      ->where('products.status', 1)
      ->where('products.visible', 1)
      ->where('products.is_exam', 0)
      ->join('categories', 'categories.id', 'products.categoria_id')
      ->where('categories.visible', 1)
      ->where('categories.status', 1)
      ->with(['tags', 'galeria', 'category']);


    if (!empty($query)) {
      $resultados = $resultados->where('producto', 'like', "%$query%");
    }

    if (!empty($categoria)) {
      $categoriaSplit = array_filter(explode(',', $categoria));
      if (!empty($categoriaSplit)) {
        $resultados = $resultados->whereIn('products.categoria_id', $categoriaSplit);
      }
    }

    if (!empty($subcategoria)) {
      $subcategoriaSplit = array_filter(explode(',', $subcategoria));
      if (!empty($subcategoriaSplit)) {
        $resultados = $resultados->whereIn('products.subcategory_id', $subcategoriaSplit);
      }
    }

    // if (isset($tag)){
    //   $tagsxProducts = DB::table('tags_xproducts')->select('producto_id')->where('tag_id', $tag)->get()->pluck('producto_id');
    //   $resultados = $resultados->whereIn('products.id', $tagsxProducts);
    // }

    $orderMapping = [
      'a-z' => ['column' => 'producto', 'direction' => 'asc'],
      'z-a' => ['column' => 'producto', 'direction' => 'desc'],
      'ultimos' => ['column' => 'created_at', 'direction' => 'desc'],
    ];

    $orderConfig = $orderMapping[$order] ?? ['column' => 'created_at', 'direction' => 'asc'];
    $resultados = $resultados->orderBy($orderConfig['column'], $orderConfig['direction']);

    if ($requireTotalCount) {
      $totalCount = $resultados->count();
    } else {
      $totalCount = 0;
    }

    $resultados = $resultados->skip($skip)->take($take)->get();

    // $totalCount = 0;

    // if ($request->requireTotalCount) {
    //   $totalCount = $resultados->count('*');
    // }

    // $resultados = $resultados->skip($request->skip ?? 0)
    //   ->take($request->take ?? 10)
    //   ->get();

    return response()->json(['resultado' => $resultados, 'totalCount' =>  $totalCount]);
  }

  public function searchSimulate(Request $request)
  {
    $query = $request->input('query');
    $order = $request->input('order');
    $categoria =  $request->input('category');
    $subcategoria =  $request->input('subcategory');
    $tag = $request->input('tag');

    $skip = $request->input('skip', 0);
    $take = $request->input('take', 10);
    $requireTotalCount = $request->input('requireTotalCount', false);

    $resultados = Products::select('products.*')
      ->where('products.status', 1)
      ->where('products.visible', 1)
      ->where('products.is_exam', 1)
      ->join('categories', 'categories.id', 'products.categoria_id')
      ->where('categories.visible', 1)
      ->where('categories.status', 1)
      ->with(['tags', 'galeria', 'category']);


    if (!empty($query)) {
      $resultados = $resultados->where('producto', 'like', "%$query%");
    }

    if (!empty($categoria)) {
      $categoriaSplit = array_filter(explode(',', $categoria));
      if (!empty($categoriaSplit)) {
        $resultados = $resultados->whereIn('products.categoria_id', $categoriaSplit);
      }
    }

    if (!empty($subcategoria)) {
      $subcategoriaSplit = array_filter(explode(',', $subcategoria));
      if (!empty($subcategoriaSplit)) {
        $resultados = $resultados->whereIn('products.subcategory_id', $subcategoriaSplit);
      }
    }

    // if (isset($tag)){
    //   $tagsxProducts = DB::table('tags_xproducts')->select('producto_id')->where('tag_id', $tag)->get()->pluck('producto_id');
    //   $resultados = $resultados->whereIn('products.id', $tagsxProducts);
    // }

    $orderMapping = [
      'a-z' => ['column' => 'producto', 'direction' => 'asc'],
      'z-a' => ['column' => 'producto', 'direction' => 'desc'],
      'ultimos' => ['column' => 'created_at', 'direction' => 'desc'],
    ];

    $orderConfig = $orderMapping[$order] ?? ['column' => 'created_at', 'direction' => 'asc'];
    $resultados = $resultados->orderBy($orderConfig['column'], $orderConfig['direction']);

    if ($requireTotalCount) {
      $totalCount = $resultados->count();
    } else {
      $totalCount = 0;
    }


    $resultados = $resultados->skip($skip)->take($take)->get();

    // $totalCount = 0;

    // if ($request->requireTotalCount) {
    //   $totalCount = $resultados->count('*');
    // }

    // $resultados = $resultados->skip($request->skip ?? 0)
    //   ->take($request->take ?? 10)
    //   ->get();

    return response()->json(['resultado' => $resultados, 'totalCount' =>  $totalCount]);
  }



  public function direccion()
  {
    $user = Auth::user();
    $addresses = Address::with([
      'price.district',
      'price.district.province',
      'price.district.province.department'
    ])
      ->where('email', $user->email)
      ->get();

    $departments = Price::select([
      'departments.id AS id',
      'departments.description AS description',
    ])
      ->join('districts', 'districts.id', 'prices.distrito_id')
      ->join('provinces', 'provinces.id', 'districts.province_id')
      ->join('departments', 'departments.id', 'provinces.department_id')
      ->where('departments.active', 1)
      ->groupBy('id', 'description')
      ->get();

    $provinces = Price::select([
      'provinces.id AS id',
      'provinces.description AS description',
      'provinces.department_id AS department_id'
    ])
      ->join('districts', 'districts.id', 'prices.distrito_id')
      ->join('provinces', 'provinces.id', 'districts.province_id')
      ->where('provinces.active', 1)
      ->groupBy('id', 'description', 'department_id')
      ->get();

    $districts = Price::select([
      'districts.id AS id',
      'districts.description AS description',
      'districts.province_id AS province_id',
      'prices.id AS price_id',
      'prices.price AS price'
    ])
      ->join('districts', 'districts.id', 'prices.distrito_id')
      ->where('districts.active', 1)
      ->groupBy('id', 'description', 'province_id', 'price', 'price_id')
      ->get();
    $categorias = Category::all();

    return view('public.dashboard_direccion', compact('user', 'addresses', 'categorias', 'departments', 'provinces', 'districts'));
  }

  public function error()
  {
    //
    return view('public.404');
  }

  public function producto(string $id)
  {


    $is_reseller = false;
    if (Auth::check()) {
      $user = Auth::user();
      $is_reseller = $user->hasRole('Reseller');
    }

    // $productos = Products::where('id', '=', $id)->first();
    // $especificaciones = Specifications::where('product_id', '=', $id)->get();
    $product = Products::findOrFail($id);
    $especificaciones = Specifications::where('product_id', '=', $id)
      ->where(function ($query) {
        $query->whereNotNull('tittle')
          ->orWhereNotNull('specifications');
      })
      ->get();
    $productosConGalerias = DB::select("
            SELECT products.*, galeries.*
            FROM products
            INNER JOIN galeries ON products.id = galeries.product_id
            WHERE products.id = :productId limit 5 
        ", ['productId' => $id]);


    // $IdProductosComplementarios = $productos->toArray();
    // $IdProductosComplementarios = $IdProductosComplementarios[0]['categoria_id'];

    $ProdComplementarios = Products::select()
      ->where('id', '<>', $id)
      ->where('categoria_id', '=', $product->categoria_id)
      ->where('status', '=', true)
      ->where('visible', '=', true)
      ->get();
    $atributos = Attributes::where("status", "=", true)->get();
    $valorAtributo = AttributesValues::where("status", "=", true)->get();
    $url_env = env('APP_URL');

    $capitalizeFirstLetter = function ($string) {
      // Convert the entire string to lowercase
      $string = strtolower($string);
      // Capitalize the first letter and concatenate with the rest of the string
      return ucfirst($string);
    };

    $categorias = Category::all();

    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();

    $otherProducts = Products::select()
      ->where('id', '<>', $id)
      ->where('producto', $product->producto)
      ->whereNotNull('color')
      ->get();

    $galery = Galerie::where('product_id', $product->id)->get();

    $general = General::first();
    $testimonios = Testimony::where('status', '=', 1)->where('visible', '=', 1)->get();
    $isWhishList = false;
    if (Auth::check()) {
      $user = Auth::user();
      $exite = Wishlist::where('user_id', $user->id)->where('product_id', $id)->first();
      if ($exite) {
        $isWhishList = true;
      }
    }

    $combo = Offer::select([
      DB::raw('DISTINCT offers.*')
    ])
      ->with('products')
      ->leftJoin('offer_details', 'offers.id', 'offer_details.offer_id')
      ->where('offer_details.isParent', true)
      ->where('offer_details.product_id', $id)
      ->first();

    if (!$combo) $combo = new Offer();

    return view('public.product', compact('is_reseller', 'atributos', 'isWhishList', 'testimonios', 'general', 'valorAtributo', 'ProdComplementarios', 'productosConGalerias', 'especificaciones', 'url_env', 'product', 'capitalizeFirstLetter', 'categorias', 'destacados', 'otherProducts', 'galery', 'combo'));
  }

  public function wishListAdd(Request $request)
  {
    $user = Auth::user();

    $exite = Wishlist::where('user_id', $user->id)->where('product_id', $request->product_id)->first();
    if ($exite) {
      Wishlist::find($exite->id)->delete();
      return response()->json(['message' => 'El producto ya se encuentra en la lista de deseos']);
    } else {
      $whistList = Wishlist::create([
        'user_id' => $user->id,
        'product_id' => $request->product_id,
        'quantity' => 1,
        'note' => ''
      ]);
    }


    return response()->json(['message' => 'Producto agregado a la lista de deseos']);
  }


  //  --------------------------------------------
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreIndexRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Index $index)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Index $index)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateIndexRequest $request, Index $index)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Index $index)
  {
    //
  }

  /**
   * Save contact from blade
   */
  public function guardarContacto(Request $request)
  {

    $data = $request->all();

    try {
      $this->envioCorreo($data);
      return response()->json(['message' => 'Mensaje enviado con exito']);
    } catch (ValidationException $e) {

      return response()->json(['message' => $e->validator->errors()], 400);
    }
  }



  public function saveImg($file, $route, $nombreImagen)
  {
    $manager = new ImageManager(new Driver());
    $img =  $manager->read($file);

    if (!file_exists($route)) {
      mkdir($route, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
    }
    $img->save($route . $nombreImagen);
  }


  private function envioCorreo($data)
  {
    $appUrl = env('APP_URL');
    $name = $data['full_name'];
    $mensaje = "Gracias por comunicarte con " . env('APP_NAME');
    $mail = EmailConfig::config($name, $mensaje);
    $datosGenerales = General::first();
    try {
      $mail->addAddress($data['email']);
      $mail->Body = '
          <html lang="en">
          <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Academia San Fernando</title>
          <link rel="preconnect" href="https://fonts.googleapis.com" />
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
          <link
              href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
              rel="stylesheet"
          />
          <style>
              * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
              }
          </style>
          </head>
          <body>
          <main>
              <table
              style="
                  width: 600px;
                  margin: 0 auto;
                  text-align: center;
                  background-image: url(' .
        $appUrl .
        '/mail/fondo.png);
                  background-repeat: no-repeat;
                  background-position: center;
                  background-size: cover;
              "
              >
              <thead>
                  <tr>
                  <th
                      style="
                      display: flex;
                      flex-direction: row;
                      justify-content: center;
                      align-items: center;
                      margin-top: 40px;
                      padding: 0 200px;
                      "
                  >
                      <a href="' .
        $appUrl .
        '" target="_blank" style="text-align:center" ><img src="' .
        $appUrl .
        '/mail/logo.png" alt="hpi" /></a>
                  </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                  <td>
                      <p
                      style="
                          color: #ffffff;
                          font-size: 40px;
                          line-height: normal;
                          font-family: Google Sans;
                          font-weight: bold;
                      "
                      >
                      ¡Gracias
                      <span style="color: #ffffff">por escribirnos!</span>
                      </p>
                  </td>
                  </tr>

                  <tr>
                  <td>
                      <p
                      style="
                          color: #ffffff;
                          font-weight: 500;
                          font-size: 18px;
                          text-align: center;
                          width: 500px;
                          margin: 0 auto;
                          padding: 20px 0 5px 0;
                          font-family: Google Sans;
                      "
                      >
                      <span style="display: block">Hola ' . $name . '</span>
                      </p>
                  </td>
                  </tr>
                  
                  <tr>
                  <td>
                      <p
                      style="
                          color: #ffffff;
                          font-weight: 500;
                          font-size: 18px;
                          text-align: center;
                          width: 500px;
                          margin: 0 auto;
                          padding: 0px 10px 5px 0px;
                          font-family: Google Sans;
                      "
                      >
                      En breve estaremos comunicandonos contigo.
                      </p>
                  </td>
                  </tr>
                  <tr>
                  <td>
                      <a
                      target="_blank"
                      href="' .
        $appUrl .
        '"
                      style="
                          text-decoration: none;
                          background-color: #59C402;
                          color: #ffffff;
                          padding: 13px 20px;
                          display: inline-flex;
                          justify-content: center;
                          border-radius: 32px;
                          align-items: center;
                          gap: 10px;
                          font-weight: 600;
                          font-family: Google Sans;
                          font-size: 16px;
                          margin-bottom: 350px;
                      "
                      >
                      <span>Visita nuestra web</span>
                      </a>
                  </td>
                  </tr>
              </tbody>
              </table>
          </main>
          </body>
      </html>
      ';
      $mail->isHTML(true);
      $mail->send();
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  private function envioCorreoCompra($data)
  {


    $appUrl = env('APP_URL');
    $name = $data['name'];
    $mensaje = "Gracias por registrarse en " . env('APP_NAME');
    $mail = EmailConfig::config($name, $mensaje);
    $datosGenerales = General::first();
    try {
      $mail->addAddress($data['email']);
      $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
    <!--[if !mso]><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    <!--<![endif]-->
</head>

<body>
    <main>
        <table style="
                width: 600px;
                margin: 0 auto;
                text-align: center;
                background-image: url(https://egespp.mundoweb.pe/mail/fondo.png);
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
            ">
            <thead>
                <tr>
                    <th style="
                                            display: flex;
                                            flex-direction: row;
                                            justify-content: center;
                                            align-items: center;
                                            margin: 40px;
                                            padding: 0 200px;
                                        "><a href="' .
        $appUrl .
        '" target="_blank" style="text-align: center"><img src="https://egespp.mundoweb.pe/mail/logo.png" alt="Gestion publica"></a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="esd-text">
                        <p style="
                        color: #ffffff;
                        font-weight: 500;
                        font-size: 40px;
                        text-align: center;
                        width: 500px;
                        margin: 0 auto;
                        padding: 20px 0;
                        font-family: Montserrat, sans-serif;
                    "> ¡Gracias Por Registrarte! </p>
                    </td>
                </tr>
                <tr>
                    <td class="esd-text">
                        <p style="
                                                color: #ffffff;
                                                font-weight: 400;
                                                font-size: 20px;
                                                text-align: center;
                                                width: 500px;
                                                margin: 0 auto;
                                                padding: 20px 0;
                                                font-family: Montserrat, sans-serif;
                                            "><span style="display: block">Hola ' . $name . '</span><span style="display: block">En breve estaremos comunicandonos contigo </span></p>
                    </td>
                </tr>
                <tr>
                    <td><a target="_blank" href="' .
        $appUrl .
        '" style="
                                                text-decoration: none;
                                                background-color: #fdfefd;
                                                color: #254f9a;
                                                padding: 16px 20px;
                                                display: inline-flex;
                                                justify-content: center;
                                                border-radius: 10px;
                                                align-items: center;
                                                gap: 10px;
                                                font-weight: 600;
                                                font-family: Montserrat, sans-serif;
                                                font-size: 16px;
                                                margin-bottom: 350px;
                                            "><span>Visita nuestra web</span></a></td>
                </tr>
                <tr style="margin-top: 300px">
                    <td><a href="' . $datosGenerales->facebook . '" target="_blank" style="   padding: 0 5px 30px 0;
                                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/facebook.png" alt="facebook"></a><a href="' . $datosGenerales->instagram . '" target="_blank" style="
                                                padding: 0 5px 30px 0;
                                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/instagram.png" alt="instagram"></a><a href="' . $datosGenerales->linkedin . '" target="_blank" style="padding: 0 5px 30px 0;
                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/linkedin.png" alt="linkedin"></a><a href="' . $datosGenerales->tiktok . '" target="_blank" style="padding: 0 5px 30px 0;
                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/tiktok.png" alt="tiktok"></a><a href="https://api.whatsapp.com/send?phone=' . $datosGenerales->whatsapp . '&text=' . $datosGenerales->mensaje_whatsapp . '" target="_blank" style="padding: 0 5px 30px 0;
                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/whatsapp.png" alt="whastapp"></a></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>

      ';
      $mail->isHTML(true);
      $mail->send();
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  public function librodereclamaciones()
  {
    $departamentofiltro = DB::select('select * from departments where active = ? order by 2', [1]);

    return view('public.librodereclamaciones', compact('departamentofiltro'));
  }

  public function obtenerProvincia($departmentId)
  {
    $provinces = DB::select('select * from provinces where active = ? and department_id = ? order by description', [1, $departmentId]);
    return response()->json($provinces);
  }

  public function obtenerDistritos($provinceId)
  {
    $distritos = DB::select('select * from districts where active = ? and province_id = ? order by description', [1, $provinceId]);
    return response()->json($distritos);
  }

  public function politicasDevolucion()
  {
    $politicDev = PolyticsCondition::first();
    return view('public.politicasdeenvio', compact('politicDev'));
  }

  public function TerminosyCondiciones()
  {
    $termsAndCondicitions = TermsAndCondition::first();
    return view('public.terminosycondiciones', compact('termsAndCondicitions'));
  }

  public function blog($filtro = 0)
  {
    try {
      $categorias = Category::where('status', '=', 1)->where('visible', '=', 1)->get();

      if ($filtro == 0) {
        $posts = Blog::where('status', '=', 1)->where('visible', '=', 1)->get();

        $categoria = Category::where('status', '=', 1)->where('visible', '=', 1)->get();

        $lastpost = Blog::where('status', '=', 1)->where('visible', '=', 1)->orderBy('created_at', 'desc')->first();
      } else {
        $posts = Blog::where('status', '=', 1)->where('visible', '=', 1)->where('category_id', '=', $filtro)->get();

        $categoria = Category::where('status', '=', 1)->where('visible', '=', 1)->where('id', '=', $filtro)->get();

        $lastpost = Blog::where('status', '=', 1)->where('visible', '=', 1)->orderBy('created_at', 'desc')->where('category_id', '=', $filtro)->first();
      }

      return view('public.blogs', compact('posts', 'categoria', 'categorias', 'filtro', 'lastpost'));
    } catch (\Throwable $th) {
    }
  }

  public function detalleBlog($id)
  {
    $post = Blog::where('status', '=', 1)->where('visible', '=', 1)->where('id', '=', $id)->first();
    $meta_title = $post->meta_title ?? $post->title;
    $meta_description = $post->meta_description  ?? Str::limit($post->extract, 160);
    $meta_keywords = $post->meta_keywords ?? '';

    return view('public.post', compact('meta_title', 'meta_description', 'meta_keywords', 'post'));
  }


  public function searchBlog(Request $request)
  {
    $query = $request->input('query');

    $resultados = Blog::where('title', 'like', "%$query%")->where('visible', '=', true)->where('status', '=', true)
      ->get();

    return response()->json($resultados);
  }


  public function recursos()
  {
    $recursos = Resources::where('status', '=', 1)->where('visible', '=', 1)->orderBy('created_at', 'desc')->get();
    $documentoscat = ResourceList::where('status', '=', 1)->where('visible', '=', 1)->get();
    $aboutUs = AboutUs::all();
    return Inertia::render('Recursos', [
      'recursos' => $recursos,
      'aboutUs' => $aboutUs,
      'documentoscat' => $documentoscat,
    ])->rootView('app');
  }

  public function aumentarContador(Request $request)
  {

    $recurso = Resources::where('id', $request->id)->first();

    if (!$recurso) {
      return response()->json(['error' => 'Recurso no encontrado'], 404);
    }

    $recurso->count += 1;

    $recurso->save();

    return response()->json(['resultado' => 'Contador actualizado', 'contador' => $recurso->count]);
  }
}
