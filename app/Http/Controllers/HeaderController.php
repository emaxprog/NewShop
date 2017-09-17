<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function edit()
    {
        $header = Header::find(1);

        $data = [
            'header' => $header
        ];
        return view('header.edit', $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, Header::$rules);

        Header::saveHeader($request->phone1, $request->phone1, $request->address, $request->hasFile('logotype') ? $request->file('logotype') : null, $request->hasFile('favicon') ? $request->file('favicon') : null);

        return redirect()->route('admin.product.index');
    }
}
