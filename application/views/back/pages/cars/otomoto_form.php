<!-- ########## START: MAIN PANEL ########## -->
<?php
$desc = '';
if (strpos($car->description, '<p>') !== false) $desc = substr($car->description, 3, -4);
else $desc = $car->description;
if ($salon->id == 12) $city = 15;
else $city = 27;
$body_type['Miejskie'] = 'city-car';
$body_type['Crossover'] = 'suv';
$body_type['SUV'] = 'suv';
$body_type['Kombi'] = 'combi';
$body_type['Hatchback'] = 'compact';
$body_type['MPV'] = 'minivan';
$body_type['Sedan'] = 'sedan';
$body_type['Coupe'] = 'coupe';
$body_type['Cabriolet'] = 'cabrio';
$body_type['Pickup'] = 'suv';
$body_type['Użytkowe'] = 'mini';
$body_type['Pozostałe'] = 'compact';
?>
<div class="br-mainpanel">
  <div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5"><?php echo $car->title ?? "Dodaj Samochód"; ?></h4>
    <p class="mg-b-0"><?php echo subtitle(); ?></p>
  </div><!-- d-flex -->

  <div class="br-pagebody mg-t-0 pd-x-30">
    <?php if (isset($_SESSION['flashdata'])) : ?>
      <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
    <?php endif; ?>


    <form class="form-layout form-layout-6" action="<?php echo base_url() . 'panel/' . $this->uri->segment(2) . '/otomoto_action/otomoto_cars_meta/' . $car->id; ?>" method="post" enctype="multipart/form-data">

      <input type="hidden" name="title" value="<?= @$car->title; ?>">
      <input type="hidden" name="colour_type" value="metallic">
      <input type="hidden" name="rhd" value="0">
      <div style="width:100%;display:flex;">
        <div class="col-12 col-md-6">
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Kategoria Otomoto:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="category_id" name="category_id">
                <option <?php if (@$value->category == 29) echo "selected"; ?> value="29">Osobowe</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Salon:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="salon" value="<?= @$salon->name; ?>" readonly="readonly">
              <input type="hidden" name="contact" value="<?= @$salon->id; ?>">
              <input type="hidden" name="city_id" value="<?= $city; ?>">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Marka:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="make" value="<?= @$brand->name; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Rocznik:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="year" value="<?= @$car->car_year; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Paliwo:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="fuel_type" value="<?= @$car->fuel; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Numer VIN:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="vin" value="<?= @$car->vin; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Przebieg:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="mileage" value="<?= @$car->course; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Kolor:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="color" value="<?= @$color->otomotoname; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Stan:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="new_used" value="<?= @$car->car_condition; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Napęd:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="transmission" value="<?= @$car->drive; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Bezwypadkowy:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="no_accident" value="<?= @$car->accidents; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Serwisowany w ASO:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="service_record" value="<?= @$car->aso; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Liczba Miejsc:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="nr_seats" value="<?= @$car->seats; ?>" readonly="readonly">
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Model:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="model" name="model">
                <?php foreach ($models as $element) : ?>
                  <option <?php if (@$value['model'] == $element->name) echo "selected"; ?> value="<?= $element->name; ?>"><?= $element->name . ' - ' . @$element->version; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Cena:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="price" value="<?= @$car->price; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Nadwozie:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="body_type" value="<?= @$body_type[$car->category]; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Skrzynia Biegów:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="gearbox" value="<?= @$car->transmission; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Liczba Drzwi:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="door_count" value="<?= @$car->doors; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Pojemność Silnika:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="engine_capacity" value="<?= @$car->car_engine; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Moc:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="engine_power" value="<?= @$car->engine_power; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Link:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="video" value="<?= @$car->url_to_instruction; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Kraj Pochodzenia:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="country_origin" value="<?= @$car->country; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Data Pierwszej Rejestracji:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="date" name="date_registration" value="<?= @$car->first_register; ?>" readonly="readonly">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Zarejestrowany w Polsce:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="registered" value="<?= @$car->register_in_poland; ?>" readonly="readonly">
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Opis:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <div><?php echo $car->description; ?></div>
          <input type="hidden" name="description" value="<?php echo $desc; ?>">
        </div>
      </div>
      <hr>


      <div class="form-layout-footer bd bd-t-0-force pd-20">
        <button class="btn btn-info" type="submit">Przejdź dalej</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
      </div>
    </form><!-- form-layout -->