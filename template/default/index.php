<?php

include("menu.php") ?>
<style>
    * {
        font-family: "MiSans", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

<m-card class="medium"  style="min-width:800px!important;top:20%!important;display:none" theme="outlined">
  <div slot="title" style="color:black;">📣测试测试</div>
 
  </div>

</m-card>
<div class="medium" style=" text-align:center;display: flex;gap: 47px;">
    <img style="Border-radius:10px" width="200px" src="../../../<? echo $data_header["icon"]; ?>">
    <div>
        <div style="color:black;font-size: 20px;" class="mdui-typo">
            <h1 style="font-weight: bold;"><? echo $data_header["title"]; ?></h1>
        </div>
        <div style="color:black;font-size: 10px;" class="mdui-typo">
            <h1><? echo $data_header["introduce"]; ?></h1>
        </div>
    </div>
</div>

<?php include("login-logon.php") ?>