<?php

namespace App\Http\Controllers;
use App\BadDomain;
use Illuminate\Http\Request;

class BadDomainController extends Controller
{

    public function index(){
        return view('bad_domains',
            [
                'domains' => BadDomain::orderBy('id')->paginate(100)
            ]);
    }

    public function create(){
        return view('create_bad_domains');
    }

    public function store(Request $request, BadDomain $BadDomain){
        $this->validate($request,
            [
                'name' => 'required|unique:bad_domains|min:6',
            ]);
        $BadDomain->create($request->except('_token'));
        return redirect()->route('bad_domains.index');
    }

    public function edit($id)
    {
        return view('edit_bad_domain',
            [
                'domain' => BadDomain::find($id),
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:bad_domains|min:6',
            ]);

        $BadDomain = new BadDomain();
        $BadDomain->edit($id, $request->except(['_token', '_method']));
        return redirect()->route('bad_domains.index');
    }

    public function destroy($id){
        BadDomain::destroy($id);
        return redirect()->route('bad_domains.index');
    }
}
