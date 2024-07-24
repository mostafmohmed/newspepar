<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiResponse;
use App\Models\Detartment_Head;
use App\Models\User;
use App\Repository\Detartment_Head_Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class AuthControllerDetartment_Head extends Controller
{
    public $r;
    public function __construct(Detartment_Head_Repository $e) {
        $this->r = $e;
    }
    public function register(Request $request)
    {
      return  $this->r->Detartment_Head($request);
    }

    public function login(Request $request)
    {
        return  $this->r->login($request);
    }
}
