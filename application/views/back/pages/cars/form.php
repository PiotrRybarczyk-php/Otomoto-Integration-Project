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
              <input class="form-control" type="text" name="url_to_instruction" value="<?= @$value->url_to_instruction; ?>" required>
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





      <div class="form-layout-footer bd bd-t-0-force pd-20">
        <button class="btn btn-info" type="submit">Zapisz</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
      </div>
    </form><!-- form-layout -->