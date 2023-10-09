<div class="table-responsive">
    <table class="table table-hover table-bordered" style="margin: 0;">
        <thead>
            <tr class="table-dark">
                <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu
                </th>
                <th colspan="12" style="text-align: center;">Periode Pada {{ $tahun }}
                </th>
                <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total
                </th>
            </tr>
            <tr class="table-dark">
                <th style="text-align: center;width: 75px;">Jan</th>
                <th style="text-align: center;width: 75px;">Feb</th>
                <th style="text-align: center;width: 75px;">Mar</th>
                <th style="text-align: center;width: 75px;">Apr</th>
                <th style="text-align: center;width: 75px;">Mei</th>
                <th style="text-align: center;width: 75px;">Jun</th>
                <th style="text-align: center;width: 75px;">Jul</th>
                <th style="text-align: center;width: 75px;">Ags</th>
                <th style="text-align: center;width: 75px;">Sep</th>
                <th style="text-align: center;width: 75px;">Okt</th>
                <th style="text-align: center;width: 75px;">Nov</th>
                <th style="text-align: center;width: 75px;">Des</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="table-secondary" colspan="14"><b>Makanan</b></td>
            </tr>
            @foreach ($menus as $menu)
                @if ($menu['kategori'] == 'makanan')
                    @include('components.data_table')
                @endif
            @endforeach
            <tr>
                <td class="table-secondary" colspan="14"><b>Minuman</b></td>
            </tr>

            @foreach ($menus as $menu)
                @if ($menu['kategori'] == 'minuman')
                    @include('components.data_table')
                @endif
            @endforeach

            <tr class="table-dark">
                <td><b>Total</b></td>
                @php
                    $total_sum = 0;
                @endphp
                @foreach ($sum_months as $sum)
                    <td style="text-align: right;">
                        <b>
                            {{ $sum !== 0 ? number_format($sum) : '' }}
                        </b>
                    </td>
                    @php
                        $total_sum += $sum;
                    @endphp
                @endforeach
                <td style="text-align: right;"><b>{{ number_format($total_sum) }}</b></td>
            </tr>
        </tbody>
    </table>
</div>
