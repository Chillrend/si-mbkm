<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo" class="flex">
            <a href="/">
                <x-application-logo class="w-48 h-48 fill-current text-gray-500" />
            </a>
            <h1>Sistem Informasi MBKM Politeknik Negeri Jakarta</h1>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <a href="{{url('/auth/pnj')}}" class="text-center underline">
            Login Dengan SSO PNJ
        </a>
    </x-auth-card>
</x-guest-layout>
