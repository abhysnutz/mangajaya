@extends('layouts.layout')
@section('konten')
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px)">
        <h1> Daftar Genre Komik </h1>
        <div class="daftar">
            <ul class="genre">

                <!-- LOOP KATEGORI -->
                @foreach($kategori as $kategoriList)
                    <li><a href="{{url('genre/'.$kategoriList->slug_kategori)}}" title="Komik Genre {{$kategoriList->nama_kategori}}">{{$kategoriList->nama_kategori}}</a></li>
                @endforeach
                <!-- END LOOP KATEGORI -->

            </ul>
        </div>
    </section>
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px)">
        <h2> Status Komik </h2>
        <div class="daftar">
            <ul class="genre">
                <li><a href="{{url('status/end')}}" title="Komik Genre End">End</a></li>
                <li><a href="{{url('status/ongoing')}}" title="Komik Genre Ongoing">Ongoing</a></li>
                <li><a href="{{url('status/progress')}}" title="Komik Genre Progress">Progress</a></li>
            </ul>
        </div>
    </section>
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px)">
        <h2> Rate Umur Komik </h2>
        <div class="daftar">
            <ul class="genre">
                <li><a href="{{url('ratemanga/10')}}" title="Komik Genre 10">10+</a></li>
                <li><a href="{{url('ratemanga/13')}}" title="Komik Genre 13">13+</a></li>
                <li><a href="{{url('ratemanga/15')}}" title="Komik Genre 15">15+</a></li>
                <li><a href="{{url('ratemanga/17')}}" title="Komik Genre 17">17+</a></li>
            </ul>
        </div>
    </section>
@endsection