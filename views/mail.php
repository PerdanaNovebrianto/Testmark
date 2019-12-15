<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width"/>
        <style>
            body{
                width: 100%;
                height: 100%;
                font-family: Helvetica, Arial, sans-serif;
                line-height: 1.65;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: none;
            }
            
            h4{
                margin-top: 5px;
                margin-bottom: 5px;
            }

            .center{
                width: 100%;
                background-color: #EEE;
            }

            .mail{
                width: 60%;
                background-color: #FFF;
                border: 1px solid #FF9800;
            }

            .mail-header{
                padding: 5px 25px;
                background-color: #FF9800;
                color: #FFF;
            }

            .mail-body{
               padding: 5px 10px;
                background-color: #FFF;
            }

            .mail-footer{
                padding: 5px 10px;
                background-color: #FFF;
            }
        </style>
    </head>
    <body>
        <div class="center" align="center">
            <div class="mail">
                <div class="mail-header" align="center">
                    <h1>DETAIL PENDAFTARAN</h1>
                </div>
                <div class="mail-body" align="left">
                    <h3><?php echo 'Nama : '.$nama_pendaftar; ?></h3>
                    <h3><?php echo 'Universitas :'.$universitas_pendaftar; ?></h3>
                    <h3><?php echo 'Angkatan : '.$angkatan_pendaftar; ?></h3>
                    <h3><?php echo 'Email : '.$email_pendaftar; ?></h3>
                    <h3><?php echo 'No. Telepon : '.$telepon_pendaftar; ?></h3>
                    <h3><?php echo 'Bidang Kejuruan : '.$bidang_pendaftar; ?></h3>
                    <h3><?php echo 'Konsultan : '.$konsultan_pendaftar; ?></h3>
                    <h3><?php echo 'Paket Tempat : '.$tempat_pendaftar; ?></h3>
                    <h3><?php echo 'Paket Bimbingan : '.$bimbingan_pendaftar; ?></h3>
                    <h3><?php echo 'Total : '.$total_pendaftar; ?></h3>
                </div>
                <div class="mail-footer" align="right">
                    <h4>Dari, Daftar Sahabat Skripsi Jogja</h4>
                </div>
            </div>
        </div>
    </body>
</html>