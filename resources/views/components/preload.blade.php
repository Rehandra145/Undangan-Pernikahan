<style>
  /* Style dasar */
  body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      overflow-x: hidden;
  }

  /* Style untuk preloader */
  .preloader {
      position: fixed;
      width: 100%;
      height: 100%;
      background-color: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      transition: opacity 0.5s ease;
  }

  .spinner {
      width: 50px;
      height: 50px;
      border: 5px solid rgba(0, 0, 0, 0.1);
      border-radius: 50%;
      border-top-color: #F9FAFB; /* Diubah ke gray-50 Tailwind (#F9FAFB) */
      animation: spin 1s linear infinite;
  }

  .progress-container {
      width: 200px;
      height: 5px;
      background-color: #f0f0f0;
      border-radius: 5px;
      margin-top: 20px;
      overflow: hidden;
  }

  .progress-bar {
      width: 0%;
      height: 100%;
      background-color: #E5E7EB; /* Diubah ke gray-50 Tailwind (#F9FAFB) */
      transition: width 0.3s ease;
  }

  .preloader-text {
      margin-top: 10px;
      font-size: 14px;
      color: #333;
  }

  /* Style untuk konten */
  .mainContent {
      opacity: 0;
      transition: opacity 1s ease;
      padding: 20px;
  }

  .header {
      background-color: #F9FAFB; /* Diubah ke gray-50 Tailwind (#F9FAFB) */
      color: #333; /* Ubah warna teks menjadi gelap karena background terang */
      padding: 20px;
      text-align: center;
  }

  .main {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      margin: 20px 0;
  }

  .card {
      width: 300px;
      margin: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
  }

  .card-image {
      width: 100%;
      height: 200px;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
  }

  .card-content {
      padding: 15px;
  }

  .footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 20px;
  }

  @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
  }
</style>

<div class="preloader" id="preloader">
  <div class="spinner"></div>
  <div class="progress-container">
      <div class="progress-bar" id="progress"></div>
  </div>
  <div class="preloader-text" id="preloader-text">Memuat... 0%</div>
</div>

<script>
  // Variabel untuk melacak status loading
  let totalResources = 0;
  let loadedResources = 0;

  // Tunggu hingga DOM selesai loading
  document.addEventListener('DOMContentLoaded', function() {
      // Hitung semua resource yang perlu dimuat
      const images = document.querySelectorAll('img');
      const scripts = document.querySelectorAll('script');
      const stylesheets = document.querySelectorAll('link[rel="stylesheet"]');
      
      totalResources = images.length + scripts.length + stylesheets.length + 1; // +1 untuk DOM itu sendiri
      loadedResources = 1; // DOM sudah dimuat
      updateProgress();

      // Mendeteksi saat gambar dimuat
      images.forEach(img => {
          if (img.complete) {
              resourceLoaded();
          } else {
              img.addEventListener('load', resourceLoaded);
              img.addEventListener('error', resourceLoaded); // Tangani juga kesalahan loading
          }
      });

      // Mendeteksi saat script dimuat
      scripts.forEach(script => {
          if (script.async) {
              resourceLoaded();
          } else if (script.readyState) { // IE
              if (script.readyState === 'loaded' || script.readyState === 'complete') {
                  resourceLoaded();
              } else {
                  script.onreadystatechange = function() {
                      if (script.readyState === 'loaded' || script.readyState === 'complete') {
                          resourceLoaded();
                      }
                  };
              }
          } else {
              script.addEventListener('load', resourceLoaded);
              script.addEventListener('error', resourceLoaded);
          }
      });

      // Mendeteksi saat stylesheet dimuat
      stylesheets.forEach(stylesheet => {
          if (stylesheet.sheet) {
              resourceLoaded();
          } else {
              stylesheet.addEventListener('load', resourceLoaded);
              stylesheet.addEventListener('error', resourceLoaded);
          }
      });

      // Jika tidak ada resource atau sudah semua dimuat, lanjutkan
      if (totalResources <= 1) {
          hidePreloader();
      }
      
      // Tambahan: tetapkan batas waktu maksimal untuk preloader
      setTimeout(hidePreloader, 5000); // maksimal 5 detik
  });

  // Fungsi yang dipanggil ketika resource dimuat
  function resourceLoaded() {
      loadedResources++;
      updateProgress();
      
      // Jika semua resource dimuat, sembunyikan preloader
      if (loadedResources >= totalResources) {
          hidePreloader();
      }
  }

  // Update progress bar
  function updateProgress() {
      const progressPercent = Math.min(Math.round((loadedResources / totalResources) * 100), 100);
      document.getElementById('progress').style.width = progressPercent + '%';
      document.getElementById('preloader-text').textContent = 'Memuat... ' + progressPercent + '%';
  }

  // Sembunyikan preloader dan tampilkan konten
  function hidePreloader() {
      // Pastikan progress bar menunjukkan 100%
      document.getElementById('progress').style.width = '100%';
      document.getElementById('preloader-text').textContent = 'Memuat... 100%';
      
      // Setelah beberapa detik, sembunyikan preloader dan tampilkan konten
      setTimeout(function() {
          const preloader = document.getElementById('preloader');
          const content = document.getElementById('mainContent');
          
          preloader.style.opacity = '0';
          content.style.opacity = '1';
          
          // Hapus preloader setelah transisi selesai
          setTimeout(function() {
              preloader.style.display = 'none';
          }, 500);
      }, 500);
  }

  // Variabel untuk simulasi loading pada demo
  let simulatedProgress = 0;
  
  // Jika perlu simulasi loading untuk keperluan demo
  function simulateLoading() {
      simulatedProgress += Math.random() * 10;
      if (simulatedProgress > 100) simulatedProgress = 100;
      
      document.getElementById('progress').style.width = simulatedProgress + '%';
      document.getElementById('preloader-text').textContent = 'Memuat... ' + Math.round(simulatedProgress) + '%';
      
      if (simulatedProgress < 100) {
          setTimeout(simulateLoading, 200);
      } else {
          hidePreloader();
      }
  }
  
  // Uncomment baris berikut jika ingin menggunakan simulasi loading
  setTimeout(simulateLoading, 500);
</script>