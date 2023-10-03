<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $frd = $request->all();

        $frd['sort'] = $frd['sort'] ?? '-id';

        $users = User::filter($frd)->paginate(10);
        $seo = new SEOData(
            title: 'Users'
        );
        $data = compact('frd', 'seo', 'users');

        if ($request->isJson()) return $data;
        return view("Html::admin.pages.users", $data);
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function copy(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroySelected(Request $request): RedirectResponse
    {
        $ids = $request->input('selected', []);
        User::whereIn('id', $ids)->delete();

        return redirect()->back();
    }
}
