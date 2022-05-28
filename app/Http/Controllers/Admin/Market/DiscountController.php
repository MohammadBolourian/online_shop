<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Discount;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:shop-manager');
    }

    public function index()
    {
        $discounts = Discount::latest()->paginate(30);
        return view('admin.market.discount.index' , compact('discounts'));
    }

    public function create()
    {
        return view('admin.market.discount.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:discounts,code',
            'percent' => 'required|integer|between:1,99',
//            'users' => 'nullable|array|exists:users,id',
//            'products' => 'nullable|array|exists:products,id',
//            'categories' => 'nullable|array|exists:categories,id',
            'expired_at' => 'required'
        ]);

        $discount = Discount::create($validated);
        $validated= ['users' => $request['users'], 'products' => $request['products'],'categories' => $request['categories']];
        foreach ($validated as $key => $value){
            if(in_array("null",$value)){
                $request->validate([$key => 'nullable|array']);
            }else{
                $request->validate([$key => 'array' ]);
                $discount->$key()->attach($value);
            }
        }
//        $discount->users()->attach($validated['users']);
//        $discount->products()->attach($validated['products']);
//        $discount->categories()->attach($validated['categories']);

        return redirect(route('admin.market.discount.index'))->with('swal-success', ' کد تخفیف  شما با موفقیت ثبت شد');
    }

    public function edit(Discount $discount)
    {
        return view('admin.market.discount.edit' , compact('discount'));
    }

    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'code' => ['required' , Rule::unique('discounts' , 'code')->ignore($discount->id)],
            'percent' => 'required|integer|between:1,99',
            'users' => 'nullable|array|exists:users,id',
            'products' => 'nullable|array|exists:products,id',
            'categories' => 'nullable|array|exists:categories,id',
            'expired_at' => 'required'
        ]);

        $discount->update($validated);

        isset($validated['users'])
            ? $discount->users()->sync($validated['users'])
            : $discount->users()->detach();

        isset($validated['products'])
            ? $discount->products()->sync($validated['products'])
            : $discount->products()->detach();

        isset($validated['categories'])
            ? $discount->categories()->sync($validated['categories'])
            : $discount->categories()->detach();


        return redirect(route('admin.market.discount.index'))->with('swal-success', ' کد تخفیف  شما با موفقیت ویرایش شد');
    }
    public function destroy(Discount $discount)
    {
        $result = $discount->delete();
        return redirect()->route('admin.market.discount.index')
            ->with('swal-success','  کد تخفیف موفقیت حذف شد');
    }
}
