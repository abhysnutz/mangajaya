@extends('layouts.layout')
@section('konten')
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px);border-radius:0">
        <h1>
            Baca Komik Terbaru
        </h1>
        <div class="filter">

            <p>
                Tampilkan berdasarkan jenis komik:
            </p>
            <form class="filer2" action="/manga/">
                <select name="category_name" id="filter" class="formfiler">
                    <option class="level-1" value="0">Semua (Manga, Manhua, Manhwa)</option>
                    <option class="level-1" value="manga">Manga (Jepang)</option>
                    <option class="level-1" value="manhua">Manhua (China)</option>
                    <option class="level-1" value="manhwa">Manhwa (Korea)</option>
                </select>
                <input class="filter3" value="Filter" type="submit">
            </form>
        </div>
        <div class="daftar">
            
            <!-- LOOPING NEW MANGA -->
            @foreach($manga as $mangaList)
                <div class="bge">
                    <div class="bgei">
                        <a href="{{url('manga/'.$mangaList->slug_manga)}}" class="popunder">
                            @if($mangaList->hot == 1 || $mangaList->rekomendasi == 1)
                                <div class="vw @if($mangaList->berwarna == 1) Berwarna @endif @if($mangaList->hot == 1) Hot @endif @if($mangaList->rekomendasi == 1) Rekomendasi @endif"> 
                                    @if($mangaList->hot == 1) Hot @endif 
                                    @if($mangaList->rekomendasi == 1) Rekomendasi @endif
                                </div>
                            @endif
                            <img src="{{url('/storage/komik/background_detail/'.$mangaList->slug_manga.'.jpg')}}" class="sd rd">
                            <div class="tpe1_inf">
                                <b>{{$mangaList->jenis_manga}}</b> {{$mangaList->konsep_cerita}} 
                            </div>
                        </a>
                    </div>
                    <div class="kan">
                        <a href="{{url('manga/'.$mangaList->slug_manga)}}" class="popunder">
                            <h3> {{$mangaList->nama_manga}} </h3>
                        </a>
                        <span>
                            {{$mangaList->views}} x • 
                            {{ \Carbon\Carbon::parse($mangaList->created_at)->diffForHumans() }}
                            @if($mangaList->berwarna == 1) Berwarna @endif
                        </span>

                        <!-- SINOPSIS SINGKAT -->
                        <p>
                            {{ explode('</li>', explode('<ul class="rs"> <li>', $mangaList->sinopsis)[1])[0] }}
                        </p>
                           
                        <div class="mree">
                            <a href="{{url('manga/'.$mangaList->slug_manga.'/'.str_replace('.0', '', $mangaList->episode_chapter))}}" class="mla rd popunder">
                                {{$mangaList->judul_chapter}}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- END LOOPING NEW MANGA -->

            <!-- PAGINATION -->
            <div class="loop-nav pag-nav">
                <div class="loop-nav-inner">
                    <span class="prev">« Halaman sebelumnya</span>
                    <a rel="nofollow" class="next popunder" href="https://komiku.co.id/manga/page/2/">Halaman selanjutnya »</a>
                </div>
            </div>
            <!-- END PAGINATION -->
        </div>
    </section>
@endsection