<?php

namespace App\Http\Controllers;

use App\Category;
use App\Member;
use App\Topic;
use App\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function indexPersonal()
    {
        $users = Member::all()->where('member_type', 'perorangan')->where('archived', false)->where('active', false);
        $title = "Perorangan";
        return view('admin.member.index-perorangan', compact('users', 'title'));
    }

    public function indexCorporate()
    {
        $users = Member::all()->where('member_type', 'korporasi');
        $title = "Korporasi";
        return view('admin.member.index-korporasi', compact('users', 'title'));
    }

    public function index()
    {
        # code...
    }

    public function accept(Member $member)
    {
        $member->update(['active' => true]);
        return back()->with('update', 'Calon Member Diterima menjadi Anggota');
    }

    public function decline(Member $member)
    {
        $member->update(['archived' => true]);
        return back()->with('delete', 'Calon Member Ditolak menjadi Anggota');
    }

    public function downloadCv(Member $user)
    {
        return response()->download(public_path('assets/members/cv/' . $user->member_cv));
    }

    public function listFaq()
    {
        if (!auth('web')->check()) {
            return redirect(action('AuthController@getLogin'));
        }
        $faqs = auth('web')->user()->topics->where('status', true);
        return view('member.faq.index', compact('faqs'));
    }

    public function listFaqDetail(Topic $topic)
    {
        $user = auth('web')->user();
        return view('member.faq.reply', compact('topic', 'user'));
    }

    public function replyFaq(Request $request)
    {
        Topic::find($request->topic_id)->update(['answer_faq' => $request->answer_faq, 'answer' => true]);
        return redirect(action('MemberController@listFaq'))->with('save', 'Jawaban Anda Berhasil Terkirim');
    }
}
