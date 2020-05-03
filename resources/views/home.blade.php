@extends('layouts.layout')
@section('konten')
    <section style="margin-bottom:0px;border-radius:0">
        <h1> {{$web_title}} - Baca Komik </h1>
        <p class="top1"> Baca 16 komik terpopuler di minggu ini versi {{$web_title}}. </p>

        <div id="Populer-1" class="sec" style="display: block;">
            <!-- LOOPING PAGE 1 -->
            @foreach($manga as $key => $mangaList)
                @if($key >= 1 && $key <= 5)
                    <div class="at">
                        <a href="{{url('/manga/'.$mangaList->slug_manga)}}" title="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                            <img src="{{url('/storage/komik/sampul_detail/'.$mangaList->slug_manga.'.jpg')}}" alt="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                            <div class="prk sd">
                                ★ {{$loop->iteration}} 
                            </div>
                            <h3>
                                {{$mangaList->nama_manga}}
                            </h3> 
                            {{$mangaList->views}} x •
                            {{ \Carbon\Carbon::parse($mangaList->updated_at)->diffForHumans() }}
                        </a>
                    </div>
                @endif
            @endforeach
            <!-- END LOOPING PAGE 1 -->
        </div>


        <div id="Populer-2" class="sec" style="display: none;">
            <!-- LOOPING PAGE 2 -->
            @foreach($manga as $key => $mangaList)
                @if($key >= 6 && $key <= 10)
                    <div class="at">
                        <a href="{{url('/manga/'.$mangaList->slug_manga)}}" title="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                            <img src="{{url('/storage/komik/sampul_detail/'.$mangaList->slug_manga.'.jpg')}}" alt="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                            <div class="prk sd">
                                ★ {{$loop->iteration}} 
                            </div>
                            <h3>
                            {{$mangaList->nama_manga}}
                            </h3> {{$mangaList->views}} x • 
                            {{ \Carbon\Carbon::parse($mangaList->updated_at)->diffForHumans() }}
                        </a>
                    </div>
                @endif
            @endforeach
            <!-- END LOOPING PAGE 2 -->
        </div>
        <div id="Populer-3" class="sec" style="display: none;">
                <!-- LOOPING PAGE 3 -->
            @foreach($manga as $key => $mangaList)
                @if($key >= 11 && $key <= 15)
                    <div class="at">
                        <a href="{{url('/manga/'.$mangaList->slug_manga)}}" title="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                            <img src="{{url('/storage/komik/sampul_detail/'.$mangaList->slug_manga.'.jpg')}}" alt="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                            <div class="prk sd">
                                ★ {{$loop->iteration}} 
                            </div>
                            <h3>
                            {{$mangaList->nama_manga}}
                            </h3> {{$mangaList->views}} x •
                            {{ \Carbon\Carbon::parse($mangaList->updated_at)->diffForHumans() }}
                        </a>
                    </div>
                @endif
            @endforeach
            <!-- END LOOPING PAGE 3 -->
        </div>
    </section>

    <!-- PAGINATION -->
    <div class="mnu">
        <button class="tab def curr" onclick="openLink(event, 'Populer-1')">1-6</button>
        <button class="tab" onclick="openLink(event, 'Populer-2')">7-11</button>
        <button class="tab" onclick="openLink(event, 'Populer-3')">12-16</button>
    </div>

    <!-- PUSAT INFORMASI -->
    <section id="informasi">
        <div class="h2">
            <h2>Pusat Informasi</h2> </div>
        <ul style="padding-left: 20px;">
            <li>Kurangi keluar rumah, baca komik di <b>Mangajaya</b> aja karena update lebih dari 50 judul perharinya!</li>
            <li><b>Solo Leveling</b> dan <b>The Beginning After the End</b> season 1 sudah tamat, akan dilanjutkan beberapa bulan lagi</li>
            <li><b>Apotheosis</b> sudah mentok, akan rilis 1 chapter perminggu, baca juga <b>Martial Peak</b> karena ceritanya mirip dan juga rilis banyak chapter perharinya.</li>
        </ul>
    </section>

    <!-- BOOKMARK -->
    <!-- <section id="bookmark">
        <h2>Komik yang Kamu Subscribe</h2>
        <p>Komik-komik yang kamu subscribe di Komiku, diurut berdasarkan update terbarunya.</p>
        <div class="daftar"> <a href="/ikuti/" class="more" style="margin-top: 0;">Lihat semua update komik yang kamu subscribe</a> </div>
    </section> -->
    <!-- <script src="https://komiku.co.id/ikuti-iframe/" async=""></script> -->

    <!-- KOMIK HOT -->
    <section>
        <div class="h2">
            <h2> Update Komik Hot </h2> 
        </div>

        <div class="sec2" style="width: 100%;padding-top: 30px;">
            <div class="scrll">

                <!-- LOOPING HOT MANGA -->
                @foreach($hotManga as $hotMangaList)
                    <div class="grd2 grd3">
                        <a class="popunder" href="{{url('/manga/'.$hotMangaList[0]->slug_manga)}}" title="Baca Manhua Martial Peak">
                            <div class="imr">
                                <div class="vw @if($hotMangaList[0]->berwarna == 1) Warna @endif Hot"> @if($hotMangaList[0]->berwarna == 1) Warna @endif</div> 
                                <img src="{{url('/storage/komik/sampul_detail/'.$hotMangaList[0]->slug_manga.'.jpg')}}" class="rd sd" alt="Komik {{$hotMangaList[0]->nama_manga}} Bahasa Indonesia">
                                <div class="tpe1_inf"> 
                                    <b>{{$hotMangaList[0]->konsep_cerita}}</b>
                                </div>
                                <div class="{{$hotMangaList[0]->jenis_manga}}"></div>
                            </div>
                            <h3> {{$hotMangaList[0]->nama_manga}} </h3> 
                        </a> 
                        <span>
                            {{$hotMangaList[0]->views}} x • 
                            {{ \Carbon\Carbon::parse($mangaList->created_at)->diffForHumans() }}
                        </span> 
                        <a class="popunder" href="{{url('/manga/'.$hotMangaList[0]->slug_manga.'/'.str_replace('.0', '', $hotMangaList[0]->episode_chapter))}}" title="{{$hotMangaList[0]->nama_manga}} {{$hotMangaList[0]->judul_chapter}} Bahasa Indonesia">
                            <span>
                                <b>{{$hotMangaList[0]->judul_chapter}}</b>
                            </span>
                        </a> 
                    </div>
                @endforeach
                <!-- END LOOPING HOT MANGA -->
            
            </div>
        </div>
    </section>


    <!-- KOMIK TERBARU -->
    <section>
        <div class="h2">
            <h2> Baca Komik Terbaru </h2> </div>
        <div class="tpe1">

            <!-- LOOPING KOMIK TERBARU -->
            @foreach($newManga as $newMangaList)
                <div class="tpe1_1">
                    <a class="popunder" href="{{url('/manga/'.$newMangaList[0]->slug_manga)}}" title="Baca {{$newMangaList[0]->jenis_manga}} {{$newMangaList[0]->nama_manga}}">
                        <div class="gmb2">
                            @if($newMangaList[0]->berwarna == 1 || $newMangaList[0]->hot == 1)
                                <div class="vw @if($newMangaList[0]->berwarna == 1) Berwarna @endif @if($newMangaList[0]->hot == 1) Hot @endif"> @if($newMangaList[0]->berwarna == 1) Warna @endif </div> 
                            @endif

                            <img src="{{url('/storage/komik/background_detail/'.$newMangaList[0]->slug_manga.'.jpg')}}" style="width:220px; height:134px;" class="rd sd" alt="Komik Online {{$newMangaList[0]->nama_manga}}">
                            <div class="tpe1_inf"> 
                                <b>{{$newMangaList[0]->konsep_cerita}}</b>
                            </div>
                            <div class="{{$newMangaList[0]->jenis_manga}}"></div>
                        </div>
                        <div class="htipe1">
                            <h3> {{$newMangaList[0]->nama_manga}} </h3>
                            <div> 
                                {{$newMangaList[0]->views}} x • 
                                {{ \Carbon\Carbon::parse($newMangaList[0]->updated_at)->diffForHumans() }}
                            </div>
                        </div>
                    </a> 
                    <a class="popunder" href="{{url('/manga/'.$newMangaList[0]->slug_manga.'/'.str_replace('.0', '', $newMangaList[0]->episode_chapter))}}" title="{{$newMangaList[0]->nama_manga}} {{$newMangaList[0]->judul_chapter}} Bahasa Indonesia">
                        <span>
                            <b> {{$newMangaList[0]->judul_chapter}} </b>
                        </span>
                    </a>
                </div>
            @endforeach
            <!-- END LOOPING KOMIK TERBARU -->

        </div> 
        <a href="{{url('manga')}}" class="more popunder">Lihat semua update komik di halaman 
            <b>Komik Terbaru</b> (klik)
        </a>
    </section>

    <!-- GENRE KOMIK -->
    <section>
        <div class="h2 h2t2">
            <h2> Genre Komik </h2>
            <div class="gre">
                <button class="tab2 tabtipe2 def2 curr" onclick="openLink2(event, 'Fantasi')">Fantasi</button>
                <button class="tab2 tabtipe2" onclick="openLink2(event, 'Isekai')">Isekai</button>
                <button class="tab2 tabtipe2" onclick="openLink2(event, 'Romance_SoL')">Romantis</button>
            </div>
        </div>


        <div id="Fantasi" class="sec2 sectipe2" style="display: block;"> <a href="/genre/fantasy/" class="selengkapnya" title="Komik Fantasi">More »</a>
            <div class="scrll">

                <!-- LOOPING FANTASI GENRE -->
                @foreach($fantasiManga as $fantasiMangaList)
                    <div class="grd2">
                        <a class="popunder" href="{{url('/manga/'.$fantasiMangaList->slug_manga)}}" title="Baca {{$fantasiMangaList->jenis_manga}} {{$fantasiMangaList->nama_manga}}">
                            <div class="imr">
                                <div class="vw Berwarna @if($fantasiMangaList->hot == 1) Hot @endif"> @if($fantasiMangaList->berwarna == 1) Warna @endif</div> 
                                <img src="{{url('/storage/komik/sampul_detail/'.$fantasiMangaList->slug_manga.'.jpg')}}" class="rd sd" alt="Baca {{$fantasiMangaList->jenis_manga}} {{$fantasiMangaList->nama_manga}}">
                                <div class="tpe1_inf"> 
                                    <b>{{$fantasiMangaList->konsep_cerita}}</b> 
                                </div>
                                <div class="{{$fantasiMangaList->jenis_manga}}"></div>
                            </div>
                            <h3> {{$fantasiMangaList->nama_manga}} </h3> 
                        </a>
                        <span>
                            {{$fantasiMangaList->views}} x • 
                            {{ \Carbon\Carbon::parse($fantasiMangaList->updated_at)->diffForHumans() }}
                        </span> 
                    </div>
                @endforeach
                <!-- END LOOPING FANTASI GENRE -->

            </div>
        </div>


        <div id="Isekai" class="sec2 sectipe2" style="display: none;"> <a href="/genre/isekai/" class="selengkapnya" title="Komik Isekai">More »</a>
            <div class="scrll">
                
                <!-- LOOPING ISEKAI GENRE -->
                @foreach($isekaiManga as $isekaiMangaList)
                    <div class="grd2">
                        <a class="popunder" href="{{url('/manga/'.$isekaiMangaList->slug_manga)}}" title="Baca {{$isekaiMangaList->jenis_manga}} {{$isekaiMangaList->nama_manga}}">
                            <div class="imr">
                                <div class="vw Berwarna @if($isekaiMangaList->hot == 1) Hot @endif"> @if($isekaiMangaList->berwarna == 1) Warna @endif</div> 
                                <img src="{{url('/storage/komik/sampul_detail/'.$isekaiMangaList->slug_manga.'.jpg')}}" class="rd sd" alt="Baca {{$isekaiMangaList->jenis_manga}} {{$isekaiMangaList->nama_manga}}">
                                <div class="tpe1_inf"> 
                                    <b>{{$isekaiMangaList->konsep_cerita}}</b> 
                                </div>
                                <div class="{{$isekaiMangaList->jenis_manga}}"></div>
                            </div>
                            <h3> {{$isekaiMangaList->nama_manga}} </h3> 
                        </a>
                        <span>
                            {{$isekaiMangaList->views}} x • 
                            {{ \Carbon\Carbon::parse($isekaiMangaList->updated_at)->diffForHumans() }}
                        </span> 
                    </div>
                @endforeach
                <!-- END LOOPING ISEKAI GENRE -->

            </div>
        </div>


        <div id="Romance_SoL" class="sec2 sectipe2" style="display: none;"> <a href="/genre/romance/" class="selengkapnya" title="Komik Romantis">More »</a>
            <div class="scrll">

                <!-- LOOPING ROMANTIS GENRE -->
                @foreach($romantisManga as $romantisMangaList)
                    <div class="grd2">
                        <a class="popunder" href="{{url('/manga/'.$romantisMangaList->slug_manga)}}" title="Baca {{$romantisMangaList->jenis_manga}} {{$romantisMangaList->nama_manga}}">
                            <div class="imr">
                                <div class="vw Berwarna @if($romantisMangaList->hot == 1) Hot @endif"> @if($romantisMangaList->berwarna == 1) Warna @endif</div> 
                                <img src="{{url('/storage/komik/sampul_detail/'.$romantisMangaList->slug_manga.'.jpg')}}" class="rd sd" alt="Baca {{$romantisMangaList->jenis_manga}} {{$romantisMangaList->nama_manga}}">
                                <div class="tpe1_inf"> 
                                    <b>{{$romantisMangaList->konsep_cerita}}</b> 
                                </div>
                                <div class="{{$romantisMangaList->jenis_manga}}"></div>
                            </div>
                            <h3> {{$romantisMangaList->nama_manga}} </h3> 
                        </a>
                        <span>
                            {{$romantisMangaList->views}} x • 
                            {{ \Carbon\Carbon::parse($romantisMangaList->updated_at)->diffForHumans() }}
                        </span> 
                    </div>
                @endforeach
                <!-- END LOOPING ROMANTIS GENRE -->

            </div>
        </div>
    </section>

    <!-- STATUS KOMIK -->
    <section>
        <div class="h2 h2t2">
            <h2> Status Komik </h2>
            <div class="gre">
                <button class="tab2 tabtipe3 def3 curr" onclick="openLink3(event, 'Komik_Baru')">Baru</button>
                <button class="tab2 tabtipe3" onclick="openLink3(event, 'Komik_Tamat')">Tamat</button>
            </div>
        </div>

        <!-- KOMIK BARU -->
        <div id="Komik_Baru" class="sec2 sectipe3" style="display: block;">
            <div class="scrll">

                <!-- LOOPING END MANGA -->
                @foreach($onGoingStatus as $onGoingStatusList)
                    <div class="grd2">
                        <a class="popunder" href="{{url('/manga/'.$onGoingStatusList->slug_manga)}}" title="Baca {{$onGoingStatusList->jenis_manga}} {{$onGoingStatusList->nama_manga}}">
                            <div class="imr">
                                <div class="vw "></div> <img src="{{url('/storage/komik/sampul_detail/'.$onGoingStatusList->slug_manga.'.jpg')}}" class="rd sd" alt="Baca {{$onGoingStatusList->jenis_manga}} {{$onGoingStatusList->nama_manga}}">
                                <div class="tpe1_inf"> <b>{{$onGoingStatusList->konsep_cerita}}</b> </div>
                                <div class="{{$onGoingStatusList->jenis_manga}}"></div>
                            </div>
                            <h3> {{$onGoingStatusList->nama_manga}} </h3> 
                        </a>
                        <span>
                            {{$onGoingStatusList->views}} x 
                            {{ \Carbon\Carbon::parse($onGoingStatusList->created_at)->diffForHumans() }}
                        </span>
                    </div>
                @endforeach
                <!-- END LOOPING END MANGA -->

            </div>
        </div>

        <!-- KOMIK TAMAT -->
        <div id="Komik_Tamat" class="sec2 sectipe3" style="display: none;"> 
            <a href="{{url('status/end')}}" class="selengkapnya" title="Komik Tamat">More »</a>
            <div class="scrll">
                
                <!-- LOOPING END MANGA -->
                @foreach($endStatus as $endStatusList)
                    <div class="grd2">
                        <a class="popunder" href="{{url('/manga/'.$endStatusList->slug_manga)}}" title="Baca {{$endStatusList->jenis_manga}} {{$endStatusList->nama_manga}}">
                            <div class="imr">
                                <div class="vw "></div> <img src="{{url('/storage/komik/sampul_detail/'.$endStatusList->slug_manga.'.jpg')}}" class="rd sd" alt="Baca {{$endStatusList->jenis_manga}} {{$endStatusList->nama_manga}}">
                                <div class="tpe1_inf"> <b>{{$endStatusList->konsep_cerita}}</b> </div>
                                <div class="{{$endStatusList->jenis_manga}}"></div>
                            </div>
                            <h3> {{$endStatusList->nama_manga}} </h3> 
                        </a>
                        <span>
                            {{$endStatusList->views}} x 
                            {{ \Carbon\Carbon::parse($endStatusList->created_at)->diffForHumans() }}
                        </span>
                    </div>
                @endforeach
                <!-- END LOOPING END MANGA -->
            </div>
        </div>
       
    </section>


    <aside>
        <h2>Rekomendasi Komik</h2>
        <p class="ades"> Bingung mau baca komik apa? Cek judul-judul rekomendasi langsung dari Mangajaya dibawah ini, dijamin seru! </p>
        
        <!-- LOOPING REKOMENDASI KOMIK -->
        @foreach($rekomendasi as $rekomendasiList)
            <div class="grd">
                <a class="popunder" href="{{url('/manga/'.$rekomendasiList->slug_manga)}}" title="Baca {{$rekomendasiList->jenis_manga}} {{$rekomendasiList->nama_manga}}">
                    <div class="gmbr1">
                        <div class="vw @if($rekomendasiList->berwarna == 1) Berwarna @endif @if($rekomendasiList->rekomendasi == 1) Rekomendasi @endif"> @if($rekomendasiList->berwarna == 1) Warna @endif</div> 
                        <img src="{{url('/storage/komik/background_detail/'.$rekomendasiList->slug_manga.'.jpg')}}" alt="Baca {{$rekomendasiList->views}} {{$rekomendasiList->views}}">
                        <div class="tpe1_inf">
                            <b>{{$rekomendasiList->jenis_manga}}</b> 
                            {{$rekomendasiList->konsep_cerita}} 
                        </div>
                        <div class="{{$rekomendasiList->jenis_manga}}"></div>
                    </div>
                    <h4>{{$rekomendasiList->nama_manga}} </h4> 
                    <span>
                        {{$rekomendasiList->views}} x • 
                        {{ \Carbon\Carbon::parse($rekomendasiList->created_at)->diffForHumans() }}
                        @if($rekomendasiList->berwarna == 1) Berwarna @endif
                    </span>
                </a>
                <p> 
                    {{ explode('</li>', explode('<li>', $rekomendasiList->sinopsis)[1])[0] }}
                </p>
            </div>
        @endforeach
        <!-- END LOOPING REKOMENDASI KOMIK -->

    </aside>
@endsection