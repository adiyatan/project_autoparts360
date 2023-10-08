function changeLanguage(lang) {
  // Check which language is selected and modify the content accordingly
  if (lang === "en") {
    // English content
    document.getElementById("englishBtn").style.display = "none";
    document.getElementById("indonesianBtn").style.display = "block";

    // Update content in the HTML file here for English language
    document.getElementById("welcomeTitle").innerText =
      "Welcome to AutoParts360";
    document.getElementById("welcomeDescription").innerText =
      "Find the best spare parts for your racing needs.";
    document.getElementById("btnLihat").innerText = "See Products"; // Updated button text for English language
    document.getElementById("aboutUs").innerText = "About Us";
    document.getElementById("par1").innerText =
      "AutoParts360 is a company that has been operating in the auto parts sales industry for more than 20 years. As a family company, we have a strong commitment to providing high quality services to our customers. With extensive experience and in-depth knowledge of the automotive world, we are the main destination for customers who are looking for various kinds of car and motorbike spare parts of various makes and models.";
    document.getElementById("par2").innerText =
      "AutoParts360 offers a wide range of high-quality products, including engine parts, brake systems, suspension systems, electrical components and more for two-wheeled and four-wheeled vehicles. Each product is equipped with a detailed description and stock availability information to make it easier for customers to select and purchase.";
    document.getElementById("btnHome").innerHTML =
      '<i class="fas fa-home"></i> Home';
    document.getElementById("btnProduk").innerHTML =
      '<i class="fas fa-motorcycle"></i> Product';
    document.getElementById("btnAbout").innerHTML =
      '<i class="fas fa-users"></i> About Us';
    document.getElementById("btnContact").innerHTML =
      '<i class="fas fa-envelope"></i> Contact';
    document.getElementById("learn").innerText = "Learn More";
    document.getElementById("fullNameLabel").innerText = "Full Name";
    document.getElementById("emailLabel").innerText = "Email Address";
    document.getElementById("messageLabel").innerText = "Message";
    document.getElementById("contactTitle").innerText = "Contact Us";
    document.getElementById("submitButton").innerText = "Submit";
    document.getElementById("berhasil").innerText =
      "Thank you for your message! We will get back to you soon.";

    document.getElementById("contactTitle").innerText = "Our Location";
    document.getElementById("fullNameLabel").innerText = "Full Name";
    document.getElementById("emailLabel").innerText = "Email Address";
    document.getElementById("messageLabel").innerText = "Message or request to credential admin";
    document.getElementById("submitButton").innerText = "Submit";

    // Update content for footer
    document.querySelector("footer p:first-child").innerText = `${new Date().getFullYear()} AutoParts360. All rights reserved.`;
    document.querySelector("footer p:last-child").innerText = "made with love ❤️ by @adiyatan";
    document.querySelector("footer p:last-child").innerHTML = `Email: <a href="mailto:adiyazam@gmail.com">adiyazam@gmail.com</a>`;

    // Update any other English content on the page
  } else if (lang === "id") {
    // Indonesian content
    document.getElementById("englishBtn").style.display = "block";
    document.getElementById("indonesianBtn").style.display = "none";

    // Update content in the HTML file here for Indonesian language
    document.getElementById("welcomeTitle").innerText =
      "Selamat Datang di AutoParts360";
    document.getElementById("welcomeDescription").innerText =
      "Temukan berbagai produk sparepart terbaik untuk balapan Anda.";
    document.getElementById("btnLihat").innerText = "Lihat Produk";
    document.getElementById("aboutUs").innerText = "Tentang Kami";
    document.getElementById("par1").innerText =
      "AutoParts360 adalah sebuah perusahaan yang telah beroperasi di industri penjualan sparepart kendaraan selama lebih dari 20 tahun. Sebagai perusahaan keluarga, kami memiliki komitmen kuat untuk menyediakan layanan berkualitas tinggi kepada pelanggan kami. Dengan pengalaman yang luas dan pengetahuan mendalam tentang dunia otomotif, kami menjadi tujuan utama bagi pelanggan yang mencari berbagai macam sparepart mobil dan motor dari berbagai merek dan model.";
    document.getElementById("par2").innerText =
      "AutoParts360 menawarkan beragam produk berkualitas tinggi, termasuk sparepart mesin, sistem rem, sistem suspensi, komponen listrik, dan banyak lagi untuk kendaraan roda dua dan roda empat. Setiap produk dilengkapi dengan deskripsi detail dan informasi ketersediaan stok untuk memudahkan pelanggan dalam pemilihan dan pembelian.";
    document.getElementById("btnHome").innerHTML =
      '<i class="fas fa-home"></i> Beranda';
    document.getElementById("btnProduk").innerHTML =
      '<i class="fas fa-motorcycle"></i> Produk';
    document.getElementById("btnAbout").innerHTML =
      '<i class="fas fa-users"></i> Tentang Kami';
    document.getElementById("btnContact").innerHTML =
      '<i class="fas fa-envelope"></i> Kontak';
    document.getElementById("learn").innerText = "Pelajari Lebih Lanjut";
    document.getElementById("fullNameLabel").innerText = "Nama Lengkap";
    document.getElementById("emailLabel").innerText = "Alamat Email";
    document.getElementById("messageLabel").innerText = "Pesan";
    document.getElementById("contactTitle").innerText = "Lokasi Kami";
    document.getElementById("submitButton").innerText = "Kirim";
    document.getElementById("berhasil").innerText =
      "Terima kasih untuk pesan Anda! Kami akan segera menghubungi Anda kembali.";
    document.getElementById("contactTitle").innerText = "Lokasi Kami";
    document.getElementById("fullNameLabel").innerText = "Nama Lengkap";
    document.getElementById("emailLabel").innerText = "Alamat Email";
    document.getElementById("messageLabel").innerText = "Pesan atau permintaan kepada admin";
    document.getElementById("submitButton").innerText = "Kirim";

    // Update content for footer
    document.querySelector("footer p:first-child").innerText = `${new Date().getFullYear()} AutoParts360. Hak cipta dilindungi undang-undang.`;
    document.querySelector("footer p:last-child").innerHTML = `Dibuat dengan ❤️ oleh <a href="https://github.com/adiyatan">@adiyatan</a>`;
    document.querySelector("footer p:last-child").innerHTML = `Email: <a href="mailto:adiyazam@gmail.com">adiyazam@gmail.com</a>`;


    // Update any other Indonesian content on the page
  }
}
