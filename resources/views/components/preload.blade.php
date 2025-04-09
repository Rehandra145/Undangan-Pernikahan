<div class="preloader" id="preloader">
  <div class="spinner"></div>
  <div class="progress-container">
      <div class="progress-bar" id="progress"></div>
  </div>
  <div class="preloader-text" id="preloader-text">Memuat... 0%</div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const preloader = document.getElementById('preloader');
    const content = document.getElementById('content');
    const progress = document.getElementById('progress');
    const preloaderText = document.getElementById('preloader-text');
    
    // Gunakan Performance API untuk mendeteksi semua resource yang sedang dimuat
    function checkAllResourcesLoaded() {
      // Perbarui progress berdasarkan resource yang sedang dimuat
      updateLoadingProgress();
      
      // Cek apakah masih ada request yang aktif
      const resourcesStillLoading = window.performance.getEntriesByType('resource')
        .filter(resource => {
          // Cek jika resource masih dalam proses loading
          // Kita bisa menggunakan performance API untuk memeriksa status resource
          return !resource.responseEnd;
        });
      
      // Jika tidak ada resource yang masih dimuat, sembunyikan preloader
      if (resourcesStillLoading.length === 0) {
        completeLoading();
      } else {
        // Cek kembali setelah beberapa waktu
        setTimeout(checkAllResourcesLoaded, 100);
      }
    }
    
    // Update progress bar berdasarkan resource yang sudah dimuat
    function updateLoadingProgress() {
      const resources = window.performance.getEntriesByType('resource');
      const totalResources = resources.length || 1; // Hindari pembagian dengan nol
      const loadedResources = resources.filter(r => r.responseEnd > 0).length;
      
      const progressPercent = Math.min(Math.round((loadedResources / totalResources) * 100), 100);
      
      if (progress && preloaderText) {
        progress.style.width = progressPercent + '%';
        preloaderText.textContent = 'Memuat... ' + progressPercent + '%';
      }
    }
    
    // Tampilkan progress 100% dan sembunyikan preloader
    function completeLoading() {
      if (progress && preloaderText) {
        progress.style.width = '100%';
        preloaderText.textContent = 'Memuat... 100%';
      }
      
      // Sembunyikan preloader dengan transisi
      setTimeout(function() {
        if (preloader && content) {
          preloader.style.opacity = '0';
          content.style.opacity = '1';
          
          setTimeout(function() {
            preloader.style.display = 'none';
          }, 500);
        }
      }, 500);
    }
    
    // Tambahkan listener untuk 'load' event pada window
    window.addEventListener('load', function() {
      // Mulai pemeriksaan resource setelah event 'load'
      checkAllResourcesLoaded();
    });
    
    // Tetapkan timeout maksimal untuk preloader (5 detik)
    setTimeout(function() {
      completeLoading();
    }, 5000);
  });
</script>