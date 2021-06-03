<!DOCTYPE html>
<html>

<head>
    <title>Surat Prakerin {{ $surat->nama_perusahaan }}</title>
    <link rel="stylesheet" href="{{ public_path('assets/css/bootstrap.min.css') }}"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .container {
        font-family: sans-serif;
    }
</style>

<body>
    <div class="container">
        <div class="logo float-left">
            <img src="{{ public_path('assets/img/logo/logo_tb.png') }}" alt="SMK Taruna Bhakti" width="130">
        </div>
        <div class="text-uppercase text-center">
            <h4 class="text-header h4">YAYASAN SETYA BHAKTI</h4>
            <h2 class="text-header h2" style="margin-top:-15px;">SMK TARUNA BHAKTI</h2>
            <p class="text-header text-bold text-sm" style="margin-top:-15px;">TERAKREDITASI: ”A” No :
                02.00/375/BAP-SM/XI/2008</p>
        </div>

        <hr style="height:5px;border:none;color:#333;background-color:#333;">

        <div class="template_surat text-center text-uppercase mb-4">
            <h4 class="text-header h4 ">{{ $surat->nama_template_surat }}</h4>
            <hr style="height:2px;width:260px;margin-top:-15px;border:none;color:#333;background-color:#333;">
            <p class="text-header text-bold text-sm" style="margin-top:-15px;">No. {{ $surat->nomor_surat }}</p>
        </div>

        <div class="pembukaan mb-4">
            Kepala Sekolah Menengah Kejuruan ( SMK ) Taruna Bhakti Cimanggis Depok, dengan ini
            menugaskan kepada :
        </div>

        <div class="monitoring ml-5 mb-4">
            <table cellpadding="">
                <tr>
                    <td>Nama</td>
                    <td class="text-right px-3" width="40px">:</td>
                    <td>{{ $surat->petugas->nama_guru }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td class="text-right px-3" width="40px">:</td>
                    <td>{{ $surat->petugas->jabatan }}</td>
                </tr>
                <tr>
                    <td>Unit</td>
                    <td class="text-right px-3" width="40px">:</td>
                    <td>SMK TARUNA BHAKTI</td>
                </tr>
            </table>
        </div>

        <div class="content mb-4">
            {{ $surat->content_surat }}
        </div>

        <div class="pelaksanaan ml-5 mb-4">
            <table cellpadding="">
                <tr>
                    <td>Tanggal</td>
                    <td class="text-right px-3" width="40px">:</td>
                    <td>{{ $surat->get_tanggal_pelaksanaan() }}</td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td class="text-right px-3" width="40px">:</td>
                    <td><strong>{{ $surat->nama_perusahaan }}</strong></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td class="text-right px-3" width="40px">:</td>
                    <td>{{ $surat->alamat_perusahaan }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>