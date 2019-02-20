<?php


namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Budget;    // injetar a model

class BudgetController extends Controller
{
    // criar um atributo
    private $budget, $totalPage = 10;

    // cria um construtor
    public function __construct(Budget $budget) {

        $this->budget = $budget;

    }

    // implementar o metodo index para retorna todos os budgets
    public function index(Request $request) {

         $budgets = $this->budget->getResults($request->all(), $this->totalPage);

         return response()->json($budgets);
    }

    // função para cadastrar
    public function store(Request $request){

        $budget = $this->budget->create($request->all());

        return response()->json($budget, 201);

    }


}
