@if(count($errors)>0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong>There were some problems with your input. <br><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
        <label for="id">Latitude</label><p id="lat2"></p>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
        <label for="id">Longitude</label><p id="lng2"></p>
    </div>  
</div>
<div class="row">
    <div class="col-md-12">
    <div id="map2" style="width: 568px; height: 400px"></div>
    </div>
</div>
<br>
{!! Form::model($buildings,['method' => 'PATCH','route' => ['Buildings.update',$buildings->buildingid],'enctype'=>'multipart/form-data']) !!}
{!!Form::hidden('regionid',$buildings->regionid)!!}
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputNama">Nama Pemilik</label>
                {!!Form::text('namapemilik',$buildings->namapemilik,array('placeholder'=>'Nama Pemilik','class'=>'form-control','id'=>'inputNama'))!!}  
            </div>
            <div class="form-group col-md-4">
                <label for="inputNoBangunan">No Bangunan</label>
                {!!Form::text('nobangunan',$buildings->nobangunan,array('placeholder'=>'No Bangunan','class'=>'form-control','id'=>'inputNoBangunan'))!!}  
            </div>
            <div class="form-group col-md-4">
                <label for="inputFungsi">Fungsi Bangunan</label>
                @if($buildings->fungsibangunan=='Hunian')
                {!!Form::select('fungsibangunan', array('Hunian' => 'Hunian', 'Keagamaan' => 'Keagamaan', 'Usaha' => 'Usaha', 'Sosial-Budaya' => 'Sosial-Budaya','Khusus' => 'Khusus'),'Hunian',array('class'=>'form-control','id'=>'inputFungsi'))!!}
                @elseif($buildings->fungsibangunan=='Keagamaan')
                {!!Form::select('fungsibangunan', array('Hunian' => 'Hunian', 'Keagamaan' => 'Keagamaan', 'Usaha' => 'Usaha', 'Sosial-Budaya' => 'Sosial-Budaya','Khusus' => 'Khusus'),'Keagamaan',array('class'=>'form-control','id'=>'inputFungsi'))!!}
                @elseif($buildings->fungsibangunan=='Hunian')
                {!!Form::select('fungsibangunan', array('Hunian' => 'Hunian', 'Keagamaan' => 'Keagamaan', 'Usaha' => 'Usaha', 'Sosial-Budaya' => 'Sosial-Budaya','Khusus' => 'Khusus'),'Usaha',array('class'=>'form-control','id'=>'inputFungsi'))!!}
                @elseif($buildings->fungsibangunan=='Sosial-Budaya')
                {!!Form::select('fungsibangunan', array('Hunian' => 'Hunian', 'Keagamaan' => 'Keagamaan', 'Usaha' => 'Usaha', 'Sosial-Budaya' => 'Sosial-Budaya','Khusus' => 'Khusus'),'Sosial-Budaya',array('class'=>'form-control','id'=>'inputFungsi'))!!}
                @elseif($buildings->fungsibangunan=='Khusus')
                {!!Form::select('fungsibangunan', array('Hunian' => 'Hunian', 'Keagamaan' => 'Keagamaan', 'Usaha' => 'Usaha', 'Sosial-Budaya' => 'Sosial-Budaya','Khusus' => 'Khusus'),'Khusus',array('class'=>'form-control','id'=>'inputFungsi'))!!}
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputSB">Status Bangunan</label>
                {!!Form::select('statusbangunan', $status , $buildings->statusbangunan, array('class'=>'form-control','id'=>'inputSB') )!!} 
            </div>
            <div class="form-group col-md-6">
                <label for="inputSTanah">Status Tanah</label><br>
                @if($buildings->statustanah=='SHM')
                {!!Form::select('statustanah', array('SHM' => 'SHM', 'SHP' => 'SHP', 'HGB' => 'HGB', 'Lain-lain' => 'Lain-lain'),'SHM',array('class'=>'form-control','id'=>'inputSTanah'))!!}
                @elseif($buildings->statustanah=='SHP')
                {!!Form::select('statustanah', array('SHM' => 'SHM', 'SHP' => 'SHP', 'HGB' => 'HGB', 'Lain-lain' => 'Lain-lain'),'SHP',array('class'=>'form-control','id'=>'inputSTanah'))!!}
                @elseif($buildings->statustanah=='HGB')
                {!!Form::select('statustanah', array('SHM' => 'SHM', 'SHP' => 'SHP', 'HGB' => 'HGB', 'Lain-lain' => 'Lain-lain'),'HGB',array('class'=>'form-control','id'=>'inputSTanah'))!!}
                @elseif($buildings->statustanah=='Lain-lain')
                {!!Form::select('statustanah', array('SHM' => 'SHM', 'SHP' => 'SHP', 'HGB' => 'HGB', 'Lain-lain' => 'Lain-lain'),'Lain-lain',array('class'=>'form-control','id'=>'inputSTanah'))!!}
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputLuas">Luas Tanah</label>
                @if($buildings->luastanah=='< 500m2')
                {!!Form::select('luastanah', array('< 500m2' => '< 500m2', '500 - 5000' => '500 - 5000','> 5000m2' => '> 5000m2'),'< 500m2',array('class'=>'form-control','id'=>'inputLuas'))!!}
                @elseif($buildings->luastanah=='500 - 5000')
                {!!Form::select('luastanah', array('< 500m2' => '< 500m2', '500 - 5000' => '500 - 5000','> 5000m2' => '> 5000m2'),'500 - 5000',array('class'=>'form-control','id'=>'inputLuas'))!!}
                @elseif($buildings->luastanah=='> 5000m2')
                {!!Form::select('luastanah', array('< 500m2' => '< 500m2', '500 - 5000' => '500 - 5000','> 5000m2' => '> 5000m2'),'> 5000m2',array('class'=>'form-control','id'=>'inputLuas'))!!}
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="inputLantai">Jumlah Lantai</label>
                {!!Form::number('jumlahlantai', $buildings->jumlahlantai,array('placeholder'
                            =>'Jumlah Lantai','class'=>'form-control','id'=>'inputLantai','min'=>'1'))!!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputTinggi">Tinggi Bangunan</label>
                {!!Form::number('tinggibangunan', $buildings->tinggibangunan,array('placeholder'
                            =>'Tinggi Bangunan','class'=>'form-control','id'=>'inputTinggi','min'=>'0','step'=>'any'))!!}
            </div>
            <div class="form-group col-md-4">
                <label for="inputKoef">KDB</label>
                @if($buildings->koefisiendasarbangunan=='< 40')
                {!!Form::select('koefisiendasarbangunan', array('< 40' => '< 40', '40 - 80' => '40 - 80','> 80' => '> 80'),'< 40',array('class'=>'form-control','id'=>'inputKoef'))!!}
                @elseif($buildings->koefisiendasarbangunan=='40 - 80')
                {!!Form::select('koefisiendasarbangunan', array('< 40' => '< 40', '40 - 80' => '40 - 80','> 80' => '> 80'),'40 - 80',array('class'=>'form-control','id'=>'inputKoef'))!!}
                @elseif($buildings->koefisiendasarbangunan=='> 80')
                {!!Form::select('koefisiendasarbangunan', array('< 40' => '< 40', '40 - 80' => '40 - 80','> 80' => '> 80'),'> 80',array('class'=>'form-control','id'=>'inputKoef'))!!}
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="inputImb">IMB</label>
                @if($buildings->imb=='Ada sesuai')
                {!!Form::select('imb', array('Ada sesuai' => 'Ada sesuai', 'Ada Tidak sesuai' => 'Ada Tidak sesuai','Tidak Ada' => 'Tidak Ada'),'Ada Sesuai',array('class'=>'form-control','id'=>'inputImb'))!!}
                @elseif($buildings->imb=='Ada Tidak sesuai')
                {!!Form::select('imb', array('Ada sesuai' => 'Ada sesuai', 'Ada Tidak sesuai' => 'Ada Tidak sesuai','Tidak Ada' => 'Tidak Ada'),'Ada Tidak sesuai',array('class'=>'form-control','id'=>'inputImb'))!!}
                @elseif($buildings->imb=='Tidak Ada')
                {!!Form::select('imb', array('Ada sesuai' => 'Ada sesuai', 'Ada Tidak sesuai' => 'Ada Tidak sesuai','Tidak Ada' => 'Tidak Ada'),'Tidak Ada',array('class'=>'form-control','id'=>'inputImb'))!!}
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Pelanggaran (M)</label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputGsj">GSJ</label>
                {!!Form::number('gsj', $buildings->gsj,array('placeholder'
                            =>'gsj','class'=>'form-control','id'=>'inputGsj','min'=>'0','step'=>'any'))!!}
            </div>
            <div class="form-group col-md-3">
                <label for="inputGsb">GSB</label>
                {!!Form::number('gsb', $buildings->gsb,array('placeholder'
                            =>'gsb','class'=>'form-control','id'=>'inputGsb','min'=>'0','step'=>'any'))!!}
            </div>
            <div class="form-group col-md-3">
                <label for="inputGss">GSS</label>
                {!!Form::number('gss', $buildings->gss,array('placeholder'
                            =>'gss','class'=>'form-control','id'=>'inputGss','min'=>'0','step'=>'any'))!!}
            </div>
            <div class="form-group col-md-3">
                <label for="inputKdb">KDB</label>
                {!!Form::number('kdb', $buildings->kdb,array('placeholder'
                            =>'kdb','class'=>'form-control','id'=>'inputKdb','min'=>'0','step'=>'any'))!!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputLatitude">Latitude</label>
                {!!Form::number('latitude',$buildings->latitude,array('placeholder'
                            =>'Latitude','class'=>'form-control','id'=>'inputLatitude','step'=>'any'))!!}
            </div>
            <div class="form-group col-md-6">
                <label for="inputLongitude">Longitude</label>
                {!!Form::number('longitude',$buildings->longitude,array('placeholder'
                            =>'Longitude','class'=>'form-control','id'=>'inputLongitude','step'=>'any'))!!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <img src="{{asset('images/').'/'.$buildings->foto}}" class="avatar img-thumbnail" alt="profile Pic" height="100" width="100">
            </div>
            <div class="form-group col-md-6 mt-3">
                <h6>Upload photo...</h6>
                {!!Form::file('foto',array('class'=>'text-center center-block file-upload'))!!}
            </div>
        </div>
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> 
        </div>
<!-- </form> -->
{!! Form::close() !!}
<script>
    $(document).ready(function() {    
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function(){
            readURL(this);
        });
    });
</script>
<script>
    $('#editbuilding').on('shown.bs.modal', function () {
 
        if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map2"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng({{ $buildings->latitude }}, {{ $buildings->longitude }});
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});
        map.addOverlay(marker);
        document.getElementById("lat2").innerHTML = center.lat().toFixed(5);
        document.getElementById("lng2").innerHTML = center.lng().toFixed(5);

    GEvent.addListener(marker, "dragend", function() {
        var point = marker.getPoint();
        map.panTo(point);
        document.getElementById("lat2").innerHTML = point.lat().toFixed(5);
        document.getElementById("lng2").innerHTML = point.lng().toFixed(5);
        });


    GEvent.addListener(map, "moveend", function() {
    map.clearOverlays();
    var center = map.getCenter();
    var marker = new GMarker(center, {draggable: true});
    map.addOverlay(marker);
    document.getElementById("lat2").innerHTML = center.lat().toFixed(5);
    document.getElementById("lng2").innerHTML = center.lng().toFixed(5);

    GEvent.addListener(marker, "dragend", function() {
        var point =marker.getPoint();
        map.panTo(point);
        document.getElementById("lat2").innerHTML = point.lat().toFixed(5);
        document.getElementById("lng2").innerHTML = point.lng().toFixed(5);
        });

        });

        }
    

    function showAddress(address) {
    var map = new GMap2(document.getElementById("map2"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        if (geocoder) {
        geocoder.getLatLng(
            address,
            function(point) {
            if (!point) {
                alert(address + " not found");
            } else {
    document.getElementById("lat2").innerHTML = point.lat().toFixed(5);
    document.getElementById("lng2").innerHTML = point.lng().toFixed(5);
    map.clearOverlays()
    map.setCenter(point, 14);
    var marker = new GMarker(point, {draggable: true});
    map.addOverlay(marker);

    GEvent.addListener(marker, "dragend", function() {
        var pt = marker.getPoint();
        map.panTo(pt);
        document.getElementById("lat2").innerHTML = pt.lat().toFixed(5);
        document.getElementById("lng2").innerHTML = pt.lng().toFixed(5);
        });


    GEvent.addListener(map, "moveend", function() {
    map.clearOverlays();
    var center = map.getCenter();
    var marker = new GMarker(center, {draggable: true});
    map.addOverlay(marker);
    document.getElementById("lat2").innerHTML = center.lat().toFixed(5);
    document.getElementById("lng2").innerHTML = center.lng().toFixed(5);

    GEvent.addListener(marker, "dragend", function() {
        var pt = marker.getPoint();
        map.panTo(pt);
    document.getElementById("lat2").innerHTML = pt.lat().toFixed(5);
    document.getElementById("lng2").innerHTML = pt.lng().toFixed(5);
        });

        });
            }
            }
        );
        }
    }
    })
   </script>

