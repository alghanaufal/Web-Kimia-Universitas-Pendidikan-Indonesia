@extends('depan.layout')
@section('konten')
    <section class="layout_padding">
      <center>
        <h2 class="akademik_menu-subtitle">AKADEMIK</h2>
      </center>
      <div class="akademik_menu-container">
        <div class="akademik_menu-col">
          <div class="akademik_menu_img-container">
            <a href="{{route('depan.akademik.pedoman')}}">
              <div class="akademik_menu_img">
                <img src="{{ asset('depan') }}/images/akademik1.png" />
              </div>
            </a>
          </div>
          <div class="akademik_menu_img-container">
            <a href="{{route('depan.akademik.penerimaan')}}">
              <div class="akademik_menu_img">
                <img src="{{ asset('depan') }}/images/akademik2.png" />
              </div>
            </a>
          </div>
          <div class="akademik_menu_img-container">
            <a href="{{route('depan.akademik.mbkm')}}">
              <div class="akademik_menu_img">
                <img src="{{ asset('depan') }}/images/akademik3.png" />
              </div>
            </a>
          </div>
        </div>
        <div class="akademik_menu-col">
          <div class="akademik_menu_img-container">
            <a href="{{route('depan.akademik.visiting')}}">
              <div class="akademik_menu_img">
                <img src="{{ asset('depan') }}/images/akademik4.png" />
              </div>
            </a>
          </div>
          <div class="akademik_menu_img-container">
            <a href="{{route('depan.akademik.summer')}}">
              <div class="akademik_menu_img">
                <img src="{{ asset('depan') }}/images/akademik5.png" />
              </div>
            </a>
          </div>
          <div class="akademik_menu_img-container">
            <a href="{{route('depan.akademik.learning')}}">
              <div class="akademik_menu_img">
                <img src="{{ asset('depan') }}/images/akademik6.png" />
              </div>
            </a>
          </div>
        </div>
        <div class="akademik_menu-col">
          <div class="akademik_menu_img-container">
            <a href="{{route('depan.akademik.module')}}">
              <div class="akademik_menu_img">
                <img src="{{ asset('depan') }}/images/akademik7.png" />
              </div>
            </a>
          </div>
          <div class="akademik_menu_img-container">
            <a href="{{route('depan.akademik.tracer')}}">
              <div class="akademik_menu_img">
                <img src="{{ asset('depan') }}/images/akademik8.png" />
              </div>
            </a>
          </div>
          <div class="akademik_menu_img-container">
            <a href="{{route('depan.akademik.survey')}}">
              <div class="akademik_menu_img">
                <img src="{{ asset('depan') }}/images/akademik9.png" />
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    @endsection