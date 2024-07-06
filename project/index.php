<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet"/>
    <title>Warung Kisam</title>
</head>
<body>
    <header>
        <!-- Navigation -->
        <section class="navigation">
            <div class="container">
                <div class="box-navigation">
                    <div class="box">
                        <h1>Warung Kisam</h1>
                    </div>
                    <div class="box menu-navigation">
                        <ul>
                            <li>
                                <i class="ri-home-2-line"></i>
                                <a href="#about">About</a>
                            </li>
                            <li>
                                <i class="ri-restaurant-line"></i>
                                <a href="#famous">Menu</a>
                            </li>
                            <li>
                                <i class="ri-image-line"></i>
                                <a href="#gallery">Testimoni</a>
                            </li>
                            <li>
                                <i class="ri-information-line"></i>
                                <a href="#contact">Contact</a>
                            </li>
                            <li>
                                <i class="ri-login-circle-line"></i>
                                <a href="">Login</a>
                            </li>
                        </ul>
                    </div>
                    <div class="box menu-bar">
                    <i class="ri-menu-3-fill" style="color: white;"></i>
                    </div>
                </div>
            </div>
        </section>
        <!-- Navigation -->

        <!-- Main Word -->
        <section class="hero">
            <h1>Makanan Khas Palembang No.1 Di Kota Tangerang!</h1>
        </section>
        <!-- Main Word -->
    </header>

    <!-- about -->
    <section class="about" id="about">
        <div class="container">
            <div class="box-about">
                <div class="box">
                    <h1>Cobain Sekarang!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error illo id nostrum quo consequatur accusantium iste ratione doloremque quia magnam ut, reiciendis eligendi nisi repudiandae impedit sapiente voluptatum repellat dignissimos!</p>
                </div>
                <div class="box">
                    <img src="image/pempek_mentah.jpg" alt="Pempek">
                </div>
            </div>
        </div>
    </section>
    <!-- about -->

    <!-- about2 -->
    <section class="about2">
        <div class="container">
            <div class="box-about">
                <div class="box">
                    <img src="image/pempek_mentah.jpg" alt="Pempek">
                </div>
                <div class="box">
                    <h1>Mau jadi Reseller?</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error illo id nostrum quo consequatur accusantium iste ratione doloremque quia magnam ut, reiciendis eligendi nisi repudiandae impedit sapiente voluptatum repellat dignissimos!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- about2 -->

    <!-- famous -->
    <section class="famous" id="famous">
        <div class="container">
            <div class="box-famous-title">
                <h1>Menu</h1>
            </div>
            <div class="box-famous">
                <div class="box">
                    <img src="image/pempek_mateng.jpg" alt="Pempek" srcset="">
                    <h1>Pempek</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati accusantium aliquid ipsam? Accusamus, ullam ex!</p>
                </div>
                <div class="box">
                    <img src="image/tekwan.jpg" alt="Tekwan" srcset="">
                    <h1>Tekwan</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati accusantium aliquid ipsam? Accusamus, ullam ex!</p>
                </div>
                <div class="box">
                    <img src="image/ayam_ungkep.jpg" alt="Ayam Kuning" srcset="">
                    <h1>Ayam Kuning</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati accusantium aliquid ipsam? Accusamus, ullam ex!</p>
                </div>
                <div class="box">
                    <img src="image/dimsum.jpg" alt="Dimsum" srcset="">
                    <h1>Dimsum</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati accusantium aliquid ipsam? Accusamus, ullam ex!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- famous -->

    <!-- gallery -->
    <section class="gallery" id="gallery">
        <div class="container">
            <div class="box-famous-title">
                <h1>Testimoni</h1>
            </div>
            <div class="box-gallery">
                <img src="image/gambar_error.jpg" alt="1" srcset="">
                <img src="image/gambar_error.jpg" alt="1" srcset="">
                <img src="image/gambar_error.jpg" alt="1" srcset="">
                <img src="image/gambar_error.jpg" alt="1" srcset="">
                <img src="image/gambar_error.jpg" alt="1" srcset="">
                <img src="image/gambar_error.jpg" alt="1" srcset="">
            </div>
        </div>
    </section>
    <!-- gallery -->

    <!-- contact -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="box-contact">
                <h1>Ingin Bergabung menjadi Reseller?</h1>
                <form action="">
                    <table>
                        <tr>
                            <td><label for="nama">Nama</label></td>
                            <td><input type="text" name="nama" id="nama" placeholder="Masukkan Nama" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td><input type="email" name="email" id="email" placeholder="Masukkan Email" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td><label for="pesan">Pesan</label></td>
                            <td><textarea name="pesan" id="pesan" placeholder="Saya Ingin Bergabung Menjadi Reseller" autocomplete="off"></textarea></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </section>
    <!-- contact -->

    <!-- footer -->
    <footer>
        <p>&copy; Warung Kisam 2024</p>
    </footer>
    <!-- footer -->


    <script src="js/script.js"></script>
</body>
</html>