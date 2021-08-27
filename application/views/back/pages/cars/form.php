<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
  <div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5"><?php echo $value->title ?? "Dodaj Samochód"; ?></h4>
    <p class="mg-b-0"><?php echo subtitle(); ?></p>
  </div><!-- d-flex -->

  <div class="br-pagebody mg-t-0 pd-x-30">
    <?php if (isset($_SESSION['flashdata'])) : ?>
      <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
    <?php endif; ?>


    <form class="form-layout form-layout-6" action="<?php echo base_url() . 'panel/' . $this->uri->segment(2) . '/action/' . $this->uri->segment(4) . '/' . 'cars'; ?>/<?php echo @$value->id; ?>" method="post" enctype="multipart/form-data">

      <div class="row no-gutters">
        <div class="row col-6">
          <div class="col-12 col-sm-4 col-lg-2">
            Status Oferty:
          </div>
          <div class="col-12 col-sm-8 col-lg-9">
            <select class="form-control" id="publish" name="publish">
              <option <?php if (@$value->publish == 0) echo "selected"; ?> value="0">Niewidoczna</option>
              <option <?php if (@$value->publish == 1) echo "selected"; ?> value="1">Publiczna oferta</option>
            </select>
          </div>
        </div>
        <div class="row col-6">
          <div class="col-12 col-sm-4 col-lg-2">
            Auto Odnawianie:
          </div>
          <div class="col-12 col-sm-8 col-lg-9">
            <select class="form-control" id="otomoto_autoreactive" name="otomoto_autoreactive">
              <option <?php if (@$value->otomoto_autoreactive == 0) echo "selected"; ?> value="0">Nie</option>
              <option <?php if (@$value->otomoto_autoreactive == 1) echo "selected"; ?> value="1">Tak</option>
            </select>
          </div>
        </div>
      </div>
      <div style="width:100%;display:flex;">
        <div class="col-12 col-md-6">
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Tytuł Ogłoszenia:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="title" value="<?= @$value->title; ?>" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Kategoria auta:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="category" name="category">
                <option <?php if (@$value->category == "Miejskie") echo "selected"; ?> value="Miejskie">Miejskie</option>
                <option <?php if (@$value->category == "Crossover") echo "selected"; ?> value="Crossover">Crossover</option>
                <option <?php if (@$value->category == "SUV") echo "selected"; ?> value="SUV">SUV</option>
                <option <?php if (@$value->category == "Combi") echo "selected"; ?> value="Combi">Kombi</option>
                <option <?php if (@$value->category == "Hatchback") echo "selected"; ?> value="Hatchback">Hatchback</option>
                <option <?php if (@$value->category == "MPV") echo "selected"; ?> value="MPV">MPV</option>
                <option <?php if (@$value->category == "Sedan") echo "selected"; ?> value="Sedan">Sedan</option>
                <option <?php if (@$value->category == "Coupe") echo "selected"; ?> value="Coupe">Coupe</option>
                <option <?php if (@$value->category == "Cabriolet") echo "selected"; ?> value="Cabriolet">Cabriolet</option>
                <option <?php if (@$value->category == "Pickup") echo "selected"; ?> value="Pickup">Pickup</option>
                <option <?php if (@$value->category == "Użytkowe") echo "selected"; ?> value="Użytkowe">Użytkowe</option>
                <option <?php if (@$value->category == "Pozostałe") echo "selected"; ?> value="Pozostałe">Pozostałe</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Pokazuj w:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="show_on" name="show_on">
                <option <?php if (@$value->show_on == "0") echo "selected"; ?> value="0">Tylko w wyszukiwarce</option>
                <option <?php if (@$value->show_on == "DasWeltAuto") echo "selected"; ?> value="DasWeltAuto">DasWeltAuto</option>
                <option <?php if (@$value->show_on == "AudiSelectPlus") echo "selected"; ?> value="AudiSelectPlus">Audi Select :Plus</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Marka:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="brand_id" name="brand_id">
                <?php foreach ($brands as $element) : ?>
                  <option <?php if (@$value->brand_id == $element->id) echo "selected"; ?> value="<?= $element->id; ?>"><?= $element->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Rocznik:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="number" min="2000" max="<?= date("Y"); ?>" name="car_year" value="<?= @$value->car_year; ?>" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Poj. silnika:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="number" name="car_engine" value="<?= @$value->car_engine; ?>" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Moc (KM):
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="number" name="engine_power" value="<?= @$value->engine_power; ?>" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              VIN:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="vin" value="<?= @$value->vin; ?>" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Napęd:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="drive" name="drive">
                <option <?php if (@$value->drive == "front-wheel") echo "selected"; ?> value="front-wheel">Przód</option>
                <option <?php if (@$value->drive == "rear-wheel") echo "selected"; ?> value="rear-wheel">Tył</option>
                <option <?php if (@$value->drive == "all-wheel-permanent") echo "selected"; ?> value="all-wheel-permanent">AWD</option>
                <option <?php if (@$value->drive == "all-wheel-auto") echo "selected"; ?> value="all-wheel-auto">4x4</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Liczba drzwi:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="doors" name="doors">
                <option <?php if (@$value->doors == "2") echo "selected"; ?> value="2">2</option>
                <option <?php if (@$value->doors == "3") echo "selected"; ?> value="3">3</option>
                <option <?php if (@$value->doors == "4") echo "selected"; ?> value="4">4</option>
                <option <?php if (@$value->doors == "5") echo "selected"; ?> value="5">5</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Faktura VAT:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="invoice" name="invoice">
                <option <?php if (@$value->invoice == "0") echo "selected"; ?> value="0">Nie</option>
                <option <?php if (@$value->invoice == "1") echo "selected"; ?> value="1">Tak</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Data Pierw. Rejestracji:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="date" onkeydown="return false" name="first_register" value="<?= @$value->first_register; ?>" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Bezwypadkowy:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="accidents" name="accidents">
                <option <?php if (@$value->accidents == "0") echo "selected"; ?> value="0">Nie</option>
                <option <?php if (@$value->accidents == "1") echo "selected"; ?> value="1">Tak</option>
              </select>
            </div>
          </div>
        </div>
        <!-- next col -->
        <div class="col-12 col-md-6">
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Salon:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="salon_id" name="salon_id">
                <?php foreach ($dealer as $element) : ?>
                  <option <?php if (@$value->salon_id == $element->id) echo "selected"; ?> value="<?= $element->id; ?>"><?= $element->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Stan:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="car_condition" name="car_condition">
                <option <?php if (@$value->car_condition == "used") echo "selected"; ?> value="used">Używany</option>
                <option <?php if (@$value->car_condition == "new") echo "selected"; ?> value="new">Nowy</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Rodzaj Paliwa:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="fuel" name="fuel">
                <option <?php if (@$value->fuel == "petrol") echo "selected"; ?> value="petrol">Benzyna</option>
                <option <?php if (@$value->fuel == "diesel") echo "selected"; ?> value="diesel">Diesel</option>
                <option <?php if (@$value->fuel == "gaz") echo "selected"; ?> value="gaz">Gaz</option>
                <option <?php if (@$value->fuel == "hybrid") echo "selected"; ?> value="hybrid">Hybryda</option>
                <option <?php if (@$value->fuel == "electric") echo "selected"; ?> value="electric">Elektryczny</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Kraj Pochodzenia:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="country" name="country">
                <option <?php if (@$value->country == "pl") echo "selected"; ?> value="pl">Polska</option>
                <option <?php if (@$value->country == "a") echo "selected"; ?> value="a">Austria</option>
                <option <?php if (@$value->country == "b") echo "selected"; ?> value="b">Belgia</option>
                <option <?php if (@$value->country == "by") echo "selected"; ?> value="by">Białoruś</option>
                <option <?php if (@$value->country == "bg") echo "selected"; ?> value="bg">Bułgaria</option>
                <option <?php if (@$value->country == "hr") echo "selected"; ?> value="hr">Chorwacja</option>
                <option <?php if (@$value->country == "cz") echo "selected"; ?> value="cz">Czechy</option>
                <option <?php if (@$value->country == "dk") echo "selected"; ?> value="dk">Dania</option>
                <option <?php if (@$value->country == "est") echo "selected"; ?> value="est">Estonia</option>
                <option <?php if (@$value->country == "fi") echo "selected"; ?> value="fi">Finlandia</option>
                <option <?php if (@$value->country == "f") echo "selected"; ?> value="f">Francja</option>
                <option <?php if (@$value->country == "gr") echo "selected"; ?> value="gr">Grecja</option>
                <option <?php if (@$value->country == "e") echo "selected"; ?> value="e">Hiszpania</option>
                <option <?php if (@$value->country == "nl") echo "selected"; ?> value="nl">Holandia</option>
                <option <?php if (@$value->country == "irl") echo "selected"; ?> value="irl">Irlandia</option>
                <option <?php if (@$value->country == "is") echo "selected"; ?> value="is">Islandia</option>
                <option <?php if (@$value->country == "cdn") echo "selected"; ?> value="cdn">Kanada</option>
                <option <?php if (@$value->country == "li") echo "selected"; ?> value="li">Liechtenstein</option>
                <option <?php if (@$value->country == "lt") echo "selected"; ?> value="lt">Litwa</option>
                <option <?php if (@$value->country == "l") echo "selected"; ?> value="l">Luksemburg</option>
                <option <?php if (@$value->country == "lv") echo "selected"; ?> value="lv">Łotwa</option>
                <option <?php if (@$value->country == "mc") echo "selected"; ?> value="mc">Monako</option>
                <option <?php if (@$value->country == "d") echo "selected"; ?> value="d">Niemcy</option>
                <option <?php if (@$value->country == "n") echo "selected"; ?> value="n">Norwegia</option>
                <option <?php if (@$value->country == "ru") echo "selected"; ?> value="ru">Rosja</option>
                <option <?php if (@$value->country == "ro") echo "selected"; ?> value="ro">Rumunia</option>
                <option <?php if (@$value->country == "sk") echo "selected"; ?> value="sk">Słowacja</option>
                <option <?php if (@$value->country == "si") echo "selected"; ?> value="si">Słowenia</option>
                <option <?php if (@$value->country == "usa") echo "selected"; ?> value="usa">Stany Zjednoczone</option>
                <option <?php if (@$value->country == "ch") echo "selected"; ?> value="ch">Szwajcaria</option>
                <option <?php if (@$value->country == "s") echo "selected"; ?> value="s">Szwecja</option>
                <option <?php if (@$value->country == "tr") echo "selected"; ?> value="tr">Turcja</option>
                <option <?php if (@$value->country == "ua") echo "selected"; ?> value="ua">Ukraina</option>
                <option <?php if (@$value->country == "hu") echo "selected"; ?> value="hu">Węgry</option>
                <option <?php if (@$value->country == "gb") echo "selected"; ?> value="gb">Wielka Brytania</option>
                <option <?php if (@$value->country == "i") echo "selected"; ?> value="i">Włochy</option>
                <option <?php if (@$value->country == "others") echo "selected"; ?> value="others">Inny</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Przebieg:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="number" name="course" value="<?= @$value->course; ?>" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Skrzynia Biegów:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="transmission" name="transmission">
                <option <?php if (@$value->transmission == "manual") echo "selected"; ?> value="manual">Manualna</option>
                <option <?php if (@$value->transmission == "automatic") echo "selected"; ?> value="automatic">Automatyczna</option>
                <option <?php if (@$value->transmission == "semi-automatic") echo "selected"; ?> value="semi-automatic">Półautomatyczna</option>
                <option <?php if (@$value->transmission == "cvt") echo "selected"; ?> value="cvt">cvt</option>
                <option <?php if (@$value->transmission == "dual-clutch") echo "selected"; ?> value="dual-clutch">dual-clutch</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Kolor:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="color" name="color">
                <?php foreach ($color as $element) : ?>
                  <option <?php if (@$value->color == $element->id) echo "selected"; ?> value="<?= $element->id; ?>"><?= $element->name . "(" . $element->code . ")"; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              liczba miejsc:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="number" name="seats" min="2" max="11" value="<?= @$value->seats; ?>" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Zarejestrowany w polsce:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="register_in_poland" name="register_in_poland">
                <option <?php if (@$value->register_in_poland == "0") echo "selected"; ?> value="0">Nie</option>
                <option <?php if (@$value->register_in_poland == "1") echo "selected"; ?> value="1">Tak</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Pierwszy Właściciel:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="first_owner" name="first_owner">
                <option <?php if (@$value->first_owner == "0") echo "selected"; ?> value="0">Nie</option>
                <option <?php if (@$value->first_owner == "1") echo "selected"; ?> value="1">Tak</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Serwisowany w ASO:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="aso" name="aso">
                <option <?php if (@$value->aso == "0") echo "selected"; ?> value="0">Nie</option>
                <option <?php if (@$value->aso == "1") echo "selected"; ?> value="1">Tak</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Link do instrukcji:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="text" name="url_to_instruction" value="<?= @$value->url_to_instruction; ?>">
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Odpowiedzialny Pracownik:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="user_id" name="user_id">
                <?php foreach ($users as $element) : ?>
                  <option <?php if (@$value->user_id == $element->id) echo "selected"; ?> value="<?= $element->id; ?>"><?= $element->name . ' ' . $element->surname; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div style="width:100%;display:flex;">
        <div class="col-12 col-md-6">
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Cena:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="number" name="price" value="<?= @$value->price; ?>" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Rata Miesięczna:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <input class="form-control" type="number" name="price_leasing" value="<?= @$value->price_leasing; ?>" required>
            </div>
          </div>

        </div>
        <div class="col-12 col-md-6">
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Typ:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="cena_typ" name="cena_typ">
                <option <?php if (@$value->cena_typ == 'brutto') echo "selected"; ?> value="brutto">Brutto</option>
                <option <?php if (@$value->cena_typ == 'netto') echo "selected"; ?> value="netto">Netto</option>
              </select>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-sm-4 col-lg-2">
              Dostępny Leasing:
            </div>
            <div class="col-12 col-sm-8 col-lg-9">
              <select class="form-control" id="leasing" name="leasing">
                <option <?php if (@$value->leasing == 0) echo "selected"; ?> value="0">Nie</option>
                <option <?php if (@$value->leasing == 1) echo "selected"; ?> value="1">Tak</option>
              </select>
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
          <textarea class="summernote" name="description"><?php echo @$value->description; ?></textarea>

        </div>
      </div>
      <hr>
      <div class="form-check movable_features">
        <table class="table">
          <tbody>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresabs"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "abs"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresabs" value="abs">
                  ABS</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featurescd"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "cd"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featurescd" value="cd">
                  CD</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featurescentral-lock"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "central-lock"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featurescentral-lock" value="central-lock">
                  Centralny zamek</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresfront-electric-windows"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "front-electric-windows"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresfront-electric-windows" value="front-electric-windows">
                  Elektryczne szyby przednie</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featureselectronic-rearview-mirrors"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "electronic-rearview-mirrors"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featureselectronic-rearview-mirrors" value="electronic-rearview-mirrors">
                  Elektrycznie ustawiane lusterka</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featureselectronic-immobiliser"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "electronic-immobiliser"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featureselectronic-immobiliser" value="electronic-immobiliser">
                  Immobilizer</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresfront-airbags"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "front-airbags"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresfront-airbags" value="front-airbags">
                  Poduszka powietrzna kierowcy</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresfront-passenger-airbags"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "front-passenger-airbags"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresfront-passenger-airbags" value="front-passenger-airbags">
                  Poduszka powietrzna pasażera</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresoriginal-radio"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "original-radio"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresoriginal-radio" value="original-radio">
                  Radio fabryczne</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresassisted-steering"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "assisted-steering"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresassisted-steering" value="assisted-steering">
                  Wspomaganie kierownicy</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresalarm"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "alarm"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresalarm" value="alarm">
                  Alarm</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresalloy-wheels"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "alloy-wheels"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresalloy-wheels" value="alloy-wheels">
                  Alufelgi</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresasr"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "asr"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresasr" value="asr">
                  ASR (kontrola trakcji)</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featurespark-assist"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "park-assist"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featurespark-assist" value="park-assist">
                  Asystent parkowania</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featureslane-assist"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "lane-assist"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featureslane-assist" value="lane-assist">
                  Asystent pasa ruchu</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresbluetooth"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "bluetooth"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresbluetooth" value="bluetooth">
                  Bluetooth</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresautomatic-wipers"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "automatic-wipers"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresautomatic-wipers" value="automatic-wipers">
                  Czujnik deszczu</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresblind-spot-sensor"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "blind-spot-sensor"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresblind-spot-sensor" value="blind-spot-sensor">
                  Czujnik martwego pola</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresautomatic-lights"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "automatic-lights"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresautomatic-lights" value="automatic-lights">
                  Czujnik zmierzchu</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresboth-parking-sensors"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "both-parking-sensors"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresboth-parking-sensors" value="both-parking-sensors">
                  Czujniki parkowania przednie</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresrear-parking-sensors"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "rear-parking-sensors"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresrear-parking-sensors" value="rear-parking-sensors">
                  Czujniki parkowania tylne</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featurespanoramic-sunroof"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "panoramic-sunroof"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featurespanoramic-sunroof" value="panoramic-sunroof">
                  Dach panoramiczny</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featureselectric-exterior-mirror"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "electric-exterior-mirror"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featureselectric-exterior-mirror" value="electric-exterior-mirror">
                  Elektrochromatyczne lusterka boczne</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featureselectric-interior-mirror"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "electric-interior-mirror"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featureselectric-interior-mirror" value="electric-interior-mirror">
                  Elektrochromatyczne lusterko wsteczne</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresrear-electric-windows"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "rear-electric-windows"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresrear-electric-windows" value="rear-electric-windows">
                  Elektryczne szyby tylne</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featureselectric-adjustable-seats"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "electric-adjustable-seats"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featureselectric-adjustable-seats" value="electric-adjustable-seats">
                  Elektrycznie ustawiane fotele</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresesp"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "esp"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresesp" value="esp">
                  ESP (stabilizacja toru jazdy)</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresaux-in"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "aux-in"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresaux-in" value="aux-in">
                  Gniazdo AUX</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuressd-socket"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "sd-socket"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuressd-socket" value="sd-socket">
                  Gniazdo SD</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresusb-socket"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "usb-socket"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresusb-socket" value="usb-socket">
                  Gniazdo USB</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featurestowing-hook"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "towing-hook"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featurestowing-hook" value="towing-hook">
                  Hak</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featureshead-display"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "head-display"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featureshead-display" value="head-display">
                  HUD (wyświetlacz przezierny)</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresisofix"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "isofix"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresisofix" value="isofix">
                  Isofix</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresrearview-camera"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "rearview-camera"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresrearview-camera" value="rearview-camera">
                  Kamera cofania</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresautomatic-air-conditioning"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "automatic-air-conditioning"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresautomatic-air-conditioning" value="automatic-air-conditioning">
                  Klimatyzacja automatyczna</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresquad-air-conditioning"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "quad-air-conditioning"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresquad-air-conditioning" value="quad-air-conditioning">
                  Klimatyzacja czterostrefowa</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresdual-air-conditioning"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "dual-air-conditioning"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresdual-air-conditioning" value="dual-air-conditioning">
                  Klimatyzacja dwustrefowa</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresair-conditioning"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "air-conditioning"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresair-conditioning" value="air-conditioning">
                  Klimatyzacja manualna</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresonboard-computer"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "onboard-computer"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresonboard-computer" value="onboard-computer">
                  Komputer pokładowy</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresside-window-airbags"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "side-window-airbags"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresside-window-airbags" value="side-window-airbags">
                  Kurtyny powietrzne</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresshift-paddles"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "shift-paddles"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresshift-paddles" value="shift-paddles">
                  Łopatki zmiany biegów</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresmp3"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "mp3"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresmp3" value="mp3">
                  MP3</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresgps"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "gps"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresgps" value="gps">
                  Nawigacja GPS</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresdvd"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "dvd"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresdvd" value="dvd">
                  Odtwarzacz DVD</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresspeed-limiter"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "speed-limiter"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresspeed-limiter" value="speed-limiter">
                  Ogranicznik prędkości</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresauxiliary-heating"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "auxiliary-heating"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresauxiliary-heating" value="auxiliary-heating">
                  Ogrzewanie postojowe</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresheated-windshield"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "heated-windshield"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresheated-windshield" value="heated-windshield">
                  Podgrzewana przednia szyba</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresheated-rearview-mirrors"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "heated-rearview-mirrors"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresheated-rearview-mirrors" value="heated-rearview-mirrors">
                  Podgrzewane lusterka boczne</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresfront-heated-seats"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "front-heated-seats"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresfront-heated-seats" value="front-heated-seats">
                  Podgrzewane przednie siedzenia</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresrear-heated-seats"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "rear-heated-seats"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresrear-heated-seats" value="rear-heated-seats">
                  Podgrzewane tylne siedzenia</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresdriver-knee-airbag"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "driver-knee-airbag"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresdriver-knee-airbag" value="driver-knee-airbag">
                  Poduszka powietrzna chroniąca kolana</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresfront-side-airbags"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "front-side-airbags"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresfront-side-airbags" value="front-side-airbags">
                  Poduszki boczne przednie</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresrear-passenger-airbags"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "rear-passenger-airbags"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresrear-passenger-airbags" value="rear-passenger-airbags">
                  Poduszki boczne tylne</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featurestinted-windows"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "tinted-windows"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featurestinted-windows" value="tinted-windows">
                  Przyciemniane szyby</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresradio"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "radio"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresradio" value="radio">
                  Radio niefabryczne</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresadjustable-suspension"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "adjustable-suspension"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresadjustable-suspension" value="adjustable-suspension">
                  Regulowane zawieszenie</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresroof-bars"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "roof-bars"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresroof-bars" value="roof-bars">
                  Relingi dachowe</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuressystem-start-stop"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "system-start-stop"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuressystem-start-stop" value="system-start-stop">
                  System Start-Stop</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuressunroof"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "sunroof"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuressunroof" value="sunroof">
                  Szyberdach</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresdaytime-lights"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "daytime-lights"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresdaytime-lights" value="daytime-lights">
                  Światła do jazdy dziennej</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresleds"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "leds"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresleds" value="leds">
                  Światła LED</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresfog-lights"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "fog-lights"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresfog-lights" value="fog-lights">
                  Światła przeciwmgielne</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresxenon-lights"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "xenon-lights"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresxenon-lights" value="xenon-lights">
                  Światła Xenonowe</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresleather-interior"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "leather-interior"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresleather-interior" value="leather-interior">
                  Tapicerka skórzana</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuresvelour-interior"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "velour-interior"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresvelour-interior" value="velour-interior">
                  Tapicerka welurowa</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featurescruise-control"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "cruise-control"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featurescruise-control" value="cruise-control">
                  Tempomat</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featuresactive-cruise-control"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "active-cruise-control"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuresactive-cruise-control" value="active-cruise-control">
                  Tempomat aktywny</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featurestv"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "tv"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featurestv" value="tv">
                  Tuner TV</label>
              </td>


              <td>
                <label class="form-check-label" for="checkbox_featuressteering-whell-comands"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "steering-whell-comands"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featuressteering-whell-comands" value="steering-whell-comands">
                  Wielofunkcyjna kierownica</label>
              </td>

            </tr>
            <tr>

              <td>
                <label class="form-check-label" for="checkbox_featurescd-changer"><input <?php if (!empty(strpos(@$meta[0]->meta_val, "cd-changer"))) echo 'checked'; ?> name="features[]" type="checkbox" class="form-check-input" id="checkbox_featurescd-changer" value="cd-changer">
                  Zmieniarka CD</label>
              </td>




            </tr>
          </tbody>
        </table>
      </div>




      <div class="form-layout-footer bd bd-t-0-force pd-20">
        <button class="btn btn-info" type="submit">Zapisz</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
      </div>
    </form><!-- form-layout -->