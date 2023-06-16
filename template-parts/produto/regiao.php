<?php

// Seção Região da página de produto
//
//
// Captura informações do CMS
$titulo_carac = get_field("imovel_titulo_caracteristicas");
$titulo_regiao = get_field("imoveis_titulo_regiao");
$chamada_regiao = get_field("imoveis_chamada_regiao");
$icon_endereco = get_field("imoveis_icon_address_regiao");
$txt_endereco = get_field("imoveis_txt_address_regiao");
$txt_bairro = get_field("imoveis_txt_bairro_regiao");
$imoveis_show_btn_app = get_field("imoveis_show_btn_app");
$imoveis_regiao_app_titulo = get_field("imoveis_regiao_app_titulo");
$imoveis_btn_app_waze = get_field("imoveis_btn_app_waze");
$imoveis_btn_app_gmap = get_field("imoveis_btn_app_gmap");
$imoveis_regiao_latitude = get_field("imoveis_regiao_latitude");
$imoveis_regiao_longitude = get_field("imoveis_regiao_longitude");

// Componentes Google Maps Interface
$icon_pin_ez = get_field("imoveis_icon_pin_mapa_ez",1077);
$txt_academias = get_field("imoveis_txt_map_academias",1077);
$type_academias = get_field("imoveis_type_map_academias",1077);
$type_academias = get_field("imoveis_type_map_academias",1077);
$icon_academias = get_field("imoveis_icon_mapa_academias",1077);
$icon_pin_academias = get_field("imoveis_icon_pin_mapa_academias",1077);
$txt_bancos = get_field("imoveis_txt_map_bancos",1077);
$type_bancos = get_field("imoveis_type_map_bancos",1077);
$icon_bancos = get_field("imoveis_icon_mapa_bancos",1077);
$icon_pin_bancos = get_field("imoveis_icon_pin_mapa_bancos",1077);
$txt_ensino = get_field("imoveis_txt_map_ensino",1077);
$type_ensino = get_field("imoveis_type_map_ensino",1077);
$icon_ensino = get_field("imoveis_icon_mapa_ensino",1077);
$icon_pin_ensino = get_field("imoveis_icon_pin_mapa_ensino",1077);
$txt_farmacias = get_field("imoveis_txt_map_farmacias",1077);
$type_farmacias = get_field("imoveis_type_map_farmacias",1077);
$icon_farmacias = get_field("imoveis_icon_mapa_farmacias",1077);
$icon_pin_farmacias = get_field("imoveis_icon_pin_mapa_farmacias",1077);
$txt_hospitais = get_field("imoveis_txt_map_hospitais",1077);
$type_hospitais = get_field("imoveis_type_map_hospitais",1077);
$icon_hospitais = get_field("imoveis_icon_mapa_hospitais",1077);
$icon_pin_hospitais = get_field("imoveis_icon_pin_mapa_hospitais",1077);
$txt_padarias = get_field("imoveis_txt_map_padarias",1077);
$type_padarias = get_field("imoveis_type_map_padarias",1077);
$icon_padarias = get_field("imoveis_icon_mapa_padarias",1077);
$icon_pin_padarias = get_field("imoveis_icon_pin_mapa_padarias",1077);
$txt_shoppings = get_field("imoveis_txt_map_shoppings",1077);
$type_shoppings = get_field("imoveis_type_map_shoppings",1077);
$icon_shoppings = get_field("imoveis_icon_mapa_shoppings",1077);
$icon_pin_shoppings = get_field("imoveis_icon_pin_mapa_shoppings",1077);
$txt_supermercados = get_field("imoveis_txt_map_supermercados",1077);
$type_supermercados = get_field("imoveis_type_map_supermercados",1077);
$icon_supermercados = get_field("imoveis_icon_mapa_supermercados",1077);
$icon_pin_supermercados = get_field("imoveis_icon_pin_mapa_supermercados",1077);
$txt_passeio = get_field("imoveis_txt_map_passeio",1077);
$txt_rotas = get_field("imoveis_txt_map_traca_rotas",1077);
$label_rotas = get_field("imoveis_label_map_tracador_rotas",1077);
$btn_rotas = get_field("imoveis_txt_btn_map_tracador_rotas",1077);
$map = get_field("imoveis_map_regiao");

