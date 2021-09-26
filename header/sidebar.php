<?php
if(isset($_SESSION['login_user']))
{
echo'
<div id="layoutSidenav_nav">
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
           
           


            
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fa fa-list"></i></div>
                Category
                
            </a>
            <div class="collapse" id="collapseForm" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="addCategory.php">Add Category</a>
                    <a class="nav-link" href="viewCategory.php">View Category</a>
                </nav>
            </div>
            

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEnrollment" aria-expanded="false" aria-controls="collapsePages">
            <div class="sb-nav-link-icon"><i class="fa fa-music"></i></div>
            Music
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseEnrollment" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
         
                <a class="nav-link" href="addMusic.php">Add Muisc</a>
                <a class="nav-link" href="viewMusic.php">View Muisc</a>
               
            </nav>
        </div>
           

       
        </div>
    </div>
    
    
</nav>
</div>
';
}
?>