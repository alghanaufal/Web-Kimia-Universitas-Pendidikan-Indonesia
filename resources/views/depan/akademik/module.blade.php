@extends('depan.layout')
@section('konten')

    <!-- start content -->
    <a href="{{route('depan.akademik')}}" >
      <img class="back_btn" src="{{ asset('depan') }}/images/back.png" alt="button">
    </a> 
    <div class="custom_heading-container">
      <h2 class="riset_menu-title">MODULE HANDBOOK</h2>
    </div>
    <div class="pedoman-container">
      @php $i = 0 @endphp
      <div class="pedoman-title">Sarjana Kimia</div>
      <div class="module-container">
          <div class="module-column">
              @for($j = 0; $j < $data->count()/2; $j++)
                  @php $currentItem = $data[$j] @endphp <!-- Assign the current item to a variable -->
                  @if($currentItem->detail_tipe === 'Sarjana')
                  <div class="pedoman-download_container">
                      <div class="module-download_filename">
                          {{ $currentItem->judul }}
                      </div>
                      <a href="{{ $currentItem->link }}" class="pedoman-download_button">Download</a>
                  </div>
                  @php $i++ @endphp
                  @endif
              @endfor
          </div>
          <div class="module-column">
              @for($j = $i; $j < $data->count(); $j++) <!-- Use $i as the starting index -->
                  @php $currentItem = $data[$j] @endphp <!-- Assign the current item to a variable -->
                  @if($currentItem->detail_tipe === 'Sarjana')
                  <div class="pedoman-download_container">
                      <div class="module-download_filename">
                          {{ $currentItem->judul }}
                      </div>
                      <a href="{{ $currentItem->link }}" class="pedoman-download_button">Download</a>
                  </div>
                  @php $i++ @endphp
                  @endif
              @endfor
          </div>
        </div>
      {{-- </div> --}}

      @php $i = 0 @endphp
      <div class="pedoman-title">Magister Kimia</div>
      <div class="module-container">
          <div class="module-column">
              @for($j = 0; $j < $data2->count()/2; $j++)
                  @php $currentItem = $data2[$j] @endphp <!-- Assign the current item to a variable -->
                  @if($currentItem->detail_tipe === 'Magister')
                  <div class="pedoman-download_container">
                      <div class="module-download_filename">
                          {{ $currentItem->judul }}
                      </div>
                      <a href="{{ $currentItem->link }}" class="pedoman-download_button">Download</a>
                  </div>
                  @php $i++ @endphp
                  @endif
              @endfor
          </div>
          <div class="module-column">
              @for($j = $i; $j < $data2->count(); $j++) <!-- Use $i as the starting index -->
                  @php $currentItem = $data2[$j] @endphp <!-- Assign the current item to a variable -->
                  @if($currentItem->detail_tipe === 'Magister')
                  <div class="pedoman-download_container">
                      <div class="module-download_filename">
                          {{ $currentItem->judul }}
                      </div>
                      <a href="{{ $currentItem->link }}" class="pedoman-download_button">Download</a>
                  </div>
                  @php $i++ @endphp
                  @endif
              @endfor
          </div>
        </div>
      </div>
    </div>

    @endsection

  