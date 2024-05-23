@session('success')
<div
    class="p-4 bg-green-100 fixed bottom-3 right-5 text-xl transition"
    x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
    <p>{{ session('success') }}</p>
</div>
@endsession
@session('fail')
<div
    class="p-4 bg-red-100 fixed bottom-3 right-5 text-xl transition"
    x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
    <p>{{ session('fail') }}</p>
</div>
@endsession
