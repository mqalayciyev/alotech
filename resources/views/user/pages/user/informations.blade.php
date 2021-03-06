<div class="accountContent user-information">
    {{-- Burda Alert Olacaq --}}
    <div class="ps-form__header">
        <h3> Üzvlük Məlumatlarım </h3>
    </div>
    <div class="containerSmall">
        <div class="formContainer">
            <form id="frmInfo">
                <div class="response"></div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label> Ad </label>
                            <input class="form-control rounded-0" name="first_name"
                                value="{{ auth()->user()->first_name }}" type="text">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label> Soyad</label>
                            <input class="form-control rounded-0" name="last_name"
                                value="{{ auth()->user()->last_name }}" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label> Email</label>
                    <input class="form-control rounded-0" name="email" value="{{ auth()->user()->email }}"
                        type="email">
                </div>
                <div class="form-group">
                    <label> Mobil </label>
                    <input class="form-control rounded-0" name="mobile" id="mobile"
                        value="{{ auth()->user()->mobile }}" autocomplete="off" type="tel">
                </div>

                <div class="form-group">
                    <button type="submit"
                        class="remodalConfirm btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">
                        Yenilə </button>
                </div>
            </form>
            <div class="updateAddress margin-top-50">
                <div class="ps-form__header">
                    <h3> Ətraflı məlumat</h3>
                </div>

                <form id="frmInfoDetail">
                    <div class="response"></div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="city">Şəhər</label>
                            <select name="city" class="form-control" id="city">
                                <option value="">Şəhər</option>
                                @foreach ($city as $item)
                                    <option value="{{ $item->id }}"
                                        {{ isset($user_detail->city) && $user_detail->city == $item->id ? 'selected' : null }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="city" id="city" value="{{ (isset($user_detail->city)) ? $user_detail->city : '' }}" class="form-control rounded-0"> --}}
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="zip_code">Poçt Kodu</label>
                            <input type="text" name="zip_code" id="zip_code"
                                value="{{ isset($user_detail->zip_code) ? $user_detail->zip_code : '' }}"
                                class="form-control rounded-0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label> Telefon </label>
                            <input class="form-control rounded-0" name="phone" id="phone"
                                value="{{ isset($user_detail->phone) ? $user_detail->phone : '' }}"
                                autocomplete="off" type="tel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address_detail">Fiziki ünvan</label>
                        <textarea name="address" id="address_detail"
                            class="form-control rounded-0">{{ isset($user_detail->address) ? $user_detail->address : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="remodalConfirm btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Məlumatları
                            Yenilə</button>
                    </div>
                </form>
            </div>
            <div class="updatePassword margin-top-50">
                <div class="ps-form__header">
                    <h3>Şifrə Dəyişdir</h3>
                </div>
                <form id="frmPassword">
                    <div class="response"></div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mövcud Şifrə</label>
                                <input class="form-control rounded-0" name="old_password" type="password" minlength="6">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Yeni Şifrə</label>
                                <input class="form-control rounded-0" name="password" id="password" type="password"
                                    minlength="6">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Yeni Şifrə Təkrar</label>
                                <input class="form-control rounded-0" name="password_confirmation" type="password"
                                    minlength="6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="remodalConfirm btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Şifrəni
                            Dəyişdir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('script')
    <script>
        $("#frmInfo").on('submit', function(event) {
            event.preventDefault();
            var first_name = $("#frmInfo").find("input[name='first_name']").val().trim()
            var last_name = $("#frmInfo").find("input[name='last_name']").val().trim()
            var email = $("#frmInfo").find("input[name='email']").val().trim()
            var mobile = $("#frmInfo").find("input[name='mobile']").val().trim()

            $.ajax({
                url: "{{ route('user.form_info') }}",
                type: "GET",
                data: {
                    first_name,
                    last_name,
                    email,
                    mobile,
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success('Məlumatlar dəyişdirildi');
                    } else {
                        let msg = "";
                        let message = data.message;
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }

                        for (const value of Object.values(message)) {
                            toastr.error(value);
                        }

                    }
                }
            })
        })
        $("#frmInfoDetail").on('submit', function(event) {
            event.preventDefault();
            // var country = $("#frmInfoDetail").find("input[name='country']").val().trim()
            // var state = $("#frmInfoDetail").find("input[name='state']").val().trim()
            var city = $("#frmInfoDetail").find("select[name='city']").val()
            var zip_code = $("#frmInfoDetail").find("input[name='zip_code']").val().trim()
            var address = $("#frmInfoDetail").find("textarea[name='address']").val().trim()
            var phone = $("#frmInfoDetail").find("input[name='phone']").val().trim()
            $.ajax({
                url: "{{ route('user.form_detail') }}",
                type: "GET",
                data: {
                    phone,
                    city,
                    zip_code,
                    address,
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success('Məlumatlar dəyişdirildi');
                    } else {
                        let msg = "";
                        let message = data.message;
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }

                        for (const value of Object.values(message)) {
                            toastr.error(value);
                        }
                    }
                }
            })
        })
        $("#frmPassword").on('submit', function(event) {
            event.preventDefault();
            var old_password = $("#frmPassword").find("input[name='old_password']").val().trim()
            var password = $("#frmPassword").find("input[name='password']").val().trim()
            var password_confirmation = $("#frmPassword").find("input[name='password_confirmation']").val().trim()
            $.ajax({
                url: "{{ route('user.form_password') }}",
                type: "GET",
                data: {
                    old_password,
                    password,
                    password_confirmation,
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success('Şifrə dəyişdirildi');
                    } else {
                        let msg = "";
                        let message = data.message;
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }

                        for (const value of Object.values(message)) {
                            toastr.error(value);
                        }
                    }
                },
            })
        })
    </script>
@endsection
