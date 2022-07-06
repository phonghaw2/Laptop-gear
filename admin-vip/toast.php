
<?php 
        if(isset($_GET['error'])) {
    ?>
      <div id="toast">
        <div class="toast_error">
          <div class="toast_icon">
              <i class="fa-solid fa-circle-check"></i>
          </div>
          <div class="toast_body">
            <h3 class="toast_title"><?php echo ($_GET['error']) ?></h3>
          </div>
          <div class="toast_close">
            <i class="fa-solid fa-circle-xmark"></i>
          </div>
        </div>
      </div>
           
    <?php  
        } 
    ?>
    <?php 
        if(isset($_GET['success'])) {
    ?>
      <div id="toast">
        <div class="toast_success">
          <div class="toast_icon">
              <i class="fa-solid fa-circle-check"></i>
          </div>
          <div class="toast_body">
            <h3 class="toast_title"><?php echo ($_GET['success']) ?></h3>
          </div>
          <div class="toast_close">
            <i class="fa-solid fa-circle-xmark"></i>
          </div>
        </div>
      </div>

         
    <?php  
        } 
    ?>



    <script>
 
      const toast = document.getElementById('toast');
      if (toast) {
        setTimeout(function() {
            toast.parentNode.removeChild(toast);
        },3000);
        
      };
    </script>
