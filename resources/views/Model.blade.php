<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

        .inter {
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            font-variation-settings:
                "slnt" 0;

        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .poppins {
            font-family: "Poppins", sans-serif;

        }

        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap');

        .dm-serif-display-regular {
            font-family: "DM Serif Display", serif;
            font-weight: 400;
            font-style: normal;
        }

        .dm-serif-display-regular-italic {
            font-family: "DM Serif Display", serif;
            font-weight: 400;
            font-style: italic;
        }
    </style>
    </style>
    <title>Document</title>
</head>

<body class="bg-white">
    @include('layouts.header')
    <section class="sidebar pl-10 absolute w-[250px] left-0 h-screen overflow-y-scroll overflow-x-hidden">
        @foreach($models as $model)
        <div>
            <a href="{{ asset('models/' . $model->id) }}" class="flex py-2 px-4 border-b-2 border-[#9d1f36]">
                <p class="min-w-[140px]">{{ $model->name }}</p>
                <img src="{{ Storage::url($model->photo) }}" alt="" class="bg-gray-100 h-[20px] w-[40px]">
                <span>
                    >
                </span>
            </a>
        </div>
        @endforeach
    </section>
    <section class="ml-[260px]">
        <div class="mt-10 flex justify-between px-7 items-center">
            @if ($selectedColor)
            <img src="{{Storage::url($photo) }}" alt="Photo for {{ $selectedColor->name }}" class="w-[500px] h-[300px] bg-slate-400 mr-6">
            @else
        <!-- Placeholder if no photo is available -->
            <img src="" alt="Foto Tid4k tersedi4" class="w-[500px] h-[300px] bg-slate-400 mr-6">
            @endif

            <div>
                <h1 class="text-[24px] font-bold">{{ $vehicle->name }}</h1>
                <p class="text-[18px]">{{ $vehicle->vehicleType->type }}</p>
                @if ($selectedColor)
                <p class="text-[14px] text-gray-600 mt-4 mb-2 uppercase">{{ $selectedColor->name }}</p>
                @else
                <p class="text-[14px] text-gray-600 mt-4 mb-2 uppercase">Warna tidak tersedia</p>
                @endif
                <div class="flex mb-2">
                    @foreach($vehicle->colors as $color)
                    <a href="{{ route('models.show', ['id' => $vehicle->id, 'colorId' => $color->id]) }}">
                        <button class="w-[30px] h-[30px] rounded-sm mr-1 shadow-md" style="background-color: {{ $color->hex_code }};"></button>
                    </a>
                    @endforeach
                </div>
                <p class="text-[12px] text-gray-400">Pilihan warna mungkin sedikit berbeda dari warna yang sebenarnya</p>
                <p class="text-[14px]">Harga Mulai - Surabaya</p>
                <p class="text-[18px] font-bold text-[#9d1f36]">Rp. {{ number_format($vehicle->price, 0, ',', '.') }}</p>
                <p class="text-[12px] text-gray-400">*harga bisa berubah sewaktu-waktu</p>
                <button class="text-[18px] font-bold bg-[#9d1f36] mt-6 px-10 py-3 rounded-full text-white">BELI MOBIL</button>
            </div>
        </div>
        <div class="mt-7">
            <p class="font-bold ml-7">SPESIFIKASI UTAMA TOYOTA AGYA</p>
            <div class="flex justify-between px-6 py-7">
                <div class="p-2 shadow min-h-[100px] min-w-[200px]">
                    <h6 class="text-[12px] text-gray-600">Transmission / Transmission Type</h6>
                    <p class="font-bold text-[12px]">{{ $vehicle->transmission}}</p>
                </div>
                <div class="p-2 shadow min-h-[100px] min-w-[200px]">
                    <h6 class="text-[12px] text-gray-600">Tipe Mesin</h6>
                    <p class="font-bold text-[12px]"> {{ $vehicle->machine_type	 }}</p>
                </div>
                <div class="p-2 shadow min-h-[100px] min-w-[200px]">
                    <h6 class="text-[12px] text-gray-600">Cylinder / Displacement(Cc)</h6>
                    <p class="font-bold text-[12px]">{{ $vehicle->displacement}}</p>
                </div>
                <div class="p-2 shadow min-h-[100px] min-w-[200px]">
                    <h6 class="text-[12px] text-gray-600">Torsi Maksimum(Kgm/Rpm)</h6>
                    <p class="font-bold text-[12px]">{{ $vehicle->max_torque }}</p>
                </div>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</body>

</html>
