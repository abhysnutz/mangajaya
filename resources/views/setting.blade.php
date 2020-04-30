@extends('layouts.layout')
@section('konten')
        <article>
            <div class="perapih series">
                <div id="news" itemscope="" itemtype="http://schema.org/Article">
                    <meta content="3" itemprop="postId">
                    <div class="news">
                        <header>

                            <h1>{{$page_title}}</h1></header>
                        <section>

                            <div class="preview">    
                                 <?php echo htmlspecialchars_decode($konten->deskripsi_setting); ?>
                            </div>
                        </section>

                    </div>
                    <section>
                    </section>
                </div>

            </div>
        </article>
@endsection