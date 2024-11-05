<div class="flex flex-col">
    <a href="{{ route('customer.profil') }}" class="flex mb-4 font-bold hover:text-[#e0303f] {{ request()->routeIs('customer.dashboard') ? 'text-[#e0303f]' : '' }}">
        <i></i>
        <p>Profil Saya</p>
    </a>
    <a href="{{ route('order.purchase') }}" class="flex mb-4 font-bold hover:text-[#e0303f] {{ request()->routeIs('order.purchase') ? 'text-[#e0303f]' : '' }}">
        <i></i>
        <p>Profil Order Pembelian</p>
    </a>
    <a href="{{ route('service.booking') }}" class="flex mb-4 font-bold hover:text-[#e0303f] {{ request()->routeIs('service.booking') ? 'text-[#e0303f]' : '' }}">
        <i></i>
        <p>Booking Servis</p>
    </a>
    <a href="{{ route('feedback.suggestion') }}" class="flex mb-4 font-bold hover:text-[#e0303f] {{ request()->routeIs('feedback.suggestion') ? 'text-[#e0303f]' : '' }}">
        <i></i>
        <p>Kritik Saran</p>
    </a>
</div>
