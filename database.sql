CREATE TABLE konsumen (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    no_polisi VARCHAR(20) NOT NULL,
    jenis_kendaraan VARCHAR(50) NOT NULL,
    nama_konsumen VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    tanggal_masuk DATE NOT NULL,
    jenis_service VARCHAR(50) NOT NULL,
    estimasi_biaya INT NOT NULL,
    montir VARCHAR(100) NOT NULL
);


CREATE TABLE karyawan (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);