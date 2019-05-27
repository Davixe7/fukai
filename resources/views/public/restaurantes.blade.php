@extends('public.template')
@section('inc')
<div class="box">
  <div class="title">
    <h2>Restaurantes FUKAI</h2>
  </div>
  <ul class="restaurant">
    <li>
      {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.5659708604217!2d-70.6369361841764!3d-33.434558304084156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c5410425af25%3A0x4d54c5eee2fd57ce!2sPatio+Bellavista!5e0!3m2!1ses!2scl!4v1479824340161" allowfullscreen></iframe>--}}
      <div class="maps" id="provi"></div>
      <p><h3>PROVIDENCIA</h3></p>
      <p>Avenida Pío Nono 67, Local 66, 67, 68, Providencia.</p>
      <p><br /></p>
      <p ><a href="mailto:contacto@fukai.cl">contacto@fukai.cl</a></p>
      <p><a href="tel:+56228408333">+56 2 2840 83 33</a></p>
      <p><br /></p>
      <p><b>Horarios:</b></p>
      <p>Domingo a Martes: 12:30 - 24:00  hrs.</p>
      <p>Miércoles: 12:30 - 1:00  hrs.</p>
      <p>Jueves: 12:30 - 2:00 hrs.</p>
      <p>Viernes y Sábados: 12:30 - 3:00 hrs.</p>
    </li>
    <li>
      {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3331.3087621420364!2d-70.62037568417743!3d-33.389108001754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c8a8fc58473d%3A0x480ce0d93dcffd8d!2sFukai!5e0!3m2!1ses!2scl!4v1479824697151" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
      <div class="maps" id="huechuraba"></div>
      <p><h3>CIUDAD EMPRESARIAL</h3></p>
      <p>Avenida del Parque 4860 Local 4, Huechuraba.</p>
      <p><br /></p>
      <p><a href="mailto:contacto@fukai.cl">contacto@fukai.cl</a></p>
      <p><a href="tel:+56228408333">+56228408333</a></p>
      <p><br /></p>
      <p><b>Horarios:</b></p>

      <p>Lun a Vie 12:30 a 22:00</p>
      <p>Sab de 12:30 a 17:00</p>
      <p>Dom y festivos cerrado</p>
    </li>
    <li>
      {{--<iframe src="" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
      <div class="maps" id="vitacura"></div>
      <p><h3>VITACURA</h3></p>
      <p>El Mañío 1637, Vitacura</p>
      <p><br /></p>
      <p style="font-size:80%;"><a href="mailto:reservasmanio@fukai.cl">reservasmanio@fukai.cl</a></p>
      <p><a href="tel:+56228408333">+56228408333</a></p>
      <p><br /></p>
      <p><b>Horarios:</b></p>

      <p>Dom a Mie 12:00 a 23:00</p>
      <p>Jue a Sab 12:00 a 00:00</p>
    </li>
  </ul>
</div>
<script>
function initAutocomplete() {
  var map1 = new google.maps.Map(document.getElementById('provi'), {
    center: new google.maps.LatLng(-33.433867, -70.635308),
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var map2 = new google.maps.Map(document.getElementById('huechuraba'), {
    center: new google.maps.LatLng(-33.389421, -70.618479),
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var map3 = new google.maps.Map(document.getElementById('vitacura'), {
    center: new google.maps.LatLng(-33.3931943,-70.5709422),
    zoom: 12.6,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var coords = [
    new google.maps.LatLng(-33.42934, -70.66041), new google.maps.LatLng(-33.43096, -70.66078), new google.maps.LatLng(-33.43188, -70.66073), new google.maps.LatLng(-33.43284, -70.66044), new google.maps.LatLng(-33.43473, -70.66017), new google.maps.LatLng(-33.43853, -70.65963), new google.maps.LatLng(-33.43942, -70.6595), new google.maps.LatLng(-33.4403, -70.65944), new google.maps.LatLng(-33.44157, -70.65985), new google.maps.LatLng(-33.4433, -70.66019), new google.maps.LatLng(-33.44423, -70.66045), new google.maps.LatLng(-33.44463, -70.66058), new google.maps.LatLng(-33.44484, -70.66075), new google.maps.LatLng(-33.44543, -70.66078), new google.maps.LatLng(-33.44602, -70.6607), new google.maps.LatLng(-33.44668, -70.66066), new google.maps.LatLng(-33.44715, -70.66035), new google.maps.LatLng(-33.44845, -70.65975), new google.maps.LatLng(-33.44975, -70.65926), new google.maps.LatLng(-33.45203, -70.65862), new google.maps.LatLng(-33.45299, -70.65839), new google.maps.LatLng(-33.45392, -70.65805), new google.maps.LatLng(-33.45442, -70.6579), new google.maps.LatLng(-33.45498, -70.65756), new google.maps.LatLng(-33.45594, -70.65682), new google.maps.LatLng(-33.45696, -70.65669), new google.maps.LatLng(-33.4588, -70.65679), new google.maps.LatLng(-33.46064, -70.65683), new google.maps.LatLng(-33.46039, -70.65431), new google.maps.LatLng(-33.46024, -70.65337), new google.maps.LatLng(-33.45977, -70.64904), new google.maps.LatLng(-33.45912, -70.64587), new google.maps.LatLng(-33.45783, -70.63995), new google.maps.LatLng(-33.45704, -70.63633), new google.maps.LatLng(-33.45615, -70.63204), new google.maps.LatLng(-33.45571, -70.63011), new google.maps.LatLng(-33.45551, -70.62906), new google.maps.LatLng(-33.45538, -70.62861), new google.maps.LatLng(-33.45534, -70.62812), new google.maps.LatLng(-33.45539, -70.62719), new google.maps.LatLng(-33.45562, -70.62667), new google.maps.LatLng(-33.45602, -70.62625), new google.maps.LatLng(-33.46095, -70.62167), new google.maps.LatLng(-33.46131, -70.62122), new google.maps.LatLng(-33.46146, -70.62087), new google.maps.LatLng(-33.46166, -70.61834), new google.maps.LatLng(-33.46196, -70.61373), new google.maps.LatLng(-33.46209, -70.61109), new google.maps.LatLng(-33.46242, -70.6059), new google.maps.LatLng(-33.46261, -70.60513), new google.maps.LatLng(-33.4628, -70.60471), new google.maps.LatLng(-33.46326, -70.60396), new google.maps.LatLng(-33.46413, -70.60249), new google.maps.LatLng(-33.46471, -70.60097), new google.maps.LatLng(-33.46485, -70.5982), new google.maps.LatLng(-33.4649, -70.59524), new google.maps.LatLng(-33.46522, -70.59173), new google.maps.LatLng(-33.46575, -70.58827), new google.maps.LatLng(-33.45992, -70.58679), new google.maps.LatLng(-33.45695, -70.58609), new google.maps.LatLng(-33.45542, -70.58577), new google.maps.LatLng(-33.45393, -70.58558), new google.maps.LatLng(-33.44843, -70.58487), new google.maps.LatLng(-33.44597, -70.58451), new google.maps.LatLng(-33.44071, -70.58392), new google.maps.LatLng(-33.43502, -70.58045), new google.maps.LatLng(-33.43404, -70.58217), new google.maps.LatLng(-33.43309, -70.58353), new google.maps.LatLng(-33.43194, -70.58458), new google.maps.LatLng(-33.43182, -70.58371), new google.maps.LatLng(-33.43142, -70.57767), new google.maps.LatLng(-33.43138, -70.57468), new google.maps.LatLng(-33.42961, -70.575), new google.maps.LatLng(-33.428, -70.57527), new google.maps.LatLng(-33.42755, -70.57549), new google.maps.LatLng(-33.42697, -70.57602), new google.maps.LatLng(-33.42589, -70.5771), new google.maps.LatLng(-33.42442, -70.57859), new google.maps.LatLng(-33.42308, -70.57968), new google.maps.LatLng(-33.42073, -70.58148), new google.maps.LatLng(-33.41857, -70.58276), new google.maps.LatLng(-33.41435, -70.58476), new google.maps.LatLng(-33.41265, -70.58564), new google.maps.LatLng(-33.41043, -70.58672), new google.maps.LatLng(-33.41108, -70.58863), new google.maps.LatLng(-33.41196, -70.59195), new google.maps.LatLng(-33.41231, -70.59361), new google.maps.LatLng(-33.41254, -70.59528), new google.maps.LatLng(-33.41256, -70.59752), new google.maps.LatLng(-33.4123, -70.59899), new google.maps.LatLng(-33.41183, -70.60126), new google.maps.LatLng(-33.41124, -70.60334), new google.maps.LatLng(-33.41307, -70.60456), new google.maps.LatLng(-33.415, -70.60609), new google.maps.LatLng(-33.41595, -70.60692), new google.maps.LatLng(-33.41593, -70.6082), new google.maps.LatLng(-33.41621, -70.60841), new google.maps.LatLng(-33.41676, -70.60884), new google.maps.LatLng(-33.41752, -70.60976), new google.maps.LatLng(-33.41826, -70.61096), new google.maps.LatLng(-33.41965, -70.61286), new google.maps.LatLng(-33.42061, -70.61472), new google.maps.LatLng(-33.42105, -70.61624), new google.maps.LatLng(-33.42153, -70.61752), new google.maps.LatLng(-33.42216, -70.61923), new google.maps.LatLng(-33.42279, -70.6206), new google.maps.LatLng(-33.42316, -70.62141), new google.maps.LatLng(-33.42364, -70.62201), new google.maps.LatLng(-33.42418, -70.62247), new google.maps.LatLng(-33.42486, -70.62293), new google.maps.LatLng(-33.42521, -70.62371), new google.maps.LatLng(-33.42537, -70.62423), new google.maps.LatLng(-33.42529, -70.62473), new google.maps.LatLng(-33.4253, -70.62533), new google.maps.LatLng(-33.42547, -70.62608), new google.maps.LatLng(-33.42587, -70.62683), new google.maps.LatLng(-33.42644, -70.62759), new google.maps.LatLng(-33.4273, -70.6289), new google.maps.LatLng(-33.42817, -70.62962), new google.maps.LatLng(-33.42899, -70.63061), new google.maps.LatLng(-33.43003, -70.63231), new google.maps.LatLng(-33.42916, -70.63257), new google.maps.LatLng(-33.42883, -70.63356), new google.maps.LatLng(-33.42847, -70.63423), new google.maps.LatLng(-33.42843, -70.63478), new google.maps.LatLng(-33.42856, -70.63496), new google.maps.LatLng(-33.42885, -70.63508), new google.maps.LatLng(-33.42932, -70.6355), new google.maps.LatLng(-33.42953, -70.63572), new google.maps.LatLng(-33.42944, -70.63578), new google.maps.LatLng(-33.42933, -70.63609), new google.maps.LatLng(-33.42917, -70.63662), new google.maps.LatLng(-33.42879, -70.63688), new google.maps.LatLng(-33.42839, -70.63747), new google.maps.LatLng(-33.4263, -70.63745), new google.maps.LatLng(-33.42577, -70.63906), new google.maps.LatLng(-33.42577, -70.64582), new google.maps.LatLng(-33.42675, -70.64605), new google.maps.LatLng(-33.42972, -70.647), new google.maps.LatLng(-33.43127, -70.64754), new google.maps.LatLng(-33.4327, -70.64787), new google.maps.LatLng(-33.43125, -70.65435), new google.maps.LatLng(-33.43084, -70.65605), new google.maps.LatLng(-33.43033, -70.65726),
  ];
  var coords2 = [
    new google.maps.LatLng(-33.449867, -70.6314907), new google.maps.LatLng(-33.4536656, -70.6303522), new google.maps.LatLng(-33.4573034, -70.6293137), new google.maps.LatLng(-33.4595089, -70.6287043), new google.maps.LatLng(-33.4623588, -70.6278546), new google.maps.LatLng(-33.4653088, -70.6269791), new google.maps.LatLng(-33.467285, -70.6263954), new google.maps.LatLng(-33.4682587, -70.6261637), new google.maps.LatLng(-33.4685964, -70.6260666), new google.maps.LatLng(-33.4688254, -70.625955), new google.maps.LatLng(-33.469032, -70.625829), new google.maps.LatLng(-33.4692683, -70.6255629), new google.maps.LatLng(-33.4695976, -70.6249964), new google.maps.LatLng(-33.4698541, -70.6245702), new google.maps.LatLng(-33.4700403, -70.6243642), new google.maps.LatLng(-33.4702264, -70.6242269), new google.maps.LatLng(-33.4703267, -70.6241668), new google.maps.LatLng(-33.470477, -70.6240981), new google.maps.LatLng(-33.4707849, -70.6240209), new google.maps.LatLng(-33.4713075, -70.623935), new google.maps.LatLng(-33.4718087, -70.6238149), new google.maps.LatLng(-33.4729328, -70.6235402), new google.maps.LatLng(-33.4749493, -70.6229842), new google.maps.LatLng(-33.4749409, -70.6228187), new google.maps.LatLng(-33.47472, -70.6184057), new google.maps.LatLng(-33.4745894, -70.6157134), new google.maps.LatLng(-33.474478, -70.613428), new google.maps.LatLng(-33.4742945, -70.6098874), new google.maps.LatLng(-33.4741584, -70.6074308), new google.maps.LatLng(-33.4740976, -70.6063308), new google.maps.LatLng(-33.4739423, -70.6028207), new google.maps.LatLng(-33.4738921, -70.6012328), new google.maps.LatLng(-33.4737386, -70.5989788), new google.maps.LatLng(-33.4737272, -70.598672), new google.maps.LatLng(-33.4736129, -70.596392), new google.maps.LatLng(-33.4736272, -70.5951045), new google.maps.LatLng(-33.4738134, -70.5921691), new google.maps.LatLng(-33.4741035, -70.5895767), new google.maps.LatLng(-33.4741018, -70.5887934), new google.maps.LatLng(-33.4736722, -70.5866819), new google.maps.LatLng(-33.4735463, -70.5851808), new google.maps.LatLng(-33.4734912, -70.5845216), new google.maps.LatLng(-33.4733695, -70.5839894), new google.maps.LatLng(-33.4727037, -70.582702), new google.maps.LatLng(-33.4699328, -70.5774148), new google.maps.LatLng(-33.4702527, -70.5770313), new google.maps.LatLng(-33.4703338, -70.5766509), new google.maps.LatLng(-33.4702315, -70.5762083), new google.maps.LatLng(-33.4701241, -70.5759937), new google.maps.LatLng(-33.4699523, -70.5758049), new google.maps.LatLng(-33.4697876, -70.5756847), new google.maps.LatLng(-33.4694798, -70.5756675), new google.maps.LatLng(-33.4693408, -70.5757027), new google.maps.LatLng(-33.4692005, -70.5757791), new google.maps.LatLng(-33.4690788, -70.575865), new google.maps.LatLng(-33.4688875, -70.5760587), new google.maps.LatLng(-33.4688303, -70.5762475), new google.maps.LatLng(-33.4680339, -70.5759699), new google.maps.LatLng(-33.4655136, -70.5749914), new google.maps.LatLng(-33.4628142, -70.5739872), new google.maps.LatLng(-33.462005, -70.573661), new google.maps.LatLng(-33.4606675, -70.5729944), new google.maps.LatLng(-33.4597081, -70.572531), new google.maps.LatLng(-33.4589853, -70.5723163), new google.maps.LatLng(-33.4580463, -70.5719911), new google.maps.LatLng(-33.4565282, -70.571562), new google.maps.LatLng(-33.4548754, -70.5711831), new google.maps.LatLng(-33.4537276, -70.5708758), new google.maps.LatLng(-33.4535072, -70.5708286), new google.maps.LatLng(-33.4530551, -70.570738), new google.maps.LatLng(-33.4525466, -70.5707981), new google.maps.LatLng(-33.4510213, -70.5710641), new google.maps.LatLng(-33.449725, -70.5712787), new google.maps.LatLng(-33.4475766, -70.571665), new google.maps.LatLng(-33.4456358, -70.5719825), new google.maps.LatLng(-33.443344, -70.5723945), new google.maps.LatLng(-33.4416107, -70.5726949), new google.maps.LatLng(-33.4414515, -70.572725), new google.maps.LatLng(-33.4400709, -70.5729867), new google.maps.LatLng(-33.438975, -70.5731756), new google.maps.LatLng(-33.4379938, -70.5734416), new google.maps.LatLng(-33.4374972, -70.5743237), new google.maps.LatLng(-33.4368172, -70.5756247), new google.maps.LatLng(-33.4367183, -70.5758826), new google.maps.LatLng(-33.4364341, -70.576662), new google.maps.LatLng(-33.4362806, -70.5774198), new google.maps.LatLng(-33.435966, -70.5782769), new google.maps.LatLng(-33.4352159, -70.5796899), new google.maps.LatLng(-33.4345683, -70.5808683), new google.maps.LatLng(-33.4337452, -70.5822076), new google.maps.LatLng(-33.4340616, -70.5824194), new google.maps.LatLng(-33.4351871, -70.583402), new google.maps.LatLng(-33.4356444, -70.5838029), new google.maps.LatLng(-33.4373724, -70.5853503), new google.maps.LatLng(-33.4382452, -70.5861178), new google.maps.LatLng(-33.4394336, -70.5871491), new google.maps.LatLng(-33.4409566, -70.5881388), new google.maps.LatLng(-33.4444119, -70.5903845), new google.maps.LatLng(-33.4461115, -70.5914751), new google.maps.LatLng(-33.4464804, -70.5917384), new google.maps.LatLng(-33.4477736, -70.5928144), new google.maps.LatLng(-33.4469069, -70.5944343), new google.maps.LatLng(-33.4466744, -70.594864), new google.maps.LatLng(-33.4459874, -70.5960781), new google.maps.LatLng(-33.4452812, -70.5972057), new google.maps.LatLng(-33.4446842, -70.5982025), new google.maps.LatLng(-33.4442781, -70.5982601), new google.maps.LatLng(-33.4443797, -70.5991992), new google.maps.LatLng(-33.4446807, -70.5991669), new google.maps.LatLng(-33.4448453, -70.6011103), new google.maps.LatLng(-33.445183, -70.6043271), new google.maps.LatLng(-33.4456717, -70.6079455), new google.maps.LatLng(-33.4459367, -70.6092844), new google.maps.LatLng(-33.4464881, -70.6111384), new google.maps.LatLng(-33.446925, -70.6138936), new google.maps.LatLng(-33.4475767, -70.6137305), new google.maps.LatLng(-33.4483859, -70.618434), new google.maps.LatLng(-33.4473117, -70.6187344), new google.maps.LatLng(-33.4479562, -70.6219359), new google.maps.LatLng(-33.4489231, -70.6265965), new google.maps.LatLng(-33.449867, -70.6314907),
  ];
  var coords3 = [
    new google.maps.LatLng(-33.38286, -70.64071), new google.maps.LatLng(-33.38554, -70.63719), new google.maps.LatLng(-33.38688, -70.63532), new google.maps.LatLng(-33.38821, -70.63346), new google.maps.LatLng(-33.38955, -70.63164), new google.maps.LatLng(-33.39089, -70.62983), new google.maps.LatLng(-33.3922, -70.62799), new google.maps.LatLng(-33.3928, -70.62703), new google.maps.LatLng(-33.3931, -70.62652), new google.maps.LatLng(-33.39339, -70.62598), new google.maps.LatLng(-33.39376, -70.62525), new google.maps.LatLng(-33.39413, -70.62451), new google.maps.LatLng(-33.39484, -70.62298), new google.maps.LatLng(-33.39547, -70.62169), new google.maps.LatLng(-33.39576, -70.62114), new google.maps.LatLng(-33.39607, -70.6206), new google.maps.LatLng(-33.3963, -70.62), new google.maps.LatLng(-33.39652, -70.6194), new google.maps.LatLng(-33.39669, -70.61878), new google.maps.LatLng(-33.3968, -70.61812), new google.maps.LatLng(-33.3969, -70.61762), new google.maps.LatLng(-33.397, -70.61725), new google.maps.LatLng(-33.39708, -70.61705), new google.maps.LatLng(-33.39718, -70.61685), new google.maps.LatLng(-33.39738, -70.61653), new google.maps.LatLng(-33.39794, -70.61589), new google.maps.LatLng(-33.39821, -70.61544), new google.maps.LatLng(-33.39831, -70.6152), new google.maps.LatLng(-33.39837, -70.61493), new google.maps.LatLng(-33.39838, -70.61461), new google.maps.LatLng(-33.39831, -70.61428), new google.maps.LatLng(-33.39817, -70.61397), new google.maps.LatLng(-33.398, -70.61369), new google.maps.LatLng(-33.39771, -70.61311), new google.maps.LatLng(-33.39748, -70.61273), new google.maps.LatLng(-33.39728, -70.61247), new google.maps.LatLng(-33.39701, -70.61221), new google.maps.LatLng(-33.39672, -70.61197), new google.maps.LatLng(-33.39653, -70.61176), new google.maps.LatLng(-33.39637, -70.61151), new google.maps.LatLng(-33.39612, -70.61112), new google.maps.LatLng(-33.39593, -70.61087), new google.maps.LatLng(-33.39572, -70.61071), new google.maps.LatLng(-33.39528, -70.6103), new google.maps.LatLng(-33.39505, -70.61001), new google.maps.LatLng(-33.39494, -70.60986), new google.maps.LatLng(-33.39482, -70.60971), new google.maps.LatLng(-33.39468, -70.60959), new google.maps.LatLng(-33.39452, -70.60946), new google.maps.LatLng(-33.39413, -70.60926), new google.maps.LatLng(-33.39375, -70.60903), new google.maps.LatLng(-33.3936, -70.60893), new google.maps.LatLng(-33.39346, -70.60876), new google.maps.LatLng(-33.39326, -70.60839), new google.maps.LatLng(-33.39312, -70.60803), new google.maps.LatLng(-33.39305, -70.60787), new google.maps.LatLng(-33.39295, -70.60772), new google.maps.LatLng(-33.39286, -70.60755), new google.maps.LatLng(-33.39271, -70.60743), new google.maps.LatLng(-33.39256, -70.60731), new google.maps.LatLng(-33.39239, -70.60724), new google.maps.LatLng(-33.39163, -70.60703), new google.maps.LatLng(-33.39134, -70.60684), new google.maps.LatLng(-33.39111, -70.60658), new google.maps.LatLng(-33.39092, -70.60608), new google.maps.LatLng(-33.39079, -70.60548), new google.maps.LatLng(-33.39068, -70.60492), new google.maps.LatLng(-33.39062, -70.60466), new google.maps.LatLng(-33.39048, -70.6044), new google.maps.LatLng(-33.39035, -70.60415), new google.maps.LatLng(-33.39018, -70.60397), new google.maps.LatLng(-33.38987, -70.60356), new google.maps.LatLng(-33.38958, -70.60322), new google.maps.LatLng(-33.3893, -70.60282), new google.maps.LatLng(-33.38915, -70.60242), new google.maps.LatLng(-33.38914, -70.60211), new google.maps.LatLng(-33.38898, -70.6022), new google.maps.LatLng(-33.38875, -70.60225), new google.maps.LatLng(-33.38845, -70.6022), new google.maps.LatLng(-33.38812, -70.60209), new google.maps.LatLng(-33.38775, -70.60197), new google.maps.LatLng(-33.38736, -70.60193), new google.maps.LatLng(-33.38702, -70.60191), new google.maps.LatLng(-33.38668, -70.60197), new google.maps.LatLng(-33.38641, -70.60203), new google.maps.LatLng(-33.38613, -70.60214), new google.maps.LatLng(-33.38581, -70.60231), new google.maps.LatLng(-33.38548, -70.6025), new google.maps.LatLng(-33.38504, -70.60291), new google.maps.LatLng(-33.38466, -70.60338), new google.maps.LatLng(-33.38417, -70.60394), new google.maps.LatLng(-33.38367, -70.60444), new google.maps.LatLng(-33.38308, -70.6047), new google.maps.LatLng(-33.38244, -70.60484), new google.maps.LatLng(-33.38194, -70.60476), new google.maps.LatLng(-33.38145, -70.60462), new google.maps.LatLng(-33.38103, -70.60439), new google.maps.LatLng(-33.38061, -70.60408), new google.maps.LatLng(-33.38007, -70.60361), new google.maps.LatLng(-33.37953, -70.60327), new google.maps.LatLng(-33.37932, -70.60313), new google.maps.LatLng(-33.37903, -70.60303), new google.maps.LatLng(-33.37867, -70.60295), new google.maps.LatLng(-33.37832, -70.60293), new google.maps.LatLng(-33.37796, -70.60292), new google.maps.LatLng(-33.37807, -70.60554), new google.maps.LatLng(-33.37804, -70.60597), new google.maps.LatLng(-33.37795, -70.6063), new google.maps.LatLng(-33.37783, -70.60666), new google.maps.LatLng(-33.37782, -70.60678), new google.maps.LatLng(-33.37782, -70.60692), new google.maps.LatLng(-33.37784, -70.60704), new google.maps.LatLng(-33.37787, -70.60715), new google.maps.LatLng(-33.37791, -70.60738), new google.maps.LatLng(-33.37788, -70.60753), new google.maps.LatLng(-33.37783, -70.60767), new google.maps.LatLng(-33.37777, -70.60778), new google.maps.LatLng(-33.37769, -70.60786), new google.maps.LatLng(-33.37752, -70.60791), new google.maps.LatLng(-33.3774, -70.60794), new google.maps.LatLng(-33.37734, -70.60798), new google.maps.LatLng(-33.37729, -70.60802), new google.maps.LatLng(-33.37727, -70.60809), new google.maps.LatLng(-33.37725, -70.60818), new google.maps.LatLng(-33.37726, -70.60826), new google.maps.LatLng(-33.3773, -70.60831), new google.maps.LatLng(-33.3774, -70.60839), new google.maps.LatLng(-33.37751, -70.60844), new google.maps.LatLng(-33.37768, -70.60855), new google.maps.LatLng(-33.37777, -70.60871), new google.maps.LatLng(-33.37782, -70.60889), new google.maps.LatLng(-33.37783, -70.60909), new google.maps.LatLng(-33.37782, -70.6093), new google.maps.LatLng(-33.37779, -70.60949), new google.maps.LatLng(-33.37773, -70.60964), new google.maps.LatLng(-33.37767, -70.60974), new google.maps.LatLng(-33.37759, -70.60983), new google.maps.LatLng(-33.37753, -70.60989), new google.maps.LatLng(-33.37746, -70.60994), new google.maps.LatLng(-33.37739, -70.61003), new google.maps.LatLng(-33.37734, -70.61016), new google.maps.LatLng(-33.37733, -70.61022), new google.maps.LatLng(-33.37733, -70.61026), new google.maps.LatLng(-33.37735, -70.6103), new google.maps.LatLng(-33.37737, -70.61034), new google.maps.LatLng(-33.37748, -70.61053), new google.maps.LatLng(-33.37753, -70.61065), new google.maps.LatLng(-33.37755, -70.61079), new google.maps.LatLng(-33.37755, -70.61095), new google.maps.LatLng(-33.37757, -70.61102), new google.maps.LatLng(-33.3776, -70.61109), new google.maps.LatLng(-33.37763, -70.61119), new google.maps.LatLng(-33.37766, -70.61127), new google.maps.LatLng(-33.37775, -70.61139), new google.maps.LatLng(-33.37778, -70.61149), new google.maps.LatLng(-33.37773, -70.61159), new google.maps.LatLng(-33.37765, -70.61165), new google.maps.LatLng(-33.3775, -70.61179), new google.maps.LatLng(-33.37756, -70.61225), new google.maps.LatLng(-33.37752, -70.61247), new google.maps.LatLng(-33.3775, -70.61272), new google.maps.LatLng(-33.37748, -70.61292), new google.maps.LatLng(-33.37744, -70.61312), new google.maps.LatLng(-33.37733, -70.6135), new google.maps.LatLng(-33.37717, -70.6137), new google.maps.LatLng(-33.37704, -70.61393), new google.maps.LatLng(-33.37694, -70.61417), new google.maps.LatLng(-33.37683, -70.61444), new google.maps.LatLng(-33.37683, -70.61464), new google.maps.LatLng(-33.37689, -70.61477), new google.maps.LatLng(-33.37698, -70.61507), new google.maps.LatLng(-33.37727, -70.61626), new google.maps.LatLng(-33.37736, -70.6169), new google.maps.LatLng(-33.37748, -70.61737), new google.maps.LatLng(-33.37732, -70.61788), new google.maps.LatLng(-33.37714, -70.61832), new google.maps.LatLng(-33.37708, -70.61845), new google.maps.LatLng(-33.37703, -70.61857), new google.maps.LatLng(-33.37698, -70.61867), new google.maps.LatLng(-33.37693, -70.61881), new google.maps.LatLng(-33.37732, -70.61898), new google.maps.LatLng(-33.37762, -70.61922), new google.maps.LatLng(-33.37759, -70.61992), new google.maps.LatLng(-33.37753, -70.62055), new google.maps.LatLng(-33.37727, -70.6213), new google.maps.LatLng(-33.37704, -70.62202), new google.maps.LatLng(-33.37664, -70.62317), new google.maps.LatLng(-33.37626, -70.62429), new google.maps.LatLng(-33.37583, -70.62546), new google.maps.LatLng(-33.37553, -70.62623), new google.maps.LatLng(-33.37529, -70.6261), new google.maps.LatLng(-33.37518, -70.62628), new google.maps.LatLng(-33.37464, -70.62777), new google.maps.LatLng(-33.37392, -70.62741), new google.maps.LatLng(-33.3731, -70.62896), new google.maps.LatLng(-33.37286, -70.62963), new google.maps.LatLng(-33.37244, -70.63081), new google.maps.LatLng(-33.3721, -70.63158), new google.maps.LatLng(-33.37222, -70.63194), new google.maps.LatLng(-33.37228, -70.63287), new google.maps.LatLng(-33.37179, -70.63373), new google.maps.LatLng(-33.37131, -70.63458), new google.maps.LatLng(-33.37124, -70.63483), new google.maps.LatLng(-33.37102, -70.63561), new google.maps.LatLng(-33.37152, -70.63581), new google.maps.LatLng(-33.37241, -70.63618), new google.maps.LatLng(-33.37382, -70.63681), new google.maps.LatLng(-33.3761, -70.63783), new google.maps.LatLng(-33.37949, -70.63922), new google.maps.LatLng(-33.3812, -70.63989), new google.maps.LatLng(-33.38207, -70.64026),
  ];
  var coords4 = [
    new google.maps.LatLng(-33.360889, -70.578013), new google.maps.LatLng(-33.365832, -70.581278), new google.maps.LatLng(-33.366344, -70.584748), new google.maps.LatLng(-33.367367, -70.584952), new google.maps.LatLng(-33.368048, -70.589239), new google.maps.LatLng(-33.369412, -70.589443), new google.maps.LatLng(-33.369583, -70.584952), new google.maps.LatLng(-33.373503, -70.584340), new google.maps.LatLng(-33.373844, -70.585360), new google.maps.LatLng(-33.375038, -70.585156), new google.maps.LatLng(-33.375549, -70.588218), new google.maps.LatLng(-33.377254, -70.590260), new google.maps.LatLng(-33.379129, -70.589851), new google.maps.LatLng(-33.381686, -70.592301), new google.maps.LatLng(-33.379810, -70.594343), new google.maps.LatLng(-33.381344, -70.601488), new google.maps.LatLng(-33.385606, -70.601693), new google.maps.LatLng(-33.385524, -70.602317), new google.maps.LatLng(-33.386458, -70.601897),new google.maps.LatLng(-33.386583, -70.601822), new google.maps.LatLng(-33.386736, -70.601822), new google.maps.LatLng(-33.387246, -70.601790),new google.maps.LatLng(-33.389526, -70.602102), new google.maps.LatLng(-33.391572, -70.604144), new google.maps.LatLng(-33.392083, -70.605165), new google.maps.LatLng(-33.392276, -70.605574), new google.maps.LatLng(-33.394640, -70.607412), new google.maps.LatLng(-33.402992, -70.610273),new google.maps.LatLng(-33.407111, -70.598237), new google.maps.LatLng(-33.407291, -70.590127), new google.maps.LatLng(-33.407721, -70.587619), new google.maps.LatLng(-33.409489, -70.586994), new google.maps.LatLng(-33.409521, -70.586649), new google.maps.LatLng(-33.409646, -70.586343), new google.maps.LatLng(-33.409660, -70.585960), new google.maps.LatLng(-33.410639, -70.585246), new google.maps.LatLng(-33.412170, -70.584506), new google.maps.LatLng(-33.417230, -70.582113), new google.maps.LatLng(-33.418430, -70.581641), new google.maps.LatLng(-33.418968, -70.581351), new google.maps.LatLng(-33.419720, -70.580686), new google.maps.LatLng(-33.422361, -70.578755), new google.maps.LatLng(-33.423284, -70.578144), new google.maps.LatLng(-33.425675, -70.576052), new google.maps.LatLng(-33.427081, -70.574496), new google.maps.LatLng(-33.427368, -70.574378), new google.maps.LatLng(-33.427618, -70.574281), new google.maps.LatLng(-33.428505, -70.574110), new google.maps.LatLng(-33.430179, -70.573863), new google.maps.LatLng(-33.431128, -70.573659), new google.maps.LatLng(-33.430895, -70.564808), new google.maps.LatLng(-33.428843, -70.539257), new google.maps.LatLng(-33.420724, -70.537719), new google.maps.LatLng(-33.416354, -70.539093), new google.maps.LatLng(-33.409190, -70.542271), new google.maps.LatLng(-33.408043, -70.537207), new google.maps.LatLng(-33.404103, -70.538753), new google.maps.LatLng(-33.401381, -70.540041), new google.maps.LatLng(-33.396652, -70.540128), new google.maps.LatLng(-33.393499, -70.539356), new google.maps.LatLng(-33.390561, -70.537126), new google.maps.LatLng(-33.390059, -70.535495), new google.maps.LatLng(-33.385903, -70.531549), new google.maps.LatLng(-33.375516, -70.534434), new google.maps.LatLng(-33.375431, -70.535966), new google.maps.LatLng(-33.374153, -70.541274), new google.maps.LatLng(-33.372362, -70.540151), new google.maps.LatLng(-33.371254, -70.541172), new google.maps.LatLng(-33.371766, -70.541682), new google.maps.LatLng(-33.370402, -70.543315), new google.maps.LatLng(-33.369039, -70.545969), new google.maps.LatLng(-33.365714, -70.546480), new google.maps.LatLng(-33.361879, -70.550358), new google.maps.LatLng(-33.360256, -70.552912), new google.maps.LatLng(-33.360171, -70.554239), new google.maps.LatLng(-33.361194, -70.555770), new google.maps.LatLng(-33.359148, -70.555872), new google.maps.LatLng(-33.358893, -70.556893), new google.maps.LatLng(-33.359405, -70.560567), new google.maps.LatLng(-33.358553, -70.562404), new google.maps.LatLng(-33.358468, -70.565568), new google.maps.LatLng(-33.359150, -70.565670), new google.maps.LatLng(-33.359576, -70.564037), new google.maps.LatLng(-33.362474, -70.564751), new google.maps.LatLng(-33.362644, -70.561995), new google.maps.LatLng(-33.364349, -70.561382), new google.maps.LatLng(-33.363923, -70.566180), new google.maps.LatLng(-33.363412, -70.566282), new google.maps.LatLng(-33.362645, -70.566282), new google.maps.LatLng(-33.362901, -70.567404), new google.maps.LatLng(-33.360343, -70.568017), new google.maps.LatLng(-33.360684, -70.569242), new google.maps.LatLng(-33.361963, -70.568527), new google.maps.LatLng(-33.364265, -70.568527), new google.maps.LatLng(-33.365373, -70.570364), new google.maps.LatLng(-33.366140, -70.571078), new google.maps.LatLng(-33.366652, -70.571793), new google.maps.LatLng(-33.366140, -70.574753), new google.maps.LatLng(-33.363839, -70.573630), new google.maps.LatLng(-33.363412, -70.574038), new google.maps.LatLng(-33.362730, -70.574141), new google.maps.LatLng(-33.360889, -70.578013),
  ];
  var coords5 = [
    new google.maps.LatLng(-33.38366, -70.58783), new google.maps.LatLng(-33.38395, -70.58868), new google.maps.LatLng(-33.38438, -70.58945), new google.maps.LatLng(-33.38531, -70.5907), new google.maps.LatLng(-33.38706, -70.59308), new google.maps.LatLng(-33.38816, -70.59447), new google.maps.LatLng(-33.38871, -70.59534), new google.maps.LatLng(-33.38892, -70.59609), new google.maps.LatLng(-33.38923, -70.59696), new google.maps.LatLng(-33.38977, -70.59787), new google.maps.LatLng(-33.39129, -70.59996), new google.maps.LatLng(-33.39206, -70.6008), new google.maps.LatLng(-33.3927, -70.6013), new google.maps.LatLng(-33.39332, -70.60178), new google.maps.LatLng(-33.39393, -70.60216), new google.maps.LatLng(-33.39501, -70.60282), new google.maps.LatLng(-33.3959, -70.60329), new google.maps.LatLng(-33.39661, -70.6035), new google.maps.LatLng(-33.39765, -70.60351), new google.maps.LatLng(-33.39872, -70.60347), new google.maps.LatLng(-33.39978, -70.60349), new google.maps.LatLng(-33.40087, -70.60337), new google.maps.LatLng(-33.40163, -70.60324), new google.maps.LatLng(-33.40323, -70.60297), new google.maps.LatLng(-33.40405, -70.60292), new google.maps.LatLng(-33.40463, -70.60302), new google.maps.LatLng(-33.40554, -70.60334), new google.maps.LatLng(-33.40638, -70.60353), new google.maps.LatLng(-33.40687, -70.60341), new google.maps.LatLng(-33.40734, -70.60307), new google.maps.LatLng(-33.40779, -70.60202), new google.maps.LatLng(-33.40808, -70.60097), new google.maps.LatLng(-33.40826, -70.59993), new google.maps.LatLng(-33.40818, -70.59882), new google.maps.LatLng(-33.40791, -70.59804), new google.maps.LatLng(-33.40765, -70.5973), new google.maps.LatLng(-33.40676, -70.59489), new google.maps.LatLng(-33.4059, -70.59239), new google.maps.LatLng(-33.40506, -70.59011), new google.maps.LatLng(-33.40474, -70.58879), new google.maps.LatLng(-33.4045, -70.58748), new google.maps.LatLng(-33.40427, -70.58626), new google.maps.LatLng(-33.4042, -70.586), new google.maps.LatLng(-33.40398, -70.58548), new google.maps.LatLng(-33.40377, -70.58497), new google.maps.LatLng(-33.40367, -70.58446), new google.maps.LatLng(-33.40353, -70.5842), new google.maps.LatLng(-33.40298, -70.58329), new google.maps.LatLng(-33.40206, -70.58105), new google.maps.LatLng(-33.40113, -70.57884), new google.maps.LatLng(-33.40016, -70.5765), new google.maps.LatLng(-33.39899, -70.57342), new google.maps.LatLng(-33.39803, -70.57103), new google.maps.LatLng(-33.39697, -70.5714), new google.maps.LatLng(-33.39648, -70.5715), new google.maps.LatLng(-33.39597, -70.57163), new google.maps.LatLng(-33.39524, -70.57181), new google.maps.LatLng(-33.39454, -70.57197), new google.maps.LatLng(-33.39407, -70.57205), new google.maps.LatLng(-33.39355, -70.57211), new google.maps.LatLng(-33.39313, -70.57216), new google.maps.LatLng(-33.3927, -70.5722), new google.maps.LatLng(-33.39219, -70.57225), new google.maps.LatLng(-33.3917, -70.57228), new google.maps.LatLng(-33.39102, -70.57226), new google.maps.LatLng(-33.39092, -70.57212), new google.maps.LatLng(-33.39078, -70.57202), new google.maps.LatLng(-33.39065, -70.57202), new google.maps.LatLng(-33.39053, -70.57202), new google.maps.LatLng(-33.39044, -70.57205), new google.maps.LatLng(-33.39037, -70.57211), new google.maps.LatLng(-33.39029, -70.57222), new google.maps.LatLng(-33.38999, -70.57216), new google.maps.LatLng(-33.3895, -70.572), new google.maps.LatLng(-33.3887, -70.57168), new google.maps.LatLng(-33.38814, -70.57146), new google.maps.LatLng(-33.38754, -70.57118), new google.maps.LatLng(-33.38667, -70.57081), new google.maps.LatLng(-33.38522, -70.57024), new google.maps.LatLng(-33.38421, -70.56981), new google.maps.LatLng(-33.38327, -70.56939), new google.maps.LatLng(-33.38233, -70.56904), new google.maps.LatLng(-33.38185, -70.56885), new google.maps.LatLng(-33.38136, -70.56878), new google.maps.LatLng(-33.38025, -70.56891), new google.maps.LatLng(-33.3796, -70.56902), new google.maps.LatLng(-33.37946, -70.56913), new google.maps.LatLng(-33.37925, -70.5693), new google.maps.LatLng(-33.37927, -70.56938), new google.maps.LatLng(-33.37926, -70.56948), new google.maps.LatLng(-33.37923, -70.56958), new google.maps.LatLng(-33.37919, -70.56965), new google.maps.LatLng(-33.3791, -70.56971), new google.maps.LatLng(-33.379, -70.56975), new google.maps.LatLng(-33.37895, -70.57005), new google.maps.LatLng(-33.37897, -70.57031), new google.maps.LatLng(-33.37914, -70.57086), new google.maps.LatLng(-33.37978, -70.57276), new google.maps.LatLng(-33.38086, -70.57625), new google.maps.LatLng(-33.38166, -70.57863), new google.maps.LatLng(-33.38206, -70.58011), new google.maps.LatLng(-33.38239, -70.58153), new google.maps.LatLng(-33.38246, -70.58217), new google.maps.LatLng(-33.38259, -70.58285), new google.maps.LatLng(-33.38311, -70.58536),
  ];

  polyOptions = {
    path: coords,
    strokeColor: "#231F36",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#2D0041",
    fillOpacity: 0.6
  };
  polyOptions2 = {
    path: coords2,
    strokeColor: "#231F36",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#2D0041",
    fillOpacity: 0.6
  };
  polyOptions5 = {
    path: coords5,
    strokeColor: "#231F36",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#2D0041",
    fillOpacity: 0.6
  };
  polyOptions3 = {
    path: coords3,
    strokeColor: "#231F36",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#2D0041",
    fillOpacity: 0.6
  };
  polyOptions4 = {
    path: coords4,
    strokeColor: "#231F36",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#2D0041",
    fillOpacity: 0.6
  };

  var polygon = new google.maps.Polygon(polyOptions);
  polygon.setMap(map1);

  var polygon2 = new google.maps.Polygon(polyOptions2);
  polygon2.setMap(map1);

  var polygon3 = new google.maps.Polygon(polyOptions3);
  polygon3.setMap(map2);

  var polygon4 = new google.maps.Polygon(polyOptions4);
  polygon4.setMap(map3);

  // var polygon5 = new google.maps.Polygon(polyOptions5);
  // polygon5.setMap(map2);

  var image = 'https://fukai.cl/img/icon-32x32.png';

  new google.maps.Marker({
    position: new google.maps.LatLng(-33.433867, -70.635308),
    map: map1,
    icon: image,
    title: 'Fukai, Patio bellavista'
  });
  new google.maps.Marker({
    position: new google.maps.LatLng(-33.389421, -70.618479),
    map: map2,
    icon: image,
    title: 'Fukai, Ciudad empresarial'
  });
  new google.maps.Marker({
    position: new google.maps.LatLng(-33.3931943,-70.5709422),
    map: map3,
    icon: image,
    title: 'Fukai, Vitacura'
  });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQhKEopoy1DNJ4sBeooGfdBiuu7LmAF2g&libraries=places,geometry&callback=initAutocomplete"
async defer>
</script>
@endsection