<?php

namespace App\Http\Controllers\Front\Cabinet;

use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{

    protected $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function index()
    {
        return view('front.cabinet.index', [
            "users" => $this->usersRepository->all(),
            "notifications" => Auth::user()->notifications
        ]);
    }
}
