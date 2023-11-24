@extends('layouts.main')

@section('container')
    <!-- Content -->
        <div class="text px-5">
            <h1>Kualitas Udara di {{ $cityName }}</h1> {{-- kata bandung di samping di ambil sesuai inputan --}}
            <p>Indeks kualitas udara (AQI) dan polusi udara di {{ $cityName }}</p>
        </div>
            <div class="content">
            <div class="d-flex justify-content-between px-5">
                @if($isPremium)
                <div class="card mb-3" style="max-width: 18rem;">
                    {{-- <div class="text fs-1 fw-bold">INI ADALAH HALAMAN PREMIUM
                        <br>Developer masih liburan
                    </div> --}}
                    <div class="card-header text-center fw-bold fs-3" style="background:#FFC436">PREMIUM</div>
                    <div class="card-header text-center fs-5" style="background: #C3CBD9">Hanya Rp5.000
                        <br>per bulan</div>
                            <div class="card-body">
                                <p class="card-text">Melihat kmauuuu udara real time.</p>
                                <p class="card-text">Melihat cara menghadapi nya.</p>
                                <p class="card-text">Menerima notifikasi udara buruk ketika anda pada lokasi tertentu.</p>
                                <div class="d-flex flex-column align-items-center">
                                    @auth
                                    <a href="{{ route('subs') }}"><button type="submit" class="btn" style="background: #B4BFD4">Sign Up</button></a>
                                    @else
                                    <a href="{{ route('register') }}"><button type="submit" class="btn" style="background: #B4BFD4">Sign Up</button></a>
                                    <div class="alert alert-warning" role="alert">
                                        Silahkan login terlebih dahulu
                                    </div>
                                    @endauth
                                </div>
                            </div>
                </div>

                @else
                <div class="card mb-3" style="max-width: 18rem;">
                    <div class="card-header text-center fw-bold fs-3" style="background:#FFC436">PREMIUM</div>
                    <div class="card-header text-center fs-5" style="background-color: {{ $bg }}">Hanya Rp5.000
                        <br>per bulan</div>
                            <div class="card-body">
                                <p class="card-text">Melihat Index udara real time.</p>
                                <p class="card-text">Melihat cara menghadapi nya.</p>
                                <p class="card-text">Menerima notifikasi udara buruk ketika anda pada lokasi tertentu.</p>
                                <div class="d-flex flex-column align-items-center">
                                    @auth
                                    <a href="{{ route('subs') }}"><button type="submit" class="btn" style="background: #B4BFD4">Sign Up</button></a>
                                    @else
                                    <a href="{{ route('register') }}"><button type="submit" class="btn" style="background: #B4BFD4">Sign Up</button></a>
                                    <div class="alert alert-warning" role="alert">
                                        Silahkan login terlebih dahulu
                                    </div>
                                    @endauth
                                </div>
                            </div>
                </div>

                @endif

                <div class="card mb-3" style="width: 70%;">
                    <div class="card-body d-flex justify-content-between" style="background: {{ $background }}" >
                        <div class="card-body rounded" style="background-color: {{ $background_color }}; width: 5px;">
                            <h5 class="card-title fs-6">AQI US</h5>
                            <p class="card-text fs-3 mt-4">{{ $aqius }}</p> {{-- aqius disamping di ambil dari response api sesuai daerah --}}
                        </div>                        
                        <div class="card-body">
                            <h5 class="card-title fw-medium">Index AQI Langsung</h5>
                            <p class="card-text fw-bold fs-5 mt-4">{{ $text }}</p>
                        </div>

                        <div class="card-body d-flex justify-content-end" style="margin-right: 50px;">
                            <img src="img/head.png" alt="" width="70" height="70">
                        </div>
                    </div>

                    <div class="card-body" style="background: #D9D9D9">
                        <div class="text">
                            {{-- <h5>Penyebab polusi udara</h5> --}}
                        </div>
                        <div class="card-group">
                            <div class="card">
                              <img src="img/news1.jpg" class="card-img-top" alt="...">
                              <div class="card-body">
                                <p class="card-text">Kebakaran pada dareah XX meng-
                                    akibatkan timbul asap ke daerah...</p>
                              </div>
                            </div>
                            <div class="card">
                              <img src="img/news2.png" class="card-img-top" alt="...">
                              <div class="card-body">
                                <p class="card-text">Akibat pabrik dan pltu, sejumlah wi
                                    layah di bandung mengalami polu...</p>
                              </div>
                            </div>
                            <div class="card">
                              <img src="img/news2.png" class="card-img-top" alt="...">
                              <div class="card-body">
                                <p class="card-text">Akibat pabrik dan pltu, sejumlah wi
                                    layah di bandung mengalami polu...</p>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
<!-- End Content -->