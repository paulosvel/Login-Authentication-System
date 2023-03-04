<!DOCTYPE html>
<html>
<head>
    <style>
      .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        position: absolute;
        top:0%;
        
      }

      .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
      }

      .tab button:hover {
        background-color: #ddd;
      }

      .tab button.active {
        background-color: #ccc;
      }
      .tabcontent {
        /* display: none;  */
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
        
      }
    </style>
  </head>
  <body>
<nav class="navbar navbar-default">

<div class="tab"> 
      <button class="tablinks" onclick="location.href='adminpage'">My Profile</button>
      <button class="tablinks" onclick="location.href='customers'">Customers</button>
      <button class="tablinks" onclick="location.href='historyadmin'">Message History</button>
      <button class="tablinks" onclick="location.href='logout'">Logout</button>
     </div> 

</nav>
</body>
</html>