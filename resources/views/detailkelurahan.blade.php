{!! Form::model($kelurahans,['method' => 'PATCH','route' => ['Kelurahans.update',$kelurahans->kelurahanid]]) !!}
    <div class="form-row">
        <label>Kecamatan</label>
        {!! Form::select('kecamatanid', $datas, $kelurahans->kecamatanid,array('class'=>'form-control','id'=>'kecamatan')) !!} 
    </div>
    <div class="form-row">
        <label for="nama">Kelurahan</label>
        {!!Form::text('nama',$kelurahans->nama,array('placeholder' =>'nama yang mendeskripsikan kelurahan','class'=>'form-control','id'=>'nama'))!!}
    </div>
    <div class="form-row">
        <label for="keterangan">Keterangan</label>
        {!!Form::textarea('keterangan',$kelurahans->keterangan,array('placeholder' =>'keterangan mengenai kelurahan bangunan','class'=>'form-control','id'=>'keterangan','rows'=>'3'))!!}
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit Edit</button>
        </div> 
    </div>
{!! Form::close() !!}