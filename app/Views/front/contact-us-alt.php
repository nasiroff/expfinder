<?=$this->extend('/front/layout/app')?>

<?=$this->section('content')?>
  <div class="site__body">
    <div class="page-header">
      <div class="page-header__container container">
        <div class="page-header__breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('')?>"><?=lang('app.home')?></a>
                <svg class="breadcrumb-arrow" width="6px" height="9px">
                  <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-right-6x9')?>"></use>
                </svg>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><?=lang('app.contact_us')?></li>
            </ol>
          </nav>
        </div>
        <div class="page-header__title"><h1><?=lang('app.contact_us')?></h1></div>
      </div>
    </div>
    <div class="block">
      <div class="container">
        <div class="card mb-0 contact-us">
          <div class="contact-us__map">
            <iframe src="https://maps.google.com/maps?q=40.4082672,49.864281,20.75z&t=&z=13&ie=UTF8&iwloc=&output=embed">
            </iframe>
          </div>
          <div class="card-body">
            <div class="contact-us__container">
              <div class="row">
                <div class="col-12 col-lg-6 pb-4 pb-lg-0"><h4 class="contact-us__header card-title">Bizim ünav</h4>
                  <div class="contact-us__address">
                    <p>
                      <?=$contactInformation->address?>
                      <br>Email: <?=$contactInformation->email?>
                      <br>Telefon nömrəsi: <?=$contactInformation->phone_number_mobile.", ".$contactInformation->phone_number_home?>
                    </p>
                    <p>
                      <strong>İş vaxtları</strong>
                      <br><?=$contactInformation->openin_days?>
                      <br><?=$contactInformation->openin_hours?>
                    </p>
                    <p>
                      <strong>Haqqımızda</strong>
                      <br><?=$contactInformation->about?>
                    </p>
                  </div>
                </div>
                <div class="col-12 col-lg-6"><h4 class="contact-us__header card-title">Leave us a Message</h4>
                  <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="form-name">Adnınız</label>
                        <input type="text" id="form-name" class="form-control" placeholder="Adnınız">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="form-email">Email ünvanınız</label>
                        <input type="email" id="form-email" class="form-control" placeholder="Email ünvanınız">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="form-subject">Mövzu</label>
                      <input type="text" id="form-subject" class="form-control" placeholder="Mövzu">
                    </div>
                    <div class="form-group">
                      <label for="form-message">Mesaj</label>
                      <textarea id="form-message" class="form-control" style="resize: none" rows="4" placeholder="Mesaj"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Mesaj göndər</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?=$this->endSection()?>