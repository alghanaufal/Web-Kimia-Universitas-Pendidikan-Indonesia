@extends('depan.layout')
@section('konten')

    <!-- content section -->
    <div class="profile_detail-container">
      <div class="profile_detail-img">
        <img src="{{ asset('foto/dosen') . '/' . $data->foto }}" alt="" />
      </div>

      <div class="profile_detail-data">
        <div class="profile_detail-nama">{{ $data->nama }}</div>
        <div class="profile_detail-list">
          <div class="profile_detail-listname">Jabatan:</div>
          <div class="profile_detail-listdata">{{ $data->jabatan }}</div>
        </div>
        <div class="profile_detail-list">
          <div class="profile_detail-listname">Kelompok Keahlian:</div>
          <div class="profile_detail-listdata">{{ $data->bidang }}</div>
        </div>
        <div class="profile_detail-list">
          <div class="profile_detail-listname">E-Mail:</div>
          <div class="profile_detail-listdata">{{ $data->email }}</div>
        </div>
        <div class="profile_detail-list">
          <div class="profile_detail-listname">NIP:</div>
          <div class="profile_detail-listdata">{{ $data->nip }}</div>
        </div>
      </div>
    </div>

    <div class="profile_detail-link">
      <a href="{{ $data->scopus }}">
        <img src="{{ asset('depan') }}/images/scopus.jpg" alt="" />
      </a>
      <a href="{{ $data->scholar }}">
        <img src="{{ asset('depan') }}/images/scholar.png" alt="" />
      </a>
      <a href="{{ $data->sinta }}">
        <img src="{{ asset('depan') }}/images/sinta.png" alt="" />
      </a>
    </div>
    <!-- end content section -->
@endsection