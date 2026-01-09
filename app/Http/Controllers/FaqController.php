<?php

namespace App\Http\Controllers;

use App\Http\Requests\faq\FaqStoreRequest;
use App\Http\Requests\faq\UpdateFaqRequest;
use App\Repositories\Faq\FaqRepositoryInterface;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $repo;

    function __construct(FaqRepositoryInterface $repo)
    {
       $this->repo = $repo;
    }

    public function all(){
        $faqs = $this->repo->all();
        return view('faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('backend.admin-section.faq.create');
    }

    public function store(FaqStoreRequest $request)
    {
        $response = $this->repo->store($request);

        if ($response['status']) {
            return redirect()->route('admin.faq.index')->with('success', $response['message']);
        }
        return back()->with('danger', $response['message']);
    }

    public function edit($id)
    {
        $faq = $this->repo->edit($id);
        return view('backend.admin-section.faq.edit', compact('faq'));
    }

    public function update(UpdateFaqRequest $request, $id)
    {
        $response = $this->repo->update($request, $id);

        if ($response['status']) {
            return redirect()->route('admin.faq.index')->with('success', $response['message']);
        }
        return back()->with('danger', $response['message']);
    }
}
