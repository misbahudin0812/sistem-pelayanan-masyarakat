<div style="padding: 2cm 2.5cm 2.5cm 2.5cm">
    <table style="width: 100%">
        <tr>
            <td style="width: 10%">
                <img src="{{ public_path('images/logo-kab.png') }}" alt="" style="height: 120px">
            </td>
            <td style="width: 90%">
                <table class="center" style="width: 100%">
                    <tr><td class="text-uppercase bold font-12">pemerintah kabupaten karawang</td></tr>
                    <tr><td class="text-uppercase bold font-12">kecamatan cilamaya wetan</td></tr>
                    <tr><td class="text-uppercase bold font-16">kepala desa cikalong</td></tr>
                    <tr><td class="font-11">Jl. Karasak-Wadas Dsn. Karajan I Ds. Cikalong Kecamatan Cilamaya Wetan</td></tr>
                    <tr><td class="text-uppercase bold font-11">Karawang</td></tr>
                </table>
            </td>
        </tr>
    </table>
    <hr style="height: .25px; background: #000;" class="mt-1">
    <hr style="height: 3px; background: #000" class="mt-1">

    <p class="text-uppercase font-14 bold center" style="margin-top: 20px"><u>surat keterangan domisili</u></p>
    <p class="font-12 center">Nomor: {{$data[0]->nomor_surat}}</p>
    <p class="font-12 paragraph" style="margin-top: 20px">Yang bertanda tangan di bawah ini, Kepala Desa Cikalong Kecamatan Cilamaya Wetan Kabupaten Karawang, Menerangkan dengan sebenarnya bahwa :</p>
    <table style="margin-top: 20px; margin-left: 40px;" class="identitas">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$data[0]->name}}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{$data[0]->nik}}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td>Karawang, {{$data[0]->tgl_lahir}}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{$data[0]->jenis_kelamin == 'L' ? 'Laki-laki':'Perempuan'}}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>Kawin</td>
        </tr>
        <tr>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td>WNI</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>ISLAM</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>PNS</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$data[0]->alamat}}</td>
        </tr>
    </table>
    <p class="font-12 paragraph" style="margin-top: 20px">Sepanjang pengetahuan dan penelitian kami bahwa nama tersebut di atas adalah benar warga masyarakat Desa Kami yang sampai saat sekarang tinggal atau menetap di alamat tersebut diatas.</p>
    <p class="font-12 paragraph" style="margin-top: 20px">Demikian surat keterangan ini dibuat dengan sebenarnya untuk dipergunakan seperlunya.</p>
    <table style="width: 100%">
        <tr>
            <td style="width: 62%">
            </td>
            <td>
                <table class="center" style="width: 100%">
                    <tr><td class="font-12">Cikalong, {{ date('Y') }}</td></tr>
                    <tr><td class="text-uppercase bold font-12">kepala desa cikalong</td></tr>
                    <tr><td><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{$kades->nama}}" alt="QR Code" style="height: 80px"></td></tr>
                    <tr><td class="text-uppercase bold font-11">{{$kades->nama}}</td></tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .paragraph {
    text-indent: 50px;
    line-height: 20px; 
    text-align: justify;
}
    .mt-1{
        margin-top: 2px;
    }
    .center{
        text-align: center;
    }
    .text-uppercase{
        text-transform: uppercase;
    }
    .font-14{
        font-size: 14pt;
    }
    .font-12{
        font-size: 12pt;
    }
    .font-11{
        font-size: 11pt;
    }
    .font-16{
        font-size: 16pt;
    }
    .bold{
        font-weight: bold;
    }
    .identitas td{
        padding: 1px 4px;
    }
</style>