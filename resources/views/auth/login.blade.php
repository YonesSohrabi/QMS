<x-auth-layout>
    <x-slot name="title">
        ورود به سایت
    </x-slot>
    <x-slot name="head_title">
        صفحه ورود کاربر
    </x-slot>
    <x-slot name="header_form">
        لطفا برای ورود فرم زیر را پر کنید.
    </x-slot>
    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="ایمیل">
            <div class="input-group-append">
                <span class="fa fa-envelope input-group-text"></span>
            </div>
        </div>
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="رمز عبور">
            <div class="input-group-append">
                <span class="fa fa-lock input-group-text"></span>
            </div>

        </div>
        @error('password')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="row">
            <div class="col-8">
                <div class="checkbox icheck">
                    <label>
                        <input name="remember" type="checkbox"> یاد آوری من
                    </label>
                </div>
                @error('remember')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
</x-auth-layout>
