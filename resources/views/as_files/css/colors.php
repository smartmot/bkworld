<?php
header("Content-type: text/css", true);
$color1 = 'red';
$color2 = 'red';
$color3 = 'red';
$color4 = 'red';
echo "
.color_1{color: $color1;}
.color_2{color: $color2;}
.color_3{color: $color3;}
.color_4{color: $color4;}

.fcolor_1:focus{color: $color1;}
.fcolor_2:focus{color: $color2;}
.fcolor_3:focus{color: $color3;}
.fcolor_4:focus{color: $color4;}

.acolor_1:active{color: $color1;}
.acolor_2:active{color: $color2;}
.acolor_3:active{color: $color3;}
.acolor_4:active{color: $color4;}

.dcolor_1:disabled{color: $color1;}
.dcolor_2:disabled{color: $color2;}
.dcolor_3:disabled{color: $color3;}
.dcolor_4:disabled{color: $color4;}

.bcolor_1{background-color: $color1;}
.bcolor_2{background-color: $color2;}
.bcolor_3{background-color: $color3;}
.bcolor_4{background-color: $color4;}

.fbcolor_1:focus{background-color: $color1;}
.fbcolor_2:focus{background-color: $color2;}
.fbcolor_3:focus{background-color: $color3;}
.fbcolor_4:focus{background-color: $color4;}

.abcolor_1:active{background-color: $color1;}
.abcolor_2:active{background-color: $color2;}
.abcolor_3:active{background-color: $color3;}
.abcolor_4:active{background-color: $color4;}

.dbcolor_1:disabled{background-color: $color1;}
.dbcolor_2:disabled{background-color: $color2;}
.dbcolor_3:disabled{background-color: $color3;}
.dbcolor_4:disabled{background-color: $color4;}

@media (hover: hover) {
    .hcolor_1:hover{color: $color1;}
    .hcolor_2:hover{color: $color2;}
    .hcolor_3:hover{color: $color3;}
    .hcolor_4:hover{color: $color4;}

    .hbcolor_1:hover{background-color: $color1;}
    .hbcolor_2:hover{background-color: $color2;}
    .hbcolor_3:hover{background-color: $color3;}
    .hbcolor_4:hover{background-color: $color4;}
}
";
