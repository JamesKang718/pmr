<?php

namespace App\Http\Controllers;

use App\InCategory;
use App\MoneyRecord;
use App\OutCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userQty = User::all()->count();
        return view('welcome', compact('user', 'userQty'));
    }

    public function home()
    {
        $index = 'all';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function food()
    {
        $index = 'food';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('out_category_id', 1)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        // dd($outCategories[0]->index);
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function drink()
    {
        $index = 'drink';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('out_category_id', 2)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function cloth()
    {
        $index = 'cloth';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('out_category_id', 3)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function hotel()
    {
        $index = 'hotel';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('out_category_id', 4)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function traffic()
    {
        $index = 'traffic';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('out_category_id', 5)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function educate()
    {
        $index = 'educate';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('out_category_id', 6)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function play()
    {
        $index = 'play';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('out_category_id', 7)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function outOther()
    {
        $index = 'outOther';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('out_category_id', 8)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function inOther()
    {
        $index = 'inOther';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('in_category_id', 5)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function prize()
    {
        $index = 'prize';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('in_category_id', 4)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function bonus()
    {
        $index = 'bonus';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('in_category_id', 3)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function work()
    {
        $index = 'work';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('in_category_id', 2)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function regular()
    {
        $index = 'regular';
        $user = Auth::user();
        $moneyRecords = MoneyRecord::where('user_id', $user->id)->where('status', '已完成')->get();
        $total_amount = 0;
        for ($i = 0; $i < $moneyRecords->count(); $i++) {
            $total_amount += $moneyRecords[$i]->amount;
        }
        $allMoneyRecords = MoneyRecord::where('user_id', $user->id)->where('in_category_id', 1)->orderBy('id', 'desc')->paginate(24);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('home', compact('index', 'user', 'allMoneyRecords', 'total_amount', 'inCategories', 'outCategories'));
    }

    public function create() {
        $number = MoneyRecord::where('user_id', Auth::user()->id)->where('created_at', '>', date('Ymd', time() - 86400))->count() + 1;
        $date  = date("Ymd") . '-' . $number;
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('create', compact('date', 'inCategories', 'outCategories'));
    }

    public function store(Request $request) {
        if ($request->input('in_index') == null) {
            $amount = -$request->input('out_amount');
            $brief = $request->input('out_brief');
        } else {
            $amount = $request->input('in_amount');
            $brief = $request->input('in_brief');
        }

        // dd($request->input('in_index'), $request->input('out_index'),$request->input('in_amount'),$request->input('in_brief'));
        // dd($request->input('in_index'), $request->input('out_index'));
        MoneyRecord::create([
            'user_id' => $request->user()->id,
            'in_category_id' => $request->input('in_index'),
            'out_category_id' => $request->input('out_index'),
            'record_no' => $request->input('record_no'),
            'amount' => $amount,
            'brief' => $brief,
            'status' => '已完成',
        ]);
        return redirect(route('home'));
    }

    public function edit(Request $request, $record_id) {
        $record = MoneyRecord::findOrFail($record_id);
        $inCategories = InCategory::all();
        $outCategories = OutCategory::all();
        return view('edit', compact('record', 'inCategories', 'outCategories'));
    }

    public function update(Request $request, $record_id) {
        $record = MoneyRecord::findOrFail($record_id);
        // dd($request->input('in_index'), $request->input('out_index'),$request->input('in_amount'),$request->input('in_brief'));
        if ($request->input('in_index') == null) {
            $amount = -$request->input('out_amount');
            $brief = $request->input('out_brief');
        } else {
            $amount = $request->input('in_amount');
            $brief = $request->input('in_brief');
        }

        $record->update([
            'user_id' => $request->user()->id,
            'in_category_id' => $request->input('in_index'),
            'out_category_id' => $request->input('out_index'),
            'amount' => $amount,
            'brief' => $brief,
            'status' => '已完成',
        ]);
        return redirect(route('home'));
    }

    public function destroy(Request $request, $record_id) {
        $record = MoneyRecord::findOrFail($record_id);
        $record->delete();
        return redirect(route('home'));
    }
}
