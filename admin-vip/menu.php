
<div class="navigation">
  <div class="logo_content">
    <div class="logo">     
      <ion-icon name="laptop"></ion-icon>  
      <div class="logo_name">Laptop&Gear</div>             
    </div>
    <ion-icon name="menu" id="btn"></ion-icon>
    
  </div>
  
    <ul>
      <li class="list">
        <a href="../dashboard">
          <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="list">
        <a href="../manufacturers">
          <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
          <span class="title">Manufacturers</span>
        </a>
      </li>
      <li class="list">
        <a href="../products">
          <span class="icon"><ion-icon name="albums-outline"></ion-icon></span>
          <span class="title">Products</span>
        </a>
      </li>
      <li class="list">
        <a href="#">
          <span class="icon"><ion-icon name="chatbubbles"></ion-icon></span>
          <span class="title">Messages</span>
        </a>
      </li>
      <li class="list">
        <a href="#">
          <span class="icon"><ion-icon name="analytics"></ion-icon></span>
          <span class="title">Analytics</span>
        </a>
      </li>
      <li class="list">
        <a href="#">
          <span class="icon"><ion-icon name="heart"></ion-icon></ion-icon></span>
          <span class="title">Ads Management</span>
        </a>
      </li>
      <li class="list">
        <a href="../orders">
          <span class="icon"><ion-icon name="receipt-outline"></ion-icon></span>
          <span class="title">Orders Management</span>
        </a>
      </li>
    </ul>
    <div class="profile_content">
        <div class="profile_img">
          <img src="../img/logo.jpg" alt="logo-owner"  enctype="multipart/form-data">
        </div>
    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
    const list = document.querySelectorAll('.list');
    function activeLink() {
      list.forEach((item) =>
      item.classList.remove('active'));
      this.classList.add('active');
    }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));


    // nav
    let btn = document.querySelector("#btn");
    let nav = document.querySelector(".navigation");
    
    btn.onclick = function() {
      nav.classList.toggle("active");
    };

  </script>

  



