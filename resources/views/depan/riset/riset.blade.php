@extends('depan.layout')
@section('konten')

    <!-- content section -->
    <div class="custom_heading-container">
      <h2 class="riset_menu-title">RISET</h2>
    </div>

    <!-- <h3 class="riset_menu-subtitle">Program Kimia</h3>
    <div class="riset_menu-container">
      {{-- @foreach ($data as $item)
        <div class="riset_menu-col">
          <div class="riset_menu_img-container">
            <a href="{{ route('depan.riset.detail', ['id' => $item->id]) }}">
              <div class="riset_menu_img">
                <img src="{{ asset('foto/programKimia') . '/' . $item->foto }}" />
              </div>
            </a>
          </div>
        </div>
        @if ($loop->iteration % 2 == 0)
          </div><div class="riset_menu-col">
        @endif
      @endforeach --}}
    </div>
    
      <div class="riset_menu-col">
        <div class="riset_menu_img-container">
          <a href="riset-detail.html">
            <div class="riset_menu_img">
              <img src="{{ asset('depan') }}/images/riset1.png" />
            </div>
          </a>
        </div>
        <div class="riset_menu_img-container">
          <a href="riset-detail.html">
            <div class="riset_menu_img">
              <img src="{{ asset('depan') }}/images/riset2.png" />
            </div>
          </a>
        </div>
      </div>
      <div class="riset_menu-col">
        <div class="riset_menu_img-container">
          <a href="riset-detail.html">
            <div class="riset_menu_img">
              <img src="{{ asset('depan') }}/images/riset3.png" />
            </div>
          </a>
        </div>
        <div class="riset_menu_img-container">
          <a href="riset-detail.html">
            <div class="riset_menu_img">
              <img src="{{ asset('depan') }}/images/riset4.png" />
            </div>
          </a>
        </div>
      </div>
    </div> -->
    <h3 class="riset_menu-subtitle">Program Kimia</h3>
    <div class="riset_menu-container">
      <div class="riset_menu-col">
        <div class="riset_menu_img-container">
          <a href="{{ route('depan.riset.detail', ['id' => 1]) }}">
            <div class="riset_menu_img">
              <img src="{{ asset('depan') }}/images/riset1.png" />
            </div>
          </a>
        </div>
        <div class="riset_menu_img-container">
          <a href="{{ route('depan.riset.detail', ['id' => 2]) }}">
            <div class="riset_menu_img">
              <img src="{{ asset('depan') }}/images/riset2.png" />
            </div>
          </a>
        </div>
      </div>
      <div class="riset_menu-col">
        <div class="riset_menu_img-container">
          <a href="{{ route('depan.riset.detail', ['id' => 3]) }}">
            <div class="riset_menu_img">
              <img src="{{ asset('depan') }}/images/riset3.png" />
            </div>
          </a>
        </div>
        <div class="riset_menu_img-container">
          <a href="{{ route('depan.riset.detail', ['id' => 4]) }}">
            <div class="riset_menu_img">
              <img src="{{ asset('depan') }}/images/riset4.png" />
            </div>
          </a>
        </div>
      </div>
    </div>

    <h3 class="riset_menu-subtitle">Program Kerja Sama</h3>
    <h4 class="riset_menu-desc">
      {!! $isi !!}
    </h4>

    <div class="riset_menu_kerjasama_img-container">
      <h4 class="riset_menu-desc-bold">Kerjasama Internasional</h4>
      <img src="{{ asset('depan') }}/images/kerjasama1.png" />
      <h4 class="riset_menu-desc-bold">Kerjasama Nasional</h4>
      <img src="{{ asset('depan') }}/images/kerjasama2.png" />
    </div>
    <!-- end content section -->
@endsection