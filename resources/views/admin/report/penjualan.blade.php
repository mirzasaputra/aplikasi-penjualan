<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Penjualan</title>

    <link rel="shortcut icon" href="{{ public_path('admin/uploads/img/' .getSetting('favicon')) }}">
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ public_path('admin/assets/assets/css/bootstrap.min.css') }}">
    <style>
        .baris {
            display: block;
            width: 100%;
        }

        .kolom-1 {
            width: 20%;
            display: inline-block;
            margin-top: -35px;
        }

        .kolom-2 {
            /* width: 75%; */
            display: inline-block;
        }

        p {
            font-size: 12px!important;
        }
    </style>
</head>
<body>
    <div class="baris">
        <div class="kolom-1">
            <img src="{{ public_path('admin/uploads/img/'. getSetting('logo')) }}" width="100%" alt="">
        </div>
        <div class="kolom-2 px-3">
            <h3 class="m-0 p-0">{{ getSetting('web_author') }}</h3>
            <p class="p-0 m-0">
                <span class="mr-2">Email : {{ getSetting('email') }}</span>
                <span class="mr-2">Telp : {{ getSetting('phone') }}</span>
            </p>
            <p class="p-0 m-0">
                <span class="mr-2">Address : {{ getSetting('address') }}</span>
            </p>
        </div>
    </div>
    <hr class="p-0 m-1 mt-3"><hr class="p-0 m-1 mb-3">
    <h4 class="text-center">Laporan Penjualan</h4>

    @foreach($collection as $item)
        <div class="mb-4" style="font-size: 12px;">
            <table width="40%">
                <tr>
                    <td width="30%">No. Invoice</td>
                    <td>: {{ $item->invoice }}</td>
                </tr>
                <tr>
                    <td width="20%">Admin</td>
                    <td>: {{ $item->user->name }}</td>
                </tr>
                <tr>
                    <td width="20%">Tanggal</td>
                    @php
                        $date = date_create($item->tgl);
                    @endphp
                    <td>: {{ date_format($date, 'D, d M Y') }}</td>
                </tr>
            </table>
            <br>
            <table class="table table-bordered" width="100%">
                <tr>
                    <th>Barcode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>

                @php
                    $total = 0;
                @endphp
                @foreach($item->penjualan_detail as $detail)
                    @php
                        $total += $detail->barang->harga_jual * $detail->qty;
                    @endphp
                    <tr class="p-0">
                        <td class="p-2 px-3">{{$detail->barang->barcode}}</td>
                        <td class="p-2 px-3">{{$detail->barang->nama}}</td>
                        <td class="p-2 px-3">Rp. {{number_format($detail->barang->harga_jual, 0, ',' ,'.')}}</td>
                        <td class="p-2 px-3">{{$detail->qty}}</td>
                        <td class="p-2 px-3">Rp. {{number_format($detail->barang->harga_jual * $detail->qty, 0, ',', '.')}}</td>
                    </tr>
                @endforeach
                    
                <tr>
                    <th colspan="2"></th>
                    <th colspan="2">Subtotal</th>
                    <th>Rp. {{ number_format($total, 0, ',', '.') }}</th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="2">Diskon</th>
                    <th>Rp. {{ number_format($total * $item->diskon / 100, 0, ',', '.') }}</th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="2">Total</th>
                    <th>Rp. {{ number_format($item->total, 0, ',', '.') }}</th>
                </tr>
            </table>
        </div>
    @endforeach
</body>
</html>