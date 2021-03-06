@extends('layouts.app')

@section('content')

    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-9 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">اطلاعات زیر را تکمیل کنید</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @foreach($related_key as $rk)
                                <form action="{{route('update.init.seo.related',['url' => $url,'id' => $rk->id])}}"
                                      method="POST"
                                      class="form form-horizontal">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>کلمات مرتبط سایت : {{$rk->keyword_id}}</span>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <textarea name="related_site" data-length=200
                                                              class="form-control char-textarea" id="keyword"
                                                              rows="6" placeholder="هر کلمه در یک سطر"
                                                              required>@foreach(explode("\r",$rk->related_site) as $value){{$value}}@endforeach</textarea>

                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <button type="submit"
                                                        class="btn btn-primary mr-1 mb-1 waves-effect waves-light">ثبت
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul>
                                            @foreach($related_key as $rk)
                                                <li>{{$rk->keyword_id}}
                                                    <ul>
                                                        @foreach(explode("\r\n",$rk->related_site) as $val)
                                                            <li>{{$val}}</li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="block-level-buttons">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <a href="{{route('internal.seo.index',['url' => $url])}}"
                                           class="btn mb-1 btn-primary btn-lg btn-block waves-effect waves-light">تکمیل
                                            کردم</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function setTextarea(t) {
            var optionValue = t.value;
            @foreach(explode("\r\n",$init_seo_key->keyword_site) as $val)
            if (optionValue === {{$val}}) {
                {{$res = \App\Models\RelatedKey::where('keyword_id',$val)->first()}}
                document.getElementById('keyword').innerHTML = {{$res}};
            } else {
                document.getElementById('keyword').innerHTML = ' ';
            }
            @endforeach
        };
    </script>
@endsection
