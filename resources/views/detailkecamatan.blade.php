{!! Form::model($kecamatans,['method' => 'PATCH','route' => ['Kecamatans.update',$kecamatans->kecamatanid]]) !!}
    <div class="form-row">
        <label for="nama">Nama</label>
        {!!Form::text('nama',$kecamatans->nama,array('placeholder' =>'nama yang mendeskripsikan kecamatan','class'=>'form-control','id'=>'nama'))!!}
    </div>
    <div class="form-row">
        <label for="keterangan">Keterangan</label>
        {!!Form::textarea('keterangan',$kecamatans->keterangan,array('placeholder' =>'keterangan mengenai kecamatan bangunan','class'=>'form-control','id'=>'keterangan','rows'=>'3'))!!}
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit Edit</button>
        </div> 
    </div>
{!! Form::close() !!}