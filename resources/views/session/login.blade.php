<x-layout-admin title="Login">
    <div class="w-full h-screen flex justify-center items-center">
        <div class="flex flex-col items-center md:w-[30%] w-full">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-green-700">Alternativo</span>
            <p class="text-center mt-[40px] font-medium mb-[10px] text-gray-600">Log in to admin dashboard</p>
            <x-forms.form method="POST" action="{{route('login')}}" class="w-full">
                <x-forms.login-input name="email" type="email" label="Email" id="email"/>
                <x-forms.login-input name="password" type="password" label="Password" id="password"/>
                <x-forms.submit>Login</x-forms.submit>
            </x-forms.form>
        </div>
    </div>
</x-layout-admin>
