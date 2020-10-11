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
          <img src="<?= base_url('assets/img/himti.png');?>">
        </div>
        <div class="box2">
          <h2 style="text-align: center;" class="text-center">Pendaftaran calon anggota HIMTI-UMT </h2> 
            <h1>2020</h1>
            <br><br>
            <p>Halo, <?= $peserta;?></p>
            <p>
              Terima kasih sudah mendaftar, data diri anda :
            </p>
            <table>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?= $peserta;?></td>
            </tr>
            <tr>
              <td>email</td>
              <td>:</td>
              <td><?= $email;?></td>
            </tr>
            <tr>
              <td>kelas</td>
              <td>:</td>
              <td><?= $kelas;?></td>
            </tr>
            <tr>
              <td>semester</td>
              <td>:</td>
              <td><?= $semester;?></td>
            </tr>
            <tr>
              <td>no hp</td>
              <td>:</td>
              <td><?= $no_hp;?></td>
            </tr>
          </table>
          <br>
          <p>sudah terdaftar di website kami, silahkan menunggu email kami untuk update selanjutnya !</p>
            <br>
            regard, <br>
            Himti-UMT @ 2020
          </p>
          <br><br>
      </div>
    </div>
  </div>
</body>
</html>