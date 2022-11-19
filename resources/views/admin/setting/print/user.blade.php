<html>
    <head>
        <title>{{$title}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            * {
                font-family: sans-serif;
                font-size: 11px;
            }
            .page-break {
                page-break-after: always;
            }
            table {
                width: 100%;
                padding: 3px;
                spacing: 0px;
                border: 0px;
            }
            tr > td {
                border-bottom: 1px dotted;
            }
            tr.head > td {
                font-weight: bold;
                text-align: center;
                background-color: #E3E3E3;
                border: 0px;
            }
            tr.noborder > td {
                border: 0px;
            }
            .ttd {
                height: 80px;
            }
            .center {
                text-align: center;
            }
            .left {
                text-align: left !important;
            }
            .right {
                text-align: right !important;
            }
            .label {
                width: 80px;
            }
            .bold {
                font-weight: bold;
            }
            .title {
                font-size: 16px;
            }
            .quarter {
                width: 25%;
            }
            .vtop {
                vertical-align: top;
            }
            .space {
                height: 20px;
            }
            .success {
                color: green;
            }
            .danger {
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="title bold center">
            {{$title}}
        </div>

        <table class="quarter">
            <tr>
                <td class="label">Bulan</td>
                <td>:</td>
                <td class="bold">{{$now->format('F')}}</td>
            </tr>
        </table>

        <table>
            <tr class="head">
                <td rowspan="2">No.</td>
                <td rowspan="2">Name</td>
                <td rowspan="2">Email</td>
                <td colspan="2">Information</td>
            </tr>
            <tr class="head">
                <td>Role</td>
                <td>Status</td>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td class="center">{{ $loop->iteration }}.</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="center">{{ $user->team->name }}</td>
                @if ( $user->active == 1 )
                    <td class="center success">Active</td>
                @else
                    <td class="center danger">Inactive</td>
                @endif
            </tr>
            @endforeach
            <tr class="head">
                <td colspan="4" class="center bold">JUMLAH</td>
                <td class="center bold">{{$user->count()}}</td>
            </tr>
        </table>

        <div class="space"></div>

        <table>
            <tr class="noborder center">
                <td></td>
                <td class="quarter">
                    Surabaya, {{$now->format('d F Y')}}
                    <br>Mengetahui
                </td>
            </tr>
            <tr class="noborder center">
                {{-- <td class="ttd"></td> --}}
                <td></td>
                <td>
                    <img src="data:image/png;base64, {{base64_encode(QrCode::size(70)->generate($ttd))}}">
                </td>
            </tr>
            <tr class="noborder center">
                <td class="bold"></td>
                <td class="bold">{{Auth::user()->name}}</td>
            </tr>
        </table>

        {{-- <div class="page-break"></div> --}}

        {{-- <h1>Page 2</h1> --}}
    </body>
</html>
