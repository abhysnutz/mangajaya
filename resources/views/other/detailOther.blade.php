@extends('layouts.layout')
@section('konten')
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px)">
        <h1> Komik Tambahan {{$title}} </h1>
        <p class="top1"> Baca komik dengan Tambahan {{$title}} terlengkap bahasa Indonesia. Di Komiku kalian bisa membaca Manga Tambahan {{$title}} terbaru. </p>
        <!-- <div class="filter">
            <p> Tampilkan berdasarkan jenis komik: </p>
            <form class="filer2" action="">
                <select name="orderby" id="filter" class="formfiler">
                    <option class="level-1" value="0">Baru ditambahkan</option>
                    <option class="level-1" value="meta_value_num"> Terpopuler</option>
                    <option class="level-1" value="modified" selected="selected"> Update Terbaru</option>
                </select>
                <select name="category_name" id="filter" class="formfiler">
                    <option class="level-1" value="0">Komik (Semua)</option>
                    <option class="level-1" value="manga"> Manga (Jepang)</option>
                    <option class="level-1" value="manhua"> Manhua (China)</option>
                    <option class="level-1" value="manhwa"> Manhwa (Korea)</option>
                </select>
                <input class="filter3" value="Filter" type="submit"> </form>
        </div> -->
        <div class="daftar">

            <!-- LOOPING OTHER HOT -->
            @foreach($manga as $mangaList)
            <div class="bge">
                <a href="{{url('manga/'.$mangaList->slug_manga)}}" class="popunder">
                    <div class="bgei">
                        @if($mangaList->hot == 1 || $mangaList->rekomendasi == 1)
                            <div class="vw Berwarna @if($mangaList->hot == 1) Hot @endif @if($mangaList->rekomendasi == 1) Rekomendasi @endif"> 
                                @if($mangaList->hot == 1) Hot @endif @if($mangaList->rekomendasi == 1) Rekomendasi @endif 
                            </div>
                        @endif
                        <img src="{{url('/storage/komik/background_detail/'.$mangaList->slug_manga.'.jpg')}}">
                        <div class="tpe1_inf"> 
                            <b>{{$mangaList->jenis_manga}}</b> {{$mangaList->konsep_cerita}} 
                        </div>
                    </div>
                    <div class="kan">
                        <h3> {{$mangaList->nama_manga}} </h3> 
                        <span>
                            {{$mangaList->views}} x • 
                            {{ \Carbon\Carbon::parse($mangaList->updated_at)->diffForHumans() }}
                            @if($mangaList->berwarna == 1) 
                                • Berwarna 
                            @endif
                        </span>
                        <p> 
                            {{ explode('</li>', explode('<li>', $mangaList->sinopsis)[1])[0] }}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
            <!-- END LOOPING OTHER HOT -->
            
            <!-- <div class="loop-nav pag-nav">
                <div class="loop-nav-inner"><span class="prev">« Halaman sebelumnya</span><a rel="nofollow" class="next popunder" href="https://komiku.co.id/other/hot/page/2/?orderby=modified">Halaman selanjutnya »</a></div>
            </div> -->
        </div>
    </section>
@endsection