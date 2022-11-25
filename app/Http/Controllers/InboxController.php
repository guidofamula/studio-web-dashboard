<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class InboxController extends Controller
{
    // Permission setup for inbox
    public function __construct()
    {
        $this->middleware('permission:inbox_show', ['only' => 'index']);
        $this->middleware('permission:inbox_detail', ['only' => 'detail']);
        $this->middleware('permission:inbox_delete', ['only' => 'destroy']);
    }

    public function index(Request $request)
    {
        $inbox = Contact::latest()->paginate(5);
        $search = $request->keyword;

        if($search != "") {
            $inbox = Contact::where(function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->paginate(5);
            $inbox->appends(['keyword' => $search]);
        }
        else {
            $inbox = Contact::latest()->paginate(5)->appends(['keyword' => $request->get('keyword')]);
        }
        return view('inbox.index', [
            'inbox' => $inbox,
        ]);
    }

    public function detail(Contact $inbox)
    {
        return view('inbox.show', [
            'inbox' => $inbox,
        ]);
    }

    public function destroy(Contact $inbox)
    {
        try {
            $inbox->delete();
            Alert::success(
                trans('inbox.alert.delete.title'),
                trans('inbox.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('inbox.alert.delete.title'),
                trans('inbox.alert.delete.message.error', ['error' => $th->getMessage()])
            );
        }

        return redirect()->back();
    }
}
