@extends('admin.layouts.app')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: 501.406px;">
                    <div class="card-header">
                        <h4 class="card-title">تنظیمات سایت</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{route('settings.add',$settings)}}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" id="first-name-vertical" class="form-control" name="title" value="{{$settings->title}}" placeholder="عنوان سایت">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" id="email-id-vertical" class="form-control" name="meta_desc" value="{{$settings->meta_desc}}" placeholder="متا توضیحات">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" id="contact-info-vertical" class="form-control" name="meta_key" value="{{$settings->meta_key}}" placeholder="متا کلمات کلیدی">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">ثبت</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">ریست</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="card" style="height: 501.406px;">
                    <div class="card-header">
                        <h4 class="card-title">تنظیمات ادمین</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('admin.add',$user)}}" class="form form-vertical" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{$user->name}}" placeholder="نام">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="email" id="email-id-vertical" class="form-control" name="email" value="{{$user->email}}" placeholder="ایمیل">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="number" id="email-id-vertical" class="form-control" name="number" value="{{$user->number}}" placeholder="شماره تماس">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" id="email-id-vertical" class="form-control" name="url" value="{{$user->url}}" placeholder="آدرس سایت">
                                            </div>
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">تغییر رمز عبور</div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="password" id="password-vertical" class="form-control" name="password" placeholder="رمز عبور">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="password" id="password-vertical" class="form-control" name="password_confirmation" placeholder="تایید رمز عبور">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">ثبت</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">ریست</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection