<!DOCTYPE html>
<html lang="en">
@php
    $settings = getSettingValue();
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="turbo-visit-control" content="reload">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    @if(!empty(getSEOTools()->keyword))--}}
        <meta name="keywords" content="@yield('meta_tags'),{{!empty(getSEOTools()) ? getSEOTools()->keyword : ''}}">
{{--    @endif--}}
{{--    @if(!empty(getSEOTools()->site_description))--}}
        <meta name="description" content="@if(View::hasSection('meta_description'))@yield('meta_description')
        @else{{!empty(getSEOTools()) ? getSEOTools()->site_description : ''}}@endif">
{{--    @endif--}}

    <meta http-equiv="content-language" content="{{ getFrontSelectLanguageName() ?? 'ru' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:image" content="@if(View::hasSection('meta_image'))@yield('meta_image')@else{{ $settings['logo'] }}@endif"/>
    <title>Qazqar | {{(!empty(getSEOTools()->site_title)) ? getSEOTools()->site_title : $settings['application_name']}} </title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('main/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('main/css/swiper.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('main/css/app.css') }}" rel="stylesheet" type="text/css">


    @livewireStyles
    {!! reCaptcha()->renderJs() !!}

{{--    @livewireScripts--}}
{{--    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>--}}
{{--    @include('livewire.livewire-turbo')--}}

    @php
        $langSession = Session::get('frontLanguageChange');
        $frontLanguage = !isset($langSession) ? getSettingValue()['front_language'] : $langSession;
    @endphp

{{--    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"--}}
{{--            data-turbolinks-eval="false" data-turbo-eval="false"></script>--}}
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @routes
    <script src="{{ asset('messages.js') }}"></script>
    <script data-turbo-eval="false">
        let userProfile = '{{ asset('images/avatar.png') }}'
        let siteKey = "{{$settings['site_key']}}"
        let frontLanguage = "{{ App\Models\Language::find($frontLanguage)->iso_code }}"

        Lang.setLocale(frontLanguage)
    </script>
{{--    <script src="{{ mix('assets/js/front-third-party.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/front-pages.js') }}"></script>--}}
    <script>
        {!! (!empty(getSEOTools()->google_analytics)) ? getSEOTools()->google_analytics : '' !!}
    </script>

    <script>
        function initializeSiterWPWidget() {
            SiterWPWidget({
                phone: '+7 777 777 77 77',
                phoneNormalize: true,
                message: 'Hello world'
            });
        }
        const siterWPWidgetScript = document.createElement('script');
        siterWPWidgetScript.src = https://siter.kz/widget-wp/main.js?${Date.now()};
        siterWPWidgetScript.async = true;
        siterWPWidgetScript.onload = initializeSiterWPWidget;
        document.head.appendChild(siterWPWidgetScript);
    </script>
</head>
<body class="
 @unless(
        Route::currentRouteName() == 'front.home' ||
        Route::currentRouteName() == 'front.catalog' ||
        Route::currentRouteName() == 'front.accent2015' ||
        Route::currentRouteName() == 'front.accent2023' ||
        Route::currentRouteName() == 'front.elantra2023' ||
        Route::currentRouteName() == 'front.camry2016' ||
        Route::currentRouteName() == 'front.sonata2022' ||
        Route::currentRouteName() == 'front.tucson2023' ||
        Route::currentRouteName() == 'front.k52021'
    )
not-main-page @endunless">
<div class="preloader-block">
    <div class="preloader-div">
        <span class="text">Загрузка</span>
        <span class="preloader"></span>
    </div>
</div>
@include('front_new.layouts.header')
<div>
    @yield('content')
</div>
{{--<div class="preloader-block">--}}
{{--    <div class="preloader-div">--}}
{{--        <span class="text">Загрузка</span>--}}
{{--        <span class="preloader"></span>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- start footer section -->
@include('front_new.layouts.footer')
<!-- end footer section -->
<div class="navbar-m-backdrop"></div>
{{--@if($settings['show_cookie'])--}}
{{--    @include('cookie-consent::index')--}}
{{--@endif--}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/inputmask.min.js"></script>
<script src="{{ asset('main/js/swiper.min.js') }}"></script>
<script src="{{ asset('main/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('main/js/script.js') }}"></script>
<script>
    var images = document.getElementsByTagName('img');

    // Проходим по каждому изображению
    for (var i = 0; i < images.length; i++) {
        // Получаем значение атрибута src
        var srcValue = images[i].getAttribute('src');

        // Проверяем, начинается ли значение на http://localhost
        if (srcValue && srcValue.startsWith('http://localhost')) {
            // Заменяем только часть значения src
            var newSrcValue = srcValue.replace('http://localhost', '');
            images[i].setAttribute('src', newSrcValue);
        }
    }
</script>
</body>
</html>