function prepareTypeMapString ($str) {
	$val1 = explode(',', $str);
	$val2 = array_map('addQuotes', $val1);
	return implode(',', $val2);
}

function addQuotes ($str) {
	return ("'" . $str . "'");
}

?>

<section id="regiao" class="container-fluid wrapper-imovel wrapper-imovel-regiao reverse">
	<div class="container wrapper-inner imovel-regiao">
		<div class="row">
			<div class="col-12">
				<div class="section-content-header">
					<h2 class="section-content-title"><?php echo $titulo_regiao; ?></h2>
					<div class="section-content-title-separator"></div>
					<p class="regiao-info-title"><?php echo $chamada_regiao; ?></p>
				</div>
			</div>
		</div>
		<div class="row google-marker-list">
			<div class="col-12">
				<ul class="d-flex justify-content-center align-content-start flex-wrap p-0 m-0">
					<li class="google-marker-item d-flex flex-column justify-content-center" onclick="togglePlaceMarkers(this, [<?php echo prepareTypeMapString($type_academias); ?>], '<?php echo wp_get_attachment_url($icon_pin_academias); ?>')">
						<div class="google-marker-item-icon d-flex justify-content-center">
							<img src="<?php echo wp_get_attachment_url($icon_academias); ?>" alt="<?php echo get_post_meta( $icon_academias, '_wp_attachment_image_alt', true); ?>">
						</div>
						<p class="text-center"><?php echo $txt_academias; ?></p>
					</li>
					<li class="google-marker-item d-flex flex-column justify-content-center" onclick="togglePlaceMarkers(this, [<?php echo prepareTypeMapString($type_bancos); ?>], '<?php echo wp_get_attachment_url($icon_pin_bancos); ?>')">
						<div class="google-marker-item-icon d-flex justify-content-center">
							<img src="<?php echo wp_get_attachment_url($icon_bancos); ?>" alt="<?php echo get_post_meta( $icon_bancos, '_wp_attachment_image_alt', true); ?>">
						</div>
						<p class="text-center"><?php echo $txt_bancos; ?></p>
						</li>
					<li class="google-marker-item d-flex flex-column justify-content-center" onclick="togglePlaceMarkers(this, [<?php echo prepareTypeMapString($type_ensino); ?>], '<?php echo wp_get_attachment_url($icon_pin_ensino); ?>')">
						<div class="google-marker-item-icon d-flex justify-content-center">
							<img src="<?php echo wp_get_attachment_url($icon_ensino); ?>" alt="<?php echo get_post_meta( $icon_ensino, '_wp_attachment_image_alt', true); ?>">
						</div>
						<p class="text-center"><?php echo $txt_ensino; ?></p>
					</li>
					<li class="google-marker-item d-flex flex-column justify-content-center" onclick="togglePlaceMarkers(this, [<?php echo prepareTypeMapString($type_farmacias); ?>], '<?php echo wp_get_attachment_url($icon_pin_farmacias); ?>')">
						<div class="google-marker-item-icon d-flex justify-content-center">
							<img src="<?php echo wp_get_attachment_url($icon_farmacias); ?>" alt="<?php echo get_post_meta( $icon_farmacias, '_wp_attachment_image_alt', true); ?>">
						</div>
						<p class="text-center"><?php echo $txt_farmacias; ?></p>
					</li>
					<li class="google-marker-item d-flex flex-column justify-content-center" onclick="togglePlaceMarkers(this, [<?php echo prepareTypeMapString($type_hospitais); ?>], '<?php echo wp_get_attachment_url($icon_pin_hospitais); ?>')">
						<div class="google-marker-item-icon d-flex justify-content-center">
							<img src="<?php echo wp_get_attachment_url($icon_hospitais); ?>" alt="<?php echo get_post_meta( $icon_hospitais, '_wp_attachment_image_alt', true); ?>">
						</div>
						<p class="text-center"><?php echo $txt_hospitais; ?></p>
					</li>
					<li class="google-marker-item d-flex flex-column justify-content-center" onclick="togglePlaceMarkers(this, [<?php echo prepareTypeMapString($type_padarias); ?>], '<?php echo wp_get_attachment_url($icon_pin_padarias); ?>')">
						<div class="google-marker-item-icon d-flex justify-content-center">
							<img src="<?php echo wp_get_attachment_url($icon_padarias); ?>" alt="<?php echo get_post_meta( $icon_padarias, '_wp_attachment_image_alt', true); ?>">
						</div>
						<p class="text-center"><?php echo $txt_padarias; ?></p>
					</li>
					<li class="google-marker-item d-flex flex-column justify-content-center" onclick="togglePlaceMarkers(this, [<?php echo prepareTypeMapString($type_shoppings); ?>], '<?php echo wp_get_attachment_url($icon_pin_shoppings); ?>')">
						<div class="google-marker-item-icon d-flex justify-content-center">
							<img src="<?php echo wp_get_attachment_url($icon_shoppings); ?>" alt="<?php echo get_post_meta( $icon_shoppings, '_wp_attachment_image_alt', true); ?>">
						</div>
						<p class="text-center"><?php echo $txt_shoppings; ?></p>
					</li>
					<li class="google-marker-item d-flex flex-column justify-content-center" onclick="togglePlaceMarkers(this, [<?php echo prepareTypeMapString($type_supermercados); ?>], '<?php echo wp_get_attachment_url($icon_pin_supermercados); ?>')">
						<div class="google-marker-item-icon d-flex justify-content-center">
							<img src="<?php echo wp_get_attachment_url($icon_supermercados); ?>" alt="<?php echo get_post_meta( $icon_supermercados, '_wp_attachment_image_alt', true); ?>">
						</div>
						<p class="text-center"><?php echo $txt_supermercados; ?></p>
					</li>
				</ul>
			</div>
		</div>

		<?php
		if (!empty($map)) { ?>

			<div class="regiao-mapa">
				<div id="map" data-title="<?php echo $titulo_carac; ?>" data-marker-img="<?php echo wp_get_attachment_url($icon_pin_ez); ?>" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div>
				<div id="show-map">
					<div class="wrap-btn-show-map d-flex align-items-center">
						<button class="btn-show-map">EXIBIR MAPA</button>
					</div>
				</div>
			</div>
		<?php } ?>
		<script>
			$(document).ready(function(){
			    $('#show-map').on('click',initMap)
			});
		</script>

		<div class="row endereco-regiao">
			<div class="col-12 d-flex justify-content-center align-item-center flex-column flex-md-column flex-lg-row">
				<div class="endereco-regiao-icon mb-2 d-flex justify-content-center">
					<img src="<?php echo wp_get_attachment_url($icon_endereco); ?>" alt="<?php echo get_post_meta( $icon_endereco, '_wp_attachment_image_alt', true); ?>">
				</div>
				<p class="endereco-regiao-text text-center"><?php echo $txt_endereco; ?></p>
			</div>
		</div>
	</div>

	<?php
	// Constroi URL de rotas:
	$url_waze = "https://www.waze.com/ul?ll=" . $imoveis_regiao_latitude . "," . $imoveis_regiao_longitude . "&navigate=yes&zoom=17";
	$url_gmap = "https://www.google.com/maps/search/?api=1&query=" . $imoveis_regiao_latitude . "," . $imoveis_regiao_longitude;
	if($imoveis_show_btn_app == 1){ ?>
		<div id="appRoutes" class="app-routes">
			<div class="wrapper-inner">
				<div class="wrapper-app-routes">
					<p class="title-app-routes"><?php echo $imoveis_regiao_app_titulo; ?></p>
					<div class="wrap-btns-app-routes">
						<a href="<?php echo $url_waze; ?>"><img src="<?php echo $imoveis_btn_app_waze; ?>" alt="Waze"></a>
						<a href="<?php echo $url_gmap; ?>"><img src="<?php echo $imoveis_btn_app_gmap; ?>" alt="Google Maps"></a>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</section>


<script>
	var map;
	var infowindow;
	var marker;
	var markers = [];
	var myLatLng;
	var valPlaceType;
	var valPlaceTypeMarkersList = new Object();
	var valPlaceMarkerImg;
	var valTitle = $('.regiao-mapa > #map').attr('data-title');
	var valMarkerImg = $('.regiao-mapa > #map').attr('data-marker-img');
	var valLat = $('.regiao-mapa > #map').attr('data-lat');
	var valLng = $('.regiao-mapa > #map').attr('data-lng');

	function initMap() {

		myLatLng = {lat: Number(valLat), lng: Number(valLng)};

		map = new google.maps.Map(document.getElementById('map'), {
			center: myLatLng,
			zoom: 15
		});

		infowindow = new google.maps.InfoWindow();

		marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: valMarkerImg,
			title: valTitle
		});
		marker.addListener('click', function() {
			infowindow.setContent(valTitle);
			infowindow.open(map, this);
		});

		document.getElementById("show-map").style.display = "none";

	}

	function togglePlaceMarkers(element, placeType, placeMarkerImg) {
		if (!$(element).hasClass('disabled')) {
			$(element).addClass('disabled');
			if ($(element).hasClass('active')) {
				$(element).removeClass('active');
				clearMarkers(placeType);
				$(element).removeClass('disabled');
			} else {
				$(element).addClass('active');
				valPlaceType = placeType;
				valPlaceMarkerImg = placeMarkerImg;
				var service = new google.maps.places.PlacesService(map);
				for (var i = 0; i < valPlaceType.length; i++) {
					service.nearbySearch({
						location: myLatLng,
						radius: 800,
						type: [valPlaceType[i]]
					}, callback);
				}
				setTimeout(function() {
					$(element).removeClass('disabled');
				}, 2500);
			}
		}
	}

	function callback(results, status) {
		if (status === google.maps.places.PlacesServiceStatus.OK) {
			for (var i = 0; i < results.length; i++) {
				addMarkerWithTimeout(results[i], i * 100);
			}
		}
	}

	function addMarkerWithTimeout(place, timeout) {
		valPlaceTypeMarkersList[valPlaceType] = [];
		window.setTimeout(function() {
			var placeLoc = place.geometry.location;
			marker = new google.maps.Marker({
				map: map,
				position: placeLoc,
				icon: valPlaceMarkerImg,
				animation: google.maps.Animation.DROP
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.setContent(place.name);
				infowindow.open(map, this);
			});
			valPlaceTypeMarkersList[valPlaceType].push(marker);
		}, timeout);
	}

	function clearMarkers(placeType) {
		if (undefined !== valPlaceTypeMarkersList[placeType]) {
			var deleteMarkers = valPlaceTypeMarkersList[placeType];
			for (var i = 0; i < deleteMarkers.length; i++) {
				deleteMarkers[i].setMap(null);
			}
			delete valPlaceTypeMarkersList[placeType];
		}
	}
</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByFt6FP95RkG1yrZqel57Yfff22kfVHWs&signed_in=true&libraries=places&callback=initMap" async defer></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByFt6FP95RkG1yrZqel57Yfff22kfVHWs&signed_in=true&libraries=places" async defer></script>