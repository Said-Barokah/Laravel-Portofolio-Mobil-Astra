@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')


        <form action="{{ route('promoCode.update', $promoCode->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            @method('PUT') <!-- Gunakan method PUT untuk update -->
            <div class="flex flex-col space-y-3">
                <label for="discount_id" class="text-[14px] text-gray-700">jenis Diskon</label>
                <select name="discount_id" id="discount_id" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
                    @foreach ($discounts as $discount )
                    @if ($discount->type == 'Persentase')
                    <option value="{{$discount->id}}" {{ $discount->id == $promoCode->discount_id ? 'selected' : '' }}>{{ $discount->name}} - Diskon sebesar {{ $discount->amount  }}%</option>
                    @elseif ($discount->type == 'Nominal')
                    <option value="{{$discount->id}}" {{ $discount->id == $promoCode->discount_id ? 'selected' : '' }}>{{ $discount->name}} - Diskon sebesar Rp{{ number_format($discount->amount, 0, ',', '.')  }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-3">
                <label for="promo_code" class="text-[14px] text-gray-700">Kode Promo</label>
                <input name="promo_code" id="promo_code" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('promo_code', $promoCode->promo_code) }}" required />
            </div>

            <div class="flex flex-col space-y-3">
                <label for="start_date" class="text-[14px] text-gray-700">Berlaku tanggal</label>
                <input name="start_date" id="start_date" type="date"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('start_date', $promoCode->start_date) }}" required />
            </div>

            <div class="flex flex-col space-y-3">
                <label for="end_date" class="text-[14px] text-gray-700">kadaluarsa tanggal </label>
                <input name="end_date" id="end_date" type="date"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('end_date', $promoCode->end_date) }}" required />
            </div>
            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Update</p>
            </button>
        </form>

    </div>

    <script>

    document.getElementById('hex_code').addEventListener('input', function() {
        var hexColor = this.value;
        document.getElementById('color-preview').style.backgroundColor = hexColor;
    });
    </script>
@endsection
