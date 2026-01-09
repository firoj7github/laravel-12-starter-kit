<?php

namespace App\Repositories\Faq;

interface FaqRepositoryInterface
{
    public function all();

    public function store($request);

    public function edit($id);

    public function update($request, $id);

    // public function delete($id);
}