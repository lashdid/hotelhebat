<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
  .logo{
    font-size: 1.5rem;
    height: 10px;
    color: rgb(34 197 94);
    font-weight: 600;
  }
  .semi-bold{
    font-weight: 600;
  }
  table{
    width: 100%;
    border: solid 1px black;
    border-collapse: collapse;
  }
  th, tr, td{
    padding: 0.5rem;
    border: solid 1px gray;
  }
</style>
<body>
    <h1 class="logo">-hotelhebat-</h1>
    <span class="semi-bold" style="font-size: 14px">Pemesanan Kamar Online</span>
    <table style="margin-top: 2rem">
      <tr>
        <th class="semi-bold" style="text-align: left;">
          Nama Pemesan
        </th>
        <th class="semi-bold" style="text-align: left;">
          Check In
        </th>
        <th class="semi-bold" style="text-align: left;">
          Check Out
        </th>
      </tr>
      <tr>
        <td>{{$guest->name}}</td>
        <td>{{$guest->check_in}}</td>
        <td>{{$guest->check_out}}</td>
      </tr>
    </table>
    <div style="width: 20rem; border: solid 1px rgb(34 197 94); margin: 2remm auto">
      <h2 style="text-align: center; color: rgb(34 197 94)">Tipe {{$guest->room_type}}</h2>
    </div>
    <h3 class="semi-bold">Detail</h3>
    <table>
      <tr>
        <td class="semi-bold">Jumlah Kamar</td>
        <td>{{$guest->room_total}}</td>
      </tr>
      <tr>
        <td class="semi-bold">Email</td>
        <td>{{$guest->email}}</td>
      </tr>
      <tr>
        <td class="semi-bold">No. Handphone</td>
        <td>{{$guest->phone_number}}</td>
      </tr>
      <tr>
        <td class="semi-bold">Nama Tamu*</td>
        <td>{{$guest->guest_name}}</td>
      </tr>
    </table>
    <div style="margin-top: 1rem; color: gray; font-size: 12px">
      <p>(*) Jika memesan lebih dari satu kamar, nama tamu akan mewakilkan tamu lainnya</p>
      <p>(**) Silahkan serahkan bukti pemesanan ini kepada resepsionis di hotel dalam bentuk cetak maupun digital pada saat check-in</p>
    </div>
</body>

</html>