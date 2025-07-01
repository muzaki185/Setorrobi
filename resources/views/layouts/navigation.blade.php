<x-nav-link :href="route('nasabah.index')" :active="request()->routeIs('nasabah.*')">
    {{ __('Nasabah') }}
</x-nav-link>
<x-nav-link :href="route('transaksi.index')" :active="request()->routeIs('transaksi.*')">
    {{ __('Transaksi') }}
</x-nav-link>
