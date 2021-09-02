<?php

namespace App\Http\Controllers;

use App\Article;
use App\CertificateDraft;
use App\News;
use App\Participant;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    public function index()
    {
        $articles = Article::all();
        $news = News::all();
        $members = User::all();
        $newParticipants = count(Participant::orderBy('id')->groupBy('email')->get());
        $oldParticipants = count(CertificateDraft::orderBy('id')->groupBy('email')->get());
        $totalParticipants = $newParticipants + $oldParticipants;
        return view('admin.dashboard.index', compact('articles', 'news', 'members', 'totalParticipants'));
    }
}
