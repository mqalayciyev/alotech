@extends('manage.layouts.master')
@section('title', 'Blog İdaretmə')
@section('head')
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">-->
    <script src="https://cdn.ckeditor.com/4.9.1/basic/ckeditor.js"></script>
    <style>
        .panel {
            margin-top: 25px;
        }

        .images {
            margin: 5px;
            width: max-content;
            border: 1px solid silver;
            padding: 5px;
            border-radius: 5px;
            position: relative;
            float: left;
        }

        .images>img {
            height: 50px;
            width: 50px;
        }

        .images>span {
            font-size: 20px;
            font-weight: bold;
            position: absolute;
            left: -6px;
            top: -13px;
            cursor: pointer;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        #change-color .colors {
            border: 2px solid transparent;
            padding: 0px;
            width: 38px;
            height: 38px;
            border-radius: 100%;
            margin: 0px;
            display: flex;
            justify-content: center;
            transition: 0.4s;
        }

        #change-color .colors:hover {
            border: 2px solid #00A2E8 !important;
            padding: 0px;
            width: 38px;
            height: 38px;
            border-radius: 100%;
            margin: 0px;
            display: flex;
            justify-content: center;
        }

        #change-color .colors span {
            align-self: center;
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
        }

    </style>
@endsection
@section('content')
    <form id="blog-form" add-edit="{{ @$flight->id ? @$flight->id : 0 }}">
        @csrf
        <section class="content-header">
            <h1 class="pull-left">Blog</h1>
            <div class="pull-right">
                @if ($flight->id > 0)
                    <a href="{{ route('manage.blog.new') }}" class="btn btn-success"> Yeni Blog Əlavə et</a>
                    <button type="submit" class="btn btn-info crop_image"><i class="fa fa-refresh"></i>
                        @lang('admin.Update')</button>
                @else
                    <a href="{{ route('manage.blog') }}" class="btn btn-default"> @lang('admin.Cancel')</a>
                    <button type="submit" class="btn btn-success crop_image"><i class="fa fa-plus"></i>
                        @lang('admin.Save')</button>
                @endif
            </div>
            <div class="clearfix"></div>
        </section>
        <!-- Main content -->
        <section class="content">
            {{-- @include('general.back.alert')
            @include('general.back.validate') --}}
            <div class="w-100 response"></div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body box-primary">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="jumbotron text-center">
                                                <p><i class="fa fa-info-circle text-info"></i> Tövsiyyə edilən şəkil ölçüsü
                                                    1170x635</p>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="image_demo"></div>

                                                    </div>
                                                    <div class="input-group" style="margin-top: 15px">
                                                        <div class="custom-file">
                                                            <input type="file" accept="image/*" id="cover_image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="blog_title">Blog başlığı</label>
                                        <input type="text" class="form-control" id="blog_title" placeholder="Başlıq"
                                            name="blog_title" value="{{ old('blog_title', $flight->blog_title) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="blog_content">Mətn</label>
                                        <textarea class="form-control" id="blog_content"
                                            placeholder="Mətn daxil edin..."
                                            name="blog_content">{{ old('blog_content', $flight->blog_content) }}</textarea>

                                        <script>
                                            let editor = CKEDITOR.replace('blog_content', {
                                                autoGrow_onStartup: true,
                                                enterMode: CKEDITOR.ENTER_BR,
                                                FullPage: false,
                                                allowedContent: true,
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('footer')
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>-->
    <script type="text/javascript">
        var image_crop = $('#image_demo').croppie({
            viewport: {
                width: 500,
                height: 271,
                type: 'square'
            },
            boundary: {
                width: 510,
                height: 281,
            }
        });

        image_crop.croppie('bind', {
            url: "{{ asset('img/blog/' . $flight->blog_image) }}",
        });

        let url = false;


        $('#cover_image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
                image_crop.croppie('bind', {
                    url: event.target.result,
                });
                url = true
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#blog-form').submit(function(event) {
            event.preventDefault()
            let id = $("#blog-form").attr('add-edit')
            let blog_title = $("#blog_title").val()
            let blog_content = editor.getData();
            let formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append('id', id);
            formData.append('blog_title', blog_title);
            formData.append('blog_content', blog_content);


            image_crop.croppie('result', {
                type: 'blob',
                format: 'webp',
                size: {
                    width: 1170,
                    height: 635
                },
                quality: 1
            }).then(function(blob) {
                if (url) {
                    formData.append('image', blob);
                }
                ajaxFormPost(formData, "{{ route('manage.blog.save') }}");
            });
        })
        /// Ajax Function
        function ajaxFormPost(formData, actionURL) {
            $.ajax({
                url: actionURL,
                type: 'POST',
                data: formData,
                cache: false,
                async: true,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response)
                    if (response['status'] === 'success') {
                        window.location.reload()
                    } else {
                        let message = response.message;
                        msg = ""
                        for (const [key, value] of Object.entries(message)) {
                            msg = msg + value + "\n";
                        }
                        swal("Səhv", msg, "error");
                    }
                }
            });
        }
    </script>
@endsection
