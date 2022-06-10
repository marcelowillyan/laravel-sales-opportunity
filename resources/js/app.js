require('./bootstrap');
require('jquery-mask-plugin');

$('.price').mask("#.##0,00", {reverse: true});
$('.date').mask('00/00/0000');