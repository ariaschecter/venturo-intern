<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        td,
        th {
            font-size: 11px;
        }
    </style>


    <title>TES - Venturo Camp Tahap 2</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-header">
                Venturo - Laporan penjualan tahunan per menu
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <select id="my-select" class="form-control" name="tahun">
                                    <option value="" {{ $tahun == null ? 'selected' : '' }}>Pilih Tahun</option>
                                    <option value="2021" {{ $tahun == 2021 ? 'selected' : '' }}>2021</option>
                                    <option value="2022" {{ $tahun == 2022 ? 'selected' : '' }}>2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">
                                Tampilkan
                            </button>
                            @if ($tahun !== null)
                                <a href="{{ url('menu') }}" target="_blank" rel="Array Menu"
                                    class="btn btn-secondary">
                                    Json Menu
                                </a>
                                <a href="{{ url('transaksi?tahun=' . $tahun) }}" target="_blank" rel="Array Transaksi"
                                    class="btn btn-secondary">
                                    Json Transaksi
                                </a>
                                <a href="https://tes-web.landa.id/intermediate/download?path=example.php"
                                    class="btn btn-secondary">Download Example</a>
                            @endif
                        </div>
                    </div>
                </form>
                <hr>

                @if ($tahun !== null)
                @include('components.table')
                @endif

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
