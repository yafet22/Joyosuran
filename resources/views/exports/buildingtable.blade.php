<table>
    <thead>
    <tr>
        <th>RegionID    </th>
        <th>No Bangunan</th>
        <th>Nama Pemilik</th>
        <th>Fungsi Bangunan</th>
        <th>Status Bangunan</th>
        <th>Status Tanah</th>
        <th>Luas Tanah</th>
        <th>Jumlah Lantai</th>
        <th>Tinggi Bangunan</th>
        <th>Koefisien Dasar Bangunan</th>
        <th>IMB</th>
        <th>GSJ</th>
        <th>GSB</th>
        <th>GSS</th>
        <th>KDB</th>
        <th>Latitude</th>
        <th>Longitude</th>
    </tr>
    </thead>
    <tbody>
    @foreach($buildings as $building)
        <tr>
            <td>{{$building->regionid}}</td>
            <td>{{$building->nobangunan}}</td>
            <td>{{$building->namapemilik}}</td>
            <td>{{$building->fungsibangunan}}</td>
            <td>{{$building->statusbangunans->nama}}</td>
            <td>{{$building->statustanah}}</td>
            <td>{{$building->luastanah}}</td>
            <td>{{$building->jumlahlantai}}</td>
            <td>{{$building->tinggibangunan}}</td>
            <td>{{$building->koefisiendasarbangunan}}</td>
            <td>{{$building->imb}}</td>
            <td>{{$building->gsj}}</td>
            <td>{{$building->gsb}}</td>
            <td>{{$building->gss}}</td>
            <td>{{$building->kdb}}</td>
            <td>{{$building->latitude}}</td>
            <td>{{$building->longitude}}</td>
        </tr>
    @endforeach
    </tbody>
</table>