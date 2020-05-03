@extends('layouts.layout')
@section('konten')
        <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px)">
            <h1> Baca Komik Terbaru </h1>

            <p class="top1" style="border-bottom: 0;padding-bottom: 0;">
                30 Chapter komik paling banyak dibaca dalam 7 hari terakhir di Komiku.
            </p>
            <div class="daftar">

                <!-- LOOPING TRENDING -->
                @foreach($mangaTrending as $mangaTrendingList)
                    <div class="bge">
                        <a href="{{url('/manga/'.$mangaTrendingList->slug_manga.'/'.$mangaTrendingList->episode_chapter)}}">
                            <div class="bgei">
                                <div class="rank">
                                    🏆 <span>{{$loop->iteration}}</span>
                                </div>
                                <img src="{{url('/storage/komik/background_detail/'.$mangaTrendingList->slug_manga.'.jpg')}}"class="lazy sd rd">
                                <div class="tpe1_inf">
                                    <b>{{$mangaTrendingList->jenis_manga}}</b> {{$mangaTrendingList->konsep_cerita}} </div>
                            </div>
                            <div class="kan">
                                <h3>
                                    {{$mangaTrendingList->nama_manga}} {{$mangaTrendingList->judul_chapter}}
                                </h3>
                                <span>
                                    {{$mangaTrendingList->views_chapter}} rb x • 
                                    {{ \Carbon\Carbon::parse($mangaTrendingList->updated_at)->diffForHumans() }}
                                    @if($mangaTrendingList->berwarna == 1) •  Berwarna @endif
                                </span>
                                <p>
                                    {{ explode('</li>', explode('<li>', $mangaTrendingList->sinopsis)[1])[0] }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
                <!-- END LOOPING TRENDING -->
            </div>
        </section>
@endsection