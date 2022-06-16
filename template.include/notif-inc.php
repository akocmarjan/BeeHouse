<?php if(isset($_SESSION['flash'])):
    if($_SESSION['flash'] == 'alreadyapplied'){?>
    <div class="notif-popup">
        <i class="fas fa-times-circle"></i>
        <p>Already applied, cancel first your last application.</p>
        <button class="notif-trigger">Continue</button>
    </div>
    <?php }elseif($_SESSION['flash'] == 'roomtenant'){ ?>
    <div class="notif-popup">
        <i class="fas fa-times-circle"></i>
        <p>You are already a room tenant. Wait for your contract to end or cancel via your landlord</p>
        <button class="notif-trigger">Continue</button>
    </div>
    <?php }elseif($_SESSION['flash'] == 'roomnotempty'){ ?>
    <div class="notif-popup">
        <i class="fas fa-times-circle"></i>
        <p>Room is not empty. Remove the room first from the property.</p>
        <button class="notif-trigger">Continue</button>
    </div>
    <?php }elseif($_SESSION['flash'] == 'tenantnotempty'){ ?>
    <div class="notif-popup">
        <i class="fas fa-times-circle"></i>
        <p>This room currently have a tenant. Remove the tenant first from the room.</p>
        <button class="notif-trigger">Continue</button>
    </div>
<?php  }  endif; unset($_SESSION['flash']);?>