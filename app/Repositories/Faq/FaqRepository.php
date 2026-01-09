<?php

namespace App\Repositories\Faq;

use App\Models\Faq;
use App\Traits\ReturnFormatTrait;


class FaqRepository implements FaqRepositoryInterface
{
    use ReturnFormatTrait;

    public function all()
    {
        return Faq::where('status', 1);
    }

    public function store($request)
    {
        $validated = $request->validate();

        try {
           Faq::create($validated);

           return $this->responseSuccess(__('Faq Added successfully'), []);
        } catch (\Throwable $th) {
            return $this->responseErroe(__('Something went wrong'), []);
        }

    }

    public function edit($id)
    {
        return Faq::findOrFail($id);
    }

    public function update($request, $id)
    {
        $validated = $request->validated();

        try {
            $faq = Faq::findOrFail($id);

            $faq->update($validated);

            return $this->responseSuccess(__('Faq successfully updated'),[]);
        } catch (\Throwable $th) {
            return $this->responseError( __('Something went wrong'),[]);
        }
    }
}