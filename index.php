<?php

index();

function index(){
    
    $styles = ['style', 'materialize.min'];
    
    $scripts = ['script', 'materialize.min', 'jquery-2.1.4.min'];   
    
    require_once("includes/template/header.php");
   
?>

tESTs
        <div class="row controls">
            <div clas="col l2">
                <ul>
                    <li>SignUp</li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col l12 m12 s12 banner"></div>             
        </div>
        <div class="row">
            <div class="col l2 m2 s12 navigation">
                <ul>
                    <li><a>Sport</a></li>
                    <li><a>Casual</a></li>
                    <li><a>Work</a></li>
                    <li><a>Jandals</a></li>
                    <li><a>Formal</a></li>
                </ul>            
            </div>
            <div class="col l10 m10 s12 browseCatalog">

                <div class="row item">
                    <div class="col l4">Image here</div>
                    <div class="col l6">Description here</div>
                </div>
                
                <div class="row item"></div>
                <div class="row item"></div>
                
            </div>        
        </div>
        
<?php
     
    require_once("includes/template/footer.php");
    
}
        
?>