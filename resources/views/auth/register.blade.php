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

    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="نام">
            <div class="input-group-append">
                <span class="fa fa-user input-group-text"></span>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="نام خانوادگی">
            <div class="input-group-append">
                <span class="fa fa-user input-group-text"></span>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="ایمیل">
            <div class="input-group-append">
                <span class="fa fa-envelope input-group-text"></span>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="کد ملی">
            <div class="input-group-append">
                <span class="fa fa-life-ring input-group-text"></span>
            </div>
        </div>

        <div class="form-group">
            <select class="form-control">
                <option>عنوان کاربری خود را مشخص کنید</option>
                <option>استاد</option>
                <option>دانشجو</option>
            </select>
        </div>

        <div class="row">
            <div class="col-8 my-2">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> با <a class="text-secondary" href="#">شرایط</a> موافق هستم
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <a href="#" class="btn btn-block btn-primary">
                ثبت نام
            </a>
        </div>
    </form>

    <div class="text-center my-3">
        <a href="" class="text-center text-muted">من قبلا ثبت نام کرده ام</a>
    </div>

    <x-slot name="script">
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass   : 'iradio_square-blue',
                    increaseArea : '20%' // optional
                })
            })
        </script>
    </x-slot>
</x-auth-layout>
