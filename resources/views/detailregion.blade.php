{!! Form::model($regionals,['method' => 'PATCH','route' => ['Regionals.update',$regionals->regionid]]) !!}
    <div class="form-row">
    <label for="kecamatan">Kecamatan</label>
        <select id="kecamatan" name="kecamatan" class="form-control">
        <option value=""></option>
            @foreach($kecamatans as $key => $value)
                <option value="{{ $key }}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="kelurahan">Kelurahan</label>
        <select id="kelurahan" name="kelurahan" class="form-control">
            
        </select>
    </div>
    <div class="form-row">
        <label for="rw">RW</label>
        {!!Form::number('rw',$regionals->rw,array('placeholder' =>'RW','class'=>'form-control','id'=>'rw','min'=>'0'))!!}
    </div>
    <div class="form-row">
        <label for="rt">RT</label>
        {!!Form::number('rt',$regionals->rt,array('placeholder' =>'RT','class'=>'form-control','id'=>'rt','min'=>'0'))!!}
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit Edit</button>
        </div> 
    </div>
{!! Form::close() !!}
<script type="text/javascript">

$(document).ready(function() {

    $('select[name="kecamatan"]').on('change', function() {

        var kecamatanID = $(this).val();

        if(kecamatanID) {

            $.ajax({

                url: '/myform/ajax/'+kecamatanID,

                type: "GET",

                dataType: "json",

                success:function(data) {

                    $('select[name="kelurahan"]').empty();

                    $.each(data, function(key, value) {

                        $('select[name="kelurahan"]').append('<option value="'+ key +'">'+ value +'</option>');

                    });


                }

            });

        }else{

            $('select[name="kelurahan"]').empty();

        }

    });

});

</script>