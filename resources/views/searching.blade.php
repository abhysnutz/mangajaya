@extends('layouts.layout')
@section('konten')
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px)">
        <h1 style="margin-bottom:15px"> Hasil Pencarian {{$cari}} </h1>
        <div class="daftar">

            @foreach($mangaSearch as $mangaSearchList)
                <div class="bge">
                    <a href="{{url('manga/'.$mangaSearchList->slug_manga)}}">
                        <div class="bgei">
                            <img src="{{url('/storage/komik/background_detail/'.$mangaSearchList->slug_manga.'.jpg')}}" class="sd rd">
                            <div class="tpe1_inf">
                                <b>{{$mangaSearchList->jenis_manga}}</b> 
                                {{$mangaSearchList->konsep_cerita}} 
                            </div>
                        </div>
                        <div class="kan">
                            <h3> {{$mangaSearchList->nama_manga}} </h3>
                            <span>
                                {{$mangaSearchList->views}} x •
                                {{ \Carbon\Carbon::parse($mangaSearchList->created_at)->diffForHumans() }}
                            </span>
                            <p> {{ explode('</li>', explode('<ul class="rs"> <li>', str_replace('<ul class="rs"><li>', '<ul class="rs"> <li>', $mangaSearchList->sinopsis))[1])[0] }} </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection