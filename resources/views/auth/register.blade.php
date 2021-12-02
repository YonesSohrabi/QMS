<x-auth-layout>
    <x-slot name="title">
        صفحه ثبت نام
    </x-slot>

    <x-slot name="head_title">
        صفحه ثبت نام کاربر
    </x-slot>
    <x-slot name="header_form">
        لطفا برای ثبت نام اولیه فرم زیر را پر کنید.
    </x-slot>

    <form action="{{ route('register.store') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="نام">
            <div class="input-group-append">
                <span class="fa fa-user input-group-text"></span>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="family" class="form-control" placeholder="نام خانوادگی">
            <div class="input-group-append">
                <span class="fa fa-user input-group-text"></span>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="ایمیل">
            <div class="input-group-append">
                <span class="fa fa-envelope input-group-text"></span>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="nati_code" class="form-control" placeholder="کد ملی">
            <div class="input-group-append">
                <span class="fa fa-life-ring input-group-text"></span>
            </div>
        </div>

        <div class="form-group">
            <select class="form-control" name="role">
                <option value="">عنوان کاربری خود را مشخص کنید</option>
                <option value="teacher">استاد</option>
                <option value="student">دانشجو</option>
            </select>
        </div>

        <div class="row">
            <button class="btn btn-block btn-primary">
                ثبت نام
            </button>
        </div>
    </form>

    <div class="text-center my-3">
        <a href="" class="text-center text-muted">من قبلا ثبت نام کرده ام</a>
    </div>

</x-auth-layout>
