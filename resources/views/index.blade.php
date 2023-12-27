@extends('layouts.main')

@section('container')
    <!-- Content -->
    <div class="d-flex justify-content-between">
        <div class="text px-5">
            <h1>Kualitas Udara di {{ $cityName }}</h1> {{-- {{ $cityName }} --}}
            <p>Indeks kualitas udara (AQI) dan polusi udara di {{ $cityName }}</p>
        </div>
        {{-- <div class="notif px-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/notif.png" alt="" width="20" height="20">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Tidak Ada Notifikasi</a></li>
                    <li>
                    </li>
                </ul>
            </li>
        </div> --}}
    </div>
            <div class="content">
            <div class="d-flex justify-content-between gap-3">
                @if($isPremium)
                <div class="card mb-3" style="width: 30%;">
                    <div class="text p-3" style="font-size: 15px">Bagaimana cara melindungi dari
                        <br>polusi udara di Kota {{ $cityName }}?
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 g-4 p-4">
                        <div class="col">
                          <div class="card">
                            <img src="img/img1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text text-center" style="font-size: 10px">Memakai masker</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <img src="img/img2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text text-center" style="font-size: 10px"">tutup jendela</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <img src="img/img3.png" class="card-img-top" alt="...">
                            <div class="card-body" style="font-size: 10px">
                              <p class="card-text text-center">bersih bersih</p>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <img src="img/img4.png" class="card-img-top" alt="...">
                            <div class="card-body" style="font-size: 10px">
                              <p class="card-text text-center">stay at home</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>

                @else
                <div class="card mb-4" style="width: 30%;">
                    <div class="card-header text-center fw-bold fs-3" style="background:#FFC436">PREMIUM</div>
                    <div class="card-header text-center fs-5" style="background: #C3CBD9">Hanya Rp5.000
                        <br>per bulan</div>
                            <div class="card-body">
                                <p class="card-text">Melihat Index udara real time.</p>
                                <p class="card-text">Melihat cara menghadapi nya.</p>
                                <p class="card-text">Menerima notifikasi udara buruk ketika anda pada lokasi tertentu.</p>
                                <div class="d-flex flex-column align-items-center">
                                    @auth
                                    <a href="{{ route('subs') }}"><button type="submit" class="btn" style="background: #B4BFD4">Subscribe</button></a>
                                    @else
                                    <a href="{{ route('register') }}"><button type="submit" class="btn" style="background: #B4BFD4">Subscribe</button></a>
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
                        <div class="card-body rounded" style="background-color: {{ $background_color }}; width: 13%;">
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
                            <h5>Penyebab polusi udara</h5>
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