@extends('user.layouts.app')
@section('title', 'Məxfilik siyasəti')
@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">@lang('content.Home')</a></li>
                <li class="active">Məxfilik siyasəti</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="page ">
                    <h1 style="font-size: 27px;">{{ config('app.name') }} məxfilik siyasəti.</h1>
                    <div class="info-pay">
                        <p>
                            <b>Bizim saytın izlədiyi/topladığı məlumat</b><br>
                            1. Saytın optimallaşdırılması, sayta daxil olan istifadəçilərlə operativ əks əlaqə yaratmaq,
                            faydalı məlumatların verilməsi və statistikanın toplanması məqsədi ilə, bizim veb-xidmətlər
                            sizin kompüterin (qurğuların) internetə qoşulması, eləcə də daxil olma zamanı IP ünvan və cookie
                            faylları haqda avtomatik olaraq məhdud məlumatları toplayır. Toplanan fayllar bizə, daxil
                            olanların şəxsi məlumatları deyil, məhz kompüterin (qurğu) ID ünvanını bildirərək, Sizin hansı
                            səhifələrə daxil olduğunuz haqqında məlumat verir. <br>
                            <br>
                        </p>
                        <p>
                            2. Qəsdən şəxsi identifikasiya olmadığı təqdirdə, (məsələn, qeydiyyat vasitəsilə) hətta sizin
                            kompüterin cookies fayllarının istifadəsi zamanı belə, şəxsiyyətinizin müəyyənləşdirilməsi
                            mümkün deyil. Cokkies fayllarında saxlanılan şəxsi məlumatlar – sizin təqdim etdiyiniz
                            məlumatlardır. Bizim cookie faylları sizin şəxsi cihazdan məlumatları oxuya bilməz. <br>
                            <br>
                        </p>
                        <p>
                            3. Saytın müəyyən funskiyalarından istifadə etmək üçün (məsələn, malən onlayn sifarişi və
                            ödənişi)istifadəçilər qeydiyyatdan keçməli və eyni zamanda müəyyən məlumatları təqdim
                            etməlidirlər (məsələn, biz ad, elektron poçt ünvanı, telefon nömrəsi, şəhər və poçt indeksi
                            tələb edə bilərik). <br>
                            <br>
                        </p>
                        <p>
                            4. Sizin təqdim etdiyiniz məlumatlar daha şəxsləndirilmiş məlumatların verilməsində yardımcı ola
                            bilər, saytı sizin maraqlarınıza uyğunlaşdıra və onu daha da dolğun edə bilər. Anonimliyi
                            saxlamaq fikrinə düşsəniz, saytda olan bütün məlumatları qeydiyyatsız əldə edə bilərsiniz. <br>
                            <br>
                        </p>
                        <p>
                            <b>Təhlükəsizlik</b><br>
                            Bu sayt məlumat itkisi, məlumatın yalnış və qeyri-qanuni istifadə edilməsi və ya dəyişilməsinin
                            qarşısının alınması üçün çoxsaylı təhlükəsizlik tədbirlərindən istifadə edir. Hazırki tədbirlər
                            şifrənin istifadə olunmasını, təhlükəsizlik serverləri ilə əlaqəni, məlumatların şifrlənməsini,
                            ehtiyat surət çıxarılmasını, nəhayət bloklanma və xəbərdarlıq sistemini özündə cəmləyir. <br>
                            <br>
                        </p>
                        <b>Dəyişiklik və yeniləşmə</b><br>
                        Biz məxfilik siyasətini dəyişmək hüququnu özümüzdə saxlayırıq. Məxfilik Siyasətində hər-hansı
                        dəyişiklik saytda yerləşdiriləcək.<br>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
