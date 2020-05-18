<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HIMTI || UMT</title>
<style>
  .container{
    /*background: rgba(202,202,202, 0.5);*/
    margin: 0 auto;
  }
  h1,h2{
    text-transform: uppercase;
    text-align: center;
  }
  .row{
    margin: 0 auto;
    /*border: 1px dotted black;*/
  }
  .box1{
    width: 600px;
    height: 150px;
    margin: 0 auto;
  }

  p{
    font-size: 20pt;
  }
  
  table{
    font-size: 16pt;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
  }
</style>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="box1">
          <img src="<?= base_url('assets/img/logo_hifest.png');?>" width="600" height="150">
        </div>
        <div class="box2">
          <h2 style="text-align: center;" class="text-center">Talkshow Data Security </h2> 
            <h1>2020</h1>
            <br><br>
            <p>Halo, <?= $peserta;?></p>
            <p>
              Terima kasih sudah mendaftar pada acara talkshow Himti, dengan tema :
              <strong>Pentingnya Pengamanan Data</strong>
            </p>
            <p>Yang akan di laksanakan pada :</p>
          <!-- <table border="3" cellspacing="0" width="450" height="200"> -->
          <table>
            <tr>
              <td>Hari/tanggal</td>
              <td>:</td>
              <td>Rabu / 20 Mei 2020</td>
            </tr>
            <tr>
              <td>Pukul</td>
              <td>:</td>
              <td>15.00 – Selesai WIB</td>
            </tr>
            <tr>
              <td>Aplikasi</td>
              <td>:</td>
              <td>Online Via Platform ZOOM Meeting</td>
            </tr>
          </table>
          <p>
            <strong>
              link zoom :
            </strong>
          </p>
          <p>
            <?= $link;?>
          </p>
          <p>
            <strong>Note : diharapkan hadir 10 menit sebelum acara di mulai</strong>
            <br><br><br>
            regard, <br>
            Himti-UMT @ 2020
          </p>
          <br><br>
      </div>
    </div>
  </div>
</body>
</html>