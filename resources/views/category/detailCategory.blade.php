@extends('layouts.layout')
@section('konten')
 
    <section style="margin-bottom:0px;border-bottom:1px solid #ddd">
        <h1> Baca {{$title}} </h1>

        <p class="top1">
            {{$description}}
        </p>

        <div id="Populer-1" class="sec" style="display: block;">

            <!-- LOOPING PAGE 1 -->
            @foreach($manga as $key => $mangaList)
                @if($key >= 1 && $key <= 5)
                    <div class="at">
                        <a href="{{url('/manga/'.$mangaList->slug_manga)}}" title="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                            <img src="{{url('/storage/komik/sampul_detail/'.$mangaList->slug_manga.'.jpg')}}" alt="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                            <div class="prk sd">
                                ★ {{$loop->iteration}} </div>
                            <h3>
                            {{$mangaList->nama_manga}}
                            </h3> {{$mangaList->views}} x •
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
                                ★ {{$loop->iteration}} </div>
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
                                ★ {{$loop->iteration}} </div>
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
    
    <!-- MANGA TERPOPULER -->
    <section>
        <div class="h2">
            <h2> Komik {{$negara}} Terpopuler 2019 </h2>
        </div>

        <div class="clr">
            <div class="bge">
                <div class="bgei">
                    <img src="{{url('/storage/komik/background_detail/'.$terpopuler->slug_manga.'.jpg')}}" style="width:300px; height:150px;" class="sd rd" alt="Baca {{$terpopuler->jenis_manga}} {{$terpopuler->nama_manga}}">
                    <div class="tpe1_inf">
                        <b>{{$terpopuler->konsep_cerita}}</b> </div>
                </div>
                <div class="kan">
                    <h3> {{$terpopuler->nama_manga}} </h3>
                    <span>{{$terpopuler->views}} x • 
                        {{ \Carbon\Carbon::parse($terpopuler->updated_at)->diffForHumans() }}
                    </span>
                    <p>
                        {{ explode('</li>', explode('<ul class="rs"> <li>', str_replace('<ul class="rs"><li>', '<ul class="rs"> <li>', $terpopuler->sinopsis))[1])[0] }}
                    </p>
                    <div class="mree">
                        <a href="{{url('/manga/'.$terpopuler->slug_manga)}}" class="mla rd sd" title="Baca {{$terpopuler->jenis_manga}} {{$terpopuler->nama_manga}}">
                            Mulai Baca
                        </a> 
                        <span>
                            <a href="{{url('other/berwarna')}}" title="Baca {{$terpopuler->jenis_manga}} Berwarna">Lainnya » </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MANGA UPDATE HARI INI -->
    <section>
        <div class="h2">
            <h2> Baca Manga Update Hari Ini! </h2>
        </div>
        <div class="tpe1">

            <!-- LOOPING MANGA HARI INI -->
            @foreach($mangaToday as $mangaTodayList)
                <div class="tpe1_1">
                    <a href="{{url('/manga/'.$mangaTodayList->slug_manga)}}">
                        <div class="gmb2">
                            <div class="vw Hot"></div>
                            <img src="{{url('/storage/komik/background_detail/'.$mangaTodayList->slug_manga.'.jpg')}}" style="width:216px; height:132px;" class="rd sd" alt="{{$mangaTodayList->jenis_manga}} {{$mangaTodayList->nama_manga}}">
                            <div class="tpe1_inf">
                                <b>{{$mangaTodayList->jenis_manga}}</b> 
                            </div>
                        </div>

                        <div class="htipe1">
                            <h3> {{$mangaTodayList->nama_manga}} </h3>
                            <div>
                                {{$mangaTodayList->views}} x • 
                                {{ \Carbon\Carbon::parse($mangaTodayList->updated_at)->diffForHumans() }}
                            </div>
                        </div>
                    </a>
                    <a href="{{url('/manga/'.$mangaTodayList->slug_manga.'/'.$mangaTodayList->episode_chapter)}}" title="{{$mangaTodayList->nama_manga}} {{$mangaTodayList->judul_chapter}} Bahasa Indonesia">
                        <span>
                            <b>{{$mangaTodayList->judul_chapter}}</b>
                        </span>
                    </a>
                </div>
            @endforeach
            <!-- END LOOPING MANGA HARI INI -->

        </div>
        <a href="{{url('manga/kategori/'.$title)}}" class="more">
            Lihat semua update {{$title}} di halaman <b>{{$title}} Terbaru</b> (klik)
        </a>
    </section>
    <!-- END MANGA UPDATE HARI INI -->

    <!-- MANGA BY GENRE -->
    <section>
        <div class="h2 h2t2">
            <h2> Genre Manga </h2>

            <div class="gre">
                <button class="tab2 tabtipe2 def2 curr" onclick="openLink2(event, 'Isekai')">Isekai</button>
                <button class="tab2 tabtipe2" onclick="openLink2(event, 'Romance')">Romance</button>
            </div>
        </div>

        <div id="Isekai" class="sec2 sectipe2" style="display: block;">
            <a href="{{url('genre/isekai')}}" class="selengkapnya" title="{{$title}} Isekai">More »</a>
            <div class="scrll">
                
                <!-- LOOPING GENRE ISEKAI -->
                @foreach($isekaiGenre as $isekaiGenreList)
                    <div class="grd2">
                        <a href="{{url('/manga/'.$isekaiGenreList->slug_manga)}}">
                            <div class="imr">
                                <div class="vw @if($isekaiGenreList->hot == 1) Hot @endif"></div>
                                <img src="{{url('/storage/komik/sampul_detail/'.$isekaiGenreList->slug_manga.'.jpg')}}" class="rd sd" alt="{{$isekaiGenreList->jenis_manga}} {{$isekaiGenreList->nama_manga}} Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>{{$isekaiGenreList->konsep_cerita}}</b> 
                                </div>
                            </div>
                            <h3> {{$isekaiGenreList->nama_manga}} </h3>
                        </a>
                        <span>
                            {{$isekaiGenreList->views}} x • 
                            {{ \Carbon\Carbon::parse($isekaiGenreList->updated_at)->diffForHumans() }}
                        </span>
                    </div>
                @endforeach
                <!-- END LOOPING GENRE ISEKAI -->

            </div>
        </div>
        <div id="Romance" class="sec2 sectipe2" style="display: none;">
            <a href="{{url('genre/isekai')}}" class="selengkapnya" title="{{$title}} Romantis">More »</a>
            <div class="scrll">

                    <!-- LOOPING GENRE ISEKAI -->
                @foreach($romanceGenre as $romanceGenreList)
                    <div class="grd2">
                        <a href="{{url('/manga/'.$romanceGenreList->slug_manga)}}">
                            <div class="imr">
                                <div class="vw @if($romanceGenreList->hot == 1) Hot @endif"></div>
                                <img src="{{url('/storage/komik/sampul_detail/'.$romanceGenreList->slug_manga.'.jpg')}}" class="rd sd" alt="{{$romanceGenreList->jenis_manga}} {{$romanceGenreList->nama_manga}} Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>{{$romanceGenreList->konsep_cerita}}</b>
                                </div>
                            </div>
                            <h3> {{$romanceGenreList->nama_manga}} </h3>
                        </a>
                        <span>
                            {{$romanceGenreList->views}} x • 
                            {{ \Carbon\Carbon::parse($romanceGenreList->updated_at)->diffForHumans() }}
                        </span>
                    </div>
                @endforeach
                <!-- END LOOPING GENRE ISEKAI -->                   

            </div>
        </div>
    </section>

    <!-- MANGA BY STATUS -->
    <section>
        <div class="h2 h2t2">
            <h2> Status {{$title}} </h2>

            <div class="gre">
                <button class="tab2 tabtipe3 def3 curr" onclick="openLink3(event, 'Manga_Baru')">Manga Baru</button>
                <button class="tab2 tabtipe3" onclick="openLink3(event, 'Manga_Tamat')">Manga Tamat</button>
            </div>
        </div>


        <!-- MANGA BARU -->
        <div id="Manga_Baru" class="sec2 sectipe3" style="display: block;">
            <div class="scrll">

                <!-- LOOPING ONGOING MANGA -->
                @foreach($onGoingStatus as $onGoingStatus)
                    <div class="grd2">
                        <a href="{{url('/manga/'.$onGoingStatus->slug_manga)}}">
                            <div class="imr">
                                <div class="vw @if($onGoingStatus->hot == 1) Hot @endif"></div>
                                <img src="{{url('/storage/komik/sampul_detail/'.$onGoingStatus->slug_manga.'.jpg')}}" class="rd sd" alt="{{$onGoingStatus->nama_manga}} Indo">
                                <div class="tpe1_inf">
                                    <b>{{$onGoingStatus->konsep_cerita}}</b> 
                                </div>
                            </div>

                            <h3> {{$onGoingStatus->nama_manga}} </h3>
                        </a>

                        <span>
                            {{$onGoingStatus->views}} x • 
                            {{ \Carbon\Carbon::parse($onGoingStatus->updated_at)->diffForHumans() }}
                        </span>
                    </div>
                @endforeach
                <!-- END LOOPING ONGOING MANGA -->
                
            </div>
        </div>
        <!-- END MANGA BARU -->

        <!-- MANGA TAMAT -->
        <div id="Manga_Tamat" class="sec2 sectipe3" style="display: none;">
            <a href="/status/end/" class="selengkapnya" title="Manga Tamat">More »</a>
            <div class="scrll">

                <!-- LOOPING END MANGA -->
                @foreach($endStatus as $endStatusList)
                    <div class="grd2">
                        <a href="{{url('/manga/'.$endStatusList->slug_manga)}}">
                            <div class="imr">
                                <div class="vw @if($endStatusList->hot == 1) Hot @endif"></div>
                                <img src="{{url('/storage/komik/sampul_detail/'.$endStatusList->slug_manga.'.jpg')}}" class="rd sd" alt="{{$endStatusList->nama_manga}} Indo">
                                <div class="tpe1_inf">
                                    <b>{{$endStatusList->konsep_cerita}}</b> 
                                </div>
                            </div>

                            <h3> {{$endStatusList->nama_manga}} </h3>
                        </a>

                        <span>
                            {{$endStatusList->views}} x • 
                            {{ \Carbon\Carbon::parse($endStatusList->updated_at)->diffForHumans() }}
                        </span>
                    </div>
                @endforeach
                <!-- END LOOPING END MANGA -->

            </div>
            <!-- END MANGA TAMAT -->
        </div>
    </section>
    <!-- END MANGA BY STATUS -->


    <!-- SIDE BAR REKOMENDASI -->
    <aside>
        <h2>Rekomendasi {{$title}}</h2>

        <!-- LOOPING REKOMENDASI -->
        @foreach($rekomendasi as $rekomendasiList)
            <div class="grd">
                <a href="{{url('/manga/'.$rekomendasiList->slug_manga)}}">
                    <div class="gmbr1">
                        <div class="vw Rekomendasi"></div>
                        <img src="{{url('/storage/komik/background_detail/'.$rekomendasiList->slug_manga.'.jpg')}}" alt="Baca {{$rekomendasiList->nama_manga}}">
                        <div class="tpe1_inf">
                            <b>{{$rekomendasiList->jenis_manga}}</b> {{$rekomendasiList->konsep_cerita}} </div>
                    </div>
                    <h4> {{$rekomendasiList->nama_manga}} </h4>
                    <span>
                    {{$rekomendasiList->views}} x • 
                    {{ \Carbon\Carbon::parse($rekomendasiList->updated_at)->diffForHumans() }}</span>
                </a>
                <p>
                {{ explode('</li>', explode('<ul class="rs"> <li>', str_replace('<ul class="rs"><li>', '<ul class="rs"> <li>', $rekomendasiList->sinopsis))[1])[0] }} </p>
            </div>
        @endforeach
        <!-- END LOOPING REKOMENDASI -->
        
    </aside>
    <!-- END SIDE BAR REKOMENDASI -->

@endsection