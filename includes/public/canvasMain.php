<style>
  /* Offcanvas Styles */
  .offcanvas-below-navbar {
    top: 100%;
    /* Position below the navbar */
    transform: translateY(0);
    /* Reset the default translation */
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    /* Add a separator border */
  }

  /* Adjust the offcanvas body to fit the available space below the navbar */
  .offcanvas-below-navbar .offcanvas-body {
    max-height: calc(100vh - 56px);
    /* 56px is the height of the navbar */
    overflow-y: auto;
  }
</style>

<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Category</h5>
  </div>
  <div class="offcanvas-body">
    <!-- Add your category links here -->
    <span class="placeholder col-6"></span>
    <span class="placeholder w-75"></span>
    <span class="placeholder" style="width: 25%;"></span>
    <!-- Add more categories as needed -->
  </div>
</div>