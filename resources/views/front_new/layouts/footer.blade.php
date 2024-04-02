<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div id="map" class="map"></div>
            </div>
            <div class="col-12 col-lg-6 mt-md-0 mt-4">
                <img src="{{asset('main/img/logo-white.png')}}" alt="logo" class="footer-logo">
                <h6 class="footer-title">@lang('main.podderzhka_klientov1') <br>@lang('main.podderzhka_klientov2')</h6>
                <p class="footer-subtitle">@lang('main.nash_ofic_rabotaet1') <br>@lang('main.nash_ofic_rabotaet2')</p>
                <ul>
                    <li class="list-flex">
                        <i class="material-symbols-outlined">location_on</i>
                        <p class="grey-text text-lighten-3">@lang('main.address')</p>
                    </li>
                    <li class="list-flex">
                        <i class="material-symbols-outlined">phone</i>
                        <p class="grey-text text-lighten-3"> +7 776 350 41 41</p>
                    </li>
                    <li class="list-flex">
                        <i class="material-symbols-outlined">chat</i>
                        <p class="grey-text text-lighten-3">+7 776 350 41 41</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="end">
            © @php echo  date('Y') @endphp Qazqar. @lang('main.all_rights_reserved')
        </div>
    </div>
</footer>
