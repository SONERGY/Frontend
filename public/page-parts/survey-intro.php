<form role="form" id="introduction">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="survey_title">Survey title</label>
                <input type="text" id="survey_title" name="survey_title" placeholder="Your Favorite Logo, Presidential Election, Best Restaurant Survey, etc." required class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="survey_language">Survey language</label>
                <select class="form-control" name="survey_language" id="survey_language" tabindex="-1">
                    <option value="ar">Arabic (&rlm;العربية&rlm;)</option>
                    <option value="hy">Armenian (հայերեն)</option>
                    <option value="bg">Bulgarian (Български)</option>
                    <option value="my">Burmese (မြန်မာစာာ)</option>
                    <option value="zh-HK">Chinese Hong Kong (中文 - 香港 )</option>
                    <option value="hr">Croatian (Hrvatski)</option>
                    <option value="cs">Czech (Čeština)</option>
                    <option value="da">Danish (Dansk)</option>
                    <option value="de">Deutsch</option>
                    <option value="nl">Dutch (Nederlands)</option>
                    <option value="et">Estonian (Eesti keel)</option>
                    <option selected="selected" value="en">English</option>
                    <option value="es">Español</option>
                    <option value="fi">Finnish (Suomi)</option>
                    <option value="fr">Français</option>
                    <option value="ka">Georgian (ქართული)</option>
                    <option value="el">Greek (Ελληνικά)</option>
                    <option value="he">Hebrew (עברית&rlm;)</option>
                    <option value="hi">Hindi (हिन्दी)</option>
                    <option value="hu">Hungarian (Magyar)</option>
                    <option value="it">Italian (Italiano)</option>
                    <option value="id">Indonesian (Bahasa Indonesia)</option>
                    <option value="ja">Japanese(日本語)</option>
                    <option value="lv">Latvian (Latviešu valoda)</option>
                    <option value="lt">Lithuanian (Lietuvių)</option>
                    <option value="ms">Malay</option>
                    <option value="mt">Maltese</option>
                    <option value="nb">Norwegian (Norsk bokmål)</option>
                    <option value="pl">Polish(Polski)</option>
                    <option value="pt">Português</option>
                    <option value="ro">Romanian (Română)</option>
                    <option value="ru">Russian (Русский)</option>
                    <option value="sk">Slovak (Slovenčina)</option>
                    <option value="sl">Slovenian (Slovenščina)</option>
                    <option value="sv">Swedish (Svenska)</option>
                    <option value="tr">Turkish (Türkçe)</option>
                    <option value="uk">Ukrainian (Українська)</option>
                    <option value="th">Thai (ภาษาไทย)</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <input type="hidden" name="survey_id" class="survey_id" id="survey_id" value="0">
        <label for="introduction">Introduction </label>
        <textarea name="introduction_text" id="introduction_text" class="form-control" cols="3" rows="3"></textarea>

    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
             
                <label for="survey_title">Survey Duration</label>
                <?php 
              for ($i=0; $i < sizeof($data); $i++) { 
                 ?>
                  <div className="form-group ">
                  <div className="row">
                      <div class="custom-control custom-radio col-md-12 ">
                      <input
                          type="radio"
                          class="custom-control-input"
                          id="radio<?=$data[$i]->duration; ?>"
                        name="duration"
                          value="<?=$data[$i]->duration; ?>"
                        
                        />
                        <label class="custom-control-label " id="label<?=$data[$i]->duration; ?>" for="radio<?=$data[$i]->duration; ?>">
                        <?=$data[$i]->duration; ?> Days = <span class="badge badge-primary"><?=number_format($data[$i]->amount, 2); ?></span> <small><b>SNGY</b></small>
                        </label>
                      </div>
                  </div>
                  </div>
                    
                 <?php
              }
                ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="survey_language">Survey Start Date</label>
                <div class="input mb-4">
                    <input name="start_date" id="input-calc-start_date" width="276" />
                </div>
            </div>
        </div>
    </div>
    <button type="button" id="btn-question" class="navigate btn btn-warning  rounded-pill shadow-sm">  Next <i class="fa fa-arrow-right"></i></button>


    <button type="submit" id="submit_intro" class="subscribe btn btn-primary rounded-pill shadow-sm"> Save & Continue <i class="fa fa-arrow-right"></i></button>
</form>