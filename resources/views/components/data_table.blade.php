<tr>
    <td>{{ $menu['menu'] }}</td>
    @php
        $total_month = 0;
    @endphp
    @foreach ($menu['trx'] as $trx)
        <td style="text-align: right;">
            {{ $trx['total'] !== 0 ? number_format($trx['total']) : '' }}
        </td>
        @php
            $total_month += $trx['total'];
        @endphp
    @endforeach

    <td style="text-align: right;"><b>{{ number_format($total_month) }}</b></td>
</tr>
