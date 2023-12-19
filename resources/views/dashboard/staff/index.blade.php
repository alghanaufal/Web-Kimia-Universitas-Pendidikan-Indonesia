@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{route('posisi.index')}}" class="btn btn-primary">+ Tambah Jabatan</a></div>
    <div class="pb-3"></div>
    <form action="{{ route('staff.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <?php $i = 1; ?>
        @foreach ($dataposisi->where('tipe', 'Pimpinan') as $posisi)
            <div class="form-group row">
                <label class="col-sm-2">{{ $posisi->nama }}</label>
                <div class="col-sm-6">
                    <input type="hidden" name="id_posisi{{$i}}" value="{{ $posisi->id }}">
                    <select class="form-control form-control-sm" name="id_dosen{{$i}}">
                        <option value="">-pilih-</option>
                        @foreach ($datadosen as $dosen)
                            @php
                                $selected = '';
                                $obj = $data->where('id_posisi', $posisi->id)->first();
                                if ($obj) {
                                    $selected = ($obj->id_dosen == $dosen->id) ? 'selected' : '';
                                }
                            @endphp
                            <option value="{{ $dosen->id }}" {{ $selected }}>
                                {{ $dosen->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <?php $i++; ?>
        @endforeach
        @foreach ($dataposisi->where('tipe', 'Koordinator') as $posisi)
            <div class="form-group row">
                <label class="col-sm-2">Koordinator {{ $posisi->nama }}</label>
                <div class="col-sm-6">
                    <input type="hidden" name="id_posisi{{$i}}" value="{{ $posisi->id }}">
                    <select class="form-control form-control-sm" name="id_dosen{{$i}}">
                        <option value="">-pilih-</option>
                        @foreach ($datadosen as $dosen)
                            @php
                                $selected = '';
                                $obj = $data->where('id_posisi', $posisi->id)->first();
                                if ($obj) {
                                    $selected = ($obj->id_dosen == $dosen->id) ? 'selected' : '';
                                }
                            @endphp
                            <option value="{{ $dosen->id }}" {{ $selected }}>
                                {{ $dosen->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <?php $i++; ?>
        @endforeach
        @foreach ($dataposisi->where('tipe', 'KBK') as $posisi)
            <div class="form-group row">
                <label class="col-sm-2">Koordinator KBK {{ $posisi->nama }}</label>
                <div class="col-sm-6">
                    <input type="hidden" name="id_posisi{{$i}}" value="{{ $posisi->id }}">
                    <select class="form-control form-control-sm" name="id_dosen{{$i}}">
                        <option value="">-pilih-</option>
                        @foreach ($datadosen as $dosen)
                            @php
                                $selected = '';
                                $obj = $data->where('id_posisi', $posisi->id)->first();
                                if ($obj) {
                                    $selected = ($obj->id_dosen == $dosen->id) ? 'selected' : '';
                                }
                            @endphp
                            <option value="{{ $dosen->id }}" {{ $selected }}>
                                {{ $dosen->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <?php $i++; ?>
        @endforeach
        <?php $i--; ?>
        <?php $j = 1; ?>
        @foreach ($datalab as $posisi)
        <div class="form-group row">
            <label class="col-sm-2">Ketua Laboratorium {{ $posisi->nama }}</label>
            <div class="col-sm-6">
                <input type="hidden" name="id_lab{{$j}}" value="{{ $posisi->id }}">
                <select class="form-control form-control-sm" name="id_dosen{{$i+$j}}">
                    <option value="">-pilih-</option>
                    @foreach ($datadosen as $dosen)
                        @php
                            $selected = '';
                            $obj = $data->where('id_lab', $posisi->id)->first();
                            if ($obj) {
                                $selected = ($obj->id_dosen == $dosen->id) ? 'selected' : '';
                            }
                        @endphp
                        <option value="{{ $dosen->id }}" {{ $selected }}>
                            {{ $dosen->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <?php $j++; ?>
    @endforeach
    <?php $j--; ?>

        <input type="hidden" name="i" value="{{ $i }}">
        <input type="hidden" name="j" value="{{ $j }}">
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
