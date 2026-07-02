 @if (session('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-5 right-5 z-50"
    >
        <div class="flex items-center gap-3 rounded-lg bg-green-500 px-5 py-3 text-white shadow-lg">
            <i class="ti ti-circle-check text-xl"></i>
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-2">
                <i class="ti ti-x"></i>
            </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-5 right-5 z-50"
    >
        <div class="flex items-center gap-3 rounded-lg bg-red-500 px-5 py-3 text-white shadow-lg">
            <i class="ti ti-alert-circle text-xl"></i>
            <span>{{ session('error') }}</span>
            <button @click="show = false" class="ml-2">
                <i class="ti ti-x"></i>
            </button>
        </div>
    </div>
@endif
