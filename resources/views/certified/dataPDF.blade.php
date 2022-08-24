<!DOCTYPE html>
<html>
<head>
	<title>	Download Data Pdf</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <style>
      .halaman{
          width: 1100px;
          font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
          margin: 3px 5px;
        }
      /* .header{
          display: inline;
      }
      .foto{
          width: 40px;
          float: left;
      }
      .nama{
          width: 400px;
      }
      .contact{
          width: 100px;
          float: right;
      } */
      .tbheader{
          width: 100%;
          height: 80px;
      }
      .tbnama{
          width: 350px;
      }
      .tbfoto{
          width: 100px;
      }
      .tbcontact{
          width: 150px;
      }
      .tbbody{
          width: 100%;
      }
      .pendidikan{
          width: 200px;
      }
      .pendidikan-detail{
          width: 450px;
      }
  </style>
</head>
<body>
<div class="halaman" >
    <table>
        <tr class="tbheader">
            <td class="tbfoto">foto </td>
            <td class="tbnama">
                <div><strong>{{ $datauser->nama }}</strong></div>
                <div>{{ $datauser->email }}</div>
            </td>
            <td class="tbcontact">
                <div>{{ $datauser->email }}</div>
                <div>{{ $datauser->alamat }}</div>
                <div>{{ $status->deskripsi }}</div>
            </td>
        </tr>
    </table>
    <table>
        <tr class="tbbody">
            <td class="pendidikan">pendidikan</td>
            <td class="pendidikan-detail" > 
            @foreach ($pendidikan as $item)
                <div><strong> {{ $item->universitas }}</strong></div>
                <div>{{ $item->jenjang }} - {{ $item->jurusan }} </div>
                <br>
            @endforeach
            </td>
            
        </tr>
        <tr>
            <td>pengalaman</td>
            <td>gsgg</td>
            
        </tr>
    </table>

</div>
</body>
</html>