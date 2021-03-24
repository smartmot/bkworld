<?php
header("Content-type: text/css; charset: UTF-8");
$color1 = config("settings.theme_color")[0];
$color2 = config("settings.theme_color")[1];
$color3 = config("settings.theme_color")[2];
$color4 = config("settings.theme_color")[3];
$color5 = config("settings.theme_color")[4];
echo "
.color_1{color: $color1;}
.color_2{color: $color2;}
.color_3{color: $color3;}
.color_4{color: $color4;}
.color_5{color: $color5;}

.fcolor_1:focus{color: $color1;}
.fcolor_2:focus{color: $color2;}
.fcolor_3:focus{color: $color3;}
.fcolor_4:focus{color: $color4;}
.fcolor_5:focus{color: $color5;}

.acolor_1:active{color: $color1;}
.acolor_2:active{color: $color2;}
.acolor_3:active{color: $color3;}
.acolor_4:active{color: $color4;}
.acolor_5:active{color: $color5;}

.dcolor_1:disabled{color: $color1;}
.dcolor_2:disabled{color: $color2;}
.dcolor_3:disabled{color: $color3;}
.dcolor_4:disabled{color: $color4;}
.dcolor_5:disabled{color: $color5;}

.bcolor_1{background-color: $color1;}
.bcolor_2{background-color: $color2;}
.bcolor_3{background-color: $color3;}
.bcolor_4{background-color: $color4;}
.bcolor_5{background-color: $color5;}

.fbcolor_1:focus{background-color: $color1;}
.fbcolor_2:focus{background-color: $color2;}
.fbcolor_3:focus{background-color: $color3;}
.fbcolor_4:focus{background-color: $color4;}
.fbcolor_5:focus{background-color: $color5;}

.abcolor_1:active{background-color: $color1;}
.abcolor_2:active{background-color: $color2;}
.abcolor_3:active{background-color: $color3;}
.abcolor_4:active{background-color: $color4;}
.abcolor_5:active{background-color: $color5;}

.dbcolor_1:disabled{background-color: $color1;}
.dbcolor_2:disabled{background-color: $color2;}
.dbcolor_3:disabled{background-color: $color3;}
.dbcolor_4:disabled{background-color: $color4;}
.dbcolor_5:disabled{background-color: $color5;}

@media (hover: hover) {
    .hcolor_1:hover{color: $color1;}
    .hcolor_2:hover{color: $color2;}
    .hcolor_3:hover{color: $color3;}
    .hcolor_4:hover{color: $color4;}
    .hcolor_5:hover{color: $color5;}

    .hbcolor_1:hover{background-color: $color1;}
    .hbcolor_2:hover{background-color: $color2;}
    .hbcolor_3:hover{background-color: $color3;}
    .hbcolor_4:hover{background-color: $color4;}
    .hbcolor_5:hover{background-color: $color5;}
}
";
?>
