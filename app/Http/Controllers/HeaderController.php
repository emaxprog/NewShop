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
        $this->validate($request, [
            'phone1' => 'required|integer',
            'phone2' => 'required|integer',
            'address' => 'required|min:10',
            'logotype' => 'image',
            'favicon' => 'image'
        ]);

        $root = $_SERVER['DOCUMENT_ROOT'];
        $header = Header::find(1);
        $header->phone1 = $request->phone1;
        $header->phone2 = $request->phone2;
        $header->address = $request->address;
        if ($request->hasFile('logotype')) {
            $file = $request->file('logotype');
            $logotypeName = $file->getClientOriginalName();
            $file->move($root . Header::PATH_TO_DIR_SITE, $logotypeName);
            $header->logotype = Header::PATH_TO_DIR_SITE . $logotypeName;
        }
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $faviconName = $file->getClientOriginalName();
            $file->move($root . Header::PATH_TO_DIR_SITE, $faviconName);
            $header->favicon = Header::PATH_TO_DIR_SITE . $faviconName;
        }
        $header->save();

        return redirect()->route('admin.product.index');
    }
}
