<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 d-flex flex-column">
        <h1>Rental Motor</h1>

        <form action="" method="post">
            <div class="box mb-3 d-flex flex-column" style="width: 60%; height: 100%">
            <label for="pelanggan">Nama Customer :</label>
                <input type="text" name="pelanggan" placeholder="Masukkan Nama">
                <label for="sewa">Lama Waktu Rental :</label>
                <input type="number" name="sewa" placeholder="Berapa Hari Pemakaian">
                <label for="motor">Jenis Motor :</label>
                <select name="jenisMotor">
                    <option value="Mio Goib">Mio Goib (Rp140.000/hari)</option>
                    <option value="Beat Mberr">Beat Mberr (Rp130.000/hari)</option>
                    <option value="Supra Geter">Supra Geter (Rp120.000/hari)</option>
                    <option value="Aerox Wibu">Aerox Wibu (Rp190.000/hari)</option>
                </select>
                <select name="member">
                    <option value="true">Member</option>
                    <option value="false">Non Member</option>
                </select>
            </div>
            <button type="submit" value="submit" name="submit">Bayar</button>
        </form> 
        
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        class Sewa {
            protected $nama, 
            $harga,
            $ppn,
            $pajak,
            $jenis;
            public $member;
            
            public function __construct($nama, $harga, $ppn, $pajak, $jenis, $member) {
                $this->nama = $nama;
                $this->harga = $harga;
                $this->ppn = $ppn;
                $this->pajak = $pajak;
                $this->jenis = $jenis;
                $this->member = $member;
            }
            
            public function getHarga() {
                if ($this->jenis === "Mio Goib") {
                    return $this->harga = 140000;
                }
                else if ($this->jenis === "Beat Mberr") {
                    return $this->harga = 130000;
                }
                else if ($this->jenis === "Supra Geter") {
                    return $this->harga = 120000;
                } 
                else if ($this->jenis === "Aerox Wibu") {
                return $this->harga = 190000;
            }
        }

        
        public function getPpn() {
            return $this->ppn;
        }
        
        public function getMember() {
            if ($this->member === "true") {
                return $this->ppn = 0.05;
            } else if ($this->member === "false") {
                return $this->ppn = 0;
            }
        }
    }
    
    class Total extends Sewa {
        private $sewa;
        public function __construct($nama, $harga, $ppn, $pajak, $jenis, $sewa, $member){
            parent::__construct($nama, $harga, $ppn, $pajak, $jenis, $member);
            $this->sewa = $sewa;
        }
        public function getName() {
            if ($this->jenis === "Mio Goib") {
                return $this->harga = "Mio Goib"; 
            }
            else if ($this->jenis === "Beat Mberr") {
                return $this->harga = "Beat Mberr"; 
            }
            else if ($this->jenis === "Supra Geter") {
                return $this->harga = "Supra Geter";
            } 
            else if ($this->jenis === "Aerox Wibu") {
                return $this->harga = "Aerox Wibu"; 
            }
        }
    }
    
    $nama = $_POST['pelanggan'];
    $jenis = $_POST['jenisMotor'];
    $sewa = $_POST['sewa'];
    $member = $_POST['member'];
    $pajak = 10000;
    $struk = new Total($nama, 0, 0.05, $pajak, $jenis, $sewa, $member);
    // $strukArray[] = $struk;
    $diskon = $struk->getHarga() * $sewa * $struk->getPpn();
    $total = $struk->getHarga() * $sewa - $diskon + $pajak;
    // $i = 1;
    echo "<br>";
    if ($struk->member === "true") {
        echo "<p>" . "$nama Sebagai " . "Member " . "Mendapatkan Diskon 5%" . "</p>";
        echo "<p>" . "Jenis Motor Yang Disewa Adalah " . $struk->getName() . " Selama $sewa Hari" ."</p>";
        echo "<p>" . "Harga Rental Perharinya Adalah : Rp. " . $struk->getHarga() . "</p>";
        
        echo "<p>" . "Besar Yang Harus Dibayar Adalah Rp. $total" .  "</p>";
    } else if ($struk->member !== "true") {
        echo "<p>" . " $nama Sebagai " . "Non-Member " . "</p>";
        echo "<p>" . "Jenis Motor Yang Disewa Adalah " . $struk->getName() . " Selama $sewa Hari" ."</p>";
        echo "<p>" . "Harga Rental Perharinya Adalah : Rp. " . $struk->getHarga() . "</p>";
        echo "<p>" . "Besar Yang Harus Dibayar Adalah Rp. " . $total + $diskon .  "</p>";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</div>
</body>
</html>